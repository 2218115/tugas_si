@extends('layouts.report')

@section('content')
@if($transaksiPenjualan->pengguna->role == "Pelanggan")
    <h3>Laporan Data Detail Transaksi Pelanggan</h3>
@else
    <h3>Laporan Data Detail Transaksi Konsumen</h3>
@endif

<style>
    .field {        
        display: flex;
        gap: 2rem;
        
        margin-bottom: 2rem;
    }
    
    .field > label {
        color: #323232;
    }
    
    .field > p {
        border: 1px solid #e3e5e6;
        background-color: #f9fafb;
        border-radius: 6px;
        padding: 0.8rem;
    }
    
</style>

<div class="field">
    <label>ID Transaksi</label>
    <p>{{$transaksiPenjualan->id_transaksi_penjualan}}</p>
</div>

<div class="field">
    <label>Nama</label>
    <p>{{$transaksiPenjualan->pengguna->nama}}</p>
</div>

<div class="field"> 
    <label>Provinsi</label>
    <p> {{$transaksiPenjualan->pengguna->detailPengguna->provinsi}}</p>
</div>


<div class="field"> 
    <label>Kota</label>
    <p> {{$transaksiPenjualan->pengguna->detailPengguna->kota}}</p>
</div>

<div class="field"> 
    <label>Kelurahan</label>
    <p> {{$transaksiPenjualan->pengguna->detailPengguna->kelurahan}}</p>
</div>


<div class="field"> 
    <label>Detail Alamat</label>
    <p> {{$transaksiPenjualan->pengguna->detailPengguna->detail_alamat}}</p>
</div>

<div class="field"> 
    <label>Telepon</label>
    <p> {{$transaksiPenjualan->pengguna->detailPengguna->telepon}}</p>
</div>

<div class="field">
    <label>Jenis Pembayaran</label>
    <p>{{$transaksiPenjualan->jenisPembayaran->jenis}}</p>
</div>

<div class="field">
    <label>Distributor</label>
    <p>{{$transaksiPenjualan->distributor->nama}}</p>
</div>

<div class="field">
    <label>Tanggal Transaksi</label>
    <p>{{$transaksiPenjualan->tanggal_transaksi}}</p>
</div>

<div class="field">
    <label>Nominal Total (Grand Total)</label>
    <p>{{$transaksiPenjualan->nominal_total}}</p>
</div>

<div class="field">
    <label>Nominal Pembayaran</label>
    <p>{{$transaksiPenjualan->nominal_pembayaran}} </p>
</div>

<div class="field" style="margin-bottom: 3rem;">
    <label>Nominal Kembalian</label>
    <p>{{$transaksiPenjualan->nominal_kembalian}} </p>
</div>

@if($transaksiPenjualan->penukaranPoin != null)
<div class="field">
    <label>Penukaran Poin</label>
        <p>{{$transaksiPenjualan->penukaranPoin->jumlah_poin_ditukar}} </p>          
</div>

<div class="field">
    <label>Diskon</label>
    <p>Rp. {{$transaksiPenjualan->penukaranPoin->nilaiTukarPoin->nilai_tukar}} - Per Poin </p>
</div>

<div>
    <label>Diskon</label>
        <p>Rp. {{$transaksiPenjualan->penukaranPoin->jumlah_poin_ditukar * $transaksiPenjualan->penukaranPoin->nilaiTukarPoin->nilai_tukar}} </p>          
    </div>
@endif


<div>
  <table class="ui celled table">
    <thead>
      <tr>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
      </tr>
    </thead>
    <tbody>
    @foreach($detailTransaksiPenjualanList as $detailTransaksiPenjualan)                    
          <tr>
            <td ="text-bold-500">{{$detailTransaksiPenjualan->barang->nama}}</td>
            <td>{{$detailTransaksiPenjualan->harga}}</td>
            <td ="text-bold-500">{{$detailTransaksiPenjualan->jumlah}}</td>
            <td>{{$detailTransaksiPenjualan->total_harga}}</td>
          </tr>
    @endforeach
        <tr>
            <td colspan="3">
                <b>Grand Total</b>
            </td>
            <td colspan="1">
                Rp. <b>{{$transaksiPenjualan->nominal_total}}</b>
            </td>
        </td>
    </tbody>
  </table>
</div>
@endsection