<?php

namespace App\Imports;

use App\Models\SlipGaji;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Webpatser\Uuid\Uuid;

class SlipGajiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $result = [
            'nama' => $row['nama'],
            // 'uuid' => Uuid::generate()->string,
            'tanggal_lahir' => (new CarbonCarbon($row['tanggal_lahir'])),
            'bagian' => $row['bagian'],
            'outsourcing' => $row['outsourcing'],
            'hari_gaji_pokok' => $row['gaji_pokok'],
            'hari_diliburkan' => $row['diliburkan'],
            'hari_borongan' => $row['borongan'],
            'hari_gp7' => $row['gp7'],
            'lembur_1' => $row['lembur_1'],
            'lembur_2' => $row['lembur_2'],
            'lembur_3' => $row['lembur_3'],
            'sub_kerja' => $row['sub_kerja'],
            'sub_lembur' => $row['sub_lembur'],
            'total' => $row['total'],
            'bpjs' => $row['bpjs']
        ];    
        return new SlipGaji($result);
    }
    
    public function headingRow(): int
    {
        return 1;
    }
}
