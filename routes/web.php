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

Route::get('/', function () {
    return view('welcome');
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

