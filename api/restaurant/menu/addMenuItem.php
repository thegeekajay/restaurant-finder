<?php
require_once '../../model/menu.php';

$menu = new Menu();

print_r($menu->addMenuItem($_POST));

?>