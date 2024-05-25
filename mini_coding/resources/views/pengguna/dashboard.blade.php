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
    <div class="page-title">
    </div>
    <section class="section">
        @if(Auth::user()->role == "Pelanggan")
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-heading p-1 pl-3">Poin Anda</h3>
                    </div>
                    <div class="card-body">
                        <h3> {{$poin?->jumlah_poin}}</h3>
                    </div>
                </div>
            </div>                        
        </div>
        @endif
        
        <div class="card">
            <div class="card-header">
               <h3>Transaksi Anda</h3>
                <a href="/pengguna/transaksi-penjualan/report" class="btn icon icon-left btn-success"> <i data-feather="printer" width="20"></i> Cetak</a>
            </div>
            <?php $no = 1 ?>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Pelanggan/Konsumen</th>
                            <th>Jenis Pembayaran</th>
                            <th>Distributor</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nominal Pembayaran</th>
                            <th>Nominal Kembalian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($transaksiPenjualanList as $transaksiPenjualan)
                        <tr>
                            <td>{{$no++}}</td>                            
                            <td>{{ $transaksiPenjualan->id_transaksi_penjualan }}</td>
                            <td>{{ $transaksiPenjualan->pengguna->nama }}</td>
                            <td>{{ $transaksiPenjualan->jenisPembayaran->jenis }}</td>
                            <td>{{ $transaksiPenjualan->distributor->nama }}</td>
                            <td>{{ $transaksiPenjualan->tanggal_transaksi }} </td>
                            <td>{{ $transaksiPenjualan->nominal_pembayaran }} </td>
                            <td>{{ $transaksiPenjualan->nominal_kembalian }} </td>                            
                            <td>
                                @switch($transaksiPenjualan->status)
                                    @case('DIBUAT')
                                        <span class="badge bg-dark">Dibuat</span>
                                        @break
                                    @case('TIDAK_VALID')
                                        <span class="badge bg-danger">Tidak Valid</span>
                                        @break
                                    @case('DI_DISTRIBUSIKAN')
                                        <span class="badge bg-primary">Di Distribusikan</span>
                                        @break
                                    @case('SELESAI')
                                        <span class="badge bg-success">Selesai</span>
                                        @break                                    
                                @endswitch
                            </td>
                            
                            
                            <td class="d-flex flex-column">                                
                                <a href="/pengguna/transaksi-penjualan/detail/{{$transaksiPenjualan->id_transaksi_penjualan}}" class="btn icon icon-left btn-success w-100 mb-2">
                                <i data-feather="clipboard" width="20"></i> 
                                    Detail
                                </a>
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

