@extends('toko/master/masterToko')

@section('title', 'Riwayat Transaksi')

@section('content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Riwayat Transaksi</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/toko/riwayatTransaksi">Riwayat Transaksi</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <!-- Modal Detail Transaksi -->

                                <div class="modal fade" id="detailTransaksi" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Detail Transaksi</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- <div id="detail">

                                                </div> --}}


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <!-- Modal Hapus Riwayat Transaksi -->

                                 <div class="modal fade" id="hapusRiwayat" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Riwayat Transaksi</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Apakah anda yakin?</h5>
                                                <form action="/toko/riwayatTransaksi/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}
                                                    <div class="row form-group" hidden>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="id_riwayat_transaksi" name="id_riwayat_transaksi" class="form-control" readonly required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Transaksi</th>
                                                <th>Pelanggan</th>
                                                <th>Time</th>
                                                <th>Total Tagihan</th>
                                                <th>Diterima</th>
                                                <th>Kembalian</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transaksi as $key => $trs)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$trs->id_transaksi}}</td>
                                                <td>{{$trs->pelanggan->nama_pelanggan}}</td>
                                                <td>{{$trs->created_at}}</td>
                                                <td>Rp.{{$trs->total_tagihan}}</td>
                                                <td>Rp.{{$trs->diterima}}</td>
                                                <td>Rp.{{$trs->kembalian}}</td>
                                                <td>
                                                    @if($trs->status == 1)
                                                        Lunas
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        data-target="#detailTransaksi"
                                                        data-toggle="modal"
                                                        data-id_transaksi ="{{$trs->id_transaksi}}"
                                                        data-nama_pelanggan ="{{$trs->pelanggan->nama_pelanggan}}"
                                                        data-waktu_transaksi ="{{$trs->created_at}}"
                                                        data-total_tagihan ="{{$trs->total_tagihan}}"
                                                        data-diterima ="{{$trs->diterima}}"
                                                        data-kembalian ="{{$trs->kembalian}}"
                                                        data-alamat_toko ="{{$trs->toko->alamat}}"
                                                        >
                                                        <i class="fa fa-info"></i>&nbsp;
                                                            Detail Transaksi
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-target="#hapusRiwayat"
                                                        data-toggle="modal"
                                                        data-id_transaksi ="{{$trs->id_transaksi}}"
                                                        >
                                                        <i class="fa fa-trash"></i>&nbsp;
                                                            Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

@push('script')
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#detailTransaksi').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_transaksi = button.data('id_transaksi');
            var nama_pelanggan = button.data('nama_pelanggan');
            var waktu_transaksi = button.data('waktu_transaksi');
            var total_tagihan = button.data('total_tagihan');
            var diterima = button.data('diterima');
            var kembalian = button.data('kembalian');
            var alamat_toko = button.data('alamat_toko');

            console.log(id_transaksi);
            var modal = $(this);
            modal.find('.modal-body').html(`
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>Transaksi</b><span class="pull-right"> #`+id_transaksi+`</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">{{Session::get('namaToko')}}</b></h3>
                                            <p class="text-muted m-l-5">
                                                `+alamat_toko+`
                                            </p>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>To,</h3>
                                            <h4 class="font-bold">`+nama_pelanggan+`</h4>
                                            <p><b>Tanggal Transaksi : </b>`+waktu_transaksi+`</p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th>Produk</th>
                                                    <th class="text-right">Kuantitas</th>
                                                    <th class="text-right">Harga</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            @foreach($detail as $key=>$det)
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">{{++$key}}</td>
                                                    <td>{{$det->keranjang->produk->nama_produk}}</td>
                                                    <td class="text-right">{{$det->keranjang->kuantitas}}</td>
                                                    <td class="text-right">Rp.{{$det->keranjang->produk->harga}}</td>
                                                    <td class="text-right">Rp.{{$det->keranjang->produk->harga*$det->keranjang->kuantitas}}</td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <hr>
                                        <h3><b>Total : </b>Rp.`+total_tagihan+`</h3>
                                        <hr>
                                        <p>Diterima : Rp.`+diterima+`</p>
                                        <p>Kembalian : RP.`+kembalian+`</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            `);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#hapusProduk').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_produk = button.data('id_produk');
            var modal = $(this);
            modal.find('.modal-body #id_produk').val(id_produk);
        });
    });
</script>
@endpush
@endsection
