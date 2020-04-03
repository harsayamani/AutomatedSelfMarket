@extends('admin/master/masterAdmin')

@section('title', 'Kelola Kategori Produk')

@section('content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Kelola Kategori Produk</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin/kelolaKategoriProduk">Kelola Kategori Produk</a></li>
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
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahKategori"><i class="fa fa-plus-square"></i>
                                    Tambah Kategori Produk
                                    </button>
                                </div>

                                <!-- Modal Tambah Kategori Produk -->

                                <div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Kategori</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/kelolaKategoriProduk/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">

                                                    {{ csrf_field()}}

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Kategori</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kategori" name="kategori" placeholder="Masukkan nama kategori produk" class="form-control" required>
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

                                <!-- Modal Ubah Kategori Produk -->
                                <div class="modal fade" id="ubahKategori" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Kategori</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/kelolaKategoriProduk/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">

                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">ID Kategori</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="id_kategori_produk" name="id_kategori_produk" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Kategori</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kategori" name="kategori" placeholder="Masukkan nama kategori produk" class="form-control" required>
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

                                 <!-- Modal Hapus Kategori Produk -->

                                 <div class="modal fade" id="hapusKategori" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Kategori Produk</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Apakah anda yakin?</h5>
                                                <form action="/admin/kelolaKategoriProduk/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}
                                                    <div class="row form-group" hidden>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="id_kategori_produk" name="id_kategori_produk" class="form-control" readonly required>
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
                                                <th>Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kategori as $key => $kat)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$kat->kategori}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-target="#ubahKategori"
                                                        data-toggle="modal"
                                                        data-id_kategori_produk ="{{$kat->id_kategori_produk}}"
                                                        data-kategori ="{{$kat->kategori}}"
                                                        >
                                                        <i class="fa fa-edit"></i>&nbsp;
                                                            Ubah
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-target="#hapusKategori"
                                                        data-toggle="modal"
                                                        data-id_kategori_produk ="{{$kat->id_kategori_produk}}"
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#ubahKategori').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_kategori_produk = button.data('id_kategori_produk');
            var kategori = button.data('kategori');
            var modal = $(this);
            modal.find('.modal-body #id_kategori_produk').val(id_kategori_produk);
            modal.find('.modal-body #kategori').val(kategori);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#hapusKategori').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_kategori_produk = button.data('id_kategori_produk');
            var modal = $(this);
            modal.find('.modal-body #id_kategori_produk').val(id_kategori_produk);
        });
    });
</script>
@endpush
@endsection
