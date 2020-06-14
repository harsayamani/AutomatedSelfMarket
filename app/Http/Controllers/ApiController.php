<?php

namespace App\Http\Controllers;

use App\DetailTransaksi;
use App\KategoriProduk;
use App\Keranjang;
use App\Pelanggan;
use App\Produk;
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

        if($find_toko->count()>0){
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
                'status_code' => 1,
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
                'status_code' => 1,
                'message' => "Fail!",
                'data_transaksi' => null,
                'data_toko' => null
            ], 200);
        }
    }

    public function getProduk(Request $request){
        $produk = Produk::where('id_produk', $request->id_produk)->where('id_toko', $request->id_toko)->get();

        if($produk->count()>0){
            $kategori = KategoriProduk::get();
            return response()->json([
                'status_code' => 0,
                'message' => "Success!",
                'data_produk' => $produk,
                'data_kategori' => $kategori
            ], 200);
        }else{
            return response()->json([
                'status_code' => 1,
                'message' => "Fail!",
                'data_transaksi' => null,
                'data_toko' => null
            ], 200);
        }
    }

    public function tambahKeranjang(Request $request){
            $id_produk = $request->id_produk;
            $kuantitas = $request->kuantitas;
            $harga_update = $request->harga_update;
            $id_pelanggan = $request->id_pelanggan;
            $status = $request->status;

            $keranjang = new Keranjang();
            $keranjang->id_produk = $id_produk;
            $keranjang->kuantitas = $kuantitas;
            $keranjang->harga_update = $harga_update;
            $keranjang->id_pelanggan = $id_pelanggan;
            $keranjang->status = $status;
            $keranjang->save();

            return response()->json([
                'status_code' => 0,
                'message' => "Success!"
            ], 200);
    }

    public function prosesTransaksi(Request $request){
            $total_tagihan = $request->total_tagihan;
            $id_toko = $request->id_toko;
            $id_transaksi = random_int(1000000, 9999999);
            $id_pelanggan = $request->id_pelanggan;
            $diterima = 0;
            $kembalian = 0;
            $status = 0;

                $transaksi = new Transaksi();
                $transaksi->id_transaksi = $id_transaksi;
                $transaksi->total_tagihan = $total_tagihan;
                $transaksi->diterima = $diterima;
                $transaksi->kembalian = $kembalian;
                $transaksi->id_pelanggan = $id_pelanggan;
                $transaksi->id_toko = $id_toko;
                $transaksi->status = $status;
                $transaksi->save();

                $keranjang = Keranjang::where('status', 0)->where('id_pelanggan', $id_pelanggan)->get();

                foreach($keranjang as $ker){
                    $detail = new DetailTransaksi();
                    $detail->id_keranjang = $ker->id_keranjang;
                    $detail->id_transaksi = $id_transaksi;
                    $detail->save();
                }

                $alamat_toko = Toko::where('id_toko', $id_toko)->value('alamat');
                $nama_pelanggan = Pelanggan::where('id_pelanggan', $id_pelanggan)->value('nama_pelanggan');
                $tgl_transaksi = Transaksi::where('id_transaksi', $id_transaksi)->value('created_at');

                event(new \App\Events\TransaksiProses($keranjang, $id_transaksi, $alamat_toko, $nama_pelanggan, $total_tagihan, $tgl_transaksi));

                return response()->json([
                    'status_code' => 0,
                    'message' => "Transaksi diproses!"
                ], 200);

                // if($ev){
                //     return response()->json([
                //         'status_code' => 0,
                //         'message' => "Transaksi diproses!"
                //     ], 200);
                // }else{
                //     $det = DetailTransaksi::where('id_transaksi', $id_transaksi);
                //     $det->delete();
                //     $ker = Keranjang::where('status', 0)->where('id_pelanggan', $id_pelanggan);
                //     $ker->delete();
                //     $trans = Transaksi::findOrFail($id_transaksi);
                //     $trans->delete();
                //     return response()->json([
                //         'status_code' => 1,
                //         'message' => "Transaksi gagal!"
                //     ], 200);
                // }
    }

    public function transaksiSelesai(Request $request){
        $total_tagihan = Transaksi::where('id_transaksi', $request->id_transaksi)->value('total_tagihan');
        $diterima = $request->diterima;
        $kembalian = $diterima - $total_tagihan;

        $detail = DetailTransaksi::where('id_transaksi', $request->id_transaksi)->get();

        foreach($detail as $det){
            $keranjang = Keranjang::findOrFail($det->id_keranjang);
            $keranjang->status = 1;
            $keranjang->save();
        }

        $transaksi = Transaksi::findOrFail($request->id_transaksi);
        $transaksi->diterima = $diterima;
        $transaksi->kembalian = $kembalian;
        $transaksi->status = 1;

        if($transaksi->save()){
            event(new \App\Events\TransaksiSelesai("Transaksi Selesai!"));
            return redirect('/toko/dashboard')->with('alert-success', 'Transaksi Selesai!');
        }
    }

    public function test(){
        $ev = event(new \App\Events\TransaksiProses('sssss', 'fsfsfs', 'ffffff', 'dfdfdf', 'dsdsd', 'dsdsdsd'));

        dd($ev);
    }
}
