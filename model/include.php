<?php

require_once($_SERVER['DOCUMENT_ROOT']."/database/connection.php");
require_once 'validator.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/database/orm.php';
require_once 'session.php';

// foreach (scandir(dirname(__FILE__)) as $filename) {
//     $path = $filename;
//     if (is_file($path) && $path!="include.php") {
//         require_once "$path";
//     }
// }


?>