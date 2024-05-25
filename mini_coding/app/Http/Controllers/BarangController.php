<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Barang;
use App\Models\KategoriBarang;

class BarangController extends Controller
{
    private $satuanList = [
        'Biji',
        'Lusin',
    ];
    
    public function index() {
        $barangList = Barang::all()->sortByDesc('id_barang');
                
        return view('barang.index', [
            'barangList' => $barangList,
        ]);
    }
    
    public function create(Request $request) {
        $kategoriBarangList = KategoriBarang::all();
    
        return view('barang.create', [
            'kategoriBarangList' => $kategoriBarangList,
            'satuanList' => $this->satuanList,
        ]);
    }    
        
    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'keterangan' => 'nullable',
        ]);
        
        Barang::create([
            'nama' => $validated['nama'],
            'id_kategori_barang' => $validated['kategori'],
            'satuan' => $validated['satuan'],
            'harga' => $validated['harga'],
            'keterangan' => $validated['keterangan'],
        ]);
    
        return redirect('/admin/barang');
    }
    
    public function destroy(Request $request, string $id) {
        Barang::destroy($id);
        
        return redirect('/admin/barang');
    }
    
    public function edit(Request $request, string $id) {
        $barang = Barang::find($id);
        $kategoriBarangList = KategoriBarang::all();        
        
        return view('barang.edit', [
            'barang' => $barang,
            'kategoriBarangList' => $kategoriBarangList,
            'satuanList' => $this->satuanList,
        ]);
    }
    
    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'keterangan' => 'nullable',
        ]);
        
        Barang::where('id_barang', '=', $id)->update([
            'nama' => $validated['nama'],
            'id_kategori_barang' => $validated['kategori'],
            'satuan' => $validated['satuan'],
            'harga' => $validated['harga'],
            'keterangan' => $validated['keterangan'],
        ]);
    
        return redirect('/admin/barang');        
    }
    
    public function report() {
        $barangList = Barang::all()->sortByDesc('id_barang');
        
        $pdf = Pdf::loadView('pdfs.barang', [
            'barangList' => $barangList,
        ]);
        
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download();
    }
}
