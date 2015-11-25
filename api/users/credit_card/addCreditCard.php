<?php
require_once '../database/creditCard.php';

$creditcard = new creditCard();

print_r($creditcard->addCreditCard());
?>