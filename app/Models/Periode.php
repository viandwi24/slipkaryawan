<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    protected $fillable = ['mulai', 'selesai'];
    protected $casts = [
        'mulai' => 'date',
        'selesai' => 'date'
    ];
}
