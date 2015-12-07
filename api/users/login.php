<?php

require_once($_SERVER['DOCUMENT_ROOT']."/model/user.php");

$user = new User();
print_r($user->login($_POST));

?>


