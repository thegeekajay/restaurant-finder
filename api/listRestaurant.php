<?php
require_once '../model/restaurant.php';

$restatuant = new Restaurant();
print_r($restaurant->listRestaurant());

?>