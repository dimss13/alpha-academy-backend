<?php

namespace Database\Seeders;

use App\Models\FreemiumBankSoal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FreemiumBankSoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        FreemiumBankSoal::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'nama' => 'Simulasi Try Out Geografi',
                'materi_id' => 1,
            ]
        ];

        foreach ($data as $freemiumBankSoal) {
            // use mass assignment
            FreemiumBankSoal::create($freemiumBankSoal);
        }
    }
}