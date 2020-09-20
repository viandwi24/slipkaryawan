<?php

use App\Models\Periode;
use App\Models\SlipGaji;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;

class SlipGajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periode::create([
            'mulai' => (new Carbon('2020-04-24')),
            'selesai' => (new Carbon('2020-05-23')),
        ]);
        SlipGaji::create([
            'periode_id' => 1,
            'uid' => Uuid::generate()->string,
            'nama' => 'tes',
            'tanggal_lahir' => (new Carbon('24-04-2002')),
            'bagian' => 'awe',
            'outsourcing' => 'ewa',
            'hari_gaji_pokok' => 1,
            'hari_diliburkan' => 2,
            'hari_borongan' => 3,
            'hari_gp7' => 4,
            'lembur_1' => 1,
            'lembur_2' => 2,
            'lembur_3' => 3,
            'sub_kerja' => 1000,
            'sub_lembur' => 2000,
            'bpjs' => 3000,
            'total' => 6000
        ]);
    }
}
