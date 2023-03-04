<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPT KRI Kolinlamil </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/gambar/Kolinlamil.ico')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="font-family: Quicksand">
    <style>
        .ukuran_font {
            font-size: 13px;
        }
    </style>
    @php
    $id = Auth::user()->id;
    $level_user = gelLevel($id);
    @endphp
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <strong><i class="far fa-user"></i>&nbsp;&nbsp;&nbsp; Pengaturan </strong>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Akun</span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="fas fa-arrow-circle-left mr-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <div class="dropdown-divider"></div>
                        @if ($level_user->level == "Admin" )
                        <a href="{{route('pengguna')}}" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> Pengguna
                        </a>
                        @endif
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4 ukuran_font">
            <a href="{{route('home')}}" class="brand-link">
                <img src="{{asset('assets/gambar/kolinlamil.png')}}" alt="Logo Kolinlamil" class="brand-image img-circle elevation-3" style="opacity: 0.8">
                <span class="brand-text font-weight-light"> <strong>Sisinfolog Kolinlamil</strong>

            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 d-flex">
                    <div class="image mt-2">
                        <img src="{{asset('assets/gambar/user.png')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }} </a>
                        <a href="#">{{ AUTH::user()->kapal}}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        {{-- @if ($level_user->level == "Admin" )
                        <li class="nav-item">
                            <a href="{{route('daftarkapal')}}" class="nav-link">
                                <i class="nav-icon fas fa-ship"></i>
                                <p>
                                    Dafar Kapal
                                </p>
                            </a>
                        </li>
                        @endif --}}

                        {{-- @if ($level_user->level == "Admin" )
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Master Data
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('kelompok')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelompok</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('subkelompok')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sub Kelompok</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('jenis_kapal')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Kapal</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('kapal')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nama Kapal</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('sistem')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sistem</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('subsistem')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sub Sistem</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('lokasi')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lokasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('pelaksana')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pelaksana</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('periode')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Periode</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('jenis_perawatan')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Perawatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('indeks_komponen')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Indeks Komponen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('jenis_perawatan')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Perawatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('jenis_dokumen')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Dokumen</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif --}}

                        {{-- <li class="nav-item">
                            <a href="{{route('kartu_pemeliharaan')}}" class="nav-link">
                                <i class="nav-icon fas fa-pen"></i>
                                <p>
                                    Dokumen Informasi Kapal
                                </p>
                            </a>
                        </li> --}}

                         <li class="nav-item has-treeview">
                              <a href="{{route('upload')}}" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Document Informasi Kapal
                                <i class="fas fa-angle-left right"></i>
                            </p>
                              </a>
                             <ul class="nav nav-treeview">

                           <li class="nav-item">
                                <a href="{{route('killcard')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Kill Card
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('sop-pek')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        SOP PEK
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('sop-pek')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Safety Plane Diagram
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                        <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                SPT
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                                                    @if ($level_user->level == "Admin" )
                        <li class="nav-item">
                            <a href="{{route('daftarkapal')}}" class="nav-link">
                                <i class="nav-icon fas fa-ship"></i>
                                <p>
                                    Dafar Kapal
                                </p>
                            </a>
                        </li>
                        @endif
                            </li>
                           @if ($level_user->level == "Admin" )
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Master Data
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('kelompok')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelompok</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('subkelompok')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sub Kelompok</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('jenis_kapal')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Kapal</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('kapal')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nama Kapal</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('sistem')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sistem</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('subsistem')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sub Sistem</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('komponen')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Komponen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('lokasi')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lokasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('pelaksana')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pelaksana</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('periode')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Periode</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('jenis_perawatan')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Perawatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('indeks_komponen')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Indeks Komponen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('jenis_perawatan')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Perawatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('jenis_dokumen')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Dokumen</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

 <li class="nav-item">
                            <a href="{{route('kartu_pemeliharaan')}}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Kartu Pemeliharaan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                        <a href="{{route('kalender_skedul')}}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Kalender Pemeliharaan
                            </p>
                        </a>
                    </li>

<li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('laporan_pelaksanaan')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Laporan Pemeliharaan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('kerusakan')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Laporan Kerusakan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Laporan PUB
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Laporan PUS
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                        @endif
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
   
                    <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    {{-- conten --}}
                    @yield('content')
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="#">SUBDIS BANGSIS DISINFOLAHTA KOLINLAMIL </a>.</strong>
            AK RN IK.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
    <script src="http://spt.mycaputra.com/assets/dist/js/pages/dashboard.js"></script>
    <script src="{{asset('assets/dist/js/demo.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            $('#reservationdate').datetimepicker({
                format: 'Y-MM-DD'
            });

            $('#reservationdate2').datetimepicker({
                format: 'Y-MM-DD'
            });

            $('#tgl_skedul').datetimepicker({
                format: 'Y-MM-DD'
            });

            $('#tgl_pelaksanaan_').datetimepicker({
                format: 'Y-MM-DD'
            });

            $('#tanggal2').datetimepicker({
                format: 'Y-MM-DD'
            });

            $('#tanggal').datetimepicker({
                format: 'Y-MM-DD'
            });

            $('#tgl_jadwal_baru').datetimepicker({
                format: 'Y-MM-DD'
            });
        })
    </script>
    @stack('script')
</body>

</html>