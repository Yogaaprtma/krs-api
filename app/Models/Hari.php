<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'nama',
        'nama_en'
    ];

    public function jadwalTawarsHari1()
    {
        return $this->hasMany(JadwalTawar::class, 'id_hari1', 'id');
    }

    public function jadwalTawarsHari2()
    {
        return $this->hasMany(JadwalTawar::class, 'id_hari2', 'id');
    }

    public function jadwalTawarsHari3()
    {
        return $this->hasMany(JadwalTawar::class, 'id_hari3', 'id');
    }
}