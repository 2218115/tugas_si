<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Poin;

use Barryvdh\DomPDF\Facade\Pdf;

class KonsumenPelangganController extends Controller
{
    public function index() {
        $konsumenOrPelangganList = Pengguna::where('role', '=', 'Pelanggan')->orWhere('role', '=', 'Konsumen')->get()->sortByDesc('id_pengguna');
        
        return view('konsumen-pelanggan.index', [
            'konsumenOrPelangganList' => $konsumenOrPelangganList,
        ]);
    }
    
    public function updateRole(Request $request, string $id) {
        $validated = $request->validate([
            'role' => 'required',
        ]);
        
        Pengguna::find($id)->update([
            'role' => $validated['role'],
        ]);
        
        $poinPengguna = Poin::where('id_pelanggan', '=', $id)->first();
        if ($poinPengguna == null) {
            Poin::create([
                'id_pelanggan' => $id,
                'jumlah_poin' => 10,
            ]);   
        }
        
        return redirect('/admin/konsumen-pelanggan');
    }
    
    public function report(Request $request) {
        $konsumenOrPelangganList = Pengguna::where('role', '=', 'Pelanggan')->orWhere('role', '=', 'Konsumen')->get()->sortByDesc('id_pengguna');
        
        $pdf = Pdf::loadView('pdfs.konsumen-pelanggan', [
            'konsumenOrPelangganList' => $konsumenOrPelangganList,
        ]);
        
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download();

    }
}
