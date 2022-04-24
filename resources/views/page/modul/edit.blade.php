@extends('layout.master')

@section('judul')
    Edit Modul
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
            <form action="/modul/{{$modul->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group input-group-static my-3">
                  <label for="judul" class="ms-0">Judul</label>
                  <input type="text" class="form-control" name="judul" id="judul" autocomplete="off" value="{{$modul->judul}}" >
                </div>
                <div class="input-group input-group-static my-3">
                    <label for="nama_guru" class="ms-0">Nama Guru</label>
                    <input type="text" class="form-control" name="nama_guru" id="nama_guru" autocomplete="off" value="{{$modul->nama_guru}}">
                </div>
                <div class="input-group input-group-static my-3">
                  <label for="gambar" class="ms-0">Gambar</label>
                  <input type="file" name="gambar" id="gambar">
                </div>
                <button class="btn bg-gradient-info text-capitalize">Edit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

