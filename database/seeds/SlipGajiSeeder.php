<?php

use App\Models\SlipGaji;
use Illuminate\Database\Seeder;

class SlipGajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SlipGaji::create([
            'nama' => 'tes',
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
