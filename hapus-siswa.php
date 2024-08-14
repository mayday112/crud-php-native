<?php

require_once('koneksi.php');

$id = $_GET['id'];
$query = "DELETE FROM siswa WHERE id_siswa={$id}";

mysqli_query($conn, $query);

header('location: index.php');