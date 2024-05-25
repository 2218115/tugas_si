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
               <h3>Data Transaksi Penjualan</h3>                   
                <a href="/admin/transaksi-penjualan/create" class="btn icon icon-left btn-primary"> <i data-feather="plus-circle" width="20"></i>Buat Transaksi</a>

                <a href="/admin/transaksi-penjualan/report" class="btn icon icon-left btn-success"> <i data-feather="printer" width="20"></i> Cetak</a>
            </div>
            <?php $no = 1 ?>
            <div class="card-body">
                <table class='table table-striped' id="table1">
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
                                <a href="/admin/transaksi-penjualan/detail/{{$transaksiPenjualan->id_transaksi_penjualan}}" class="btn icon icon-left btn-light w-100 mb-2">
                                <i data-feather="clipboard" width="20"></i> 
                                    Detail
                                </a>                                
                                
                                @switch($transaksiPenjualan->status)
                                    @case('DI_DISTRIBUSIKAN')
                                        <form action="/admin/transaksi-penjualan/update-status/{{$transaksiPenjualan->id_transaksi_penjualan}}" method="post" class="mt-2">                      
                                            @csrf
                                            <input type="hidden" name="status" value="SELESAI"></input>
                                            <button type="submit" class="btn icon icon-left btn-success w-100">
                                                <i data-feather="check" width="20"></i>
                                                Selesai
                                            </button>
                                        </form>
                                        @break
                                @endswitch
                                
                                @if($transaksiPenjualan->status != "TIDAK_VALID")
                                <form action="/admin/transaksi-penjualan/update-status/{{$transaksiPenjualan->id_transaksi_penjualan}}" method="post" class="mt-2">                      
                                    @csrf
                                    <input type="hidden" name="status" value="TIDAK_VALID"></input>
                                    <button type="submit" class="btn icon icon-left btn-danger w-100">
                                        <i data-feather="trash" width="20"></i>
                                        Buat Tidak Valid
                                    </button>
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

