@extends('layouts.distributor-dashboard')

@section('content')            
<div class="main-content container-fluid">
    <div class="page-title">
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
               <h3>Data Detail Transaksi</h3>                   
                <a href="/distributor/dashboard" class="btn icon icon-left btn-outline-primary"> <i data-feather="arrow-left" width="20"></i>Kembali</a>

                <a href="/distributor/transaksi-penjualan/detail/{{$transaksiPenjualan->id_transaksi_penjualan}}/report" class="btn icon icon-left btn-success"> <i data-feather="printer" width="20"></i> Cetak</a>
            </div>
            <div class="card-body">
                <div class="row">
                    @switch($transaksiPenjualan->status)
                        @case('TIDAK_VALID')
                            <div class="alert alert-danger">
                                <h4 class="alert-heading">Tidak Valid</h4>
                                <p>Transaksi ini tidak valid</p>
                            </div>
                            @break
                        @case('DIBUAT')
                            <div class="alert alert-dark">
                                <h4 class="alert-heading">Dibuat</h4>
                                <p>Transaksi dibuat, menunggu Anda untuk melanjutkan</p>
                            </div>
                            @break
                        @case('DI_DISTRIBUSIKAN')
                            <div class="alert alert-primary">
                                <h4 class="alert-heading">Di Distribusikan</h4>
                                <p>Transaksi Anda Distribusikan</p>
                            </div>
                            @break
                        @case('SELESAI')
                            <div class="alert alert-success">
                                <h4 class="alert-heading">Selesai</h4>
                                <p>Transaksi selesai</p>
                            </div>
                            @break
                    @endswitch
                </div>

                <div>
                    @if($transaksiPenjualan->pengguna->role == "Pelanggan")
                        <h3>Pelanggan</h3>
                    @else
                        <h3>Konsumen</h3>
                    @endif
                    <div class="row">
                        <div class="form-group">
                            <label>ID Transaksi</label>
                            <input class="form-control" name="namaPelanggan" value="{{$transaksiPenjualan->id_transaksi_penjualan}}" readonly> </input>
                        </div>
                    </div>
                    
                                        
                    <div class="row">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="namaPelanggan" value="{{$transaksiPenjualan->pengguna->nama}}" readonly> </input>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input class="form-control" name="provinsiPelanggan" value="{{$transaksiPenjualan->pengguna->detailPengguna->provinsi}}" readonly> </input>
                        </div>
                    </div>
                    
                                        
                    <div class="row">
                        <div class="form-group">
                            <label>Kota</label>
                            <input class="form-control" name="kotaPelanggan" value="{{$transaksiPenjualan->pengguna->detailPengguna->kota}}" readonly> </input>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label>Kelurahan</label>
                            <input class="form-control" name="kelurahanPelanggan" value="{{$transaksiPenjualan->pengguna->detailPengguna->kelurahan}}" readonly> </input>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="form-group">
                            <label>Detail Alamat</label>
                            <input class="form-control" name="detailAlamatPelanggan" value="{{$transaksiPenjualan->pengguna->detailPengguna->detail_alamat}}" readonly> </input>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label>Telepon</label>
                            <input class="form-control" name="telepon" value="{{$transaksiPenjualan->pengguna->detailPengguna->telepon}}" readonly> </input>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label>Jenis Pembayaran</label>
                            <input class="form-control" name="jenisPembayaran" value="{{$transaksiPenjualan->jenisPembayaran->jenis}}" readonly> </input>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label>Distributor</label>
                            <input class="form-control" name="distributor" value="{{$transaksiPenjualan->distributor->nama}}" readonly> </input>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <input class="form-control" name="distributor" value="{{$transaksiPenjualan->tanggal_transaksi}}" readonly> </input>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label>Nominal Total (Grand Total)</label>
                            <input class="form-control" name="nominalTotal" value="{{$transaksiPenjualan->nominal_total}}" readonly> </input>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label>Nominal Pembayaran</label>
                            <input class="form-control" name="nominalPembayaran" value="{{$transaksiPenjualan->nominal_pembayaran}}" readonly> </input>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label>Nominal Kembalian</label>
                            <input class="form-control" name="nominalKembalian" value="{{$transaksiPenjualan->nominal_kembalian}}" readonly> </input>
                        </div>
                    </div>
                    
                    @if($transaksiPenjualan->penukaranPoin != null)
                    <div class="row">
                        <div class="form-group">
                            <label>Penukaran Poin</label>
                                <input class="form-control" name="nominalKembalian" value="{{$transaksiPenjualan->penukaranPoin->jumlah_poin_ditukar}}" readonly> </input>          
                        </div>
                    </div>
                    
                   <div class="row">
                    <div class="form-group">
                        <label>Diskon</label>
                            <input class="form-control" name="nominalTukarPoin" value="Rp. {{$transaksiPenjualan->penukaranPoin->nilaiTukarPoin->nilai_tukar}} - Per Poin" readonly> </input>          
                    </div>
                </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <label>Diskon</label>
                                <input class="form-control" name="nominalKembalian" value="Rp. {{$transaksiPenjualan->penukaranPoin->jumlah_poin_ditukar * $transaksiPenjualan->penukaranPoin->nilaiTukarPoin->nilai_tukar}}" readonly> </input>          
                        </div>
                    </div>
                    
                    @endif

                    <div class="table-responsive">
                      <table class="table table-hover mb-0">
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
                                <td class="text-bold-500">{{$detailTransaksiPenjualan->barang->nama}}</td>
                                <td>{{$detailTransaksiPenjualan->harga}}</td>
                                <td class="text-bold-500">{{$detailTransaksiPenjualan->jumlah}}</td>
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
                </div>
                
                 <div class="mb-4 mt-4">
                    @if($transaksiPenjualan->status == "DIBUAT")
                    <form action="/distributor/transaksi-penjualan/update-status/{{$transaksiPenjualan->id_transaksi_penjualan}}" method="post" class="mt-2">
                        @csrf
                        <input type="hidden" name="status" value="DI_DISTRIBUSIKAN"></input>
                        <button type="submit" class="btn icon icon-left btn-primary  w-100">
                            <i data-feather="shopping-cart" width="20"></i>
                            Distribusikan
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

