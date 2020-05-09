<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $primaryKey = 'id_pelanggan';

    protected $fillable = ['id_pelanggan', 'nama_pelanggan', 'alamat'];

    public $incrementing = false;

    protected $guarded = array();

    public function keranjang() {
        return $this->hasMany('App\Keranjang', 'id_pelanggan');
    }

    public function riwayatPelanggan() {
        return $this->hasMany('App\RiwayatPelanggan', 'id_pelanggan');
    }

    public function transaksi() {
        return $this->hasMany('App\Transaksi', 'id_pelanggan');
    }
}
