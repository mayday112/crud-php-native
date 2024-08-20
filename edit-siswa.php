<?php
require('header.php');

$query = "SELECT * FROM siswa WHERE id_siswa ={$_GET['id']}";

$result = $conn->query($query);

$siswa = $result->fetch_assoc();

?>
    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH SISWA
            </div>
            <div class="card-body">
              <form action="simpan-edit-siswa.php" method="POST">
                
                <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa'] ?>">
                <div class="form-group mt-2">
                  <label>NISN</label>
                  <input type="text" name="nisn" placeholder="Masukkan NISN Siswa" class="form-control mt-1" value="<?= $siswa['nisn'] ?>">
                </div>

                <div class="form-group mt-2">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" placeholder="Masukkan Nama Siswa" class="form-control mt-2" value="<?= $siswa['nama_lengkap'] ?>">
                </div>

                <div class="form-group mt-2">
                  <label class="mb-2">Alamat</label>
                  <textarea class="form-control" name="alamat"  placeholder="Masukkan Alamat Siswa" rows="4"><?= $siswa['alamat'] ?></textarea>
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
    </div>

<?php
require('footer.php');
?>