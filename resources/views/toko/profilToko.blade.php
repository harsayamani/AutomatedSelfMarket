@extends('toko/master/masterToko')

@section('title', 'Profil Toko')

@section('content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Profil Toko</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/toko/profil">Profil Toko</a></li>
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
                            <form class="form-horizontal" method="POST" action="/toko/profil/{{$toko->value('id_toko')}}/ubah">
                                <div class="card-body">
                                    {{-- <h4 class="card-title">Personal Info</h4> --}}
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Toko</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Masukkan nama toko" value="{{$toko->value('nama_toko')}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nama Pemilik</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan nama pemilik" value="{{$toko->value('nama_pemilik')}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="alamat" name="alamat">{{$toko->value('alamat')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
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

@endsection
