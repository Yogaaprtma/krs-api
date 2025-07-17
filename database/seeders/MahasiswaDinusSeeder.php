<?php

namespace Database\Seeders;

use App\Models\MahasiswaDinus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaDinusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MahasiswaDinus::insert([
            [
                'id' => 1,
                'nim_dinus' => '8360e9c2d67de5b82c7ada148e2aada2',
                'ta_masuk' => 2023,
                'prodi' => 'A11',
                'pass_mhs' => 'login123',
                'kelas' => 1,
                'akdm_stat' => '4'
            ],
            [
                'id' => 2,
                'nim_dinus' => 'f02c40967e21c126e6e49bc779f2c58c',
                'ta_masuk' => 2023,
                'prodi' => 'A11',
                'pass_mhs' => 'login123',
                'kelas' => 2,
                'akdm_stat' => '1'
            ],
            [
                'id' => 3,
                'nim_dinus' => 'a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6',
                'ta_masuk' => 2024,
                'prodi' => 'B12',
                'pass_mhs' => 'login123',
                'kelas' => 1,
                'akdm_stat' => '1'
            ],
            [
                'id' => 4,
                'nim_dinus' => 'b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7',
                'ta_masuk' => 2024,
                'prodi' => 'A11',
                'pass_mhs' => 'login123',
                'kelas' => 1,
                'akdm_stat' => '1'
            ],
            [
                'id' => 5,
                'nim_dinus' => 'c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7r8',
                'ta_masuk' => 2024,
                'prodi' => 'B12',
                'pass_mhs' => 'login123',
                'kelas' => 2,
                'akdm_stat' => '1'
            ]
        ]);
    }
}