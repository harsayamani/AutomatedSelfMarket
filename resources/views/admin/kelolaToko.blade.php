@extends('admin/master/masterAdmin')

@section('title', 'Kelola Toko')

@section('content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Kelola Toko</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Kelola Toko</a></li>
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
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahToko"><i class="fa fa-plus-square"></i>
                                    Tambah Toko
                                    </button>
                                </div>

                                <!-- Modal Tambah Toko -->

                                <div class="modal fade" id="tambahToko" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Toko</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/kelolaToko/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">

                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">ID Toko</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                        <input type="text" id="id_toko" name="id_toko" class="form-control" value="{{str_random(20)}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Toko</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_toko" name="nama_toko" placeholder="Masukkan nama toko" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Pemilik</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan nama pemilik" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Alamat Toko</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="alamat" name="alamat" placeholder="Masukkan alamat toko lengkap" class="form-control" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Email</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="email" name="email" placeholder="Masukkan email" class="form-control" required>
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

                                <!-- Modal Ubah Toko -->
                                <div class="modal fade" id="ubahToko" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Toko</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/kelolaToko/ubah" method="post" enctype="multipart/form-data" class="form-horizontal">

                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">ID Toko</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                        <input type="text" id="id_toko" name="id_toko" class="form-control" value="{{str_random(20)}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Toko</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_toko" name="nama_toko" placeholder="Masukkan nama toko" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Pemilik</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan nama pemilik" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Alamat Toko</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="alamat" name="alamat" placeholder="Masukkan alamat toko lengkap" class="form-control" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Email</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="email" name="email" placeholder="Masukkan email" class="form-control" required>
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

                                 <!-- Modal Hapus Toko -->

                                 <div class="modal fade" id="hapusToko" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
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
                                                <form action="/admin/kelolaToko/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}
                                                    <div class="row form-group" hidden>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="id_toko" name="id_toko" class="form-control" readonly required>
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
                                                <th>Nama Toko</th>
                                                <th>Nama Pemilik</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>QR Toko</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($toko as $key => $tk)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$tk->nama_toko}}</td>
                                                <td>{{$tk->nama_pemilik}}</td>
                                                <td>{{$tk->email}}</td>
                                                <td>{{$tk->alamat}}</td>
                                                <td>
                                                    <a href="/admin/kelolaToko/qr-code/{{$tk->nama_toko}}">
                                                        <i class="fa fa-qrcode"></i>&nbsp;
                                                    </a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-target="#ubahToko"
                                                        data-toggle="modal"
                                                        data-id_toko ="{{$tk->id_toko}}"
                                                        data-nama_toko ="{{$tk->nama_toko}}"
                                                        data-nama_pemilik ="{{$tk->nama_pemilik}}"
                                                        data-alamat ="{{$tk->alamat}}"
                                                        data-email ="{{$tk->email}}"
                                                        >
                                                        <i class="fa fa-edit"></i>&nbsp;
                                                            Ubah
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-target="#hapusToko"
                                                        data-toggle="modal"
                                                        data-id_toko ="{{$tk->id_toko}}">
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
        $('#ubahToko').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_toko = button.data('id_toko');
            var nama_toko = button.data('nama_toko');
            var nama_pemilik = button.data('nama_pemilik');
            var alamat = button.data('alamat');
            var email = button.data('email');
            var modal = $(this);
            modal.find('.modal-body #id_toko').val(id_toko);
            modal.find('.modal-body #nama_toko').val(nama_toko);
            modal.find('.modal-body #nama_pemilik').val(nama_pemilik);
            modal.find('.modal-body #alamat').val(alamat);
            modal.find('.modal-body #email').val(email);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#hapusToko').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_toko = button.data('id_toko');
            var modal = $(this);
            modal.find('.modal-body #id_toko').val(id_toko);
        });
    });
</script>
@endpush
@endsection
