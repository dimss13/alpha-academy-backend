<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Bidang::truncate();
        Schema::enableForeignKeyConstraints();

        $bidangs = [
            [
                'nama' => 'Matematika',
            ],
            [
                'nama' => 'Biologi'
            ],
            [
                'nama' => 'Fisika'
            ],
            [
                'nama' => 'Kimia'
            ],
            [
                'nama' => 'Astronomi'
            ],
            [
                'nama' => 'Geografi'
            ],
            [
                'nama' => 'Komputer'
            ],
            [
                'nama' => 'Kebumian'
            ],
            [
                'nama' => 'Ekonomi'
            ]
        ];

        foreach ($bidangs as $bidang) {
            // use mass assignment
            Bidang::create($bidang);
        }
    }
}