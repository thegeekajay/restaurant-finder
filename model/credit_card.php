<?php

require_once "include.php";

 class creditCard extends DB {
  
 function __construct() {

  $tableName = 'credit_cards';
  parent::__construct($tableName);
 }

 public function newCard($data)
 {
 	$session = new Session();
 	$data['user_id'] = $session->get_session_data('id');
 	$data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');
 	if($this->create($data))
 	{
      $result['status'] = "success";
      $result['success_text'] = "Credit card added";
    }
    else
    {
      $result['status'] = "error";
      $result['error_text'] = "Credit card not added";
    }
    return json_encode($result);
 }
 
 }
?>