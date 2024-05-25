@extends('layouts.admin-dashboard')

@section('content')            
<div class="main-content container-fluid">
    <div class="page-title">
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Perbarui Data Distributor</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="/admin/distributor/update/{{$distributor->id_pengguna}}" method="POST">
                
                @csrf
                
                <div class="form-body">
                    <div class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Distributor" id="first-name-icon" value="{{$distributor->nama}}">
                                @error('nama')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email Distributor" id="first-name-icon" value="{{$distributor->email}}">
                                @error('email')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                                <input type="text" name="provinsi" class="form-control" placeholder="Masukkan provinsi Distributor" id="first-name-icon" value="{{$distributor->detailPengguna->provinsi}}">
                                @error('provinsi')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="kota">Kota</label>
                                <input type="text" name="kota" class="form-control" placeholder="Masukkan kota Distributor" id="first-name-icon" value="{{$distributor->detailPengguna->kota}}">
                                @error('kota')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>

                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan</label>
                                <input type="text" name="kelurahan" class="form-control" placeholder="Masukkan kelurahan Distributor" id="first-name-icon" value="{{$distributor->detailPengguna->kelurahan}}">
                                @error('kelurahan')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="detailAlamat">Detail Alamat</label>
                                <input type="text" name="detailAlamat" class="form-control" placeholder="Masukkan Detail Alamat Distributor" id="first-name-icon" value="{{$distributor->detailPengguna->detail_alamat}}">
                                @error('detailAlamat')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                                <input type="phone" name="telepon" class="form-control" placeholder="Masukkan telepon Distributor" id="first-name-icon" value="{{$distributor->detailPengguna->telepon}}">
                                @error('telepon')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>                    
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="password">Kata Sandi</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan KataSandi baru Distributor, jika di kosongkan Kata Sandi tidak di perbarui" id="first-name-icon" >
                                @error('password')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>                    
                    
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Perbarui</button>
                        <a type="reset" class="btn btn-light-secondary me-1 mb-1" href="/admin/distributor">Batal</a>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection
