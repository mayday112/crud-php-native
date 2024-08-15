<?php


require('Siswa.php');

class Komponen {

    public static function header() {
        return  '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Halaman Utama</title>
                        <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
                        <script src="bootstrap-5.3.3-dist/js/jquery-3.7.1.min.js"></script>
                    </head>
                    <body>';
    }

    public static function footer(){
        return '    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
                </body>
                </html>';
    }

    public static function tableSiswa(){
        $index = '<div class="container" style="margin-top: 80px">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header">
                              DATA SISWA
                            </div>
                            <div class="card-body">
                              <a href="tambah-siswa.php" class="btn btn-md btn-success float-end my-3" style="margin-bottom: 10px">TAMBAH DATA</a>
                              <table class="table table-bordered" id="myTable">
                                <thead>
                                  <tr>
                                    <th scope="col">NO.</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">NAMA LENGKAP</th>
                                    <th scope="col">ALAMAT</th>
                                    <th scope="col">AKSI</th>
                                  </tr>
                                </thead>
                                <tbody>';

        $no = 1;
        $siswa =  new Siswa();
        $data =  $siswa->all();

        foreach($data as $row){
        $index = $index.'    <tr>
                <td>' . $no++ . '</td>
                <td>' .  $row['nisn']  . '</td>
                <td>' .  $row['nama_lengkap'] . '</td>
                <td>' .  $row['alamat']  . '</td>
                <td class="text-center">
                  <a href="edit-siswa.php?id= '.   $row['id_siswa'] . '" class="btn btn-sm btn-primary">EDIT</a>
                  <a href="hapus-siswa.php?id= ' .   $row['id_siswa'] . '" class="btn btn-sm btn-danger">HAPUS</a>
                </td>
            </tr> ' ;
        } 

        $index = $index . '                </tbody>
                                      </table>
                                    </div>
                                  </div>
                              </div>
                            </div>

                            <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
                            <script>
                              $(document).ready( function () {
                                  $(\'#myTable\').DataTable();
                              } );
                        </script>' ;
        return $index;
    }

    public static function tambahForm(){
        return '    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH SISWA
            </div>
            <div class="card-body">
              <form action="" method="POST">
                
                <div class="form-group mt-2">
                  <label>NISN</label>
                  <input type="text" name="nisn" placeholder="Masukkan NISN Siswa" class="form-control mt-1">
                </div>

                <div class="form-group mt-2">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" placeholder="Masukkan Nama Siswa" class="form-control mt-2">
                </div>

                <div class="form-group mt-2">
                  <label class="mb-2">Alamat</label>
                  <textarea class="form-control" name="alamat"  placeholder="Masukkan Alamat Siswa" rows="4"></textarea>
                </div>
                
                <div class="float-end mt-3">
                    <a href="index.php" class="btn btn-primary">Kembali</a>
                    <button type="reset" class="btn btn-warning">RESET</button>
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>';
    }

    public static function editForm($siswa) {
        return '<div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH SISWA
            </div>
            <div class="card-body">
              <form action="" method="POST">
                
                <input type="hidden" name="id_siswa" value=" ' . $siswa['id_siswa'] . '">
                <div class="form-group mt-2">
                  <label>NISN</label>
                  <input type="text" name="nisn" placeholder="Masukkan NISN Siswa" class="form-control mt-1" value=" ' . $siswa['nisn'] . ' ">
                </div>

                <div class="form-group mt-2">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" placeholder="Masukkan Nama Siswa" class="form-control mt-2" value=" ' . $siswa['nama_lengkap'] . ' ">
                </div>

                <div class="form-group mt-2">
                  <label class="mb-2">Alamat</label>
                  <textarea class="form-control" name="alamat"  placeholder="Masukkan Alamat Siswa" rows="4"> ' .  $siswa['alamat'] . ' </textarea>
                </div>
                
                <div class="float-end mt-3">
                    <a href="index.php" class="btn btn-primary">Kembali</a>
                    <button type="reset" class="btn btn-warning">RESET</button>
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>';
    }

}