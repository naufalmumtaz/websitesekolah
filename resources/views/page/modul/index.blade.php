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
    Daftar Modul
@endsection

@section('content')
<div class="row mt-5">
  <div class="row">
    @if (auth()->user()->level=="admin")
      <div>
          <a href="/modul/create" class="btn bg-gradient-success text-capitalize mb-4"><span class="material-icons">bookmark_add</span> Tambah Modul</a>
      </div>
      @endif
      @forelse ($modul as $key=>$value)
        <div class="col-sm-6 col-lg-12 mb-4">
            <div class="card p-2" style="word-break: break-all;">
                <a href="/modul/materi/{{$value->id}}" class="text-decoration-none text-dark d-flex align-items-center">
                    <img src="{{ $value->gambar ?  asset('files/' . $value->gambar) : 'https://dummyimage.com/100x100/424242/fff' }}" class="w-20" alt="img">
                    <div class="card-body">
                        <h4 class="font-weight-normal">{{$value->judul}}</h4>
                        <p class="card-text"><span class="material-icons text-success">person</span> {{$value->nama_guru}}</p>
                        <p class="card-text"><span class="material-icons text-success">calendar_month</span> {{$value->created_at}}</p>
                    </div>
                    @if (auth()->user()->level=="admin")
                        <div class="card-footer p-0">
                            <form action="/modul/{{$value->id}}" method="POST" class="pt-2">
                                @csrf
                                @method('DELETE')
                                <a href="/modul/{{$value->id}}/edit" class="btn bg-gradient-info text-capitalize"><span class="material-icons text-white">edit</span></a>
                                <button type="submit" class="btn bg-gradient-danger text-capitalize ms-2"><span class="material-icons text-white">delete</span></button>
                            </form>
                        </div>
                    @endif
                </a>
            </div>
        </div>
    </div>
    @empty
        <h4 class="text-center">Modul tidak ada!</h4>
    @endforelse
</div>
@endsection

