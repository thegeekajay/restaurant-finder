<?php

require_once "include.php";

  class Menu extends DB{
	
//restaurantId
  private $item;
  private $details;
  private $imageLink;
  private $price;
  private $db;
  private $createdAt;
  private $updatedAt;
  


  function __construct($data){
   $tableName = 'order_menu';
    parent::__construct($tableName);
  }

  public function addMenuItem($data){
    
    $this->item = $data['item'];
    $this->details = $data['detail'];

// for image path; 
    $this->price = $data['price'];
    $this->created_at = $data['created_at'] = date('Y-m-d H:i:s');
    $this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');
    return $this->create($data);
  }
  
  public function deleteMenuItem($column,$value){
    return $this->delete($column,$value);
  }
   public function editMenuItem($column, $values, $data){

 
    $this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');

    return $this->update($column, $values, $data);
  }

  //  public function viewMenuItem(){

  //    return $this->selectAll();
    
  // }
}
?>