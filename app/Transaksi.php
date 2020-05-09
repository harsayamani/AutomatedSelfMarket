<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $fillable = ['id_transaksi', 'total_tagihan', 'diterima', 'kembalian', 'id_pelanggan', 'id_toko', 'status'];

    public $incrementing = false;

    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan', 'id_pelanggan');
    }

    public function toko()
    {
        return $this->belongsTo('App\Toko', 'id_toko');
    }

    public function detailTransaksi() {
        return $this->hasMany('App\DetailTransaksi', 'id_transaksi');
    }
}
