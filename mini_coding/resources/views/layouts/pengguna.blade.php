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
                        <li class="sidebar-item @if(str_contains(request()->path(), 'pengguna/dashboard')) active @endif">
                            <a href="/pengguna/dashboard" class='sidebar-link'>
                                <i data-feather="home" width="20"></i> 
                                <span>Dashboard</span>
                            </a>                    
                        </li>
                        
                        @if(Auth::user()->role == "Pelanggan")
                        <li class="sidebar-item @if(str_contains(request()->path(), 'pengguna/kritik-dan-saran')) active @endif">
                            <a href="/pengguna/kritik-dan-saran" class='sidebar-link'>
                                <i data-feather="message-square" width="20"></i> 
                                <span>Kritik Saran</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item @if(str_contains(request()->path(), 'pengguna/penukaran-poin')) active @endif">
                            <a href="/pengguna/penukaran-poin" class='sidebar-link'>
                                <i data-feather="gift" width="20"></i> 
                                <span>Riwayat Penukaran Poin</span>
                            </a>
                        </li>
                        @endif
                        
                        <li class="sidebar-item @if(str_contains(request()->path(), 'pengguna/akun')) active @endif">
                            <a href="/pengguna/akun" class='sidebar-link'>
                                <i data-feather="user" width="20"></i> 
                                <span>Akun</span>
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
                                <div class="d-none d-md-block d-lg-inline-block">Halo {{ Auth::user()->role }}, {{ Auth::user()->nama }}</div>
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
