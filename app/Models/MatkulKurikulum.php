<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatkulKurikulum extends Model
{
    use HasFactory;

    protected $fillable = [
        'kdmk',
        'nmmk',
        'nmen',
        'tp',
        'sks',
        'sks_t',
        'sks_p',
        'smt',
        'jns_smt',
        'aktif',
        'kur_nama',
        'kelompok_makul',
        'kur_aktif',
        'jenis_matkul'
    ];

    public function jadwalTawars()
    {
        return $this->hasMany(JadwalTawar::class, 'kdmk', 'kdmk');
    }

    public function krsRecords()
    {
        return $this->hasMany(KrsRecord::class, 'kdmk', 'kdmk');
    }

    public function daftarNilais()
    {
        return $this->hasMany(DaftarNilai::class, 'kdmk', 'kdmk');
    }

    public function krsRecordLogs()
    {
        return $this->hasMany(KrsRecordLog::class, 'kdmk', 'kdmk');
    }
}