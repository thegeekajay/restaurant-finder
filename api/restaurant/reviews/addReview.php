<?php
require_once '../database/review.php';

$review = new Review();

print_r($review->addReview());

?>