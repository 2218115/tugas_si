@extends('layouts.admin-dashboard')

@section('content')            
<div class="main-content container-fluid">
    <div class="page-title">
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Perbarui Jenis Pembayaran</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="/admin/jenis-pembayaran/update/{{$jenisPembayaran->id_jenis_pembayaran}}" method="POST">
                
                @csrf
                
                <div class="form-body">
                    <div class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="jenis">Nama Kategori</label>
                                <input type="text" name="jenis" class="form-control" placeholder="Masukkan nama kategori barang" id="first-name-icon" value="{{$jenisPembayaran->jenis}}">
                                @error('jenis')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Perbarui Jenis Pembayaran</button>
                        <a type="reset" class="btn btn-light-secondary me-1 mb-1" href="/admin/jenis-pembayaran">Batal</a>
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
