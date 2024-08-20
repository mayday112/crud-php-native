<x-layout>
    <x-slot:title>Siswa</x-slot:title>

    <div class="container" style="margin-top: 80px">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                DATA SISWA
              </div>
              <div class="card-body">
                <a href="{{ route('student.create') }}" class="btn btn-md btn-success float-end my-3" style="margin-bottom: 10px">TAMBAH DATA</a>
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

                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>

      <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                  url: '{{ route("student.index") }}',
                },
                columns : [
                    {data : 'id', name : 'id'},
                    {data : 'nisn', name : 'nisn'},
                    {data : 'nama_lengkap', name : 'nama_lengkap'},
                    {data : 'alamat', name : 'alamat'},
                    {data : 'action', name : 'action', orderable: false, searchable: false,},
                ],
            });
        } );
  </script>

</x-layout>
