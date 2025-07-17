<?php

namespace Database\Seeders;

use App\Models\KrsRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KrsRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KrsRecord::insert([
            [
                'id' => 1,
                'ta' => '20232',
                'kdmk' => 'A11.44211',
                'id_jadwal' => 1,
                'nim_dinus' => '8360e9c2d67de5b82c7ada148e2aada2',
                'sts' => 'B',
                'sks' => 2,
                'modul' => 0
            ],
            [
                'id' => 2,
                'ta' => '20232',
                'kdmk' => 'A11.44212',
                'id_jadwal' => 2,
                'nim_dinus' => 'f02c40967e21c126e6e49bc779f2c58c',
                'sts' => 'B',
                'sks' => 3,
                'modul' => 0
            ],
            [
                'id' => 3,
                'ta' => '20232',
                'kdmk' => 'A11.44213',
                'id_jadwal' => 3,
                'nim_dinus' => 'a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6',
                'sts' => 'B',
                'sks' => 3,
                'modul' => 0
            ],
            [
                'id' => 4,
                'ta' => '20232',
                'kdmk' => 'B12.44214',
                'id_jadwal' => 4,
                'nim_dinus' => 'b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7',
                'sts' => 'B',
                'sks' => 3,
                'modul' => 0
            ],
            [
                'id' => 5,
                'ta' => '20232',
                'kdmk' => 'B12.44215',
                'id_jadwal' => 5,
                'nim_dinus' => 'c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7r8',
                'sts' => 'B',
                'sks' => 2,
                'modul' => 0
            ]
        ]);
    }
}