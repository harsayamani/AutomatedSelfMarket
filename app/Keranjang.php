<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    protected $primaryKey = 'id_keranjang';

    protected $fillable = ['id_produk', 'id_pelanggan', 'kuantitas', 'status', 'harga_update'];

    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan', 'id_pelanggan');
    }

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'id_produk');
    }

    public function detailTransaksi() {
        return $this->hasMany('App\DetailTransaksi', 'id_keranjang');
    }
}
