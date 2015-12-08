<?php

require_once($_SERVER['DOCUMENT_ROOT']."/model/order.php");
require_once($_SERVER['DOCUMENT_ROOT']."/model/session.php");
require_once($_SERVER['DOCUMENT_ROOT']."/model/order_menu.php");

$session = new Session();
$order = new Order();
$order_menu = new orderMenu();

$new_order = [
				'user_id'=>$session->get_session_data('id'),
				'restaurant_id'=>$_POST['restaurant_id']
			];

$total = 0;
foreach ($_POST as $key => $value) {
	if($key!= "restaurant_id")
	{
		$arr = explode(",", $value);
		$total=$total+intval($arr['0'])*intval($arr[1]);
	}
}
$new_order['total'] = $total;
$new_order['created_at'] = date('Y-m-d H:i:s');
$new_order['status'] = 1;
$new_order['updated_at'] = date('Y-m-d H:i:s');

$order_id = $order->create($new_order);

foreach ($_POST as $key => $value) {
	if($key!= "restaurant_id")
	{
		$data = [];
		$arr = explode(",", $value);
		$data['order_id'] = $order_id;
		$data['menu_id'] = $key;
		$data['quantity'] = $arr[0];
		$data['price'] = $arr[1];
		$data['created_at'] = date('Y-m-d H:i:s');
		$data['updated_at'] = date('Y-m-d H:i:s');
		$order_menu->create($data);
	}
}

header('Location: /checkout.php?order-id='.$order_id);

?>
