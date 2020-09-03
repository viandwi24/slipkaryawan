<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SlipGaji;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SlipGajiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $slip_gaji = SlipGaji::query();
            return DataTables::of($slip_gaji)->make();
        }
        
        return view('pages.admin.slip-gaji');
    }
}
