<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mekanik extends Model
{
    protected $table = 'mekanik';

    protected $primaryKey = 'mekanik_id';

    protected $fillable = [
        'nama',
        'no_hp',
        'alamat'
    ];

    // Relasi ke servis
    public function servis()
    {
        return $this->hasMany(Servis::class, 'mekanik_id');
    }
}