<?php

require_once "include.php";

class review extends DB{


//user_id;
 //restaurant_id;
 
 private $content;
 private $rating;
 private $createdAt;
 private $updatedAt;
  
  function __construct() {

  $tableName = 'credit_cards';
  parent::__construct($tableName);

 }

 public function addReview($data){

  $this->content = $data['content'];
  $this->rating = $data['rating'];
  $this->created_at = $data['created_at'] = date('Y-m-d H:i:s');
  $this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');
   
   return $this->create($data);
 }

 public function deleteReview($column,$value){

    return $this->delete($column,$value);
 }
?>