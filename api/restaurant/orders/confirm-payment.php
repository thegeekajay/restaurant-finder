<?php

require_once($_SERVER['DOCUMENT_ROOT']."/model/order.php");
require_once($_SERVER['DOCUMENT_ROOT']."/model/session.php");


$id = $_POST['id'];
$orders = new Order();
$session = new Session();
$order = $orders->find('id',$id);
if($order['user_id'] == $session->get_session_data('id'))
{
	$data = [
				'address_id'	=>	$_POST['address_id'],
				'card_id'		=>	$_POST['card_id'],
				'status'		=>	2
			];
	if($orders->update('id',$id,$data))
	{
		header('Location: /confirmation.php');
	}
	else
	{
		print_r("Something went wrong");
	}
}
else
{
	print_r("Something serious went wrong");
}

?>
