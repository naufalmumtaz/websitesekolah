@extends('layout.master')

@section('judul')
    Tambah Siswa
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
            <form action="/siswa" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group input-group-static my-3">
                    <label for="nis" class="ms-0">NIS</label>
                    <input type="number" class="form-control" name="nis" id="nis" autocomplete="off" value="{{old('nis')}}" >
                </div>
                <div class="input-group input-group-static my-3">
                    <label for="nisn" class="ms-0">NISN</label>
                    <input type="number" class="form-control" name="nisn" id="nisn" autocomplete="off" value="{{old('nisn')}}" >
                </div>
                <div class="input-group input-group-static my-3">
                    <label for="nama" class="ms-0">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" value="{{old('nama')}}" >
                </div>
                <div class="input-group input-group-static my-3">
                    <label for="alamat" class="ms-0">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" style="resize:none" autocomplete="off" id="alamat">{{old('alamat')}}</textarea>
                </div>
                <div class="input-group input-group-static my-3">
                  <label for="kelas_id" class="ms-0">Kelas</label>
                  <select class="form-control" name="kelas_id" id="kelas_id">
                    <option value="">---Pilih Kelas---</option>
                    @foreach ($kelas as $item)
                      <option value="{{$item->id}}">{{$item->kelas}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group input-group-static my-3">
                    <label for="gambar" class="ms-0">Gambar</label>
                    <input type="file" name="gambar" id="gambar">
                </div>
                <button class="btn bg-gradient-success text-capitalize">Tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

