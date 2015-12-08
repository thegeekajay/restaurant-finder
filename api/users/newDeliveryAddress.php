<?php

require_once($_SERVER['DOCUMENT_ROOT']."/model/delivery_address.php");

$address = new deliveryAddress();
print_r($address->newAddress($_POST));

?>


