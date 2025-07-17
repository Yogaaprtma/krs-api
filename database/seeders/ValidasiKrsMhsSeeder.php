<?php

namespace Database\Seeders;

use App\Models\ValidasiKrsMhs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValidasiKrsMhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ValidasiKrsMhs::insert([
            // [
            //     'id' => 1,
            //     'nim_dinus' => '8360e9c2d67de5b82c7ada148e2aada2',
            //     'job_date' => '2024-02-20 08:00:55',
            //     'job_host' => '119.47.90.27',
            //     'job_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',
            //     'ta' => '20232'
            // ],
            [
                'id' => 2,
                'nim_dinus' => 'f02c40967e21c126e6e49bc779f2c58c',
                'job_date' => '2024-02-20 08:00:55',
                'job_host' => '119.47.90.28',
                'job_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',
                'ta' => '20232'
            ],
            [
                'id' => 3,
                'nim_dinus' => 'a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6',
                'job_date' => '2024-02-20 08:00:55',
                'job_host' => '119.47.90.27',
                'job_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',
                'ta' => '20232'
            ],
            [
                'id' => 4,
                'nim_dinus' => 'b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7',
                'job_date' => '2024-02-20 08:00:55',
                'job_host' => '119.47.90.27',
                'job_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',
                'ta' => '20232'
            ],
            [
                'id' => 5,
                'nim_dinus' => 'c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7r8',
                'job_date' => '2024-02-20 08:00:55',
                'job_host' => '119.47.90.27',
                'job_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',
                'ta' => '20232'
            ]
        ]);
    }
}