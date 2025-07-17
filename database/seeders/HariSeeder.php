<?php

namespace Database\Seeders;

use App\Models\Hari;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hari::insert([
            ['id' => 1, 'nama' => 'Senin',  'nama_en' => 'Monday'],
            ['id' => 2, 'nama' => 'Selasa', 'nama_en' => 'Tuesday'],
            ['id' => 3, 'nama' => 'Rabu',   'nama_en' => 'Wednesday'],
            ['id' => 4, 'nama' => 'Kamis',  'nama_en' => 'Thursday'],
            ['id' => 5, 'nama' => 'Jumat',  'nama_en' => 'Friday']
        ]);
    }
}