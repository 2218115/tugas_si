<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiTukarPoin;

use Barryvdh\DomPDF\Facade\Pdf;

class NilaiTukarPoinController extends Controller
{
    public function index() {
        $nilaiTukarPoinList = NilaiTukarPoin::all()->sortByDesc('tanggal_dibuat');
        return view('nilai-tukar-poin.index', [
            'nilaiTukarPoinList' => $nilaiTukarPoinList,
        ]);
    }
    
    public function create() {
        return view('nilai-tukar-poin.create');
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            'nilaiTukar' => 'required|min:1',
        ]);
        NilaiTukarPoin::create([
            'nilai_tukar' => $validated['nilaiTukar'],
            'tanggal_dibuat' => new \DateTime(),
        ]);
        return redirect('/admin/nilai-tukar-poin');
    }
    
    public function report() {
        $nilaiTukarPoinList = NilaiTukarPoin::all()->sortByDesc('tanggal_dibuat');
        
        $pdf = Pdf::loadView('pdfs.nilai-tukar-poin', [
            'nilaiTukarPoinList' => $nilaiTukarPoinList,
        ]);
        
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download();
    }
}
