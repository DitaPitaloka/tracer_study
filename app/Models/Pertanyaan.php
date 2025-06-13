<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pertanyaan',
        'grup_kuesioner_id'
    ];
        public function grupKuesioner()
    {
        return $this->belongsTo(GrupKuesioner::class);
    }

}
