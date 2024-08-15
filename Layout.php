<?php

require('Komponen.php');

class Layout {

    public static function index() {
        return  Komponen::header(). Komponen::tableSiswa() . Komponen::footer();
    }

    public static function insert(){
        return  Komponen::header(). Komponen::tambahForm() . Komponen::footer();
    }

    public static function edit($siswa) {
        return Komponen::header(). Komponen::editForm($siswa). Komponen::footer();
    }
    
}

