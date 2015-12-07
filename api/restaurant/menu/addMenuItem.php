<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/menu.php');

$menu = new Menu($_POST['restaurant_id']);

print_r($menu->addMenuItem($_POST));

?>