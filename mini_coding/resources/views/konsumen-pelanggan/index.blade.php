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
               <h3>Data Konsumen Dan Pelanggan</h3>                   
               
                <a href="/admin/konsumen-pelanggan/report" class="btn icon icon-left btn-success"> <i data-feather="printer" width="20"></i> Cetak</a>
                
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
                        @foreach ($konsumenOrPelangganList as $konsumenOrPelanggan)
                        <tr>
                            <td>{{ $konsumenOrPelanggan->nama }}</td>
                            @if($konsumenOrPelanggan->role == "Pelanggan")
                                <td><span class="badge bg-primary">{{ $konsumenOrPelanggan->role }}</span></td>
                            @else
                                <td><span class="badge bg-dark">{{ $konsumenOrPelanggan->role }}</span></td>
                            @endif
                            
                            <td>{{ $konsumenOrPelanggan->email }}</td>
                            
                            @if($konsumenOrPelanggan->detailPengguna != null)
                                <td>{{ $konsumenOrPelanggan->detailPengguna->provinsi }}</td>
                                <td>{{ $konsumenOrPelanggan->detailPengguna->kota }}</td>
                                <td>{{ $konsumenOrPelanggan->detailPengguna->kelurahan }}</td>
                                <td>{{ $konsumenOrPelanggan->detailPengguna->detail_alamat }}</td>
                                <td>{{ $konsumenOrPelanggan->detailPengguna->telepon }}</td>
                            @endif
                            
                            <td>
                                @if($konsumenOrPelanggan->role == "Konsumen")
                                    <form method="POST" action="/admin/konsumen-pelanggan/update/{{$konsumenOrPelanggan->id_pengguna}}">
                                        @csrf
                                        <input type="hidden" value="Pelanggan" name="role"> </input>
                                        <button class="btn btn-primary">Jadikan Pelanggan</button>
                                    </form>
                                @endif
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

