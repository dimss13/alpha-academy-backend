<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Status::truncate();
        Schema::enableForeignKeyConstraints();

        $statuses = [
            [
                'premium_status' => 'freemium',
            ],
            [
                'premium_status' => 'premium',
            ]
        ];

        foreach ($statuses as $status) {
            // use mass assignment
            Status::create($status);
        }
    }
}