<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petugas;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        Petugas::create([
            'nama' => 'Rugun Kartika',
            'nip' => '12345'
        ]);

        Petugas::create([
            'nama' => 'Budi',
            'nip' => '67890'
        ]);
    }
}