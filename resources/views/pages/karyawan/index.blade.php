<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME', 'Laravel') }} Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
    .bg-image {
        background-repeat:no-repeat;
        background-position: center center;
        background: url({{ asset('assets/bg.jpeg') }});
    }
    .bg-overlay {
        width: 100vw;
        height: 100vh;
        display: block;
        background: rgba(0, 0, 0, .5);
        position: fixed;
        z-index: 10;
    }
    .login-box {
        z-index: 11;
    }
    .login-logo a {
        color: white;
        font-weight: bold;
    }
    </style>
</head>
<body class="hold-transition login-page bg-image">
    <div class="bg-overlay"></div>
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>{{ env('APP_NAME', 'Laravel') }}</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Tulis UUID dan Tanggal Lahir (thn-bln-hari) Untuk Melihat Data Slip Gaji.</p>
        
                <form method="POST" action="{{ route('karyawan.home') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="uuid" value="{{ old('uuid') }}" name="uuid" class="form-control @error('username') is-invalid @enderror" placeholder="UUID">
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" type="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir... Ex : 2002-04-24">
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-calendar-alt"></span>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Lihat</button>
                </form>
            </div>
            <div class="card-footer text-center">&copy; 2020 {{ env('APP_NAME', 'Laravel') }}</div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>$.widget.bridge('uibutton', $.ui.button)</script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    @stack('js-lib')
    @stack('js')
    @include('components.admin-javascript')
</body>
</html>