<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'tahun_awal',
        'tahun_akhir',
        'jns_smt',
        'set_aktif',
        'biku_tagih_jenis',
        'update_time', 
        'update_id',
        'update_host',
        'added_time',
        'added_id',
        'added_host',
        'tgl_masuk'
    ];

    public function jadwalTawars()
    {
        return $this->hasMany(JadwalTawar::class, 'ta', 'kode');
    }

    public function krsRecords()
    {
        return $this->hasMany(KrsRecord::class, 'ta', 'kode');
    }

    public function validasiKrsMhs()
    {
        return $this->hasMany(ValidasiKrsMhs::class, 'ta', 'kode');
    }

    public function ipSemesters()
    {
        return $this->hasMany(IpSemester::class, 'ta', 'kode');
    }
}