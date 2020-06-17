<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return redirect('/admin/login');
});

Route::get('/admin/login', 'AdminController@loginIndex');

Route::post('/admin/login/proses', 'AdminController@loginPost');

Route::get('/admin/logout', 'AdminController@logOut');

Route::get('/admin/dashboard', 'AdminController@dashboard');

Route::get('/admin/kelolaToko', 'AdminController@kelolaToko');

Route::post('/admin/kelolaToko/tambah', 'AdminController@tambahToko');

Route::post('/admin/kelolaToko/ubah', 'AdminController@ubahToko');

Route::post('/admin/kelolaToko/hapus', 'AdminController@hapusToko');

Route::get('/admin/kelolaToko/qr-code/{nama_toko}', 'AdminController@qrToko');

Route::get('/admin/kelolaKategoriProduk', 'AdminController@kategoriProduk');

Route::post('/admin/kelolaKategoriProduk/tambah', 'AdminController@tambahKategoriProduk');

Route::post('/admin/kelolaKategoriProduk/ubah', 'AdminController@ubahKategoriProduk');

Route::post('/admin/kelolaKategoriProduk/hapus', 'AdminController@hapusKategoriProduk');

Route::get('/admin/gantiPassword', 'AdminController@gantiPassword');

Route::post('/admin/gantiPassword/proses', 'AdminController@gantiPasswordProses');

//Route Toko

Route::get('/toko', function () {
    return redirect('/toko/login');
});

Route::get('/toko/login', 'TokoController@loginIndex');

Route::post('/toko/login/proses', 'TokoController@loginProses');

Route::get('/toko/logout', 'TokoController@logOut');

Route::get('/toko/dashboard', 'TokoController@dashboard');

Route::get('/toko/produk', 'ProdukController@produk');

Route::post('/toko/produk/tambah', 'ProdukController@tambahProduk');

Route::post('/toko/produk/ubah', 'ProdukController@ubahProduk');

Route::post('/toko/produk/hapus', 'ProdukController@hapusProduk');

Route::get('/toko/produk/qr-code/{id_produk}', 'ProdukController@qrProduk');

Route::get('/toko/riwayatPelanggan', 'TokoController@riwayatPelanggan');

Route::post('/toko/riwayatPelanggan/hapus', 'TokoController@hapusRiwayatPelanggan');

Route::get('/toko/riwayatTransaksi', 'TokoController@riwayatTransaksi');

Route::post('/toko/riwayatTransaksi/hapus', 'TokoController@hapusRiwayatTransaksi');

Route::get('/toko/gantiPassword/{id_toko}', 'TokoController@gantiPasswordIndex');

Route::post('/toko/gantiPassword/proses', 'TokoController@gantiPasswordProses');

Route::post('/toko/ajax-keranjang', 'TokoController@ajaxKeranjang');

Route::get('/toko/profil/{id_toko}', 'TokoController@profilIndex');

Route::post('/toko/profil/{id_toko}/ubah', 'TokoController@ubahProfil');


//api

Route::post('/api/tambahPelanggan', 'ApiController@tambahPelanggan');

Route::post('/api/loginToko', 'ApiController@loginToko');

Route::post('/api/getRiwayatToko', 'ApiController@riwayatToko');

Route::post('/api/getTransaksi', 'ApiController@getTransaksi');

Route::post('/api/getProduk', 'ApiController@getProduk');

Route::post('/api/tambahKeranjang', 'ApiController@tambahKeranjang');

Route::post('/api/transaksi/proses', 'ApiController@prosesTransaksi');

Route::post('/api/transaksi/selesai', 'ApiController@transaksiSelesai');

Route::get('/api/test', 'ApiController@test');

Route::post('/api/detailTransaksi', 'ApiController@detailTransaksi');
