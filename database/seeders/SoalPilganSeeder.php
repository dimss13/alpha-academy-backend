<?php

namespace Database\Seeders;

use App\Models\SoalPilgan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SoalPilganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        SoalPilgan::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'deskripsi' => 'Naufal adalah seorang “backpacker”, Ia adalah seorang turis yang sering pergi ke negara-negara lain dan mengeksplorasi alam-alam terbuka, terutama kawasan hutan-hutan tundra. Menurut Teori Plog, Naufal termasuk turis jenis...',
                'kunci_jawaban' => 'Psychocentric',
                'gambar' => null,
                'freemium_bank_soal_id' => 1,
            ],
        ];

        foreach ($data as $soalPilgan) {
            // use mass assignment
            SoalPilgan::create($soalPilgan);
        }
    }
}