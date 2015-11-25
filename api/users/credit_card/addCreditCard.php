<?php
require_once '.../../model/creditCard.php';

$creditcard = new creditCard();

print_r($creditcard->addCreditCard());
?>