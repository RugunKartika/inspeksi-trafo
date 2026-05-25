<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $petugas = Petugas::where('nama', $request->nama)
                    ->where('nip', $request->nip)
                    ->first();

        if (!$petugas) {

            return back()->with('error', 'Nama atau NIP salah');

        }

        session([
            'nama' => $petugas->nama,
            'nip' => $petugas->nip
        ]);

        return redirect('/');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}