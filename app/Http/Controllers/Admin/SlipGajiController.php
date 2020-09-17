<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SlipGajiExport;
use App\Http\Controllers\Controller;
use App\Imports\SlipGajiImport;
use App\Models\SlipGaji;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class SlipGajiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $slip_gaji = SlipGaji::query();
            return DataTables::of($slip_gaji)
                ->addColumn('sub_kerja', function (SlipGaji $slip_gaji) {
                    return 'Rp' . number_format($slip_gaji->sub_kerja,2,',','.');
                })
                ->addColumn('sub_lembur', function (SlipGaji $slip_gaji) {
                    return 'Rp' . number_format($slip_gaji->sub_lembur,2,',','.');
                })
                ->addColumn('bpjs', function (SlipGaji $slip_gaji) {
                    return 'Rp' . number_format($slip_gaji->bpjs,2,',','.');
                })
                ->addColumn('total', function (SlipGaji $slip_gaji) {
                    return 'Rp' . number_format($slip_gaji->total,2,',','.');
                })
                ->make();
        }
        
        return view('pages.admin.slip-gaji');
    }

    public function post(Request $request)
    {
        $request->validate([
            'action' => 'required|in:import,export'
        ]);
        
        if ($request->action == 'import')
        {
            // validate
            $request->validate(['file' => 'required|mimes:xls,xlsx']);
            $import = Excel::import(new SlipGajiImport, $request->file);
            return redirect()->back()->with('alert', [
                'type' => 'success',
                'text' => 'Berhasil di import.'
            ]);
        } else if ($request->action == 'export') {
            return Excel::download(new SlipGajiExport, 'slip-gaji.xlsx');
        }
    }

    public function destroy(Request $request)
    {
        $destroy = SlipGaji::query()->delete();
        return redirect()->back()->with('alert', [
            'type' => 'success',
            'text' => 'Berhasil di delete.'
        ]);
    }
}
