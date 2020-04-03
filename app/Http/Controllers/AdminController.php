<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Admin;
use App\Toko;
use App\KategoriProduk;
use Exception;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
    public function loginIndex(){
        if(!Session::get('loginAdmin')){
            return view('admin/loginAdmin');
        }else{
            return redirect('/admin/dashboard');
        }
    }

    public function loginPost(Request $request){
        $username = $request->username;
        $password = $request->password;

        $admin = Admin::where('username', $username)->first();

        try{
            if($admin){
                if(Hash::check($password, $admin->password)){
                    Session::put('loginAdmin', true);
                    Session::put('username', $username);
                    return redirect('/admin/dashboard')->with('alert-success', 'Anda berhasil login!');
                }else{
                    return redirect('/admin/login')->with('alert-danger', 'Password yang anda masukkan salah!');
                }
            }else{
                return redirect('/admin/login')->with('alert-danger', 'Username yang anda masukkan salah!');
            }
        }catch(Exception $e){
            return redirect('/admin/login')->with('alert-danger', 'Terjadi kesalahan! : '.$e.'');
        }
    }

    public function logOut(){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            Session::forget('loginAdmin');
            return redirect('/admin/dashboard')->with('alert-success', 'Anda berhasil logout!');
        }
    }

    public function dashboard(){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $toko_count = Toko::get()->count();
            return view('admin/dashboardAdmin', compact('toko_count'));
        }
    }

    public function kelolaToko(){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $toko = Toko::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaToko', compact('toko'));
        }
    }

    public function tambahToko(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $this->validate($request, [
                'id_toko' => '|unique:toko',
                'nama_toko' => '|unique:toko|max:50',
                'nama_pemilik' => '|max:50',
                'alamat' => '|max:255',
                'email' => '|unique:toko|email|max:30'
            ]);

            try{
                $password = str_random(6);
                $toko = new Toko();
                $toko->id_toko = $request->id_toko;
                $toko->nama_toko = $request->nama_toko;
                $toko->nama_pemilik = $request->nama_pemilik;
                $toko->alamat = $request->alamat;
                $toko->email = $request->email;
                $toko->password = $password;
                $toko->qr_toko = Crypt::encryptString($request->id_toko);

                Mail::send('admin/emailPemberitahuanAkun', ['nama_pemilik' => $request->nama_pemilik, 'nama_toko'=>$request->nama_toko, 'email'=>$request->email, 'password'=>$password], function ($message) use ($request)
                {
                    $message->subject('Informasi Akun Automated Self Market');
                    $message->from('harsoftdev@gmail.com', 'Automated Self Market (ASM) | Harsoft Inc.');
                    $message->to($request->email);
                });

                $toko->save();
                return redirect('/admin/kelolaToko')->with('alert-success', 'Toko berhasil ditambahkan!');
            }catch(Exception $e){
                return redirect('/admin/kelolaToko')->with('alert-danger', 'Terjadi kesalahan : '.$e.'');
            }
        }
    }

    public function ubahToko(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            try{
                $toko = Toko::findOrFail($request->id_toko);
                $toko->id_toko = $request->id_toko;
                $toko->nama_toko = $request->nama_toko;
                $toko->nama_pemilik = $request->nama_pemilik;
                $toko->alamat = $request->alamat;
                $toko->email = $request->email;
                $toko->save();
                return redirect('/admin/kelolaToko')->with('alert-success', 'Toko berhasil diubah!');
            }catch(Exception $e){
                return redirect('/admin/kelolaToko')->with('alert-danger', 'Terjadi kesalahan : '.$e.'');
            }
        }
    }

    public function hapusToko(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            try{
                $toko = Toko::findOrFail($request->id_toko);
                $toko->delete($toko);
                return redirect('/admin/kelolaToko')->with('alert-success', 'Toko berhasil dihapus!');
            }catch(Exception $e){
                return redirect('/admin/kelolaToko')->with('alert-danger', 'Terjadi kesalahan : '.$e.'');
            }
        }
    }

    public function qrToko($nama_toko){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $id_toko = Toko::where('nama_toko', $nama_toko)->value('id_toko');
            $qr = QrCode::format('png')
                        ->size(500)
                        ->generate($id_toko);
            return response($qr)->header('Content-type','image/png');
        }
    }

    public function kategoriProduk(){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $kategori = KategoriProduk::orderBy('created_at', 'desc')->get();
            return view('admin/kelolaKategoriProduk', compact('kategori'));
        }
    }

    public function tambahKategoriProduk(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            try{
                $this->validate($request, [
                    'kategori' => '|unique:kategori_produk'
                ]);

                $kategori = new KategoriProduk();
                $kategori->kategori = $request->kategori;
                $kategori->save();
                return redirect('/admin/kelolaKategoriProduk')->with('alert-success', 'Kategori berhasil ditambahkan!');
            }catch(Exception $e){
                return redirect('/admin/kelolaKategoriProduk')->with('alert-danger', 'Terjadi kesalahan : '.$e.'');
            }
        }
    }

    public function ubahKategoriProduk(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            try{
                $kategori = KategoriProduk::findOrFail($request->id_kategori_produk);
                $kategori->kategori = $request->kategori;
                $kategori->save();
                return redirect('/admin/kelolaKategoriProduk')->with('alert-success', 'Kategori berhasil diubah!');
            }catch(Exception $e){
                return redirect('/admin/kelolaKategoriProduk')->with('alert-danger', 'Terjadi kesalahan : '.$e.'');
            }
        }
    }

    public function hapusKategoriProduk(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            try{
                $kategori = KategoriProduk::findOrFail($request->id_kategori_produk);
                $kategori->delete($kategori);
                return redirect('/admin/kelolaKategoriProduk')->with('alert-success', 'Kategori berhasil dihapus!');
            }catch(Exception $e){
                return redirect('/admin/kelolaKategoriProduk')->with('alert-danger', 'Terjadi kesalahan : '.$e.'');
            }
        }
    }

    Public function gantiPassword(){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $username = Session::get('username');
            return view('admin/gantiPassword', compact('username'));
        }
    }

    public function gantiPasswordProses(Request $request){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert-danger', 'Anda harus login terlebih dahulu!');
        }else{
            $password_lama = $request->password_lama;
            $password_baru = $request->password_baru;
            $password_baru_ulang = $request->password_baru_ulang;

            $pass = Admin::where('username', $request->username)->value('password');

            if(Hash::check($password_lama, $pass)){
                if($password_baru == $password_baru_ulang){
                    $admin = Admin::findOrFail($request->username);
                    $admin->password = $password_baru;
                    $admin->save();
                    return redirect('/admin/dashboard')->with('alert-success', 'Password berhasil diubah!');
                }else{
                    return redirect('/admin/gantiPassword')->with('alert-danger', 'Password ulang tidak sama!');
                }
            }else{
                return redirect('/admin/gantiPassword')->with('alert-danger', 'Password lama yang anda masukkan salah!');
            }
        }
    }
}
