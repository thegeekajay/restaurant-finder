<?php

require_once 'connection.php';
require_once 'validator.php';


class User
{
    private $first_name;
    private $last_name;
    private $phone_number;
    private $email;
    private $password;
    private $validate;
    private $db;


    public function __construct()
    {
        $this->validate = new Validator();
//        $this->db = new DatabaseConnection();
    }

    public function makeHash($data)
    {

    }

    public function verifyHash($secret,$hashedPassword)
    {

    }

    public function register($data){
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->password = $data['password'];
        $this->email = $data['email'];


        if($this->validate->password($this->password))
        {
            $this->password = $this->makeHash($this->password);
        }


        if($this->validate->name($this->first_name) && $this->validate->name($this->last_name) && $this->validate->email($this->email)){
            // new user query
            $this->setSession();
        }
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