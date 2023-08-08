<?php

namespace Database\Seeders;

use App\Models\SubBab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SubBabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        SubBab::truncate();
        Schema::enableForeignKeyConstraints();

        $subBabs = [
            [
                'judul_sub_bab' => 'Definisi Cuaca dan Iklim',
                'bab_id' => 1
            ],
            [
                'judul_sub_bab' => 'Komponen Cuaca dan Iklim',
                'bab_id' => 1
            ],
            [
                'judul_sub_bab' => 'Struktur dan Komposisi Atmosfer',
                'bab_id' => 1
            ],
            [
                'judul_sub_bab' => 'Sistem Tiga Sel',
                'bab_id' => 2
            ],
            [
                'judul_sub_bab' => 'Gelombang Rossby',
                'bab_id' => 2
            ],
            [
                'judul_sub_bab' => 'Jet Stream',
                'bab_id' => 2
            ],
            [
                'judul_sub_bab' => 'Angin',
                'bab_id' => 2
            ],
            [
                'judul_sub_bab' => 'Proses dan Faktor Terbentuknya Angin',
                'bab_id' => 2
            ],
            [
                'judul_sub_bab' => 'Gaya Gradien Tekanan',
                'bab_id' => 2
            ],
            [
                'judul_sub_bab' => 'Gaya Coriolis',
                'bab_id' => 2
            ],
            [
                'judul_sub_bab' => 'Klasifikasi Angin',
                'bab_id' => 2
            ],
            [
                'judul_sub_bab' => 'Jenis Siklus Hidrologi',
                'bab_id' => 3
            ],
            [
                'judul_sub_bab' => 'Pendek',
                'bab_id' => 3
            ],
            [
                'judul_sub_bab' => 'Panjang',
                'bab_id' => 3
            ],
            [
                'judul_sub_bab' => 'Sedang',
                'bab_id' => 3
            ],
            [
                'judul_sub_bab' => 'Penguapan',
                'bab_id' => 3
            ],
            [
                'judul_sub_bab' => 'Evaporasi',
                'bab_id' => 3
            ],
            [
                'judul_sub_bab' => 'Transpirasi',
                'bab_id' => 3
            ],
            [
                'judul_sub_bab' => 'Perawanan',
                'bab_id' => 3
            ],
            [
                'judul_sub_bab' => 'Presipitasi',
                'bab_id' => 3
            ]
        ];

        foreach ($subBabs as $subBab) {
            // use mass assignment
            SubBab::create($subBab);
        }
    }
}