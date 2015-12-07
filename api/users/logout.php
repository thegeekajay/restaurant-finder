<?php
require_once($_SERVER['DOCUMENT_ROOT']."/model/session.php");

$session = new Session();
$session->destroy();

header( 'Location: ../../index.php' ) ;
