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
        return password_hash($data, PASSWORD_DEFAULT);
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
        $this->password = $data['password'] = $this->makeHash($data['password']);
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->type = $data['type'];
        $this->status = $data['status'] = 1;
        $this->created_at = $data['created_at'] = date('Y-m-d H:i:s');
        $this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');

        if($this->isExists('email',$this->email))
        {
            $result['status'] = "error";
            $result['error_text'] = "User already exist.";
        }
        else
        {
            $id = $this->create($data);
            $session = new Session();
            $data = [
            'id'  =>  $id,
            'first_name'  => $data['first_name'],
            'last_name'  => $data['last_name'],
            'user_type' => $data['type']
            ];
            $session->insert($data);

            $result['status'] = "success";
            $result['success_text'] = "User created.";
        }


        return json_encode($result);



  }

  public function login($data){
    $this->email = $data['email'];
    $this->password = $data['password'];
    $user = $this->find('email',$this->email);
    if($user == NULL)
    {
      $result['status'] = "error";
      $result['error_text'] = "User not found.";
    }
    else
    {
      $isPasswordSame = $this->verifyHash($this->password,$user['password']);
      if($isPasswordSame)
      {
        $result['status'] = "success";
        $session = new Session();
        $data = [
        'id'  =>  $user['id'],
        'first_name'  => $user['first_name'],
        'last_name'  => $user['last_name'],
        'user_type'  => $user['type']
        ];
        $session->insert($data);
      }
      else
      {
        $result['status'] = "error";
        $result['error_text'] = "Incorrect password.";
      }
    }
    return json_encode($result);
}

public function logout(){
        //destroy session
}

public function setSession($data)
{

}


}