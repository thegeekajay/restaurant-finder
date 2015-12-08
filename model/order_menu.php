<?php
require_once 'include.php';

Class orderMenu extends DB
{
	
	function __construct(){
 	$tableName = 'order_menu'; 
 	parent::__construct ($tableName);
 	}
	
}

?>
