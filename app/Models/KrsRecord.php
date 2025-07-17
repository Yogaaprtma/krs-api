<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KrsRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'ta',
        'kdmk',
        'id_jadwal',
        'nim_dinus',
        'sts',
        'sks',
        'modul'
    ];

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'ta', 'kode');
    }

    public function matkulKurikulum()
    {
        return $this->belongsTo(MatkulKurikulum::class, 'kdmk', 'kdmk');
    }

    public function jadwalTawar()
    {
        return $this->belongsTo(JadwalTawar::class, 'id_jadwal');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaDinus::class, 'nim_dinus', 'nim_dinus');
    }

    public function krsRecordLogs()
    {
        return $this->hasMany(KrsRecordLog::class, 'id_krs', 'id');
    }
}