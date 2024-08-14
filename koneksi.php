<?php

$HOST = 'localhost';
$DB = 'crud_php_native';
$USER = 'crud-php-native';
$PASS = 'cNe4Sia]ov645fVG';
$conn = mysqli_connect($HOST, $USER, $PASS, $DB);

if($conn){
    echo("Berhasil tersambung ke database");
} else {
    
    die();
}