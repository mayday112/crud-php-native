<?php

require_once('Siswa.php');

$id = $_GET['id'];
$data = new Siswa();
$data->destroy($id);

header('location: index.php');