<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPenjualan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Pengguna;
use App\Models\DetailPengguna;
use App\Models\DetailTransaksiPenjualan;
use App\Models\KritikDanSaran;
use App\Models\PenukaranPoin;
use App\Models\NilaiTukarPoin;
use App\Models\Poin;

use Barryvdh\DomPDF\Facade\Pdf;

class DashboardPenggunaController extends Controller
{
    public function index() {
        $poin = Poin::where('id_pelanggan', '=', Auth::user()->id_pengguna)->first();
        $transaksiPenjualanList = TransaksiPenjualan::where('id_pengguna', '=', Auth::user()->id_pengguna)->get();
        
        return view('pengguna.dashboard', [
            'transaksiPenjualanList' => $transaksiPenjualanList,
            'poin' => $poin,
        ]);
    }
        
    public function show(Request $request, string $id) {
        $transaksiPenjualan = TransaksiPenjualan::find($id);

        $detailTransaksiPenjualanList = DetailTransaksiPenjualan::where('id_transaksi_penjualan', '=', $transaksiPenjualan->id_transaksi_penjualan)->get();
        
        return view('pengguna.transaksi-penjualan-detail', [
            'transaksiPenjualan' => $transaksiPenjualan,
            'detailTransaksiPenjualanList' => $detailTransaksiPenjualanList,
            'backUrl' => $request->query('backUrl'),
        ]);
    }
    
    public function reportTransaksi() {
        $pengguna = Pengguna::find(Auth::user()->id_pengguna);
        $transaksiPenjualanList = TransaksiPenjualan::where('id_pengguna', '=', $pengguna->id_pengguna)->orderByDesc('tanggal_transaksi')->get();
        
        $pdf = Pdf::loadView('pdfs.pengguna-transaksi-penjualan', [
            'transaksiPenjualanList' => $transaksiPenjualanList,
            'pengguna' => $pengguna,
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
        
    public function akun() {
        $pengguna = Auth::user();
        
        return view('pengguna.akun', [
            'pengguna' => $pengguna,
        ]);
    }
    
    public function updateAkun(Request $request) {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
            'provinsi' => 'required',
            'kota' => 'required',
            'kelurahan' => 'required',
            'detailAlamat' => 'required',
            'telepon' => 'required',
        ]);
        
        try {
            if (Pengguna::where('id_pengguna', '=', Auth::user()->id_pengguna)->first() == null) {
                return back()->withErrors([
                        'Pengguna' => 'Operasi perbarui pada pengguna tidak valid',
                ]);    
            }
            
            DB::beginTransaction();
            
            $password = Auth::user()->password;
            if ($validated['password'] != null) {
                $password = Hash::make($validated['password']);
            }            
            
            Pengguna::find(Auth::user()->id_pengguna)->update([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'password' => $password,
                'role' => 'Pelanggan',
            ]);            
        
            DetailPengguna::where('id_detail_pengguna', '=', Auth::user()->id_detail_pengguna)->update([
                'provinsi' => $validated['provinsi'],
                'kelurahan' => $validated['kelurahan'],
                'detail_alamat' => $validated['detailAlamat'],
                'telepon' => $validated['telepon'],
                'kota' => $validated['kota'],
            ]);
            
            DB::commit();
        } catch(Exception $ex) {
            DB::rollback();
            return back()->withErrors([
                    'Pengguna' => 'Perbarui data pengguna baru gagal',
            ]);
        } finally {
            $request->session()->flash('status', 'Update Berhasil');
        }
        
        return redirect('/pengguna/akun');
    }
    
    
    public function kritikDanSaran() {
        $kritikDanSaranList = KritikDanSaran::where('id_pengguna', '=', Auth::user()->id_pengguna)->get()->sortByDesc('tanggal_submit');
    
        return view('pengguna.kritik-dan-saran', [
            'kritikDanSaranList' => $kritikDanSaranList,
        ]);    
    }
    
    public function reportKritikSaran() {
        $kritikDanSaranList = KritikDanSaran::all()->sortByDesc('tanggal_submit');        
        
        $pdf = Pdf::loadView('pdfs.pengguna-kritik-dan-saran', [
            'kritikDanSaranList' => $kritikDanSaranList,
        ]);
        
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download();
    }
    
    public function createKritikDanSaran(Request $request) {
        $validated = $request->validate([
            'kritikSaran' => 'required',
        ]);
        
        KritikDanSaran::create([
            'id_pengguna' => Auth::user()->id_pengguna,
            'saran_kritik' => $validated['kritikSaran'],
            'tanggal_submit' => new \DateTime(),
        ]);
        
        $request->session()->flash('status', 'Submit Berhasil');
        
        return redirect('/pengguna/kritik-dan-saran');        
    }
    
    public function destroyKritikDanSaran(Request $request, string $id) {
        KritikDanSaran::destroy($id);
        
        $request->session()->flash('status', 'Berhasil di hapus');
        
        return redirect('/pengguna/kritik-dan-saran');
    }
    
    public function penukaranPoin() {
        $transaksiPenjualanList = TransaksiPenjualan::where('id_pengguna', '=', Auth::user()->id_pengguna);
        
        $idsPenukaranPoin = $transaksiPenjualanList->pluck('id_penukaran_poin');   
        $penukaranPoinList = PenukaranPoin::whereIn('id_penukaran_poin', $idsPenukaranPoin)->get();
        
        $nilaiTukarPoin = NilaiTukarPoin::all()->sortByDesc('tanggal_dibuat')->first();
        
        return view('pengguna.penukaran-poin', [
            'penukaranPoinList' => $penukaranPoinList,
            'nilaiTukarPoin' => $nilaiTukarPoin,
        ]);
    }
    
    public function reportPenukaranPoin() {
        $penukaranPoinList = PenukaranPoin::has('transaksiPenjualan.pengguna', '=', Auth::user()->id_pengguna)->get()->sortByDesc('tanggal_penukaran');
     
        $pdf = Pdf::loadView('pdfs.penukaran-poin', [
            'penukaranPoinList' => $penukaranPoinList,
        ]);
        
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download();        
    }
}
