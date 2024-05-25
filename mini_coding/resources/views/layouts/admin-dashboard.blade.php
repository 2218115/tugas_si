<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title') | SI CRM</title>
    
    @yield('head')
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
</head>
<body>
    <div id="app">
        
        <!-- Sidebar -->
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <h2>SI CRM</h2>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">            
                        <li class='sidebar-title'>Menu Utama</li>                
                        <li class="sidebar-item @if(str_contains(request()->path(), 'admin/dashboard')) active @endif">
                            <a href="/admin/dashboard" class='sidebar-link'>
                                <i data-feather="home" width="20"></i> 
                                <span>Dashboard</span>
                            </a>                    
                        </li>
                        
                        <li class='sidebar-title'>Barang</li>
                        <li class="sidebar-item @if(str_contains(request()->path(), 'admin/barang')) active @endif">
                            <a href="/admin/barang" class='sidebar-link'>
                                <i data-feather="box" width="20"></i> 
                                <span>Barang</span>
                            </a>
                        </li>
                        <li class="sidebar-item @if(str_contains(request()->path(), 'admin/kategori-barang')) active @endif">
                            <a href="/admin/kategori-barang" class='sidebar-link'>
                                <i data-feather="archive" width="20"></i> 
                                <span>Kategori Barang</span>
                            </a>
                        </li>
                        
                        <li class='sidebar-title'>Transaksi</li>                
                        <li class="sidebar-item @if(str_contains(request()->path(), 'admin/transaksi-penjualan')) active @endif">
                            <a href="/admin/transaksi-penjualan" class='sidebar-link'>
                                <i data-feather="shopping-cart" width="20"></i> 
                                <span>Transaksi Penjualan</span>
                            </a>
                        </li>
                        <li class="sidebar-item @if(str_contains(request()->path(), 'admin/jenis-pembayaran')) active @endif">
                            <a href="/admin/jenis-pembayaran" class='sidebar-link'>
                                <i data-feather="dollar-sign" width="20"></i> 
                                <span>Jenis Pembayaran</span>
                            </a>
                        </li>
        
                        <li class='sidebar-title'>Poin</li>                
                        <li class="sidebar-item @if(str_contains(request()->path(), 'admin/penukaran-poin')) active @endif">
                            <a href="/admin/penukaran-poin" class='sidebar-link'>
                                <i data-feather="plus-circle" width="20"></i> 
                                <span>Penukaran Poin</span>
                            </a>
                        </li>
                        <li class="sidebar-item @if(str_contains(request()->path(), 'admin/nilai-tukar-poin')) active @endif">
                            <a href="/admin/nilai-tukar-poin" class='sidebar-link'>
                                <i data-feather="target" width="20"></i> 
                                <span>Nilai tukar poin</span>
                            </a>
                        </li>
                        
                        <li class='sidebar-title'>Kritik dan Saran</li>                
                        <li class="sidebar-item @if(str_contains(request()->path(), 'admin/kritik-dan-saran')) active @endif">
                            <a href="/admin/kritik-dan-saran" class='sidebar-link'>
                                <i data-feather="message-circle" width="20"></i> 
                                <span>Kritik dan Saran</span>
                            </a>
                        </li>     
                        
                        <li class='sidebar-title'>Pengguna</li>                
                        <li class="sidebar-item @if(str_contains(request()->path(), 'admin/konsumen-pelanggan')) active @endif">
                            <a href="/admin/konsumen-pelanggan" class='sidebar-link'>
                                <i data-feather="user" width="20"></i> 
                                <span>Konsumen Pelanggan</span>
                            </a>
                        </li>     
                        
                        <li class="sidebar-item @if(str_contains(request()->path(), 'admin/distributor')) active @endif">
                            <a href="/admin/distributor" class='sidebar-link'>
                                <i data-feather="user" width="20"></i> 
                                <span>Distributor</span>
                            </a>
                        </li>     
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
    
        <!-- Header -->
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-none d-md-block d-lg-inline-block">Halo Admin, {{ Auth::user()->nama }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="/auth/logout"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            
            
            @section('content')
            @show
            
        
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Voler</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
        
    @yield('script')
    
    
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
