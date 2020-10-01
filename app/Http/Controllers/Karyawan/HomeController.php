<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\SlipGaji;
use Barryvdh\DomPDF\Facade as PDF;
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
            'uid' => 'required',
            'tanggal_lahir' => 'required|date_format:Y-m-d'
        ]);

        // check db
        $slipgaji = SlipGaji::where('uid', $request->uid)
            ->where('tanggal_lahir', $request->tanggal_lahir)
            ->get();
        
        if (count($slipgaji) == 0) return back()->withInput()->withErrors(['credentials' => 'Data tidak ditemukan.']);

        return view('pages.karyawan.slipgaji', compact('slipgaji'));
    }

    public function print(Request $request)
    {
       
        // validate
        if (!$request->has('uid')) return route('karyawan.home');

        // check db
        $slipgaji = SlipGaji::where('uid', $request->uid)->get();
        if (count($slipgaji) == 0) return back()->withInput()->withErrors(['credentials' => 'Data tidak ditemukan.']);

        // 
        $pdf = PDF::loadView('pages.karyawan.pdf', compact('slipgaji'));
        return $pdf->stream('slipgaji-'. $request->uid .'.pdf');

        // 
        return $request->all();
    }
}
