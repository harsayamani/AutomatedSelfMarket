<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = ['id_produk', 'nama_produk', 'id_kategori_produk', 'harga', 'stok', 'id_toko'];

    public $incrementing = false;

    public function kategoriProduk()
    {
        return $this->belongsTo('App\KategoriProduk', 'id_kategori_produk');
    }

    public function toko()
    {
        return $this->belongsTo('App\Toko', 'id_toko');
    }

    public function keranjang() {
        return $this->hasMany('App\Keranjang', 'id_produk');
    }
}
