<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Bagian</th>
            <th>Outsourcing</th>
            <th>Hari Gaji Pokok</th>
            <th>Hari Diliburkan</th>
            <th>Hari Borongan</th>
            <th>Hari Gp7</th>
            <th>Lembur 1</th>
            <th>Lembur 2</th>
            <th>Lembur 3</th>
            <th>Sub Kerja</th>
            <th>Sub Lembur</th>
            <th>Bpjs</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    @php $i = 0; @endphp
    @foreach($slipgajis as $item)
        @php $i++; @endphp
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->bagian }}</td>
            <td>{{ $item->outsourcing }}</td>
            <td>{{ $item->hari_gaji_pokok }}</td>
            <td>{{ $item->hari_diliburkan }}</td>
            <td>{{ $item->hari_borongan }}</td>
            <td>{{ $item->hari_gp7 }}</td>
            <td>{{ $item->lembur_1 }}</td>
            <td>{{ $item->lembur_2 }}</td>
            <td>{{ $item->lembur_3 }}</td>
            <td>{{ $item->sub_kerja }}</td>
            <td>{{ $item->sub_lembur }}</td>
            <td>{{ $item->bpjs }}</td>
            <td>{{ $item->total }}</td>
        </tr>
    @endforeach
    </tbody>
</table>