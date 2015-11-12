<?php

    require_once 'connection.php';

    class ExpenseReportData
    {
        private $dbConnection;
        private $addCommentStatement;
        private $getCommentsAfterStatement;
        private $updateCommentMessageStatement;
        private $deleteCommentStatement;

        public function getCommentsAfter ($afterId)
        {
            $ret = array ();
            $id = null;
            $timestamp = null;
            $username = null;
            $content = null;

            $this->getCommentsAfterStatement->bind_param("i", $afterId);
            $this->getCommentsAfterStatement->execute();
            $this->getCommentsAfterStatement->bind_result($id, $timestamp, $username, $content);

            while ($this->getCommentsAfterStatement->fetch()) {
                $newEntry = array ("id" => $id, "timestamp" => $timestamp, "username" => $username, "content" => $content);
                array_push($ret, $newEntry);
            }

            return $ret;
        }

        public function updateComment ($newMessage, $id)
        {
            $this->updateCommentMessageStatement->bind_param("si", $newMessage, $id);
            $this->updateCommentMessageStatement->execute();
        }

        public function deleteComment ($id)
        {
            $this->deleteCommentStatement->bind_param("i", $id);
            $this->deleteCommentStatement->execute();
        }

        public function getAllExpenseReports ()
        {
            return $this->dbConnection->send_sql("SELECT * FROM `expense_report`")->fetch_all(MYSQLI_ASSOC);
        }

        public function storeComment ($username, $message)
        {
            $this->addCommentStatement->bind_param("ss", $username, $message);
            $this->addCommentStatement->execute();
        }

        // This is your constructor
        public function __construct ()
        {
            $this->dbConnection = new DatabaseConnection();
            $this->addCommentStatement = $this->dbConnection->prepare_statement("INSERT INTO `expense_report` (`time`, `username`, `content`) VALUES (NOW(), ?, ?)");
            $this->getCommentsAfterStatement = $this->dbConnection->prepare_statement("SELECT * FROM `expense_report` WHERE `id` > ?");
            $this->updateCommentMessageStatement = $this->dbConnection->prepare_statement("UPDATE `expense_report` SET `content` = ? WHERE `id` = ?");
            $this->deleteCommentStatement = $this->dbConnection->prepare_statement("DELETE FROM `expense_report` WHERE `id` = ?");
        }

        // It's good practice to close your resources on destruct.
        function __destruct(){
            $this->addCommentStatement->close();
            $this->getCommentsAfterStatement->close();
            $this->updateCommentMessageStatement->close();
            $this->deleteCommentStatement->close();
        }
    }

?>