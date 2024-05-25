<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\KritikDanSaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiPenjualanController;
use App\Http\Controllers\KonsumenPelangganController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\JenisPembayaranController;
use App\Http\Controllers\PenukaranPoinController;
use App\Http\Controllers\NilaiTukarPoinController;
use App\Http\Controllers\DashboardDistributorController;
use App\Http\Controllers\DashboardPenggunaController;

use App\Http\Middleware\EnsureHasRole;

Route::get('/', function () {
    return view('welcome');
})->middleware([EnsureHasRole::class . ':Pengguna', ]);

Route::get('errors-403', function () {
    return view('errors.403');
});

Route::get('errors-404', function () {
    return view('errors.404');
});

// Route untuk konsumen dan pelanggan
Route::prefix('pengguna')->middleware([EnsureHasRole::class . ':Konsumen|Pelanggan', ])->group(function () {
    // dashboard
    Route::get('dashboard', [DashboardPenggunaController::class, 'index']);
    // transaksi
    Route::get('transaksi-penjualan/detail/{id}', [DashboardPenggunaController::class, 'show']);
    Route::get('transaksi-penjualan/report', [DashboardPenggunaController::class, 'reportTransaksi']);
    Route::get('transaksi-penjualan/detail/{id}/report', [DashboardPenggunaController::class, 'reportDetail']);
    
    // kritik dan saran
    Route::get('kritik-dan-saran', [DashboardPenggunaController::class, 'kritikDanSaran']);
    Route::post('kritik-dan-saran', [DashboardPenggunaController::class, 'createKritikDanSaran']);
    Route::post('kritik-dan-saran/delete/{id}', [DashboardPenggunaController::class, 'destroyKritikDanSaran']);
    Route::get('kritik-dan-saran/report', [DashboardPenggunaController::class, 'reportKritikSaran']);
    
    // penukaran poin
    Route::get('penukaran-poin', [DashboardPenggunaController::class, 'penukaranPoin']);
    Route::get('penukaran-poin/report', [DashboardPenggunaController::class, 'reportPenukaranPoin']);

    // akun
    Route::get('akun', [DashboardPenggunaController::class, 'akun']);
    Route::post('akun', [DashboardPenggunaController::class, 'updateAkun']);
    
});

// Route untuk autentikasi
Route::prefix('auth')->group(function () {
    // login
    Route::get('login', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class, 'authenticate']);
    
    // register
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'signup']);

    // logout
    Route::get('logout', [AuthController::class, 'logout']);    
});

// Route untuk distributor
Route::prefix('distributor')->middleware([EnsureHasRole::class . ':Distributor', ])->group(function () {
    Route::get('dashboard', [DashboardDistributorController::class, 'index']);
    Route::post('transaksi-penjualan/update-status/{id}', [DashboardDistributorController::class, 'updateTransaksi']);
    Route::get('transaksi-penjualan/report', [DashboardDistributorController::class, 'report']);
    Route::get('transaksi-penjualan/detail/{id}', [DashboardDistributorController::class, 'show']);
    
    Route::get('transaksi-penjualan/detail/{id}/report', [DashboardDistributorController::class, 'reportDetail']);
    
});

// Route untuk admin
Route::prefix('admin')->middleware([EnsureHasRole::class . ':Admin', ])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    // Barang
    Route::get('barang', [BarangController::class, 'index']);
        // create
        Route::get('barang/create', [BarangController::class, 'create']);
        Route::post('barang', [BarangController::class, 'store']);
        // update
        Route::get('barang/edit/{id}', [BarangController::class, 'edit']);
        Route::post('barang/update/{id}', [BarangController::class, 'update']);
        // delete
        Route::post('barang/delete/{id}', [BarangController::class, 'destroy']);
        // report
        Route::get('barang/report', [BarangController::class, 'report']);
    
    // Kategori Barang
    Route::get('kategori-barang', [KategoriBarangController::class, 'index']);
        // create
        Route::get('kategori-barang/create', [KategoriBarangController::class, 'create']);
        Route::post('kategori-barang', [KategoriBarangController::class, 'store']);
        // update
        Route::get('kategori-barang/edit/{id}', [KategoriBarangController::class, 'edit']);
        Route::post('kategori-barang/update/{id}', [KategoriBarangController::class, 'update']);
        // delete
        Route::post('kategori-barang/delete/{id}', [KategoriBarangController::class, 'destroy']);
        // report
        Route::get('kategori-barang/report', [KategoriBarangController::class, 'report']);
        
    // kritik dan saran
    Route::get('kritik-dan-saran', [KritikDanSaranController::class, 'index']);
    Route::get('kritik-dan-saran/report', [KritikDanSaranController::class, 'report']);

    // Transaksi penjualan
    Route::get('transaksi-penjualan', [TransaksiPenjualanController::class, 'index']);
        // create
        Route::get('transaksi-penjualan/create', [TransaksiPenjualanController::class, 'create']);
        Route::post('transaksi-penjualan', [TransaksiPenjualanController::class, 'store']);
        // read detail
        Route::get('transaksi-penjualan/detail/{id}', [TransaksiPenjualanController::class, 'show']);
        // update
        Route::post('transaksi-penjualan/update-status/{id}', [TransaksiPenjualanController::class, 'updateStatus']);
        // report
        Route::get('transaksi-penjualan/report', [TransaksiPenjualanController::class, 'report']);
        // report detail
        Route::get('transaksi-penjualan/detail/{id}/report', [TransaksiPenjualanController::class, 'reportDetail']);
    
    // Jenis Pembayaran
    Route::get('jenis-pembayaran', [JenisPembayaranController::class, 'index']);
        // create
        Route::get('jenis-pembayaran/create', [JenisPembayaranController::class, 'create']);
        Route::post('jenis-pembayaran', [JenisPembayaranController::class, 'store']);
        // update
        Route::get('jenis-pembayaran/edit/{id}', [JenisPembayaranController::class, 'edit']);
        Route::post('jenis-pembayaran/update/{id}', [JenisPembayaranController::class, 'update']);
        // delete
        Route::post('jenis-pembayaran/delete/{id}', [JenisPembayaranController::class, 'destroy']);
        // report
        Route::get('jenis-pembayaran/report', [JenisPembayaranController::class, 'report']);
        
    // penukaran poin
    Route::get('penukaran-poin', [PenukaranPoinController::class, 'index']);
        // report
        Route::get('penukaran-poin/report', [PenukaranPoinController::class, 'report']);
    
    // Nilai tukar poin
    Route::get('nilai-tukar-poin', [NilaiTukarPoinController::class, 'index']);
        // create
        Route::get('nilai-tukar-poin/create', [NilaiTukarPoinController::class, 'create']);
        Route::post('nilai-tukar-poin', [NilaiTukarPoinController::class, 'store']);
        // report
        Route::get('nilai-tukar-poin/report', [NilaiTukarPoinController::class, 'report']);        

    // Pengguna
    
    // Konsumen dan Pelanggan
    Route::get('konsumen-pelanggan', [KonsumenPelangganController::class, 'index']);
        // read detail
        Route::get('konsumen-pelanggan/detail/{id}', [KonsumenPelangganController::class, 'show']);
        // update role (jadikan pelanggan)
        Route::post('konsumen-pelanggan/update/{id}', [KonsumenPelangganController::class, 'updateRole']);
        // report
        Route::get('konsumen-pelanggan/report', [KonsumenPelangganController::class, 'report']);
        
    // distributor
    Route::get('distributor', [DistributorController::class, 'index']);
        // create
        Route::get('distributor/create', [DistributorController::class, 'create']);
        Route::post('distributor', [DistributorController::class, 'store']);
        // read detail
        Route::get('distributor/detail/{id}', [DistributorController::class, 'show']);
        // update
        Route::get('distributor/edit/{id}', [DistributorController::class, 'edit']);
        Route::post('distributor/update/{id}', [DistributorController::class, 'update']);
        // delete
        Route::post('distributor/delete/{id}', [DistributorController::class, 'destroy']);
        // report
        Route::get('distributor/report', [DistributorController::class, 'report']);
});
