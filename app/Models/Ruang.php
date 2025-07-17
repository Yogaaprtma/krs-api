<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nama2',
        'id_jenis_makul',
        'id_fakultas',
        'kapasitas',
        'kap_ujian',
        'status',
        'luas',
        'kondisi',
        'jumlah'
    ];

    public function jadwalTawarsRuang1()
    {
        return $this->hasMany(JadwalTawar::class, 'id_ruang1', 'id');
    }

    public function jadwalTawarsRuang2()
    {
        return $this->hasMany(JadwalTawar::class, 'id_ruang2', 'id');
    }

    public function jadwalTawarsRuang3()
    {
        return $this->hasMany(JadwalTawar::class, 'id_ruang3', 'id');
    }
}