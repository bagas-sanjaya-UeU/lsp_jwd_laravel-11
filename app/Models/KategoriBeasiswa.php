<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'kategori_beasiswas';
    protected $fillable = [
        'nama_kategori',
    ];

    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class, 'jenis_beasiswa');
    }
}
