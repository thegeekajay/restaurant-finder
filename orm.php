<?php

require_once 'connection.php';

class DB{
    protected $table;
    private $dbConnection;

    public function __construct($table)
    {
        $this->dbConnection = new DatabaseConnection();
        $this->table = $table;
    }

    public function create($data)
    {

        $insertString = "INSERT INTO `".$this->table."`";
        $size = count($data);
        $column="";
        $values="";
        $count=1;
        foreach ($data as $key => $value) {
            if($count == $size)
            {
                $column.= $key;
                $values.= "'".$value."'";
            }else{
                $column.= $key.",";
                $values.= "'".$value."',";
            }
            $count+=1;
        }

        $insertString = $insertString." (".$column.") VALUES (".$values.");";
        return $this->dbConnection->send_sql($insertString);

    }


    public function find($column,$value)
    {
        $findString = "SELECT * FROM `$this->table` WHERE `$column` = '$value';";
        return $this->dbConnection->send_sql($findString)->fetch_assoc();
    }

    public function selectAll()
    {
        $findString = "SELECT * FROM `$this->table`;";
        $result = $this->dbConnection->send_sql($findString);
        $data = [];
        while($row = mysqli_fetch_object($result))
          {
            array_push($data,(array) $row);
          }
        return $data;
    }

    public function delete($column,$value)
    {
        $findString = "DELETE FROM `$this->table` WHERE `$column` = '$value';";
        return $this->dbConnection->send_sql($findString);
    }

    public function update($column,$values,$data)
    {
        $updateString = "UPDATE `".$this->table."` SET ";
        $size = count($data);
        $count=1;
        foreach ($data as $key => $value) {
            if($count == $size)
            {
                $updateString.=" `$key` = '$value'";
            }else{
                $updateString.=" `$key` = '$value',";

            }
            $count+=1;
        }
        $updateString.=" WHERE `$column` = '$values';";
        return $this->dbConnection->send_sql($updateString);
    }

}

?>




