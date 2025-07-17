<?php

namespace Database\Seeders;

use App\Models\MatkulKurikulum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatkulKurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MatkulKurikulum::insert([
            [
                'id' => 1,
                'kdmk' => 'A11.44211',
                'nmmk' => 'ALGORITMA DAN PEMROGRAMAN',
                'nmen' => 'Algorithm and Programming',
                'tp' => 'T',
                'sks' => 2,
                'sks_t' => 2,
                'sks_p' => 0,
                'smt' => 6,
                'jns_smt' => 2,
                'aktif' => 1,
                'kur_nama' => 'A11.KUR.2021/2022',
                'kelompok_makul' => 'MKK',
                'kur_aktif' => 1,
                'jenis_matkul' => 'wajib'
            ],
            [
                'id' => 2,
                'kdmk' => 'A11.44212',
                'nmmk' => 'STRUKTUR DATA',
                'nmen' => 'Data Structures',
                'tp' => 'TP',
                'sks' => 3,
                'sks_t' => 2,
                'sks_p' => 1,
                'smt' => 6,
                'jns_smt' => 2,
                'aktif' => 1,
                'kur_nama' => 'A11.KUR.2021/2022',
                'kelompok_makul' => 'MKK',
                'kur_aktif' => 1,
                'jenis_matkul' => 'wajib'
            ],
            [
                'id' => 3,
                'kdmk' => 'B12.6206',
                'nmmk' => 'PEMROGRAMAN WEB',
                'nmen' => 'Web Programming',
                'tp' => 'T',
                'sks' => 3,
                'sks_t' => 2,
                'sks_p' => 1,
                'smt' => 6,
                'jns_smt' => 2,
                'aktif' => 1,
                'kur_nama' => 'B12.KUR.2023/2024',
                'kelompok_makul' => 'MKB',
                'kur_aktif' => 1,
                'jenis_matkul' => 'wajib',
            ],
            [
                'id' => 4,
                'kdmk' => 'B12.44214',
                'nmmk' => 'PEMROGRAMAN WEB',
                'nmen' => 'Web Programming',
                'tp' => 'TP',
                'sks' => 3,
                'sks_t' => 2,
                'sks_p' => 1,
                'smt' => 6,
                'jns_smt' => 2,
                'aktif' => 1,
                'kur_nama' => 'B12.KUR.2021/2022',
                'kelompok_makul' => 'MKK',
                'kur_aktif' => 1,
                'jenis_matkul' => 'pilihan'
            ],
            [
                'id' => 5,
                'kdmk' => 'B12.44215',
                'nmmk' => 'JARINGAN KOMPUTER',
                'nmen' => 'Computer Networks',
                'tp' => 'T',
                'sks' => 2,
                'sks_t' => 2,
                'sks_p' => 0,
                'smt' => 6,
                'jns_smt' => 2,
                'aktif' => 1,
                'kur_nama' => 'B12.KUR.2021/2022',
                'kelompok_makul' => 'MKK',
                'kur_aktif' => 1,
                'jenis_matkul' => 'wajib'
            ]
        ]);
    }
}