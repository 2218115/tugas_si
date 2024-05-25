@extends('layouts.admin-dashboard')

@section('content')            
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dasbor</h3>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Transaksi Penjualan</h3>
                            </div>
                            <div style="height: 80px;" class="d-flex align-items-center justify-content-center">
                                    <h2 style="color: white; font-weigth: bold; font-size: 2.4rem;">{{ $transaksiPenjualanCount }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Barang</h3>
                            </div>
                            <div style="height: 80px;" class="d-flex align-items-center justify-content-center">
                                    <h2 style="color: white; font-weigth: bold; font-size: 2.4rem;">{{ $barangCount }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Transaksi Hari Ini</h4>
                        <a href="/admin/transaksi-penjualan" class="d-flex btn btn-outline-primary">
                            Ke Bagian Transaksi <i data-feather="arrow-right"></i>
                        </a>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class='table mb-0' id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Pengguna</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Distributor</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Nominal Pembayaran</th>
                                        <th>Nominal Kembalian</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php $no = 1 ?>
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

