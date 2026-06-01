<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'motor';

    protected $primaryKey = 'motor_id';

    protected $fillable = [
        'pelanggan_id',
        'nomor_plat',
        'merk',
        'tipe',
        'tahun'
    ];

    // Relasi ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    // Relasi ke servis
    public function servis()
    {
        return $this->hasMany(Servis::class, 'motor_id');
    }
}