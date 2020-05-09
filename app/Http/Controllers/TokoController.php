<?php

namespace App\Http\Controllers;

use App\DetailTransaksi;
use App\Keranjang;
use App\Produk;
use App\RiwayatPelanggan;
use App\Toko;
use App\Transaksi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TokoController extends Controller
{
    public function loginIndex(){
        if(!Session::get('loginToko')){
            return view('toko/loginToko');
        }else{
            return redirect('/toko/dashboard');
        }
    }

    public function loginProses(Request $request){
        $email = $request->email;
        $password = $request->password;

        $toko = Toko::where('email', $email)->first();

        try{
            if($toko){
                if(Hash::check($password, $toko->password)){
                    Session::put('loginToko', true);
                    Session::put('namaToko', $toko->nama_toko);
                    Session::put('idToko', $toko->id_toko);
                    return redirect('/toko/dashboard')->with('alert-success', 'Anda berhasil login!');
                }else{
                    return redirect('/toko/login')->with('alert-danger', 'Password yang anda masukkan salah!');
                }
            }else{
                return redirect('/toko/login')->with('alert-danger', 'Email yang anda masukkan salah!');
            }
        }catch(Exception $e){
            return redirect('/toko/login')->with('alert-danger', 'Terjadi kesalahan! : '.$e.'');
        }
    }

    public function dashboard(){
        if(!Session::get('loginToko')){
            return redirect('/toko/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $id_toko = Session::get('idToko');
            $pelanggan_count = RiwayatPelanggan::where('id_toko', $id_toko)->get()->count();
            $produk_count = Produk::where('id_toko', $id_toko)->get()->count();
            $transaksi_count = Transaksi::where('id_toko', $id_toko)->get()->count();
            $keranjang_count = Keranjang::get()->count();
            return view('toko/dashboardToko', compact('pelanggan_count', 'produk_count', 'transaksi_count', 'keranjang_count'));
        }
    }

    public function logOut(){
        if(!Session::get('loginToko')){
            return redirect('/toko/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            Session::forget('loginToko');
            return redirect('/toko/login')->with('alert-success', 'Anda sudah logout!');
        }
    }

    public function riwayatPelanggan(){
        if(!Session::get('loginToko')){
            return redirect('/toko/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $riwayat = RiwayatPelanggan::where('id_toko', Session::get('idToko'))->orderBy('created_at', 'desc')->get();
            return view('toko/riwayatPelanggan', compact('riwayat'));
        }
    }

    public function hapusRiwayatPelanggan(Request $request){
        if(!Session::get('loginToko')){
            return redirect('/toko/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $riwayat = RiwayatPelanggan::findOrFail($request->id_riwayat_pelanggan);
            $riwayat->delete($riwayat);
            return redirect('/toko/riwayatPelanggan')->with('alert-success', 'Riwayat sudah dihapus!');;
        }
    }

    public function riwayatTransaksi(){
        if(!Session::get('loginToko')){
            return redirect('/toko/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $transaksi = Transaksi::orderBy('created_at', 'desc')->get();
            $detail = DetailTransaksi::get();
            return view('toko/riwayatTransaksi', compact('transaksi', 'detail'));
        }
    }

    public function hapusRiwayatTransaksi(Request $request){
        if(!Session::get('loginToko')){
            return redirect('/toko/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $riwayat = Transaksi::findOrFail($request->id_transaksi);
            $riwayat->delete($riwayat);
            return redirect('/toko/riwayatPelanggan')->with('alert-success', 'Riwayat sudah dihapus!');;
        }
    }
}
