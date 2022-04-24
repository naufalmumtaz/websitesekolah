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
    Daftar Tugas
@endsection

@section('content')
<div class="row mt-5">
    <div class="row">
      <div class="col-12">
      <div class="card">
          <div class="card-body px-0 pb-2">
              <div class="table-responsive p-3">
                    @if (auth()->user()->level=="admin")
                        <a href="/tugas/create" class="btn bg-gradient-success text-capitalize mb-4"><span class="material-icons">note_add</span> Tambah Tugas</a>
                    @endif
                  <table id="example" class="table table-striped table-hover" style="width:100%">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Judul</th>
                              <th>File</th>
                              <th>Status</th>
                              <th>Tanggal Dibuat</th>
                              <th>Tindakan</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse ($tugas as $key=>$value)                            
                              <tr>
                                  <td>{{$key + 1}}</td>
                                  <td>{{$value->judul}}</td>
                                  <td><a href="{{asset('files/' . $value->file_tugas)}}" target="_blank" rel="noopener noreferrer" class="text-decoration-none">{{$value->file_tugas}}</a></td>
                                  <td><span class="badge {{($value->status == 1) ? 'bg-gradient-secondary' : 'bg-gradient-success'}}">{{($value->status == 1) ? 'Belum' : 'Selesai'}}</span></td>
                                  <td>{{$value->created_at}}</td>
                                  <td>
                                      <form action="/tugas/{{$value->id}}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <a href="/tugas/{{$value->id}}/upload_tugas" class="btn bg-gradient-warning text-capitalize"><span class="material-icons text-white">file_upload</span></a>
                                          <a href="/tugas/{{$value->id}}/edit" class="btn bg-gradient-info text-capitalize"><span class="material-icons text-white">edit</span></a>
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

