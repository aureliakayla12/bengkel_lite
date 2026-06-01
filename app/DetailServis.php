<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailServis extends Model
{
    protected $table = 'detail_servis';

    protected $primaryKey = 'detail_servis_id';

    protected $fillable = [
        'servis_id',
        'sparepart_id',
        'qty',
        'harga',
        'subtotal'
    ];

    // Relasi ke servis
    public function servis()
    {
        return $this->belongsTo(Servis::class, 'servis_id', 'servis_id');
    }

    // Relasi ke sparepart
    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'sparepart_id');
    }
}