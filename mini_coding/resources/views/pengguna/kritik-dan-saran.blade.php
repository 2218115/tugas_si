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
               <h3>Kritik dan Saran Pelanggan</h3>
               
               <a href="/admin/penukaran-poin/report" class="btn icon icon-left btn-success"> <i data-feather="printer" width="20"></i>Cetak</a>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nilai Tukar Poin</th>
                            <th>Poin Ditukar</th>
                            <th>Tanggal Penukaran</th>
                            <th>Transaksi</th>
                        </tr>
                    </thead>
                    
                    <?php $no = 1; ?>
                    <tbody>
                        @foreach ($penukaranPoinList as $penukaranPoin)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $penukaranPoin->nilaiTukarPoin->nilai_tukar }}</td>
                            <td>{{ $penukaranPoin->jumlah_poin_ditukar }}</td>
                            <td>{{ $penukaranPoin->tanggal_penukaran }}</td>
                            <td>
                                <a href="/admin/transaksi-penjualan/detail/{{$penukaranPoin->transaksiPenjualan?->id_transaksi_penjualan}}?backUrl={{URL::current()}}" class="btn icon icon-left btn-success"> <i data-feather="shopping-bag" width="20"></i>Ke Transaksi Detail</a>
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


