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
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $student['nisn'] }}</td>
                            <td>{{ $student['nama_lengkap'] }}</td>
                            <td>{{ $student['alamat'] }}</td>
                            <td class="text-center">
                                <form action="{{ route('student.destroy', $student['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                  <a href="{{ route('student.edit', $student['id']) }}" class="btn btn-sm btn-primary">EDIT</a>
                                  <button type="submit" class="btn btn-sm btn-danger" onclick=" return confirm('Apakah anda Yakin?')">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                Data Kosong
                            </td>
                        </tr>
                    @endforelse
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

</x-layout>
