<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_perusahaan',
        'posisi',
        'lokasi',
        'tanggal_mulai',
        'tanggal_berakhir'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
