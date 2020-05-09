<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatPelanggan extends Model
{
    protected $table = 'riwayat_pelanggan';

    protected $primaryKey = 'id_riwayat_pelanggan';

    protected $fillable = ['id_pelanggan', 'id_toko'];

    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan', 'id_pelanggan');
    }

    public function toko()
    {
        return $this->belongsTo('App\Toko', 'id_toko');
    }
}
