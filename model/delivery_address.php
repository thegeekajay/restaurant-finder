<?php

require_once "include.php";

 class deliveryAddress extends DB {
  
 function __construct() {
  $tableName = 'delivery_address';
  parent::__construct($tableName);
 }

 public function newAddress($data)
 {
 	$session = new Session();
 	$data['user_id'] = $session->get_session_data('id');
 	$data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');
 	if($this->create($data))
 	{
      $result['status'] = "success";
      $result['success_text'] = "Delivery address added";
    }
    else
    {
      $result['status'] = "error";
      $result['error_text'] = "Delivery address not added";
    }
    return json_encode($result);
 }
 
 }
?>