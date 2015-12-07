<?php

require_once($_SERVER['DOCUMENT_ROOT']."/model/restaurant.php");

$restaurant = new Restaurant();
print_r($restaurant->editRestaurant($_POST));

?>
