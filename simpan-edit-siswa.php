<?php

include('koneksi.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //get data dari form
    $id_siwsa = $_POST['id_siswa'];
    $nisn         = $_POST['nisn'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat       = $_POST['alamat'];

    //query insert data ke dalam database
    $query = "UPDATE siswa SET nisn = '{$nisn}', nama_lengkap = '{$nama_lengkap}', alamat = '{$alamat}' WHERE id_siswa= {$id_siwsa}";

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