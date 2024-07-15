<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public function getNameAttribute()
    {
        return $this->attributes['nim'];
    }

    protected $fillable = [
        'nim',
        'nama',
        'id_jurusan',
        'alamat',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
