<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RiwayatPekerjaan;
use App\Models\JawabanKuesioner;

class Alumni extends Model
{
    protected $fillable = [
        'nama',
        'foto',
        'nim',
        'prodi',
        'tahun_lulus',
        'email',
        'no_hp',
    ];

    public function pekerjaan()
    {
        return $this->hasOne(RiwayatPekerjaan::class);
    }

    public function jawaban()
    {
        return $this->hasMany(JawabanKuesioner::class);
    }
}
