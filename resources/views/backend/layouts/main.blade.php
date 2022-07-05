<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ $title }} - Dashboard</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="{{ asset('backend/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

</head>
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{  url('/backendKMD') }}" class="navbar-brand">
                    <img src="{{ asset('backend/img/logo/logo2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-bold">KMD</span>
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{  url('/backendKMD') }}" class="nav-link">Home</a>
                        </li>
                        @can('kepengurusan perusahaan')
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kepengurusan Perusahaan</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="{{ route('backend.kmd.admin') }}" class="dropdown-item">Admin </a></li>
                                <li><a href="{{  route('backend.gerai') }}" class="dropdown-item">Gerai</a></li>
                                <li><a href="#" class="dropdown-item">Pengelola Gerai</a></li>
                                <li><a href="#" class="dropdown-item">Bisnis Developer</a></li>
                                <li><a href="#" class="dropdown-item">Pembayaran</a></li>
                                <li><a href="#" class="dropdown-item">Keuangan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Produk</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">Kategori </a></li>
                                <li><a href="#" class="dropdown-item">Sub Kategori</a></li>
                                <li><a href="#" class="dropdown-item">Statistik Produk</a></li>
                                <li><a href="#" class="dropdown-item">Satuan Produk</a></li>
                                <li><a href="#" class="dropdown-item">Pembayaran</a></li>
                                <li><a href="#" class="dropdown-item">Keuangan</a></li>
                                <li><a href="#" class="dropdown-item">Suplier</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Web</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">Setting</a></li>
                                <li><a href="#" class="dropdown-item">slider</a></li>
                                <li><a href="#" class="dropdown-item">Kategori Unggulan</a></li>
                                <li><a href="#" class="dropdown-item">Berita</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">Some action </a></li>
                                <li><a href="#" class="dropdown-item">Some other action</a></li>
                                <li class="dropdown-divider"></li>

                                <li class="dropdown-submenu dropdown-hover">
                                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                        <li>
                                            <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                        </li>

                                        <li class="dropdown-submenu">
                                            <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                                            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        @endcan

                        @can('akun')
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Gerai</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="{{  route('backend.gerai') }}" class="dropdown-item">Tambahkan Gerai</a></li>
                                <li><a href="" class="dropdown-item">Profile Gerai</a></li>
                                <li><a href="#" class="dropdown-item">Pendapatan Gerai</a></li>
                            </ul>
                        </li>
                        @endcan
                    </ul>

                </div>
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="brand-image img-circle elevation-3" src="{{ asset('backend/img/boy.png') }}" style="max-width: 60px">
                            <span class="ml-2 d-none d-lg-inline text-dark small">{{ auth()->user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user-gear fa-sm fa-fw mr-2 text-gray-400"></i>
                                Akun
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="content-wrapper">

            <div class="content-header">
                @yield('menuContent')
            </div>
        </div>


        <aside class="control-sidebar control-sidebar-dark">

        </aside>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>

            <strong>Copyright &copy; 2022-<script>
                    document.write(new Date().getFullYear());

                </script> .</strong> developed by <a href="https://itdevacademy.com">IT Dev Academy</a>
        </footer>
        <!-- Footer -->
    </div>


    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="{{ route('backend.logout') }}" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('backend/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <script src="{{ asset('backend/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <!-- Menambahakan Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
</body>

</html>
{{-- {{ dd(auth()->user()->id) }} --}}
{{-- {{ dd($creator) }} --}}
