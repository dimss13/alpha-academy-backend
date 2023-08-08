<?php

namespace Database\Seeders;

use App\Models\PilihanGanda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PilihanGandasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        PilihanGanda::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'soal_pilgan_id' => 1,
                'pilihan' => 'Psychocentric'
            ],
            [
                'soal_pilgan_id' => 1,
                'pilihan' => 'Allocentric'
            ],
            [
                'soal_pilgan_id' => 1,
                'pilihan' => 'Near-Psychocentric'
            ],
            [
                'soal_pilgan_id' => 1,
                'pilihan' => 'Near-Allocentric'
            ],
            [
                'soal_pilgan_id' => 1,
                'pilihan' => 'Mid-Centric'
            ]
        ];

        foreach ($data as $pilihanGanda) {
            // use mass assignment
            PilihanGanda::create($pilihanGanda);
        }
    }
}