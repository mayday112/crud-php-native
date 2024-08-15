<?php
require('header.php');

include('Layout.php');

echo Layout::insert();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = $_POST;
    $sql = new Siswa();
    $sql->store($data);

    header('location: index.php');
}


?>


