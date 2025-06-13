<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanKuesioner extends Model
{
    protected $fillable = [
        'user_id',
        'nama_perusahaan',
        'posisi',
        'lokasi',
        'tanggal_mulai',
        'tanggal_berakhir',
    ];
    
    public function pertanyaan()
    {
        return $this->belongsTo(\App\Models\Pertanyaan::class);
    }

}

