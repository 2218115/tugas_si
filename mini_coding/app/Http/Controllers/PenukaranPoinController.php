<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenukaranPoin;

use Barryvdh\DomPDF\Facade\Pdf;

class PenukaranPoinController extends Controller
{
    public function index() {
        $penukaranPoinList = PenukaranPoin::all()->sortByDesc('id_penukaran_poin');
                
        return view('penukaran-poin.index', [
            'penukaranPoinList' => $penukaranPoinList,
        ]);
    }    
    
    public function report() {
       $penukaranPoinList = PenukaranPoin::all()->sortByDesc('id_penukaran_poin');
     
        $pdf = Pdf::loadView('pdfs.penukaran-poin', [
            'penukaranPoinList' => $penukaranPoinList,
        ]);
        
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download();
    }
}
