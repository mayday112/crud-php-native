<?php

namespace app;


class App {
    private $siswa;
    private $halaman;

    public function __construct()
    {
        $this->siswa = new Siswa(); 
        $this->halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
    }

    public function run() {

        if ($this->halaman == 'tambah'){
            echo Layout::insert();
        
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = $_POST;
                $this->siswa->store($data);
            
                header('location: index.php');
            }
        } else if ($this->halaman == 'edit' && isset($_GET['id'])){
            echo Layout::edit($this->siswa->show($_GET['id']));
        
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = $_POST;
                $this->siswa->update($data['id_siswa'], $data);
            
                header('location: index.php');
            }
        } else if ($this->halaman == 'hapus' && isset($_GET['id'])){
            $id = $_GET['id'];
            $this->siswa->destroy($id);
        
            header('location: index.php');
        } else {
            echo Layout::index();
        }
        
    }
}
