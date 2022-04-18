@extends('layout.master')

@section('judul')
    Detail Pengumuman
@endsection

@section('content')
<div class="row mt-5">
    <div class="row">
      <div class="col-12">
      <div class="card">
          <div class="card-body px-0 pb-2">
              <div class="table-responsive p-3">
                  <table id="example" class="table table-striped table-hover" style="width:100%">
                      <thead>
                          <tr>
                              <th>Judul</th>
                              <th>Isi</th>
                              <th>Tanggal Dibuat</th>
                              <th>Tindakan</th>
                          </tr>
                      </thead>
                      <tbody>                     
                        <tr>
                            <td class="text-wrap">{{$pengumuman->judul}}</td>
                            <td class="text-wrap">{{$pengumuman->isi}}</td>
                            <td>{{$pengumuman->created_at}}</td>
                            <td><a href="/" class="btn bg-gradient-info text-capitalize">Kembali</a></td>
                        </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      </div>
    </div>
@endsection