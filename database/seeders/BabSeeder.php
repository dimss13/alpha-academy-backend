<?php

namespace Database\Seeders;

use App\Models\Bab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Bab::truncate();
        Schema::enableForeignKeyConstraints();

        $babs = [
            [
                'judul_bab' => 'Pengantar Cuaca dan Iklim',
                'materi_id' => 1
            ],
            [
                'judul_bab' => 'Sirkulasi Atmosfer',
                'materi_id' => 1
            ],
            [
                'judul_bab' => 'Siklus Hidrologi',
                'materi_id' => 1
            ],
            [
                'judul_bab' => 'Massa Udara',
                'materi_id' => 1
            ],
            [
                'judul_bab' => 'front',
                'materi_id' => 1
            ],
            [
                'judul_bab' => 'Klasifikasi Iklim',
                'materi_id' => 1
            ],
            [
                'judul_bab' => 'Bencana dan Anomali',
                'materi_id' => 1
            ],
            [
                'judul_bab' => 'Pemanasan Global dan Perubahan Iklim',
                'materi_id' => 1
            ],
            [
                'judul_bab' => 'Isu dan Kebijakan Terkait Iklim',
                'materi_id' => 1
            ],
            [
                'judul_bab' => 'Observasi Meteorologi dan Penyajian Data',
                'materi_id' => 1
            ]
        ];

        foreach ($babs as $bab) {
            // use mass assignment
            Bab::create($bab);
        }
    }
}