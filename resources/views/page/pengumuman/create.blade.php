@extends('layout.master')

@section('judul')
    Tambah Pengumuman
@endsection

@section('content')
<div class="row mt-5">
  <div class="row">
    <div class="row min-vh-40 mb-4">
      <div class="col-12">
        <div class="card h-100">
          <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
                    Tolong ikuti petunjuk kesalahan : 
                    <span class="alert-text">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              @endif
            <form action="/pengumuman" method="post">
                @csrf
                <div class="input-group input-group-static my-3">
                    <label for="judul" class="ms-0">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" autocomplete="off">
                </div>
                <div class="input-group input-group-static my-3">
                    <label for="isi" class="ms-0">Isi</label>
                    <textarea class="form-control" name="isi" rows="3" style="resize:none" autocomplete="off" id="isi"></textarea>
                </div>
                <button class="btn bg-gradient-success text-capitalize">Tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

