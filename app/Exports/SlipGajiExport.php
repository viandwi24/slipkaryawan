<?php

namespace App\Exports;

use App\Models\SlipGaji;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SlipGajiExport implements FromView
{
    public function view(): View
    {
        return view('exports.slipgaji', [
            'slipgajis' => SlipGaji::all()
        ]);
    }
}
