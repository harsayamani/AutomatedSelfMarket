@extends('toko/master/masterToko')

@section('title', 'Riwayat Pelanggan')

@section('content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Riwayat Pelanggan</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/toko/riwayatPelanggan">Riwayat Pelanggan</a></li>
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

                                 <!-- Modal Hapus Riwayat -->

                                 <div class="modal fade" id="hapusRiwayat" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Hapus Riwayat Pelanggan</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <center><h5>Apakah anda yakin?</h5></center>
                                                <form action="/toko/riwayatPelanggan/hapus" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}
                                                    <div class="row form-group" hidden>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="id_riwayat_pelanggan" name="id_riwayat_pelanggan" class="form-control" readonly required>
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
                                                <th>ID Pelanggan</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Waktu Login</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($riwayat as $key => $rwy)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$rwy->pelanggan->id_pelanggan}}</td>
                                                <td>{{$rwy->pelanggan->nama_pelanggan}}</td>
                                                <td>{{$rwy->created_at}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-target="#hapusRiwayat"
                                                        data-toggle="modal"
                                                        data-id_riwayat_pelanggan ="{{$rwy->id_riwayat_pelanggan}}"
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
        $('#hapusRiwayat').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_riwayat_pelanggan = button.data('id_riwayat_pelanggan');
            var modal = $(this);
            modal.find('.modal-body #id_riwayat_pelanggan').val(id_riwayat_pelanggan);
        });
    });
</script>
@endpush
@endsection
