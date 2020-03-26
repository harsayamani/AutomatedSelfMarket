<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->string('id_produk')->primary();
            $table->string('nama_produk');
            $table->unsignedInteger('id_kategori_produk');
            $table->foreign('id_kategori_produk')->references('id_kategori_produk')->on('kategori_produk');
            $table->bigInteger('harga');
            $table->integer('stok');
            $table->string('id_toko');
            $table->foreign('id_toko')->references('id_toko')->on('toko');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
