<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\SlipGaji;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.karyawan.index');
    }

    public function post(Request $request)
    {
        $request->validate([
            'uuid' => 'required|uuid',
            'tanggal_lahir' => 'required|date_format:Y-m-d'
        ]);

        // check db
        $slipgaji = SlipGaji::where('uuid', $request->uuid)
            ->where('tanggal_lahir', $request->tanggal_lahir)
            ->first();
        
        if (!$slipgaji) return back()->withInput()->withErrors(['credentials' => 'Data tidak ditemukan.']);

        return view('pages.karyawan.slipgaji', compact('slipgaji'));
        
        // return $slipgaji;
        // return $request->all();
    }
}
