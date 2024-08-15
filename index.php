<?php
require('header.php');
?>

<div class="container" style="margin-top: 80px">
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
                <tbody>
                  <?php 
                  
                      require('Siswa.php');
                      $no = 1;
                      $siswa =  new Siswa();
                      $data =  $siswa->all();

                      foreach($data as $row){
                  ?>

                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['nisn'] ?></td>
                      <td><?php echo $row['nama_lengkap'] ?></td>
                      <td><?php echo $row['alamat'] ?></td>
                      <td class="text-center">
                        <a href="edit-siswa.php?id=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="hapus-siswa.php?id=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                      </td>
                  </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
</script>
<?php
require('footer.php');
?>