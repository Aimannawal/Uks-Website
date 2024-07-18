<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_siswa',
        'keterangan',
        'obat_id',
        'tanggal_kadaluarsa',
    ];
    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
