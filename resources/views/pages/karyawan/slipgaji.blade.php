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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-sm-12">
                <div class="card mt-4">
                    <div class="card-header">
                        Informasi Karyawan
                        <span class="float-right">
                            <form action="{{ route('karyawan.pdf') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="uid" value="{{ $slipgaji[0]->uid }}">
                                <button class="btn btn-sm btn-primary">Print Pdf</button>
                            </form>
                        </span>
                    </div>
                    <div class="card-body login-card-body">
                        <table>
                            <tr>
                                <th>Uid</th>
                                <td class="text-right" width="5%">:</td>
                                <td>{{ $slipgaji[0]->uid }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td class="text-right" width="5%">:</td>
                                <td>{{ $slipgaji[0]->nama }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td class="text-right" width="5%">:</td>
                                <td>{{ $slipgaji[0]->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Bagian</th>
                                <td class="text-right" width="5%">:</td>
                                <td>{{ $slipgaji[0]->bagian }}</td>
                            </tr>
                            <tr>
                                <th>Outsourcing</th>
                                <td class="text-right" width="5%">:</td>
                                <td>{{ $slipgaji[0]->outsourcing }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                @php $i = 0; @endphp
                @foreach ($slipgaji as $item)
                    @php $i++; @endphp
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $item->id }}" aria-expanded="true" aria-controls="collapse{{ $item->id }}">
                                        {{ $i }}.) Periode [{{ $item->periode->mulai->format('d/m/Y') }} - {{ $item->periode->selesai->format('d/m/Y') }}]
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse{{ $item->id }}" class="collapse" aria-labelledby="heading{{ $item->id }}" data-parent="#accordion">
                                <div class="card-body">
                                    <table class="table table-bordered mt-2">
                                        <tr>
                                            <th width="25%">Hari Kerja</th>
                                            <td class="text-right" width="5%">:</td>
                                            <td>{{ $item->hari_gaji_pokok }}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Hari Diliburkan</th>
                                            <td class="text-right" width="5%">:</td>
                                            <td>{{ $item->hari_diliburkan }}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Hari Borongan</th>
                                            <td class="text-right" width="5%">:</td>
                                            <td>{{ $item->hari_borongan }}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">GP7</th>
                                            <td class="text-right" width="5%">:</td>
                                            <td>{{ $item->hari_gp7 }}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Lembur 1</th>
                                            <td class="text-right" width="5%">:</td>
                                            <td>{{ $item->lembur_1 }}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Lembur 2</th>
                                            <td class="text-right" width="5%">:</td>
                                            <td>{{ $item->lembur_2 }}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Lembur 3</th>
                                            <td class="text-right" width="5%">:</td>
                                            <td>{{ $item->lembur_3 }}</td>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered mt-2">
                                        <thead>
                                            <th>#</th>
                                            <th>Pendapatan</th>
                                            <th>Nominal</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Hari Kerja</td>
                                                <td>@rupiah($item->sub_kerja)</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Lembur</td>
                                                <td>@rupiah($item->sub_lembur)</td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-right">Bpjs :</th>
                                                <td>@rupiah($item->bpjs)</td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-right">Total :</th>
                                                <td>@rupiah($item->total)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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