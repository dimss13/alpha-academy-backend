<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Materi::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'nama' => 'Iklim dan Perubahan Iklim',
                'content' => 1,
                'bidang_id' => 6
            ]
        ];

        foreach ($data as $materi) {
            // use mass assignment
            Materi::create($materi);
        }
    }
}