<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/admin/assets/images/favicon.png">
    <title> @yield('title') | {{Session::get('namaToko')}} ASM</title>
    @include('/toko/style/styleToko')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="/admin/assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="/admin/assets/images/logo_asm_toko2.png" style="width:140px; height:40px" alt="homepage" class="light-logo" />

                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block">Toko {{Session::get('namaToko')}}</span>
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/admin/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="/toko/profil/{{Session::get('idToko')}}"><i class="mdi mdi-store m-r-5 m-l-5"></i> Profil Toko</a>
                                <a class="dropdown-item" href="/toko/gantiPassword/{{Session::get('idToko')}}"><i class="ti-settings m-r-5 m-l-5"></i> Ganti Password</a>
                                <a class="dropdown-item" href="/toko/logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/toko/dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/toko/produk" aria-expanded="false"><i class="mdi mdi-tag"></i><span class="hide-menu">Produk</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/toko/riwayatPelanggan" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Riwayat Pelanggan</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/toko/riwayatTransaksi" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Riwayat Transaksi</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('alert-danger'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert-danger')}}</div>
                </div>
            @endif
            @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif

            @yield('content')

            <div class="clearfix"></div>

            <div class="modal fade" id="modalTransaksi" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form method="POST" action="/api/transaksi/selesai">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-body printableArea">
                                        <h3 id="data_id_transaksi"></h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="pull-left">
                                                    <address>
                                                        <h3> &nbsp;<b class="text-danger">{{Session::get('namaToko')}}</b></h3>
                                                        <p class="text-muted m-l-5" id="data_alamat_toko">
                                                        </p>
                                                    </address>
                                                </div>
                                                <div class="pull-right text-right">
                                                    <address>
                                                        <h3>To,</h3>
                                                        <h4 class="font-bold"><div id="data_nama_pelanggan"></div></h4>
                                                        <p id="data_tgl_transaksi"></p>
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
                                                        <tbody id="data_detail">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="pull-right m-t-30 text-right">
                                                    <hr>
                                                    <h3 id="data_total_tagihan"></h3>
                                                    <hr>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <input class="form-control" name="id_transaksi" id="id_transaksi" required hidden>
                                            Diterima :<br>
                                            Rp.<div class="col-md-6"><input class="form-control" name="diterima" id="diterima"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Bayar</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © {{ date("Y") }} All Rights Reserved
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    @include('/toko/script/scriptToko')

    {{-- @push('script') --}}

    <script type="text/javascript">
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('cc57b7190625d1c6e36f', {
            cluster: 'ap1',
            forceTLS: true
        });

        var channel = pusher.subscribe('harsoft-channel');
        channel.bind('transaksiproses-event', function(data) {

            console.log(data)

            var panjangdetail = data.detail.length;

            var myModal= $('#modalTransaksi').on('show.bs.modal', function () {

                $('.modal-body #data_id_transaksi').html(`<h3><b>Transaksi</b><span class="pull-right">#${data.id_transaksi}</span></h3>`);
                $('.modal-body #data_alamat_toko').html(data.alamat_toko);
                $('.modal-body #data_tgl_transaksi').html(`<b>Tanggal Transaksi : </b>${data.tgl_transaksi}`);
                $('.modal-body #data_nama_pelanggan').html(data.nama_pelanggan);
                $('.modal-body #data_total_tagihan').html(`<b>Total : </b>Rp.${data.total_tagihan}`);
                $('.modal-body #id_transaksi').val(data.id_transaksi);

                var no = 1;

                for(let i=0; i<panjangdetail; i++){
                    $.ajax({
                        url: "/toko/ajax-keranjang",
                        type:"POST",
                        data : {"_token": "{{ csrf_token() }}",
                        "id":data.detail[i].id_keranjang},
                        dataType: "json",
                        success: function(res){
                            var html = `
                                <tr>
                                    <td class="text-center">${no++}</td>
                                    <td>${res.nama_produk}</td>
                                    <td class="text-right">${data.detail[i].kuantitas}</td>
                                    <td class="text-right">Rp.${data.detail[i].harga_update/data.detail[i].kuantitas}</td>
                                    <td class="text-right">Rp.${data.detail[i].harga_update}</td>
                                </tr>
                            `;
                            $('.modal-body #data_detail').append(html);
                        }
                    });
                }
            });

            myModal.modal('show');
            // setTimeout(function(){
            //     $('#bunyiBel').empty();
            //     myModal.modal('hide')
            // }, 120000);

            // $('#close').on('click', function(){
            //     $('#bunyiBel').empty();
            //     myModal.modal('hide')
            // })

        });

    </script>
    {{-- @endpush --}}
</body>

</html>
