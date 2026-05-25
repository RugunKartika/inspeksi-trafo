<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspeksi extends Model
{
    protected $table = 'inspeksi';

    protected $fillable = [

        'nama_petugas',
        'nip_petugas',

        'ulp',
        'id_gardu',
        'merk',
        'alamat',
        'penyulang',
        'daya',

        'arus_r',
        'arus_s',
        'arus_t',
        'arus_n',

        'tegangan_vr',
        'tegangan_vs',
        'tegangan_vt',

        'foto_beban_r',
        'foto_beban_s',
        'foto_beban_t',
        'foto_beban_n',

        'foto_tegangan_ujung',
        'foto_pelanggan'

    ];
}