<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesiKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'jam',
        'sks',
        'jam_mulai',
        'jam_selesai',
        'status'
    ];

    public function jadwalTawarsSesi1()
    {
        return $this->hasMany(JadwalTawar::class, 'id_sesi1', 'id');
    }

    public function jadwalTawarsSesi2()
    {
        return $this->hasMany(JadwalTawar::class, 'id_sesi2', 'id');
    }

    public function jadwalTawarsSesi3()
    {
        return $this->hasMany(JadwalTawar::class, 'id_sesi3', 'id');
    }
}