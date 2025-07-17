<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidasiKrsMhs extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim_dinus', 
        'job_date', 
        'job_host', 
        'job_agent', 
        'ta'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaDinus::class, 'nim_dinus', 'nim_dinus');
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'ta', 'kode');
    }
}