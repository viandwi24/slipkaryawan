<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function create()
    {
        return view('pages.admin.periode.create');
    }

    public function store(Request $request)
    {
        $request->validate(['mulai' => 'required', 'selesai' => 'required']);
        $mulai = explode('/', $request->mulai);
        $mulai = Carbon::create($mulai[2], $mulai[1], $mulai[0]);
        $selesai = explode('/', $request->selesai);
        $selesai = Carbon::create($selesai[2], $selesai[1], $selesai[0]);
        $store = Periode::create(['mulai' => $mulai, 'selesai' => $selesai]);
        return redirect()->route('admin.slip-gaji');
    }

    public function destroy($id)
    {
        $periode = Periode::findOrFail($id);
        $destroy = $periode->delete();
        return redirect()->route('admin.slip-gaji');
    }
}
