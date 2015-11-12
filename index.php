<?php

require_once 'user.php';

$user = new User();
$user->login($_POST);