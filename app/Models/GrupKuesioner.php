<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupKuesioner extends Model
{
    protected $fillable = [
        'nama_grup',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class);
    }
}
