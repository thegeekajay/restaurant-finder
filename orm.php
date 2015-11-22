<?php

require_once 'connection.php';

class DB{
    protected $table;
    private $dbConnection;

    public function __construct($table)
    {
        $this->table = $table;
        $this->dbConnection = new DatabaseConnection();
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
        $findString = "SELECT * FROM `$this->table` WHERE `$column` = '$value'";
        return $findString;
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




