<?php

namespace App\Http\Controllers;

use App\Exports\InspeksiExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new InspeksiExport, 'data-inspeksi.xlsx');
    }
}