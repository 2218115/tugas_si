<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPenjualan;
use App\Models\Pengguna;
use App\Models\DetailTransaksiPenjualan;

use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Support\Facades\Auth;

class DashboardDistributorController extends Controller
{
    public function index() {
        $transaksiPenjualanList = TransaksiPenjualan::where('id_distributor', '=', Auth::user()->id_pengguna)->orderByDesc('tanggal_transaksi')->get();
        
        return view('dashboard-distributor.index', [
            'transaksiPenjualanList' => $transaksiPenjualanList,
        ]);
    }
    
    public function updateTransaksi(Request $request, string $id) {
        $validated = $request->validate([
            'status' => 'required',
        ]);
    
        TransaksiPenjualan::where('id_transaksi_penjualan', $id)->update([
            'status' => $validated['status'],
        ]);
        
        return redirect('/distributor/dashboard');
    }
        
    public function report() {
        $distributor = Pengguna::find(Auth::user()->id_pengguna);
        $transaksiPenjualanList = TransaksiPenjualan::where('id_distributor', '=', $distributor->id_pengguna)->orderByDesc('tanggal_transaksi')->get();
        
        $pdf = Pdf::loadView('pdfs.distributor-transaksi-penjualan', [
            'transaksiPenjualanList' => $transaksiPenjualanList,
            'distributor' => $distributor,
        ]);
        
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download();
    }
    
    public function show(Request $request, string $id) {
        $transaksiPenjualan = TransaksiPenjualan::find($id);

        $detailTransaksiPenjualanList = DetailTransaksiPenjualan::where('id_transaksi_penjualan', '=', $transaksiPenjualan->id_transaksi_penjualan)->get();
        
        return view('dashboard-distributor.transaksi-penjualan-detail', [
            'transaksiPenjualan' => $transaksiPenjualan,
            'detailTransaksiPenjualanList' => $detailTransaksiPenjualanList,
        ]);
    }
    
    public function reportDetail(Request $request, string $id) {
        $transaksiPenjualan = TransaksiPenjualan::find($id);
        $detailTransaksiPenjualanList = DetailTransaksiPenjualan::where('id_transaksi_penjualan', '=', $transaksiPenjualan->id_transaksi_penjualan)->get();
        
        $pdf = Pdf::loadView('pdfs.detail-transaksi-penjualan', [
            'transaksiPenjualan' => $transaksiPenjualan,
            'detailTransaksiPenjualanList' => $detailTransaksiPenjualanList,
        ]);
        
        $pdf->setPaper('a4', 'potrait');
        
        return $pdf->download();
    }
}
