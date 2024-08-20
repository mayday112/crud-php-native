<?php

require_once('koneksi.php');

$id = $_GET['id'];
$query = "UPDATE siswa SET is_delete = true WHERE id_siswa={$id}";

mysqli_query($conn, $query);

header('location: index.php');