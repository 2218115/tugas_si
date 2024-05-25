<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\KritikDanSaran;

class KritikDanSaranController extends Controller
{
    public function index() {
        $kritikDanSaranList = KritikDanSaran::all()->sortByDesc('tanggal_submit');
    
        return view('kritik-dan-saran.index', [
            'kritikDanSaranList' => $kritikDanSaranList,
        ]);
    }

    public function report() {
        $kritikDanSaranList = KritikDanSaran::all()->sortByDesc('tanggal_submit');        
        
        $pdf = Pdf::loadView('pdfs.kritik-dan-saran', [
            'kritikDanSaranList' => $kritikDanSaranList,
        ]);
        
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download();
    }
}
