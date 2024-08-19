<?php

namespace app;

use PDO;
use PDOException;

class Siswa {

    private $conn;

    public function __construct()
    {

        try {
            // buat koneksi dengan database
            $conn = new PDO('mysql:host=localhost;dbname=crud_php_native;', 'crud-php-native', 'cNe4Sia]ov645fVG');
            // set error mode
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $this->conn =  $conn;
        }catch (PDOException $e) {
            // tampilkan pesan kesalahan jika koneksi gagal
            print "Koneksi atau query bermasalah : " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function all() {
        $sql = $this->conn->prepare("SELECT * FROM siswa WHERE is_delete = false");
        $sql->execute();
        $hasil = $sql->fetchAll();

        return $hasil;
    }

    public function show ($id) {
        $sql = $this->conn->prepare("SELECT * FROM siswa WHERE is_delete = false AND id_siswa = ?");
        $sql->execute([$id]);

        return $sql->fetch();
    }

    public function store($data){
        $sql = $this->conn->prepare("INSERT INTO siswa (nisn, nama_lengkap, alamat) VALUES (?,?,?)");
        $sql->execute([$data['nisn'], $data['nama_lengkap'], $data['alamat']]);

    }

    public function update($id, $data){
        $sql = $this->conn->prepare("UPDATE siswa SET nisn = ?, nama_lengkap = ?, alamat = ? WHERE id_siswa= ?");
        $sql->execute([$data['nisn'], $data['nama_lengkap'], $data['alamat'], $id]);
        $sql->execute();
        
    }

    public function destroy( $id){
        $sql = $this->conn->prepare("UPDATE siswa SET is_delete = true WHERE id_siswa= ?");
        $sql->execute([$id]);

    }

}