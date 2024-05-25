@extends('layouts.report')

@section('content')
<h1>Jenis Pembayaran</h1>
<table class="ui celled table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nilai Tukar Poin</th>
            <th>Poin Ditukar</th>
            <th>Tanggal Penukaran</th>
            <th>ID Transaksi</th>
        </tr>
    </thead>
    
    {{$no = 1;}}
    <tbody>
        @foreach ($penukaranPoinList as $penukaranPoin)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $penukaranPoin->nilaiTukarPoin->nilai_tukar }}</td>
            <td>{{ $penukaranPoin->jumlah_poin_ditukar }}</td>
            <td>{{ $penukaranPoin->tanggal_penukaran }}</td>
            <td>
                {{$penukaranPoin->transaksiPenjualan?->id_transaksi_penjualan}}
            </td>
        </tr>                        
        @endforeach
    </tbody>
</table>
@endsection