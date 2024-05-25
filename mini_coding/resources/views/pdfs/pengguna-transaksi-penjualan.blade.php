@extends('layouts.report')

@section('content')
<h1>Data Transaksi Oleh {{$pengguna->role}} - {{$pengguna->nama}}</h1>
<table class="ui celled table">
    <thead>
        <th>No</th>
        <th>ID</th>
        <th>Nama {{$pengguna->role}}</th>
        <th>Distributor</th>
        <th>Tanggal Transaksi</th>
        <th>Nominal Pembayaran</th>
        <th>Nominal Kembalian</th>
        <th>Status</th>
    </thead>
    <?php $no = 1?>
    <tbody>
        @foreach($transaksiPenjualanList as $transaksiPenjualan)
            <tr>   
                <td>{{$no++}}</td>
                <td>{{$transaksiPenjualan->id_transaksi_penjualan}}</td>
                <td>{{$transaksiPenjualan->pengguna->nama}}</td>
                <td>{{$transaksiPenjualan->distributor->nama}}</td>
                <td>{{$transaksiPenjualan->tanggal_transaksi}}</td>
                <td>{{$transaksiPenjualan->nominal_pembayaran}}</td>
                <td>{{$transaksiPenjualan->nominal_kembalian}}</td>
                <td>{{$transaksiPenjualan->status}}</td>
            </tr>
        @endforeach
    <tbody>
</table>
@endsection