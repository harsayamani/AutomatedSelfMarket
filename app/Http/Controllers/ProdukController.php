<?php

namespace App\Http\Controllers;

use App\KategoriProduk;
use App\Produk;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProdukController extends Controller
{
    public function produk(){
        if(!Session::get('loginToko')){
            return redirect('/toko/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $id_toko  = Session::get('idToko');
            $kategori = KategoriProduk::orderBy('created_at', 'desc')->get();
            $produk = Produk::where('id_toko', $id_toko)->orderBy('created_at', 'desc')->get();
            return view('toko/produk', compact('kategori', 'produk'));
        }
    }

    public function tambahProduk(Request $request){
        if(!Session::get('loginToko')){
            return redirect('/toko/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            try{
                $this->validate($request, [
                    'nama_produk' => '|unique:produk'
                ]);

                $produk = new Produk();
                $produk->id_produk = $request->id_produk;
                $produk->nama_produk = $request->nama_produk;
                $produk->id_kategori_produk = $request->id_kategori_produk;
                $produk->harga = $request->harga;
                $produk->stok = $request->stok;
                $produk->id_toko = Session::get('idToko');
                $produk->save();
                return redirect('/toko/produk')->with('alert-success', 'Produk berhasil ditambahkan!');
            }catch(Exception $e){
                return redirect('/toko/produk')->with('alert-danger', 'Terjadi kesalahan : '.$e.'');
            }
        }
    }

    public function ubahProduk(Request $request){
        if(!Session::get('loginToko')){
            return redirect('/toko/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            try{
                $produk = Produk::findOrFail($request->id_produk);
                $produk->id_produk = $request->id_produk;
                $produk->nama_produk = $request->nama_produk;
                $produk->id_kategori_produk = $request->id_kategori_produk;
                $produk->harga = $request->harga;
                $produk->stok = $request->stok;
                $produk->save();
                return redirect('/toko/produk')->with('alert-success', 'Produk berhasil diubah!');
            }catch(Exception $e){
                return redirect('/toko/produk')->with('alert-danger', 'Terjadi kesalahan : '.$e.'');
            }
        }
    }

    public function hapusProduk(Request $request){
        if(!Session::get('loginToko')){
            return redirect('/toko/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            try{
                $produk = Produk::findOrFail($request->id_produk);
                $produk->delete($produk);
                return redirect('/toko/produk')->with('alert-success', 'Produk berhasil dihapus!');
            }catch(Exception $e){
                return redirect('/toko/produk')->with('alert-danger', 'Terjadi kesalahan : '.$e.'');
            }
        }
    }

    public function qrProduk($id_produk){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $qr = QrCode::format('png')
                        ->size(500)
                        ->generate($id_produk);
            return response($qr)->header('Content-type','image/png');
        }
    }
}
