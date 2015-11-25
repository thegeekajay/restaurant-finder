<?php

require_once "../model/restaurant.php";

$restaurant = new Restaurant();
print_r($restaurant->createRestaurant($_POST));

?>
