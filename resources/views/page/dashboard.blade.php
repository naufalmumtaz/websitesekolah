@extends('layout.master')

@section('judul')
    Dashboard
@endsection

@section('content')
  @if (auth()->user()->level=="user")
    <div class="row mt-5">
        <div class="col-xl-6 col-sm-6 mb-xl-0">
          <div class="card h-100">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h5 class="text-white text-capitalize ps-3"><i class="material-icons opacity-10">notifications</i> Notifications</h5>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Pengumuman</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>15/4/2022</td>
                    <td><a href="#">PENGUMUMAN AKADEMIK - TA...</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">group</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Jumlah Guru</p>
                <h4 class="mb-0">3,462</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><a href="#" class="text-success text-sm font-weight-bolder">Detail Guru</a></p>
            </div>
          </div>
        </div>
      </div>
  @endif
  @if (auth()->user()->level=="admin")
    <div class="row mt-5">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">emoji_people</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Jumlah Siswa</p>
                <h4 class="mb-0">{{$siswa}}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><a href="/siswa" class="text-info text-sm font-weight-bolder">Detail Siswa</a></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">group</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Jumlah Guru</p>
                <h4 class="mb-0">3,462</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><a href="#" class="text-success text-sm font-weight-bolder">Detail Guru</a></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">people</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Jumlah Pegawai</p>
                <h4 class="mb-0">5,000</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><a href="#" class="text-dark text-sm font-weight-bolder">Detail Pegawai</a></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">note</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Jumlah Modul</p>
                <h4 class="mb-0">500</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><a href="#" class="text-warning text-sm font-weight-bolder">Detail Modul</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="row min-vh-40 mt-4 mb-4">
          <div class="col-12">
            <div class="card h-100">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h5 class="text-white text-capitalize ps-3"><i class="material-icons opacity-10">notifications</i> Notifications</h5>
                </div>
              </div>
              <div class="card-body">
                <ul class="list-group">
                  <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                    <div class="avatar me-3">
                      <img src="{{asset('admin/assets/img/marie.jpg')}}" alt="kal" class="border-radius-lg shadow">
                    </div>
                    <div class="d-flex align-items-start flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Sophie B.</h6>
                      <p class="mb-0 text-xs">Hi! I need more information..</p>
                    </div>
                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                  </li>
                  <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                    <div class="avatar me-3">
                      <img src="{{asset('admin/assets/img/marie.jpg')}}" alt="kal" class="border-radius-lg shadow">
                    </div>
                    <div class="d-flex align-items-start flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Anne Marie</h6>
                      <p class="mb-0 text-xs">Awesome work, can you..</p>
                    </div>
                    <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
  @endif
@endsection

