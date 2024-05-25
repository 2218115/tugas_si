@extends('layouts.admin-dashboard')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css'); }}" />
@endsection

@section('script')
    <script src="{{ asset('assets/vendors/choices.js/choices.min.js'); }}"></script>
@endsection

@section('content')            
<div class="main-content container-fluid">
    <div class="page-title">
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Perbarui Data Barang</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="/admin/barang/update/{{$barang->id_barang}}" method="POST">
                
                @csrf
                
                <div class="form-body">
                    <div class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama barang" id="first-name-icon" value="{{$barang->nama}}">
                                @error('nama')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="kategori">Kategori Barang</label>                        
                            <select class="form-control choices" name="kategori">
                                @foreach ($kategoriBarangList as $kategoriBarang)
                                    @if($kategoriBarang->id_kategori_barang == $barang->id_kategori_barang)
                                        <option selected value="{{$kategoriBarang->id_kategori_barang}}"> {{$kategoriBarang->nama}} </option>
                                    @else
                                        <option value="{{$kategoriBarang->id_kategori_barang}}"> {{$kategoriBarang->nama}} </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kategori')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="satuan">Satuan Barang</label>                        
                            <select class="form-control choices" name="satuan">
                                @foreach ($satuanList as $satuan)
                                    @if ($satuan == $barang->satuan)
                                        <option selected value="{{$satuan}}"> {{$satuan}} </option>
                                    @else
                                        <option value="{{$satuan}}"> {{$satuan}} </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('satuan')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="harga">Harga Barang</label>
                            <input type="text" name="harga" class="form-control" placeholder="Masukkan harga barang" id="first-name-icon" value="{{$barang->harga}}">
                            @error('harga')
                                <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="keterangan">Keterangan Barang</label>
                            <textarea class="form-control" rows="10" name="keterangan" placeholder="Masukkan keterangan barang">{{$barang->keterangan}}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Perbarui</button>
                        <a type="reset" class="btn btn-light-secondary me-1 mb-1" href="/admin/barang">Batal</a>
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
