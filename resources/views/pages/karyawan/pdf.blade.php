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
        <table class="table table-bordered">
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


        @php $i = 0; @endphp
        @foreach ($slipgaji as $item)
            @php $i++; @endphp
            <table class="table table-bordered mt-2 mb-0">
                <tr>
                    <th colspan="3" class="center">
                        {{ $i }}.) Periode [{{ $item->periode->mulai->format('d/m/Y') }} - {{ $item->periode->selesai->format('d/m/Y') }}]
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
            @if ($i != count($slipgaji))
                <div class="page-break"></div>
            @endif
        @endforeach
    </div>
</body>
</html>