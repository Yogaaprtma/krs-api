<?php

namespace Database\Seeders;

use App\Models\KrsRecordLog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KrsRecordLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KrsRecordLog::insert([
            [
                'id' => 1,
                'id_krs' => 1,
                'nim_dinus' => '8360e9c2d67de5b82c7ada148e2aada2',
                'kdmk' => 'A11.44211',
                'aksi' => 1,
                'id_jadwal' => 1,
                'ip_addr' => '127.0.0.1',
                'lastUpdate' => now()
            ],
            [
                'id' => 2,
                'id_krs' => 2,
                'nim_dinus' => 'f02c40967e21c126e6e49bc779f2c58c',
                'kdmk' => 'A11.44212',
                'aksi' => 1,
                'id_jadwal' => 2,
                'ip_addr' => '127.0.0.1',
                'lastUpdate' => now()
            ],
            [
                'id' => 3,
                'id_krs' => 3,
                'nim_dinus' => 'a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6',
                'kdmk' => 'A11.44213',
                'aksi' => 1,
                'id_jadwal' => 3,
                'ip_addr' => '127.0.0.1',
                'lastUpdate' => now()
            ],
            [
                'id' => 4,
                'id_krs' => 4,
                'nim_dinus' => 'b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7',
                'kdmk' => 'B12.44214',
                'aksi' => 1,
                'id_jadwal' => 4,
                'ip_addr' => '127.0.0.1',
                'lastUpdate' => now()
            ],
            [
                'id' => 5,
                'id_krs' => 5,
                'nim_dinus' => 'c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7r8',
                'kdmk' => 'B12.44215',
                'aksi' => 1,
                'id_jadwal' => 5,
                'ip_addr' => '127.0.0.1',
                'lastUpdate' => now()
            ]
        ]);
    }
}