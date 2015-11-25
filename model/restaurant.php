<?php

require_once 'connection.php';
require_once 'validator.php';
require_once 'orm.php';
require_once 'menu.php';

class Restaurant extends DB

{
private $name;
private $address1;
private $address2;
private $city;
private $state;
private $zipCode;
private $phone;
private $db;
private $created_at;
private $created_at;


function __construct(){

 $tableName = 'restaurant'; 
 parent::__construct ($tableName);
 }
 
 public function createRestaurant($data){
 
 $this->name = $data['name'];
 $this->address1 = $data['address1'];
 $this ->address2 = $data ['address2'];
 $this->city = $data ['city'];
 $this->state = $data ['state'];
 $this-> zipcode = $data ['zipCode'];
 $this -> phone = $data ['phone'];
 //upload imapge file path for image 
 //take care of rating 
 $this->status = $data['status'] = 1;
 $this->created_at = $data['created_at'] = date('Y-m-d H:i:s');
 $this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');
 $this->delete_at = $data ['delete_at'] = date('Y-m-d H:i:s');


return $this->create($data);

}

public function deleteRestaurant(){

$this->delete($column, $value);

}

public function listRestaurant() {

return $this->selectAll();

}

public function viewRestaurnat($id) {

$data['restaurant']=$this->find('id', $id);
$menu = new Menu();
$data['menu']= $menu->find('restaurant_id', $id);
return $data;

}



?>