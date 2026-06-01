<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    protected $table = 'servis';

    protected $primaryKey = 'servis_id';

    protected $fillable = [
        'pelanggan_id',
        'motor_id',
        'mekanik_id',
        'tanggal_servis',
        'keluhan',
        'biaya_jasa',
        'total_sparepart',
        'grand_total',
        'status'
    ];

    // Relasi ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    // Relasi ke motor
    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_id');
    }

    // Relasi ke mekanik
    public function mekanik()
    {
        return $this->belongsTo(Mekanik::class, 'mekanik_id');
    }

    // Relasi ke detail servis
    public function detailServis()
{
    return $this->hasMany(DetailServis::class, 'servis_id', 'servis_id');
}
}