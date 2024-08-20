<?php

include('koneksi.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //get data dari form
    $nisn         = $_POST['nisn'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat       = $_POST['alamat'];

    //query insert data ke dalam database
    $query = "INSERT INTO siswa (nisn, nama_lengkap, alamat) VALUES ('$nisn', '$nama_lengkap', '$alamat')";

    //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
    if($conn->query($query)) {

        //redirect ke halaman index.php 
        header("location: index.php");

    } else {

        //pesan error gagal insert data
        echo "Data Gagal Disimpan!";

    }
}


?>