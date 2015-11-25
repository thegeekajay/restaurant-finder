<?php
require_once '../../model/review.php';

$review = new Review();

print_r($review->deleteReview());

?>