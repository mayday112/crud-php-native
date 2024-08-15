<?php

require('header.php');
require('Layout.php');

$sql = new Siswa();
$siswa = $sql->show($_GET['id']);

echo Layout::edit($siswa);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = $_POST;
    $sql->update($data['id_siswa'], $data);

    header('location: index.php');
}

?>
 