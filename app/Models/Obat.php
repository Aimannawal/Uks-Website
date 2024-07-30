<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_obat',
        'foto_obat',
        'deskripsi_obat',
        'stok',
        'tanggal_kadaluarsa',
    ];

    public function riwayats()
    {
        return $this->hasMany(Riwayat::class);
    }

    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
