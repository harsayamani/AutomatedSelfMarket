<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    protected $table = 'kategori_produk';

    protected $primaryKey = 'id_kategori_produk';

    protected $fillable = ['id_kategori_produk', 'kategori'];
}
