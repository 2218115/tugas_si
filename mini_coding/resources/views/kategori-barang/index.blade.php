@extends('layouts.admin-dashboard')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('script')
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
@endsection

@section('content')            
<div class="main-content container-fluid">
    <div class="page-title">
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
               <h3>Data Kategori Barang</h3>                   
                <a href="/admin/kategori-barang/create" class="btn icon icon-left btn-primary"> <i data-feather="plus-circle" width="20"></i> Tambah Kategori</a>

                <a href="/admin/kategori-barang/report" class="btn icon icon-left btn-success"> <i data-feather="printer" width="20"></i> Cetak</a>
            </div>
            <?php $no = 1 ?>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($kategoriBarangList as $kategoriBarang)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $kategoriBarang->id_kategori_barang }}</td>
                            <td>{{ $kategoriBarang->nama }}</td>
                            <td>
                                <a href="/admin/kategori-barang/edit/{{$kategoriBarang->id_kategori_barang}}" class="btn icon icon-left btn-info">
                                <i data-feather="edit" width="20"></i> 
                                    Rubah
                                </a>
                                
                                <form action="/admin/kategori-barang/delete/{{$kategoriBarang->id_kategori_barang}}" method="post" class="mt-2">                      
                                    @csrf
                                    <button type="submit" class="btn icon icon-left btn-danger">
                                        <i data-feather="trash" width="20"></i>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection


