<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    public function getNameAttribute()
    {
        return $this->attributes['nama_jur'];
    }

    protected $fillable = [
        'kode_jur',
        'nama_jur',
    ];
}
