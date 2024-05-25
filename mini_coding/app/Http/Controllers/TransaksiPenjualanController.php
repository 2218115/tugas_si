<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\TransaksiPenjualan;
use App\Models\Barang;
use App\Models\Pengguna;
use App\Models\JenisPembayaran;
use App\Models\NilaiTukarPoin;
use App\Models\Poin;
use App\Models\DetailTransaksiPenjualan;
use App\Models\PenukaranPoin;

class TransaksiPenjualanController extends Controller
{
    private $poinPerTransaksi = 10;

    public function index() {
        $transaksiPenjualanList = TransaksiPenjualan::orderByDesc('tanggal_transaksi')->get();
        
        return view('transaksi-penjualan.index', [
            'transaksiPenjualanList' => $transaksiPenjualanList,
        ]);
    }
    
    public function create() {
        $konsumenOrPelangganList = Pengguna::where('role', '=', 'Konsumen')->orWhere('role', '=', 'Pelanggan')->get();
        $distributorList = Pengguna::where('role', '=', 'Distributor')->get();
        $jenisPembayaranList = JenisPembayaran::all();
        $barangList = Barang::all();
        $nilaiTukarPoin = NilaiTukarPoin::orderByDesc('tanggal_dibuat')->first();
        $poinList = Poin::all();
        
        return view('transaksi-penjualan.create', [
            'barangList' => $barangList,
            'konsumenOrPelangganList' => $konsumenOrPelangganList,
            'jenisPembayaranList' => $jenisPembayaranList, 
            'distributorList' => $distributorList,
            'nilaiTukarPoin' => $nilaiTukarPoin,
            'poinList' => $poinList,
        ]);
    }
    
    public function store(Request $request) {        
        $validated = $request->validate([
            'pelangganOrKonsumen' => 'required',
            'distributor' => 'required',
            'jenisPembayaran' => 'required',
            'nominalPembayaran' => 'required',
            
            'barang' => 'required',
            'jumlah' => 'required',
            
            'tukarPoin' => 'required',
        ]);        
        
        try {
            DB::beginTransaction();
               
            $barangDipilihList = Barang::whereIn('id_barang', $validated['barang'])->get();
            
            $grandTotal = 0;
            foreach ($barangDipilihList as $index => $barang) {
                $grandTotal = $grandTotal + ($barang->harga * $validated['jumlah'][$index]); 
            }
            
            $nominalKembalian = $validated['nominalPembayaran'] - $grandTotal;
            
            $idPenukaranPoin = null;
            
            if ($validated["tukarPoin"] == "true") {
                $poinPengguna = Poin::where('id_pelanggan', '=', $validated['pelangganOrKonsumen'])->first();
                $nilaiTukarPoin = NilaiTukarPoin::orderByDesc('tanggal_dibuat')->first();
                
                $nominalKembalian = $nominalKembalian + ($nilaiTukarPoin->nilai_tukar * $poinPengguna->jumlah_poin);
    
                $idPenukaranPoin = PenukaranPoin::create([
                    'id_nilai_tukar_poin' => $nilaiTukarPoin->id_nilai_tukar_poin,
                    'tanggal_penukaran' => new \DateTime(),
                    'jumlah_poin_ditukar' => $poinPengguna->jumlah_poin,
                ]);
                
                $poinPengguna->jumlah_poin -= $poinPengguna->jumlah_poin;
                $poinPengguna->update();
            }
            
            $hasil = TransaksiPenjualan::create([
                'id_pengguna' => $validated['pelangganOrKonsumen'],
                'id_jenis_pembayaran' => $validated['jenisPembayaran'],
                'id_distributor' => $validated['distributor'],
                'nominal_pembayaran' => $validated['nominalPembayaran'],
                'nominal_kembalian' => $nominalKembalian,
                'status' => 'DIBUAT',
                'nominal_total' => $grandTotal,
                'tanggal_transaksi' => new \DateTime(),
                'id_penukaran_poin' => $idPenukaranPoin?->id_penukaran_poin,
            ]);
            
            $id_transaksi_penjualan = $hasil->id_transaksi_penjualan;
            
            foreach ($barangDipilihList as $index => $barang) {
                $detailTransaksi = [
                    'id_transaksi_penjualan' => $id_transaksi_penjualan,
                    'id_barang' => $barang->id_barang,
                    'jumlah' => $validated['jumlah'][$index],
                    'harga' => $barang->harga,
                    'total_harga' => ($barang->harga * $validated['jumlah'][$index]),
                ];
                
                DetailTransaksiPenjualan::create($detailTransaksi);                
            }
            
            if (Pengguna::find($validated['pelangganOrKonsumen'])->role == "Pelanggan") {       
                $poinPengguna = Poin::where('id_pelanggan', '=', $validated['pelangganOrKonsumen'])->first();
                $poinPengguna->jumlah_poin += $this->poinPerTransaksi;
                $poinPengguna->update();
            }
            
            
            DB::commit();
        } catch(Exception $ex) {
            DB::rollBack();
        }
        
        return redirect('/admin/transaksi-penjualan');
    }
    
    public function show(Request $request, string $id) {
        $backUrl = '/admin/transaksi-penjualan';
        
        if ($request->query('backUrl') != null) {
            $backUrl = $request->query('backUrl');
        }
        
        $transaksiPenjualan = TransaksiPenjualan::find($id);

        
        $detailTransaksiPenjualanList = DetailTransaksiPenjualan::where('id_transaksi_penjualan', '=', $transaksiPenjualan->id_transaksi_penjualan)->get();
        
        return view('transaksi-penjualan.detail', [
            'transaksiPenjualan' => $transaksiPenjualan,
            'detailTransaksiPenjualanList' => $detailTransaksiPenjualanList,
            'backUrl' => $backUrl,
        ]);
    }

    public function updateStatus(Request $request, string $id) {
        $validated = $request->validate([
            'status' => 'required',
        ]);
    
        TransaksiPenjualan::where('id_transaksi_penjualan', $id)->update([
            'status' => $validated['status'],
        ]);
        
        return redirect('/admin/transaksi-penjualan');
    }    
    
    public function report() {
        $transaksiPenjualanList = TransaksiPenjualan::orderByDesc('tanggal_transaksi')->get();
        
        $pdf = Pdf::loadView('pdfs.transaksi-penjualan', [
            'transaksiPenjualanList' => $transaksiPenjualanList,
        ]);
        
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download();
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
