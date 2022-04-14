@extends('layout.master')

@section('judul')
    Tambah Kelas
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
            <form action="/kelas" method="post">
                @csrf
                <div class="input-group input-group-static my-3">
                    <label for="kelas" class="ms-0">Kelas</label>
                    <input type="text" class="form-control" name="kelas" id="kelas" autocomplete="off">
                </div>
                <button class="btn bg-gradient-success text-capitalize">Tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

