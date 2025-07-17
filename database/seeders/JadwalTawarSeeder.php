<?php

namespace Database\Seeders;

use App\Models\JadwalTawar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalTawarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JadwalTawar::insert([
            [
                'id' => 1,
                'ta' => '20232',
                'kdmk' => 'A11.44211',
                'klpk' => 'A11.4',
                'klpk_2' => null,
                'kdds' => 1947,
                'kdds2' => null,
                'jmax' => 20,
                'jsisa' => 10,
                'id_hari1' => 1,
                'id_hari2' => 2,
                'id_hari3' => 3,
                'id_sesi1' => 1,
                'id_sesi2' => 2,
                'id_sesi3' => 3,
                'id_ruang1' => 1,
                'id_ruang2' => 2,
                'id_ruang3' => 3,
                'jns_jam' => 3,
                'open_class' => 1
            ],
            [
                'id' => 2,
                'ta' => '20232',
                'kdmk' => 'A11.44212',
                'klpk' => 'A11.4',
                'klpk_2' => null,
                'kdds' => 1948,
                'kdds2' => null,
                'jmax' => 20,
                'jsisa' => 15,
                'id_hari1' => 2,
                'id_hari2' => 3,
                'id_hari3' => 4,
                'id_sesi1' => 2,
                'id_sesi2' => 3,
                'id_sesi3' => 4,
                'id_ruang1' => 2,
                'id_ruang2' => 3,
                'id_ruang3' => 4,
                'jns_jam' => 3,
                'open_class' => 1
            ],
            [
                'id' => 3,
                'ta' => '20232',
                'kdmk' => 'B12.6206',
                'klpk' => 'A11.4',
                'klpk_2' => null,
                'kdds' => 1949,
                'kdds2' => null,
                'jmax' => 20,
                'jsisa' => 12,
                'id_hari1' => 3,
                'id_hari2' => 4,
                'id_hari3' => 5,
                'id_sesi1' => 3,
                'id_sesi2' => 4,
                'id_sesi3' => 5,
                'id_ruang1' => 3,
                'id_ruang2' => 4,
                'id_ruang3' => 5,
                'jns_jam' => 3,
                'open_class' => 1
            ],
            [
                'id' => 4,
                'ta' => '20232',
                'kdmk' => 'B12.44214',
                'klpk' => 'B12.4',
                'klpk_2' => null,
                'kdds' => 1950,
                'kdds2' => null,
                'jmax' => 20,
                'jsisa' => 8,
                'id_hari1' => 1,
                'id_hari2' => 2,
                'id_hari3' => 3,
                'id_sesi1' => 1,
                'id_sesi2' => 2,
                'id_sesi3' => 3,
                'id_ruang1' => 1,
                'id_ruang2' => 2,
                'id_ruang3' => 3,
                'jns_jam' => 3,
                'open_class' => 1
            ],
            [
                'id' => 5,
                'ta' => '20232',
                'kdmk' => 'B12.44215',
                'klpk' => 'B12.4',
                'klpk_2' => null,
                'kdds' => 1951,
                'kdds2' => null,
                'jmax' => 20,
                'jsisa' => 10,
                'id_hari1' => 2,
                'id_hari2' => 3,
                'id_hari3' => 5,
                'id_sesi1' => 2,
                'id_sesi2' => 3,
                'id_sesi3' => 5,
                'id_ruang1' => 2,
                'id_ruang2' => 3,
                'id_ruang3' => 5,
                'jns_jam' => 3,
                'open_class' => 1
            ]
        ]);
    }
}