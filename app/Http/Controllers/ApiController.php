<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\RiwayatPelanggan;
use App\Toko;
use App\Transaksi;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function tambahPelanggan(Request $request){
        $validatedData = $request->validate([
            'nama_pelanggan' => 'unique:pelanggan|max:255',
        ]);

        if($validatedData){
            $pelanggan = new Pelanggan();
            $pelanggan->id_pelanggan = uniqid("PEL-", false);
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
            $pelanggan->alamat = $request->alamat;

            if($pelanggan->save()){
                $customer = Pelanggan::where('nama_pelanggan', $request->nama_pelanggan)->get();
                return response()->json([
                    'status_code' => 0,
                    'message' => "Success!",
                    'data_pelanggan' => $customer
                ], 200);
            }else{
                return response()->json([
                    'status_code' => 1,
                    'message' => "Fail!",
                    'data_pelanggan' => null
                ], 200);
            }
        }else{
            return response()->json([
                'status_code' => 1,
                'message' => "Fail!",
                'data_pelanggan' => null
            ], 200);
        }
    }

    public function loginToko(Request $request){
        $id_toko = $request->id_toko;
        $id_pelanggan = $request->id_pelanggan;

        $riwayat = new RiwayatPelanggan();
        $riwayat->id_pelanggan = $id_pelanggan;
        $riwayat->id_toko = $id_toko;
        $riwayat->save();

        $find_toko = Toko::find($id_toko);

        if($find_toko){
            $toko = Toko::where('id_toko', $id_toko)->get();
            return response()->json([
                'status_code' => 0,
                'message' => "Login Toko Success!",
                'data_toko' => $toko
            ], 200);
        }else{
            return response()->json([
                'status_code' => 1,
                'message' => "Toko doesn't match!",
                'data_toko' => null
            ], 200);
        }
    }

    public function riwayatToko(Request $request){
        $id_pelanggan = $request->id_pelanggan;

        $riwayat = RiwayatPelanggan::where('id_pelanggan', $id_pelanggan)->get();

        if($riwayat){
            $toko = Toko::get();
            return response()->json([
                'status_code' => 0,
                'message' => "Success!",
                'data_riwayat' => $riwayat,
                'data_toko' => $toko
            ], 200);
        }else{
            return response()->json([
                'status_code' => 0,
                'message' => "Fail!",
                'data_riwayat' => null,
                'data_toko' => null
            ], 200);
        }
    }

    public function getTransaksi(Request $request){
        $id_pelanggan = $request->id_pelanggan;

        $transaksi = Transaksi::where('id_pelanggan', $id_pelanggan)->get();

        if($transaksi){
            $toko = Toko::get();
            return response()->json([
                'status_code' => 0,
                'message' => "Success!",
                'data_transaksi' => $transaksi,
                'data_toko' => $toko
            ], 200);
        }else{
            return response()->json([
                'status_code' => 0,
                'message' => "Fail!",
                'data_transaksi' => null,
                'data_toko' => null
            ], 200);
        }
    }
}
