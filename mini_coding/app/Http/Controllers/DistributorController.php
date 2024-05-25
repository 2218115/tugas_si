<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\DetailPengguna;

class DistributorController extends Controller
{
    public function index() {
        $distributorList = Pengguna::where('role', '=', 'Distributor')->get();
        
        return view('distributor.index', [
            'distributorList' => $distributorList,
        ]);
    }
    
    public function create() {
        return view('distributor.create');
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kelurahan' => 'required',
            'detailAlamat' => 'required',
            'telepon' => 'required',
            'password' => 'required',
        ]);
        
        try {
            DB::beginTransaction();
            $detailPengguna = DetailPengguna::create([
                'provinsi' => $validated['provinsi'],
                'kota' => $validated['kota'],
                'kelurahan' => $validated['kelurahan'],
                'detail_alamat' => $validated['detailAlamat'],
                'telepon' => $validated['telepon'],
            ]);
            
            Pengguna::create([
                'id_detail_pengguna' => $detailPengguna->id_detail_pengguna,
                'role' => 'Distributor',
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'nama' => $validated['nama'],
            ]);
            DB::commit();
        } catch(Exception $ex) {
            DB::rollback();
        }
        
        
        return redirect('/admin/distributor');
    }
    
    public function edit(Request $request, string $id) {
        $distributor = Pengguna::find($id);
        
        return view('distributor.edit', [
            'distributor' => $distributor,
        ]);
    }
    
    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kelurahan' => 'required',
            'detailAlamat' => 'required',
            'telepon' => 'required',
            'password' => 'nullable',
        ]);
        
        try {
            DB::beginTransaction();
            $pengguna = Pengguna::find($id);
            
            
            $detailPengguna = DetailPengguna::find($pengguna->id_detail_pengguna)->update([
                'provinsi' => $validated['provinsi'],
                'kota' => $validated['kota'],
                'kelurahan' => $validated['kelurahan'],
                'detail_alamat' => $validated['detailAlamat'],
                'telepon' => $validated['telepon'],
            ]);
            
            $password = $pengguna->password;
            if ($validated['password'] != null) {
                $password = Hash::make($validated['password']);
            }
            
            $pengguna->update([
                'id_detail_pengguna' => $pengguna->id_detail_pengguna,
                'role' => 'Distributor',
                'email' => $validated['email'],
                'password' => $password,
                'nama' => $validated['nama'],
            ]);
            
            DB::commit();
        } catch(Exception $ex) {
            DB::rollback();
        }
        
        return redirect('/admin/distributor');
    }
    
    public function destroy(Request $request, string $id) {
        
        DB::beginTransaction();
        try {
            $pengguna = Pengguna::find($id);
            
            if ($pengguna->id_detail_pengguna != null) {
                $detailPengguna = DetailPengguna::find($pengguna->id_detail_pengguna);
                 DetailPengguna::destroy($detailPengguna->id_detail_pengguna);
            }

            Pengguna::destroy($pengguna->id_pengguna);
            
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
        }
        
        
        return redirect('/admin/distributor');
    }
        
    public function report() {
        $distributorList = Pengguna::where('role', '=', 'Distributor')->get();
        
        $pdf = Pdf::loadView('pdfs.distributor', [
            'distributorList' => $distributorList,
        ]);
        
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download();
   
    }
}
