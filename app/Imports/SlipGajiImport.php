<?php

namespace App\Imports;

use App\Models\SlipGaji;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Webpatser\Uuid\Uuid;

class SlipGajiImport implements ToModel, WithHeadingRow
{
    public $periode_id;

    public function __construct($periode_id)
    {
        $this->periode_id = $periode_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $result = [
            'periode_id' => $this->periode_id,
            'uid' => $row['uid'],
            'nama' => $row['nama'],
            'tanggal_lahir' => (new Carbon(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']))),
            'bagian' => $row['bagian'],
            'outsourcing' => $row['outsourcing'],
            'hari_gaji_pokok' => $row['hari_gaji_pokok'],
            'hari_diliburkan' => $row['hari_diliburkan'],
            'hari_borongan' => $row['hari_borongan'],
            'hari_gp7' => $row['hari_gp7'],
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
