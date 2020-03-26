<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Admin;
use App\Toko;
use Exception;
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
                'email' => '|unique:toko|max:30'
            ]);

            try{
                $toko = new Toko();
                $toko->id_toko = $request->id_toko;
                $toko->nama_toko = $request->nama_toko;
                $toko->nama_pemilik = $request->nama_pemilik;
                $toko->alamat = $request->alamat;
                $toko->email = $request->email;
                $toko->password = Hash::make($request->password);
                $toko->qr_toko = Crypt::encryptString($request->id_toko);
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
}
