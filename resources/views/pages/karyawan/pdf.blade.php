<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slip Karyawan</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <style type="text/css">
        body { background: white; }
        table:not(.normal) {
            border-collapse: collapse !important;
            page-break-before: always !important;
            page-break-inside: avoid !important;
        }
        table.no-border * { border: none; }
        table tr td,
        table tr th, table thead * {
            font-size: 9pt!important;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div class="content">
        @php $i = 0; @endphp
        @foreach ($slipgaji as $item)
            @php $i++; @endphp
            <div class="text-center">
                <h6 class="mb-4">SLIP GAJI KARYAWAN {{ strtoupper($item->outsourcing) }}</h6>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Uid</th>
                    <td class="text-right" width="5%">:</td>
                    <td>{{ $item->uid }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td class="text-right" width="5%">:</td>
                    <td>{{ $item->nama }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td class="text-right" width="5%">:</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th>Bagian</th>
                    <td class="text-right" width="5%">:</td>
                    <td>{{ $item->bagian }}</td>
                </tr>
                <tr>
                    <th>Outsourcing</th>
                    <td class="text-right" width="5%">:</td>
                    <td>{{ $item->outsourcing }}</td>
                </tr>
            </table>

            <table class="table table-bordered mt-2 mb-0">
                <tr>
                    <th colspan="3" class="center">
                        {{ $item->periode->mulai->format('d/m/Y') }} - {{ $item->periode->selesai->format('d/m/Y') }}
                    </th>
                </tr>
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

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pendapatan</th>
                        <th>Nominal</th>
                    </tr>
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

            <table class="mt-2 table no-border">
                <tr>
                    <td class="text-center">{{ $item->created_at->format('d-m-Y h:m') }}</td>
                    <td class="70%"></td>
                    <td>
                        <div class="text-center">
                            TTD
                            <div class="height: 250px;">&nbsp;</div>
                            BAGIAN KEUANGAN
                        </div>
                    </td>
                </tr>
            </table>

            @if ($i != count($slipgaji))
                <div class="page-break"></div>
            @endif
        @endforeach
    </div>
</body>
</html>