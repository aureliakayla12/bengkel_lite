<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $table = 'sparepart';

    protected $primaryKey = 'sparepart_id';

    protected $fillable = [
        'nama',
        'stok',
        'harga'
    ];

    // Relasi ke detail servis
    public function detailServis()
    {
        return $this->hasMany(DetailServis::class, 'sparepart_id');
    }
}