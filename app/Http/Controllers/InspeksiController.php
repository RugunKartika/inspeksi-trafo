<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspeksi;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InspeksiExport;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class InspeksiController extends Controller
{
    public function store(Request $request)
    {
    $request->validate([

    /*
    |--------------------------------------------------------------------------
    | DATA UTAMA WAJIB ISI
    |--------------------------------------------------------------------------
    */

    'ulp' => 'required',

    'id_gardu' => 'required',

    'merk' => 'required',

    'alamat' => 'required',

    'penyulang' => 'required',

    'daya' => 'required'

], [

    /*
    |--------------------------------------------------------------------------
    | PESAN ERROR
    |--------------------------------------------------------------------------
    */

    'ulp.required' => 'ULP wajib diisi',

    'id_gardu.required' => 'ID Gardu wajib diisi',

    'merk.required' => 'Merk wajib diisi',

    'alamat.required' => 'Alamat wajib diisi',

    'penyulang.required' => 'Penyulang wajib diisi',

    'daya.required' => 'Daya wajib diisi'

]);
        /*
        |--------------------------------------------------------------------------
        | FOLDER PENYIMPANAN FOTO
        |--------------------------------------------------------------------------
        */

        $folder = 'D:/FOTO_INSPEKSI_TRAFO';

        /*
        |--------------------------------------------------------------------------
        | FOTO BEBAN R
        |--------------------------------------------------------------------------
        */

        $foto_beban_r = null;

        if ($request->hasFile('foto_beban_r')) {

            $file = $request->file('foto_beban_r');

            $namaFile = time().'_beban_r.'.$file->getClientOriginalExtension();

            $file->move($folder, $namaFile);

            $foto_beban_r = $folder.'/'.$namaFile;
        }

        /*
        |--------------------------------------------------------------------------
        | FOTO BEBAN S
        |--------------------------------------------------------------------------
        */

        $foto_beban_s = null;

        if ($request->hasFile('foto_beban_s')) {

            $file = $request->file('foto_beban_s');

            $namaFile = time().'_beban_s.'.$file->getClientOriginalExtension();

            $file->move($folder, $namaFile);

            $foto_beban_s = $folder.'/'.$namaFile;
        }

        /*
        |--------------------------------------------------------------------------
        | FOTO BEBAN T
        |--------------------------------------------------------------------------
        */

        $foto_beban_t = null;

        if ($request->hasFile('foto_beban_t')) {

            $file = $request->file('foto_beban_t');

            $namaFile = time().'_beban_t.'.$file->getClientOriginalExtension();

            $file->move($folder, $namaFile);

            $foto_beban_t = $folder.'/'.$namaFile;
        }

        /*
        |--------------------------------------------------------------------------
        | FOTO BEBAN N
        |--------------------------------------------------------------------------
        */

        $foto_beban_n = null;

        if ($request->hasFile('foto_beban_n')) {

            $file = $request->file('foto_beban_n');

            $namaFile = time().'_beban_n.'.$file->getClientOriginalExtension();

            $file->move($folder, $namaFile);

            $foto_beban_n = $folder.'/'.$namaFile;
        }

        /*
        |--------------------------------------------------------------------------
        | FOTO TEGANGAN UJUNG
        |--------------------------------------------------------------------------
        */

        $foto_tegangan_ujung = null;

        if ($request->hasFile('foto_tegangan_ujung')) {

            $file = $request->file('foto_tegangan_ujung');

            $namaFile = time().'_tegangan_ujung.'.$file->getClientOriginalExtension();

            $file->move($folder, $namaFile);

            $foto_tegangan_ujung = $folder.'/'.$namaFile;
        }

        /*
        |--------------------------------------------------------------------------
        | FOTO PELANGGAN
        |--------------------------------------------------------------------------
        */

        $foto_pelanggan = null;

        if ($request->hasFile('foto_pelanggan')) {

            $file = $request->file('foto_pelanggan');

            $namaFile = time().'_pelanggan.'.$file->getClientOriginalExtension();

            $file->move($folder, $namaFile);

            $foto_pelanggan = $folder.'/'.$namaFile;
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATABASE
        |--------------------------------------------------------------------------
        */

        Inspeksi::create([

            'nama_petugas' => session('nama'),
            'nip_petugas' => session('nip'),

            'ulp' => $request->ulp ?? '',
            'id_gardu' => $request->id_gardu ?? '',
            'merk' => $request->merk ?? '',
            'alamat' => $request->alamat ?? '',
            'penyulang' => $request->penyulang ?? '',
            'daya' => $request->daya ?? '',

            'arus_r' => $request->arus_r ?? '',
            'arus_s' => $request->arus_s ?? '',
            'arus_t' => $request->arus_t ?? '',
            'arus_n' => $request->arus_n ?? '',

            'tegangan_vr' => $request->tegangan_vr ?? '',
            'tegangan_vs' => $request->tegangan_vs ?? '',
            'tegangan_vt' => $request->tegangan_vt ?? '',

            'foto_beban_r' => $foto_beban_r,
            'foto_beban_s' => $foto_beban_s,
            'foto_beban_t' => $foto_beban_t,
            'foto_beban_n' => $foto_beban_n,

            'foto_tegangan_ujung' => $foto_tegangan_ujung,
            'foto_pelanggan' => $foto_pelanggan

        ]);

        /*
        |--------------------------------------------------------------------------
        | TEMPLATE EXCEL PLN
        |--------------------------------------------------------------------------
        */

        $spreadsheet = IOFactory::load(
            storage_path('app/template_pln.xlsx')
        );

        $sheet = $spreadsheet->getActiveSheet();

        /*
        |--------------------------------------------------------------------------
        | DATA UTAMA
        |--------------------------------------------------------------------------
        */

        $sheet->setCellValue('B3', $request->ulp);

        $sheet->setCellValue('B4', $request->id_gardu);

        $sheet->setCellValue('B5', $request->merk);

        $sheet->setCellValue('E3', $request->alamat);

        $sheet->setCellValue('E4', $request->penyulang);

        $sheet->setCellValue('E5', $request->daya);

        /*
        |--------------------------------------------------------------------------
        | DATA BEBAN
        |--------------------------------------------------------------------------
        */

        // PHASA R

        $sheet->setCellValue('C9', $request->arus_r);

        $sheet->setCellValue('D9', $request->arus_r_rute_b);

        $sheet->setCellValue('E9', $request->arus_r_rute_c);

        $sheet->setCellValue('F9', $request->arus_r_rute_d);

        $sheet->setCellValue('G9', $request->arus_r_induk);

        // PHASA S

        $sheet->setCellValue('C10', $request->arus_s);

        $sheet->setCellValue('D10', $request->arus_s_rute_b);

        $sheet->setCellValue('E10', $request->arus_s_rute_c);

        $sheet->setCellValue('F10', $request->arus_s_rute_d);

        $sheet->setCellValue('G10', $request->arus_s_induk);

        // PHASA T

        $sheet->setCellValue('C11', $request->arus_t);

        $sheet->setCellValue('D11', $request->arus_t_rute_b);

        $sheet->setCellValue('E11', $request->arus_t_rute_c);

        $sheet->setCellValue('F11', $request->arus_t_rute_d);

        $sheet->setCellValue('G11', $request->arus_t_induk);

        // PHASA N

        $sheet->setCellValue('C12', $request->arus_n);

        $sheet->setCellValue('D12', $request->arus_n_rute_b);

        $sheet->setCellValue('E12', $request->arus_n_rute_c);

        $sheet->setCellValue('F12', $request->arus_n_rute_d);

        $sheet->setCellValue('G12', $request->arus_n_induk);

        /*
        |--------------------------------------------------------------------------
        | DATA TEGANGAN
        |--------------------------------------------------------------------------
        */

        $sheet->setCellValue('C16', $request->tegangan_vr);

        $sheet->setCellValue('C17', $request->tegangan_vs);

        $sheet->setCellValue('C18', $request->tegangan_vt);

        $sheet->setCellValue('E16', $request->tegangan_r_s);

        $sheet->setCellValue('E17', $request->tegangan_r_t);

        $sheet->setCellValue('E18', $request->tegangan_s_t);

        $sheet->setCellValue('F16', $request->tegangan_ujung);

        /*
        |--------------------------------------------------------------------------
        | FOTO R
        |--------------------------------------------------------------------------
        */

        if ($foto_beban_r) {

            $drawing = new Drawing();

            $drawing->setPath($foto_beban_r);

            $drawing->setHeight(120);

            $drawing->setCoordinates('B22');

            $drawing->setWorksheet($sheet);
        }

        /*
        |--------------------------------------------------------------------------
        | FOTO S
        |--------------------------------------------------------------------------
        */

        if ($foto_beban_s) {

            $drawing = new Drawing();

            $drawing->setPath($foto_beban_s);

            $drawing->setHeight(120);

            $drawing->setCoordinates('C22');

            $drawing->setWorksheet($sheet);
        }

        /*
        |--------------------------------------------------------------------------
        | FOTO T
        |--------------------------------------------------------------------------
        */

        if ($foto_beban_t) {

            $drawing = new Drawing();

            $drawing->setPath($foto_beban_t);

            $drawing->setHeight(120);

            $drawing->setCoordinates('D22');

            $drawing->setWorksheet($sheet);
        }

        /*
        |--------------------------------------------------------------------------
        | FOTO N
        |--------------------------------------------------------------------------
        */

        if ($foto_beban_n) {

            $drawing = new Drawing();

            $drawing->setPath($foto_beban_n);

            $drawing->setHeight(120);

            $drawing->setCoordinates('E22');

            $drawing->setWorksheet($sheet);
        }

        /*
        |--------------------------------------------------------------------------
        | FOTO TEGANGAN UJUNG
        |--------------------------------------------------------------------------
        */

        if ($foto_tegangan_ujung) {

            $drawing = new Drawing();

            $drawing->setPath($foto_tegangan_ujung);

            $drawing->setHeight(120);

            $drawing->setCoordinates('F22');

            $drawing->setWorksheet($sheet);
        }

        /*
        |--------------------------------------------------------------------------
        | FOTO PELANGGAN
        |--------------------------------------------------------------------------
        */

        if ($foto_pelanggan) {

            $drawing = new Drawing();

            $drawing->setPath($foto_pelanggan);

            $drawing->setHeight(120);

            $drawing->setCoordinates('G22');

            $drawing->setWorksheet($sheet);
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN FILE EXCEL
        |--------------------------------------------------------------------------
        */

        $writer = new Xlsx($spreadsheet);

        $namaExcel =
            'INSPEKSI_' .
            $request->id_gardu .
            '.xlsx';

        $writer->save(
            'D:/FOTO_INSPEKSI_TRAFO/' . $namaExcel
        );

        return back()->with(
            'success',
            'Data inspeksi berhasil disimpan'
        );
    }
}