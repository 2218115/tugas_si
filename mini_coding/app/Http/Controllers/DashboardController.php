<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TransaksiPenjualan;
use App\Models\Pengguna;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index() {
        $transaksiPenjualanCount = TransaksiPenjualan::count();
        $pelangganCount = Pengguna::where('role', '=', 'Pelanggan')->count();
        $barangCount = Barang::count();
        $transaksiPenjualanList = TransaksiPenjualan::whereDate('tanggal_transaksi', '=', date('Y-m-d'))->get();
    
        return view('dashboard.dashboard', [
            'transaksiPenjualanCount' => $transaksiPenjualanCount,
            'pelangganCount' => $pelangganCount,
            'barangCount' => $barangCount,
            'transaksiPenjualanList' => $transaksiPenjualanList,
        ]);
    }
}
