<?php

require_once 'connection.php';

class DB{
    protected $table;
    private $dbConnection;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function create($data)
    {
        $this->dbConnection = new DatabaseConnection();

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


    // public static function all(){
    //     static::$val.="2";
    //     return static::$val;
    // }

    // public static function where(){
    //     static::$val.="3";
    //     return new static;
    // }

    // public static function get(){
    //     return static::$table;
    // }




    // // Create new model function
//     public function create($data){
//         $string = INSERT INTO
//         INSERT INTO table_name (column1, column2, column3,...)
// VALUES (value1, value2, value3,...)
//     }

}

?>




