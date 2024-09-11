<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriBeasiswa;

class Beasiswa extends Model
{
    use HasFactory;

    protected $table = 'beasiswas';
    protected $fillable = [
        'nama',
        'alamat',
        'user_id',
        'email',
        'no_hp',
        'semester',
        'ipk',
        'jenis_beasiswa',
        'file',
        'status_ajuan',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBeasiswa::class, 'jenis_beasiswa', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
