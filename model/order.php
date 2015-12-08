<?php
require_once 'include.php';

Class Order extends DB
{
	// 1:payment pending 2:order placed 3:order confirmed 4:prepared 5:out for delivery 6:delivered
	function __construct(){
 	$tableName = 'order'; 
 	parent::__construct ($tableName);
 	}
	
}

?>
