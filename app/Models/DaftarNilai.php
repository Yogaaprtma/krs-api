<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarNilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim_dinus',
        'kdmk',
        'nl',
        'hide'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaDinus::class, 'nim_dinus', 'nim_dinus');
    }

    public function matkulKurikulum()
    {
        return $this->belongsTo(MatkulKurikulum::class, 'kdmk', 'kdmk');
    }
}