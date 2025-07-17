<?php

namespace Database\Seeders;

use App\Models\SesiKuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SesiKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SesiKuliah::insert([
            [
                'id' => 1,
                'jam' => '07.00-08.40',
                'sks' => 2,
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '08:40:00',
                'status' => 1
            ],
            [
                'id' => 2,
                'jam' => '08:40-10:20',
                'sks' => 2,
                'jam_mulai' => '08:40:00',
                'jam_selesai' => '10:20:00',
                'status' => 1
            ],
            [
                'id' => 3,
                'jam' => '10:20-12:00',
                'sks' => 2,
                'jam_mulai' => '10:20:00',
                'jam_selesai' => '12:00:00',
                'status' => 1
            ],
            [
                'id' => 4,
                'jam' => '13:00-14:40',
                'sks' => 2,
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '14:40:00',
                'status' => 1
            ],
            [
                'id' => 5,
                'jam' => '14:40-16:20',
                'sks' => 2,
                'jam_mulai' => '14:40:00',
                'jam_selesai' => '16:20:00',
                'status' => 1
            ]
        ]);
    }
}