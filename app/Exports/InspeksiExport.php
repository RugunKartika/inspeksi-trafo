<?php

namespace App\Exports;

use App\Models\Inspeksi;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class InspeksiExport implements FromView
{
    public function view(): View
    {
        $data = Inspeksi::latest()->first();

        return view('excel.inspeksi', [
            'data' => $data
        ]);
    }
}