<?php

require_once "include.php";

 class creditCard extends DB {
  
   private $label;
   private $cardNumber;
   private $expiryDate;
   private $cvv;
   private $name;
  private $createdAt;
  private $updatedAt;

 function __construct() {

  $tableName = 'credit_cards';
  parent::__construct($tableName);
 }

 public function addCreditCard($data){
    $this->label = $data['label'];
    $this->cardNumber = $data['cardnumber'];
    $this->expiryDate = $data['expiry_date'];
    $this->cvv = $data['cvv'];
    $this->name = $data['name_on_the_card'];
  
    $this->created_at = $data['created_at'] = date('Y-m-d H:i:s');
    $this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');
    return $this->create($data);
 }

 public function deleteCreditCard($column,$value){

    return $this->delete($column,$value);
 }

 public function viewCreditcard(){
  
  return $this->selectAll();
 }
 
 }
?>