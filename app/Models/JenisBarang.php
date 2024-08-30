<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;
    protected $table = 'jenis_barang';

    public function distributions()
    {
        return $this->hasMany(Distribution::class, 'jenis_barang');
    }
}
