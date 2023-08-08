<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $users = [
            [
                'nama' => 'dimas',
                'email' => 'dimas@gmail.com',
                'no_telepon' => '081234567890',
                'asal_sekolah' => 'SMA 1',
                'asal_provinsi' => 'Jawa Barat',
                'status_id' => 1,
                'password' => bcrypt('rahasia'),
            ],
            [
                'nama' => 'taslam',
                'email' => 'taslam@gmail.com',
                'no_telepon' => '081234567890',
                'asal_sekolah' => 'SMA 1',
                'asal_provinsi' => 'Jawa Barat',
                'status_id' => 1,
                'password' => bcrypt('rahasia'),
            ],
            [
                'nama' => 'rafif',
                'email' => 'rafif@gmail.com',
                'no_telepon' => '081234567890',
                'asal_sekolah' => 'SMA 1',
                'asal_provinsi' => 'Jawa Barat',
                'status_id' => 1,
                'password' => bcrypt('rahasia'),
            ]
        ];

        foreach ($users as $user) {
            // use mass assignment
            User::create($user);
        }
    }
}