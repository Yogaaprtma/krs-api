<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TahunAjaranSeeder::class,
            MahasiswaDinusSeeder::class,
            MatkulKurikulumSeeder::class,
            HariSeeder::class,
            SesiKuliahSeeder::class,
            RuangSeeder::class,
            JadwalTawarSeeder::class,
            KrsRecordSeeder::class,
            DaftarNilaiSeeder::class,
            ValidasiKrsMhsSeeder::class,
            IpSemesterSeeder::class,
            KrsRecordLogSeeder::class,
            SesiKuliahBentrokSeeder::class,
        ]);
    }
}