<?php
require_once '../database/restaurant.php';

$restatuant = new Restaurant();
print_r($restaurant->deleteRestaurant());

?>