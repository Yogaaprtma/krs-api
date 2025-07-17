<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTawar extends Model
{
    use HasFactory;

    protected $fillable = [
        'ta',
        'kdmk',
        'klpk',
        'klpk_2',
        'kdds',
        'kdds2',
        'jmax',
        'jsisa',
        'id_hari1',
        'id_hari2',
        'id_hari3',
        'id_sesi1',
        'id_sesi2',
        'id_sesi3',
        'id_ruang1',
        'id_ruang2',
        'id_ruang3',
        'jns_jam',
        'open_class'
    ];

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'ta', 'kode');
    }

    public function matkulKurikulum()
    {
        return $this->belongsTo(MatkulKurikulum::class, 'kdmk', 'kdmk');
    }

    public function hari1()
    {
        return $this->belongsTo(Hari::class, 'id_hari1');
    }

    public function hari2()
    {
        return $this->belongsTo(Hari::class, 'id_hari2');
    }

    public function hari3()
    {
        return $this->belongsTo(Hari::class, 'id_hari3');
    }

    public function sesi1()
    {
        return $this->belongsTo(SesiKuliah::class, 'id_sesi1');
    }

    public function sesi2()
    {
        return $this->belongsTo(SesiKuliah::class, 'id_sesi2');
    }

    public function sesi3()
    {
        return $this->belongsTo(SesiKuliah::class, 'id_sesi3');
    }

    public function ruang1()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang1');
    }

    public function ruang2()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang2');
    }

    public function ruang3()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang3');
    }

    public function krsRecords()
    {
        return $this->hasMany(KrsRecord::class, 'id_jadwal', 'id');
    }
}