<?php

require('Koneksi.php');

class Siswa {


    public function all() {
        $sql = Koneksi::connection()->prepare("SELECT * FROM siswa WHERE is_delete = false");
        $sql->execute();
        $hasil = $sql->fetchAll();

        return $hasil;
    }

    public function show ($id) {
        $sql = Koneksi::connection()->prepare("SELECT * FROM siswa WHERE is_delete = false AND id_siswa = ?");
        $sql->execute([$id]);

        return $sql->fetch();
    }

    public function store($data){
        $sql = Koneksi::connection()->prepare("INSERT INTO siswa (nisn, nama_lengkap, alamat) VALUES (?,?,?)");
        $sql->execute([$data['nisn'], $data['nama_lengkap'], $data['alamat']]);

    }

    public function update($id, $data){
        $sql = Koneksi::connection()->prepare("UPDATE siswa SET nisn = ?, nama_lengkap = ?, alamat = ? WHERE id_siswa= ?");
        $sql->execute([$data['nisn'], $data['nama_lengkap'], $data['alamat'], $id]);
        $sql->execute();
        
    }

    public function destroy( $id){
        $sql = Koneksi::connection()->prepare("UPDATE siswa SET is_delete = true WHERE id_siswa= ?");
        $sql->execute([$id]);

    }

}