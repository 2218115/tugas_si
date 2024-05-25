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
               <h3>Data Distributor</h3>                   
                <a href="/admin/distributor/create" class="btn icon icon-left btn-primary"> <i data-feather="plus-circle" width="20"></i>Tambah Distributor</a>
                                               
                <a href="/admin/distributor/report" class="btn icon icon-left btn-success"> <i data-feather="printer" width="20"></i> Cetak</a>
                
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Peran</th>
                            <th>Email</th>
                            <th>Provinsi</th>
                            <th>Kota</th>
                            <th>Kelurahan</th>
                            <th>Detail Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($distributorList as $distributor)
                        <tr>
                            <td>{{ $distributor->nama }}</td>
                            @if($distributor->role == "Pelanggan")
                                <td><span class="badge bg-primary">{{ $distributor->role }}</span></td>
                            @else
                                <td><span class="badge bg-dark">{{ $distributor->role }}</span></td>
                            @endif
                            
                            <td>{{ $distributor->email }}</td>
                            
                            @if($distributor->detailPengguna != null)
                                <td>{{ $distributor->detailPengguna->provinsi }}</td>
                                <td>{{ $distributor->detailPengguna->kota }}</td>
                                <td>{{ $distributor->detailPengguna->kelurahan }}</td>
                                <td>{{ $distributor->detailPengguna->detail_alamat }}</td>
                                <td>{{ $distributor->detailPengguna->telepon }}</td>
                            @else
                                <td colspan="5">
                                </td>
                            @endif
    
    
                            <td>
                                <a href="/admin/distributor/edit/{{$distributor->id_pengguna}}" class="btn icon icon-left btn-info">
                                <i data-feather="edit" width="20"></i> 
                                    Rubah
                                </a>
                                
                                <form action="/admin/distributor/delete/{{$distributor->id_pengguna}}" method="post" class="mt-2">
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
