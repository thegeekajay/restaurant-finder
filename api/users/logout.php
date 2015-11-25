<?php
require_once '../model/session.php';

$session = new Session();
$session->destroy();

header( 'Location: ../index.php' ) ;
