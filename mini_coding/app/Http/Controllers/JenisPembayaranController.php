<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPembayaran;

use Barryvdh\DomPDF\Facade\Pdf;

class JenisPembayaranController extends Controller
{
    public function index() {
        $jenisPembayaranList = JenisPembayaran::all()->sortByDesc('id_jenis_pembayaran');
                
        return view('jenis-pembayaran.index', [
            'jenisPembayaranList' => $jenisPembayaranList,
        ]);
    }
    
    public function create(Request $request) {
        return view('jenis-pembayaran.create');
    }    
        
    public function store(Request $request) {
        $validated = $request->validate([
            'jenis' => 'required',
        ]);
        
        JenisPembayaran::create([
            'jenis' => $validated['jenis'],
        ]);
    
        return redirect('/admin/jenis-pembayaran');
    }
    
    public function destroy(Request $request, string $id) {
        JenisPembayaran::destroy($id);
        
        return redirect('/admin/jenis-pembayaran');
    }
    
    public function edit(Request $request, string $id) {
        $jenisPembayaran = JenisPembayaran::find($id);
        
        return view('jenis-pembayaran.edit', [
            'jenisPembayaran' => $jenisPembayaran,
        ]);
    }
    
    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'jenis' => 'required',
        ]);
        
        JenisPembayaran::where('id_jenis_pembayaran', '=', $id)->update([
            'jenis' => $validated['jenis'],
        ]);
    
        return redirect('/admin/jenis-pembayaran');        
    }

    public function report() {
        $jenisPembayaranList = JenisPembayaran::all()->sortByDesc('id_jenis_pembayaran');
        
        $pdf = Pdf::loadView('pdfs.jenis-pembayaran', [
            'jenisPembayaranList' => $jenisPembayaranList,
        ]);
        
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download();
    }
}
