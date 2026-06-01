<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $primaryKey = 'pelanggan_id';

    protected $fillable = [
        'nama',
        'no_hp',
        'alamat'
    ];

    // Relasi ke motor
    public function motor()
    {
        return $this->hasMany(Motor::class, 'pelanggan_id');
    }

    // Relasi ke servis
    public function servis()
    {
        return $this->hasMany(Servis::class, 'pelanggan_id');
    }
}