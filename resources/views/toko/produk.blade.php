@extends('toko/master/masterToko')

@section('title', 'Produk')

@section('content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Produk</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/toko/produk">Produk</a></li>
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
                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahProduk"><i class="fa fa-plus-square"></i>
                                    Tambah Produk
                                    </button>
                                </div>

                                <!-- Modal Tambah Produk -->

                                <div class="modal fade" id="tambahProduk" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Produk</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/toko/produk/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">

                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">ID Produk</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                        <input type="text" id="id_produk" name="id_produk" class="form-control" value="{{uniqid("PROD-", false)}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Produk</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_produk" name="nama_produk" placeholder="Masukkan nama produk" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Kategori Produk</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select class="form-control" id="id_kategori_produk" name="id_kategori_produk" style="width:100%" required>
                                                                <option>--- Pilih Kategori Produk ---</option>
                                                                @foreach ($kategori as $kat)
                                                                <option value="{{$kat->id_kategori_produk}}">{{$kat->kategori}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Harga</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="harga" name="harga" placeholder="Masukkan harga produk" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Stok</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="stok" name="stok" placeholder="Masukkan stok produk" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Ubah Produk -->

                                <div class="modal fade" id="ubahProduk" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Toko</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/toko/produk/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">

                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">ID Produk</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                        <input type="text" id="id_produk" name="id_produk" class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Produk</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_produk" name="nama_produk" placeholder="Masukkan nama produk" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Kategori Produk</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select class="form-control" id="id_kategori_produk" name="id_kategori_produk" style="width:100%" required>
                                                                <option>--- Pilih Kategori Produk ---</option>
                                                                @foreach ($kategori as $kat)
                                                                <option value="{{$kat->id_kategori_produk}}">{{$kat->kategori}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Harga</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="harga" name="harga" placeholder="Masukkan harga produk" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Stok</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="stok" name="stok" placeholder="Masukkan stok produk" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <!-- Modal Hapus Produk -->

                                 <div class="modal fade" id="hapusProduk" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Toko</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Apakah anda yakin?</h5>
                                                <form action="/toko/produk/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}
                                                    <div class="row form-group" hidden>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="id_produk" name="id_produk" class="form-control" readonly required>
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
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>QR Produk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($produk as $key => $prod)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$prod->nama_produk}}</td>
                                                <td>{{$prod->kategoriProduk->kategori}}</td>
                                                <td>{{$prod->harga}}</td>
                                                <td>{{$prod->stok}}</td>
                                                <td>
                                                    <a href="/toko/produk/qr-code/{{$prod->id_produk}}" target="_blank">
                                                        <i class="fa fa-qrcode"></i>&nbsp;
                                                    </a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-target="#ubahProduk"
                                                        data-toggle="modal"
                                                        data-id_produk ="{{$prod->id_produk}}"
                                                        data-nama_produk ="{{$prod->nama_produk}}"
                                                        data-id_kategori ="{{$prod->id_kategori_produk}}"
                                                        data-harga ="{{$prod->harga}}"
                                                        data-stok ="{{$prod->stok}}"
                                                        >
                                                        <i class="fa fa-edit"></i>&nbsp;
                                                            Ubah
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-target="#hapusProduk"
                                                        data-toggle="modal"
                                                        data-id_produk ="{{$prod->id_produk}}"
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

<script>
    $('.js-example-basic-single').select2({
        theme: "classic",
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#ubahProduk').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_produk = button.data('id_produk');
            var nama_produk = button.data('nama_produk');
            var id_kategori = button.data('id_kategori');
            var harga = button.data('harga');
            var stok = button.data('stok');
            var modal = $(this);
            modal.find('.modal-body #id_produk').val(id_produk);
            modal.find('.modal-body #nama_produk').val(nama_produk);
            modal.find('.modal-body #id_kategori_produk').val(id_kategori);
            modal.find('.modal-body #harga').val(harga);
            modal.find('.modal-body #stok').val(stok);
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
