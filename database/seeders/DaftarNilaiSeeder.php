<?php

namespace Database\Seeders;

use App\Models\DaftarNilai;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DaftarNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DaftarNilai::insert([
            [
                'id' => 1,
                'nim_dinus' => '8360e9c2d67de5b82c7ada148e2aada2',
                'kdmk' => 'A11.44211',
                'nl' => 'A',
                'hide' => 0
            ],
            [
                'id' => 2,
                'nim_dinus' => 'f02c40967e21c126e6e49bc779f2c58c',
                'kdmk' => 'A11.44212',
                'nl' => 'B',
                'hide' => 0
            ],
            [
                'id' => 3,
                'nim_dinus' => 'a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6',
                'kdmk' => 'B12.6206',
                'nl' => 'C',
                'hide' => 0
            ],
            [
                'id' => 4,
                'nim_dinus' => 'b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7',
                'kdmk' => 'B12.44214',
                'nl' => 'A',
                'hide' => 0
            ],
            [
                'id' => 5,
                'nim_dinus' => 'c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7r8',
                'kdmk' => 'B12.44215',
                'nl' => 'B',
                'hide' => 0
            ]
        ]);
    }
}