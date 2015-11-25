<?php
require_once '../database/order.php';

$order = new order();

print_r($order->createOrderMenu());
?>