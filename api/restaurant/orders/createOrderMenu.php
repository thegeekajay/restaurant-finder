<?php
require_once '../../model/order.php';

$order = new order();

print_r($order->createOrderMenu());
?>