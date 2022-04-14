<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('admin/assets/img/favicon.png')}}">
  <title>
    {{ config('app.name', 'Laravel') }} by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{asset('admin/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('admin/assets/css/material-dashboard.css?v=3.0.2')}}" rel="stylesheet" />
</head>
<body>
    <main class="main-content  mt-0">
        <section>
        <div class="page-header min-vh-100">
            <div class="container">
            <div class="row">
                <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('{{asset('admin/assets/img/illustrations/illustration-signup.jpg')}}'); background-size: cover;">
                </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                <div class="card card-plain">
                    <div class="card-header">
                    <h4 class="font-weight-bolder">Register Siswa Baru</h4>
                    <p class="mb-0">Masukkan email dan password untuk register siswa baru</p>
                    </div>
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

                    <form role="form" action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" required
                        </div>
                        <div class="input-group input-group-outline mb-3">
                          <label class="form-label" for="email">Email</label>
                          <input type="email" class="form-control" name="email" id="email" required autocomplete="email">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                          <label class="form-label" for="password">Password</label>
                          <input type="password" class="form-control" name="password" id="password" required autocomplete="new-password">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                          <label class="form-label" for="password-confirm">Konfirmasi Password</label>
                          <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required autocomplete="new-password">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="level">Level</label>
                        <input type="text" class="form-control" name="level" id="level" required autocomplete="level">
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Register</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </main>
    <script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  @stack('script')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('admin/assets/js/material-dashboard.min.js?v=3.0.2')}}"></script>
</body>
</html>
