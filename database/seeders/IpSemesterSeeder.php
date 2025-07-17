<?php

namespace Database\Seeders;

use App\Models\IpSemester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IpSemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IpSemester::insert([
            [
                'id' => 1,
                'ta' => '20231',
                'nim_dinus' => '8360e9c2d67de5b82c7ada148e2aada2',
                'sks' => 19,
                'ips' => '3.24',
                'last_update' => '2024-07-16 14:33:49'
            ],
            [
                'id' => 2,
                'ta' => '20231',
                'nim_dinus' => 'f02c40967e21c126e6e49bc779f2c58c',
                'sks' => 20,
                'ips' => '3.50',
                'last_update' => '2024-07-16 14:33:49'
            ],
            [
                'id' => 3,
                'ta' => '20231',
                'nim_dinus' => 'a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6',
                'sks' => 18,
                'ips' => '3.10',
                'last_update' => '2024-07-16 14:33:49'
            ],
            [
                'id' => 4,
                'ta' => '20231',
                'nim_dinus' => 'b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7',
                'sks' => 21,
                'ips' => '3.75',
                'last_update' => '2024-07-16 14:33:49'
            ],
            [
                'id' => 5,
                'ta' => '20231',
                'nim_dinus' => 'c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7r8',
                'sks' => 19,
                'ips' => '3.40',
                'last_update' => '2024-07-16 14:33:49'
            ]
        ]);
    }
}