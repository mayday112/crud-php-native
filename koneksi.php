<?php


class Koneksi {

    public static function connection(){
       try {
           // buat koneksi dengan database
           $conn = new PDO('mysql:host=localhost;dbname=crud_php_native;', 'crud-php-native', 'cNe4Sia]ov645fVG');
           // set error mode
           $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
           return $conn;
       }catch (PDOException $e) {
           // tampilkan pesan kesalahan jika koneksi gagal
           print "Koneksi atau query bermasalah : " . $e->getMessage() . "<br/>";
           die();
       }
    }

}
