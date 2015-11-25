<?php
require_once 'menu.php';

$menu = new Menu();

print_r($menu->deleteMenuItem($column,$value));

?>