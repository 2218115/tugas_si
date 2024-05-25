@extends('layouts.pengguna')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('script')
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
@endsection

@section('content')            
<div class="main-content container-fluid">
    @if (session('status'))
        <div class="alert alert-success" onclick="this.style.display='none'">
            {{ session('status') }}
        </div>
    @endif
   <div class="card pt-4">
        <div class="card-body">
            <div class="text-center mb-5">
                <h3>Data Diri Anda</h3>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="/pengguna/akun" method="POST">                        
                @csrf
                
                
                <div class="form-group position-relative has-icon-left">
                    <label for="nama">Nama</label>
                    <div class="position-relative">
                        <input value="{{$pengguna->nama}}" type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda">
                        <div class="form-control-icon">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group position-relative has-icon-left">
                    <label for="email">Email</label>
                    <div class="position-relative">
                        <input value="{{$pengguna->email}}" type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda">
                        <div class="form-control-icon">
                            <i data-feather="mail"></i>
                        </div>
                    </div>
                </div>
                
                <div class="form-group position-relative has-icon-left">
                    <div class="clearfix">
                        <label for="password">Kata Sandi</label>
                    </div>
                    <div class="position-relative">
                        <input name="password" type="password" class="form-control"  placeholder="Masukkan Katasandi Anda (katasandi baru)">
                        <div class="form-control-icon">
                            <i data-feather="lock"></i>
                        </div>
                    </div>
                </div>
                
                <div class="form-group position-relative has-icon-left">
                    <div class="clearfix">
                        <label for="provinsi">Provinsi</label>
                    </div>
                    <div class="position-relative">
                        <input value="{{$pengguna->detailPengguna->provinsi}}" name="provinsi" type="text" class="form-control"  placeholder="Masukkan Provinsi tempat Anda">
                        <div class="form-control-icon">
                            <i data-feather="map-pin"></i>
                        </div>
                    </div>
                </div>
    
                <div class="form-group position-relative has-icon-left">
                    <div class="clearfix">
                        <label for="kota">Kota</label>
                    </div>
                    <div class="position-relative">
                        <input value="{{$pengguna->detailPengguna->kota}}" name="kota" type="text" class="form-control"  placeholder="Masukkan Kota tempat Anda">
                        <div class="form-control-icon">
                            <i data-feather="navigation-2"></i>
                        </div>
                    </div>
                </div>
    
                
                <div class="form-group position-relative has-icon-left">
                    <div class="clearfix">
                        <label for="kelurahan">Kelurahan</label>
                    </div>
                    <div class="position-relative">
                        <input value="{{$pengguna->detailPengguna->kelurahan}}" name="kelurahan" type="text" class="form-control"  placeholder="Masukkan Kelurahan tempat Anda">
                        <div class="form-control-icon">
                            <i data-feather="map"></i>
                        </div>
                    </div>
                </div>
                
                <div class="form-group position-relative has-icon-left">
                    <div class="clearfix">
                        <label for="detailAlamatn">Detail Alamat</label>
                    </div>
                    <div class="position-relative">
                        <input value="{{$pengguna->detailPengguna->detail_alamat}}" name="detailAlamat" type="text" class="form-control"  placeholder="Masukkan Detal Alamat Anda">
                        <div class="form-control-icon">
                            <i data-feather="navigation"></i>
                        </div>
                    </div>
                </div>
                
                <div class="form-group position-relative has-icon-left">
                    <div class="clearfix">
                        <label for="telepon">Telepon</label>
                    </div>
                    <div class="position-relative">
                        <input value="{{$pengguna->detailPengguna->telepon}}" name="telepon" type="text" class="form-control"  placeholder="Masukkan Nomor Telepon Anda">
                        <div class="form-control-icon">
                            <i data-feather="phone"></i>
                        </div>
                    </div>
                </div>
                                
                <div class="clearfix">
                    <p>Klik tombol di bawah untuk memperbarui data anda</p>
                    <button type="submit" class="btn btn-primary">Perbarui Data Anda</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

