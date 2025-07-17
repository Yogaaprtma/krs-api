<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SesiKuliahBentrok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SesiKuliahBentrokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SesiKuliahBentrok::insert([
            ['id' => 1, 'id_bentrok' => 5],
            ['id' => 2, 'id_bentrok' => 1],
            ['id' => 3, 'id_bentrok' => 4],
            ['id' => 4, 'id_bentrok' => 3],
            ['id' => 5, 'id_bentrok' => 2]
        ]);
    }
}
