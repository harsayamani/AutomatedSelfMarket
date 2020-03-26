<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'toko';

    protected $primaryKey = 'id_toko';

    protected $fillable = ['id_toko', 'nama_toko', 'alamat', 'nama_pemilik', 'email', 'password', 'qr_toko'];

    public $incrementing = false;

    public function produk() {
        return $this->hasMany('App\Produk', 'id_toko');
    }

    public function riwayatPelanggan() {
        return $this->hasMany('App\RiwayatPelanggan', 'id_toko');
    }
}
