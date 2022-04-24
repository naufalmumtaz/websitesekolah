<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('admin/assets/img/favicon.png')}}">
  <title>
    {{ config('app.name', 'Laravel') }} by Mumtaz Dev
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
        <div class="page-header align-items-start min-vh-100" style="background-image: url('https://www.toptal.com/designers/subtlepatterns/uploads/vintage-wallpaper.png');">
          <span class="mask bg-gradient-dark opacity-6"></span>
          <div class="container my-auto">
            <div class="row">
              <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                      <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login</h4>
                    </div>
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
                    <form role="form" class="text-start" method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" autocomplete="email" autofocus>
                      </div>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required autocomplete="current-password">
                      </div>
                      <div class="form-check form-switch d-flex align-items-center mb-3">
                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Login</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <footer class="footer position-absolute bottom-2 py-2 w-100">
            <div class="container">
              <div class="row align-items-center justify-content-lg-between">
                <div class="col-12 col-md-6 my-auto">
                  <div class="copyright text-center text-sm text-white text-lg-start">
                    © <script>
                      document.write(new Date().getFullYear())
                    </script>,
                    made with <i class="fa fa-heart" aria-hidden="true"></i> by
                    <a href="#" class="font-weight-bold text-white" target="_blank">Mumtaz Dev</a>
                    for a <span class="font-weight-bold">{{ config('app.name', 'Laravel') }}</span>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                      <a href="#" class="nav-link text-white" target="_blank">Tentang</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link text-white" target="_blank">Blog</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
        </div>
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

