<?php
require_once 'connection.php';
require_once 'validator.php';
require_once 'orm.php';
require_once 'menu.php';

Class Order extends DB
{

	private $quantity;
	private $price;
	
	function __construct(){
 	$tableName = 'restaurant'; 
 	parent::__construct ($tableName);
 	}
	
	public function createOrderMenu(){
		$this->quantity = $data['quantity'];
		$this->price=$data['price'];
		$this->status = $data['status'] = 1;
        $this->created_at = $data['created_at'] = date('Y-m-d H:i:s');
        $this->updated_at = $data['updated_at'] = date('Y-m-d H:i:s');
		$this->deleted_at = $data['deleted_at'] = date('Y-m-d H:i:s');

	}
	
	public function createOrder(){
		//get all data from restaurant data
	}
	
	public function updateOrder(){
		$this->update($column, $value,$data);
	}
	
}

?>
