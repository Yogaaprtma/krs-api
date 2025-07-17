<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpSemester extends Model
{
    use HasFactory;

    protected $fillable = [
        'ta', 
        'nim_dinus', 
        'sks', 
        'ips', 
        'last_update'
    ];

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'ta', 'kode');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaDinus::class, 'nim_dinus', 'nim_dinus');
    }
}