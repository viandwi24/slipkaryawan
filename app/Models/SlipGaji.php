<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlipGaji extends Model
{
    protected $table = 'slip_gaji';
    protected $fillable = [
        'periode_id',
        'uid',
        'nama',
        'bagian',
        'outsourcing',
        'hari_gaji_pokok',
        'hari_diliburkan',
        'hari_borongan',
        'hari_gp7',
        'tanggal_lahir',
        'lembur_1',
        'lembur_2',
        'lembur_3',
        'sub_kerja',
        'sub_lembur',
        'total',
        'bpjs'
    ];

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
