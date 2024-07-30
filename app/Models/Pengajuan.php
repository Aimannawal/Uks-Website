<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'keterangan',
        'obat_id',
        'kelas',
    ];
    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
