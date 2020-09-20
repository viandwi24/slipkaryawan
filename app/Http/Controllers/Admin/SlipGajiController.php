<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SlipGajiExport;
use App\Http\Controllers\Controller;
use App\Imports\SlipGajiImport;
use App\Models\Periode;
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
            if ($request->get('ajax', null) === 'periode')
            {
                $periode = Periode::query();
                return DataTables::of($periode)
                    ->addColumn('mulai', function (Periode $periode) { return $periode->mulai->format('d-m-Y'); })
                    ->addColumn('selesai', function (Periode $periode) { return $periode->selesai->format('d-m-Y'); })
                    ->make();
            } else {
                $slip_gaji = SlipGaji::where('periode_id', $request->get('periode'));
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
        }
        
        if ($request->get('periode', null) === null)
        {
            return view('pages.admin.periode');
        } else {
            $periode = Periode::findOrFail($request->get('periode'));
            return view('pages.admin.slip-gaji', compact('periode'));
        }
    }

    public function post(Request $request)
    {
        $request->validate([
            'action' => 'required|in:import,export'
        ]);

        $periode_id = $request->get('periode');
        if ($periode_id === null) return abort(404);
        $periode = Periode::findOrFail($periode_id);
        
        if ($request->action == 'import')
        {
            // validate
            $request->validate(['file' => 'required|mimes:xls,xlsx']);
            $import = Excel::import(new SlipGajiImport($periode_id), $request->file);
            return redirect()->back()->with('alert', [
                'type' => 'success',
                'text' => 'Berhasil di import.'
            ]);
        } else if ($request->action == 'export') {
            return Excel::download(new SlipGajiExport($periode_id), "slip-gaji-periode-{$periode->mulai->format('d/m/Y')}--{$periode->selesai->format('d/m/Y')}.xlsx");
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
