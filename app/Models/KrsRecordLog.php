<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KrsRecordLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_krs', 
        'nim_dinus', 
        'kdmk', 
        'aksi', 
        'id_jadwal', 
        'ip_addr', 
    ];

    public function krsRecord()
    {
        return $this->belongsTo(KrsRecord::class, 'id_krs', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaDinus::class, 'nim_dinus', 'nim_dinus');
    }

    public function matkulKurikulum()
    {
        return $this->belongsTo(MatkulKurikulum::class, 'kdmk', 'kdmk');
    }
}