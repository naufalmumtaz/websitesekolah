@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endpush

@push('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "scrollX": true,
                "language": {
                    "lengthMenu": "Menampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _MAX_ data",
                    "infoEmpty": "Data pencarian tidak ditemukan",
                    "infoFiltered": "(pencarian dari _MAX_ data)"
                }
            } );
        } );
    </script>
@endpush

@section('judul')
    Daftar Siswa
@endsection

@section('content')
<div class="row mt-5">
  <div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-3">
                <a href="/siswa/create" class="btn bg-gradient-success text-capitalize mb-4"><span class="material-icons">person_add</span> Tambah Siswa</a>
                <table id="example" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>kelas</th>
                            <th>Tanggal Dibuat</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $key=>$value)                            
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td><img src="{{ $value->gambar ?  asset('images/' . $value->gambar) : 'https://dummyimage.com/100x100/424242/fff' }}" alt="img" width="100"></td>
                                <td>{{$value->nis}}</td>
                                <td>{{$value->nisn}}</td>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->alamat}}</td>
                                <td>{{$value->kelas->kelas}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>
                                    <form action="/siswa/{{$value->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="/siswa/{{$value->id}}/edit" class="btn bg-gradient-info text-capitalize"><span class="material-icons text-white">edit</span></a>
                                        <button type="submit" class="btn bg-gradient-danger text-capitalize ms-2"><span class="material-icons text-white">delete</span></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
  </div>
@endsection

