@extends('layouts.basic')

@section('title', 'Daftar')

@section('content')
<div id="auth">        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <h3>Daftar</h3>
                        <p>Jadilah pelanggan</p>
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
                    
                    <form action="/auth/register" method="POST">                        
                        @csrf
                        
                        
                        <div class="form-group position-relative has-icon-left">
                            <label for="nama">Nama</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group position-relative has-icon-left">
                            <label for="email">Email</label>
                            <div class="position-relative">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda">
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
                                <input name="password" type="password" class="form-control"  placeholder="Masukkan Katasandi Anda (buat)">
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
                                <input name="provinsi" type="text" class="form-control"  placeholder="Masukkan Provinsi tempat Anda">
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
                                <input name="kota" type="text" class="form-control"  placeholder="Masukkan Kota tempat Anda">
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
                                <input name="kelurahan" type="text" class="form-control"  placeholder="Masukkan Kelurahan tempat Anda">
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
                                <input name="detailAlamat" type="text" class="form-control"  placeholder="Masukkan Detal Alamat Anda">
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
                                <input name="telepon" type="text" class="form-control"  placeholder="Masukkan Nomor Telepon Anda">
                                <div class="form-control-icon">
                                    <i data-feather="phone"></i>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class='form-check clearfix my-4'>
                            <div class="float-end">
                                <a href="/auth/login">Sudah punya akun?</a>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button class="btn btn-primary float-end">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection