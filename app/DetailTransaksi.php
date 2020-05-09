<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    protected $primaryKey = 'id_detail_transaksi';

    protected $fillable = ['id_transaksi', 'id_keranjang'];

    public $incrementing = false;

    public function keranjang()
    {
        return $this->belongsTo('App\Keranjang', 'id_keranjang');
    }

    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi', 'id_transaksi');
    }

}
