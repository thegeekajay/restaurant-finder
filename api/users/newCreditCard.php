<?php

require_once($_SERVER['DOCUMENT_ROOT']."/model/credit_card.php");

$credit_card = new creditCard();
print_r($credit_card->newCard($_POST));

?>


