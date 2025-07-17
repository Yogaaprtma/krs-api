<?php

namespace Database\Seeders;

use App\Models\Ruang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ruang::insert([
            [
                'id' => 1,
                'nama' => 'B.2.1',
                'nama2' => 'B.2.1',
                'id_jenis_makul' => 11,
                'id_fakultas' => 'E',
                'kapasitas' => 45,
                'kap_ujian' => 25,
                'status' => 2,
                'luas' => 48,
                'kondisi' => '1',
                'jumlah' => 1
            ],
            [
                'id' => 2,
                'nama' => 'B.2.2',
                'nama2' => 'B.2.2',
                'id_jenis_makul' => 11,
                'id_fakultas' => 'E',
                'kapasitas' => 45,
                'kap_ujian' => 25,
                'status' => 2,
                'luas' => 48,
                'kondisi' => '1',
                'jumlah' => 1
            ],
            [
                'id' => 3,
                'nama' => 'B.2.3',
                'nama2' => 'B.2.3',
                'id_jenis_makul' => 11,
                'id_fakultas' => 'E',
                'kapasitas' => 45,
                'kap_ujian' => 25,
                'status' => 2,
                'luas' => 48,
                'kondisi' => '1',
                'jumlah' => 1
            ],
            [
                'id' => 4,
                'nama' => 'B.2.4',
                'nama2' => 'B.2.4',
                'id_jenis_makul' => 11,
                'id_fakultas' => 'E',
                'kapasitas' => 45,
                'kap_ujian' => 25,
                'status' => 2,
                'luas' => '48',
                'kondisi' => '1',
                'jumlah' => 1
            ],
            [
                'id' => 5,
                'nama' => 'B.2.5',
                'nama2' => 'B.2.5',
                'id_jenis_makul' => 11,
                'id_fakultas' => 'E',
                'kapasitas' => 45,
                'kap_ujian' => 25,
                'status' => 2,
                'luas' => '48',
                'kondisi' => '1',
                'jumlah' => 1
            ]
        ]);
    }
}