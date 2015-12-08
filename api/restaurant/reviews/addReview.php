<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/review.php');

$review = new Review();

print_r($review->addReview($_POST));

?>