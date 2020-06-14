<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TransaksiProses implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $detail;
    public $id_transaksi;
    public $alamat_toko;
    public $nama_pelanggan;
    public $total_tagihan;
    public $diterima;
    public $kembalian;
    public $tgl_transaksi;

    public function __construct($detail, $id_transaksi, $alamat_toko, $nama_pelanggan, $total_tagihan, $tgl_transaksi)
    {
        $this->detail = $detail;
        $this->id_transaksi = $id_transaksi;
        $this->alamat_toko = $alamat_toko;
        $this->nama_pelanggan = $nama_pelanggan;
        $this->total_tagihan = $total_tagihan;
        $this->tgl_transaksi = $tgl_transaksi;
    }

    public function broadcastOn()
    {
        return ['harsoft-channel'];
    }

    public function broadcastAs()
    {
        return 'transaksiproses-event';
    }
}
