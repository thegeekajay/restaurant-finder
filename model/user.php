<?php

require_once "include.php";


class User extends DB
{
    private $first_name;
    private $last_name;
    private $phone_number;
    private $email;
    private $password;
    private $validate;
    private $db;


    function __construct() {
        $tableName = 'users';
        parent::__construct($tableName);
   }

    public function makeHash($data)
    {
        $password = password_hash($data, PASSWORD_DEFAULT);
    }

    public function verifyHash($secret,$hashedPassword)
    {
        if (password_verify($secret, $hashedPassword)) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data){

        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->password = $data['password'] =$this->makeHash($data['password']);
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->type = $data['type'];
        $this->status = $data['status'] = 1;
        $this->created_at = $data['created_at'] = date('Y-m-d H:i:s');
        $this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');

        return $this->create($data);



}

    public function login($data){
        $this->email = $data['email'];
        $this->password = $data['password'];

        //find user with email $user

        if($this->verifyHash($this->password,$user['password'])){
            $this->setSession();
            return true;
        }
        var_dump($data);
    }

    public function logout(){
        //destroy session
    }

    public function setSession($data)
    {

    }


}