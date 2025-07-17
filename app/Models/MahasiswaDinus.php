<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class MahasiswaDinus extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'nim_dinus',
        'ta_masuk',
        'prodi',
        'pass_mhs',
        'kelas', 
        'akdm_stat'
    ];

    public function krsRecords()
    {
        return $this->hasMany(KrsRecord::class, 'nim_dinus', 'nim_dinus');
    }

    public function daftarNilais()
    {
        return $this->hasMany(DaftarNilai::class, 'nim_dinus', 'nim_dinus');
    }

    public function validasiKrsMhs()
    {
        return $this->hasMany(ValidasiKrsMhs::class, 'nim_dinus', 'nim_dinus');
    }

    public function ipSemesters()
    {
        return $this->hasMany(IpSemester::class, 'nim_dinus', 'nim_dinus');
    }

    public function krsRecordLogs()
    {
        return $this->hasMany(KrsRecordLog::class, 'nim_dinus', 'nim_dinus');
    }
}