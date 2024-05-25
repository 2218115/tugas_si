<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\KategoriBarang;

class KategoriBarangController extends Controller
{
    public function index() {
        $kategoriBarangList = KategoriBarang::all()->sortByDesc('id_kategori_barang');
                
        return view('kategori-barang.index', [
            'kategoriBarangList' => $kategoriBarangList,
        ]);
    }
    
    public function create(Request $request) {
        return view('kategori-barang.create');
    }    
        
    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        
        KategoriBarang::create([
            'nama' => $validated['nama'],
        ]);
    
        return redirect('/admin/kategori-barang');
    }
    
    public function destroy(Request $request, string $id) {
        KategoriBarang::destroy($id);
        
        return redirect('/admin/kategori-barang');
    }
    
    public function edit(Request $request, string $id) {
        $kategoriBarang = KategoriBarang::find($id);
        
        return view('kategori-barang.edit', [
            'kategoriBarang' => $kategoriBarang,
        ]);
    }
    
    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        
        KategoriBarang::where('id_kategori_barang', '=', $id)->update([
            'nama' => $validated['nama'],
        ]);
    
        return redirect('/admin/kategori-barang');        
    }

    public function report() {
        $kategoriBarangList = KategoriBarang::all()->sortByDesc('id_kategori_barang');
        
        $pdf = Pdf::loadView('pdfs.kategori-barang', [
            'kategoriBarangList' => $kategoriBarangList,
        ]);
        
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download();
    }
}
