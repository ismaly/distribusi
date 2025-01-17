<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    use HasFactory;
    protected $table = 'distribution';

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang');
    }
}
