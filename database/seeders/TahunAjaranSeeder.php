<?php

namespace Database\Seeders;

use App\Models\TahunAjaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TahunAjaran::insert([
            [
                'id' => 1,
                'kode' => '20231',
                'tahun_awal' => '2023',
                'tahun_akhir' => '2024',
                'jns_smt' => 1,
                'set_aktif' => 0,
                'biku_tagih_jenis' => 3,
                'update_time' => now(),
                'update_id' => null,
                'update_host' => null,
                'added_time' => now(),
                'added_id' => null,
                'added_host' => null,
                'tgl_masuk' => null
            ],
            [
                'id' => 2,
                'kode' => '20232',
                'tahun_awal' => '2023',
                'tahun_akhir' => '2024',
                'jns_smt' => 2,
                'set_aktif' => 1,
                'biku_tagih_jenis' => 3,
                'update_time' => now(),
                'update_id' => null,
                'update_host' => null,
                'added_time' => now(),
                'added_id' => null,
                'added_host' => null,
                'tgl_masuk' => null
            ],
            [
                'id' => 3,
                'kode' => '20241',
                'tahun_awal' => '2024',
                'tahun_akhir' => '2025',
                'jns_smt' => 1,
                'set_aktif' => 0,
                'biku_tagih_jenis' => 3,
                'update_time' => now(),
                'update_id' => null,
                'update_host' => null,
                'added_time' => now(),
                'added_id' => null,
                'added_host' => null,
                'tgl_masuk' => null
            ],
            [
                'id' => 4,
                'kode' => '20242',
                'tahun_awal' => '2024',
                'tahun_akhir' => '2025',
                'jns_smt' => 2,
                'set_aktif' => 0,
                'biku_tagih_jenis' => 3,
                'update_time' => now(),
                'update_id' => null,
                'update_host' => null,
                'added_time' => now(),
                'added_id' => null,
                'added_host' => null,
                'tgl_masuk' => null
            ],
            [
                'id' => 5,
                'kode' => '20251',
                'tahun_awal' => '2025',
                'tahun_akhir' => '2026',
                'jns_smt' => 1,
                'set_aktif' => 0,
                'biku_tagih_jenis' => 3,
                'update_time' => now(),
                'update_id' => null,
                'update_host' => null,
                'added_time' => now(),
                'added_id' => null,
                'added_host' => null,
                'tgl_masuk' => null
            ]
        ]);
    }
}