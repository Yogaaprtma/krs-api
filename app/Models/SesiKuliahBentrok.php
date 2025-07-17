<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesiKuliahBentrok extends Model
{
    use HasFactory;

    protected $primaryKey = ['id', 'id_bentrok'];
    public $incrementing = false;

    protected $fillable = [
        'id', 
        'id_bentrok'
    ];

    public function sesiKuliah()
    {
        return $this->belongsTo(SesiKuliah::class, 'id');
    }

    public function sesiKuliahBentrok()
    {
        return $this->belongsTo(SesiKuliah::class, 'id_bentrok');
    }
}