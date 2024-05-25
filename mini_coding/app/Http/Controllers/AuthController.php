<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Pengguna;
use App\Models\DetailPengguna;

class AuthController extends Controller
{
    public function login() {
    
        $loggedUser = Auth::user();
        
        if ($loggedUser) {
            if ($loggedUser->role == "Pelanggan" || $loggedUser->role == "Konsumen") {
                return redirect()->intended('/pengguna/dashboard');
            } else if ($loggedUser->role == "Distributor") {
                return redirect()->intended('/distributor/dashboard');
            } 
            else if ($loggedUser->role == "Admin") {
                return redirect()->intended('/admin/dashboard');
            }
        }        
    
        return view('auth.login');
    }
    
    public function register() {
        return view('auth.register');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth/login');
    }
    
    public function signup(Request $request) {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kelurahan' => 'required',
            'detailAlamat' => 'required',
            'telepon' => 'required',
        ]);
        
        try {
            if (Pengguna::where('email', '=', $validated['email'])->first() != null) {
                return back()->withErrors([
                        'Pendaftaran' => 'Email sudah terdaftar',
                ]);    
            }
            
            DB::beginTransaction();
            
            $detailPengguna = DetailPengguna::create([
                'provinsi' => $validated['provinsi'],
                'kelurahan' => $validated['kelurahan'],
                'detail_alamat' => $validated['detailAlamat'],
                'telepon' => $validated['telepon'],
                'kota' => $validated['kota'],
            ]);
            
            Pengguna::create([
                'id_detail_pengguna' => $detailPengguna->id_detail_pengguna,
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'Konsumen',
            ]);
            
            DB::commit();
        } catch(Exception $ex) {
            DB::rollback();
            return back()->withErrors([
                    'Pendaftaran' => 'Pendaftaran gagal',
            ]);
        }
        
        return redirect('/auth/login');
    }
    
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $loggedUser = Auth::user();
            
            if ($loggedUser->role == "Pelanggan" || $loggedUser->role == "Konsumen") {
                return redirect()->intended('/pengguna/dashboard');
            } else if ($loggedUser->role == "Admin") {
                return redirect()->intended('/admin/dashboard');
            } else {
                return back()->withErrors([
                    'pengguna' => 'Pengguna tidak valid',
                ]);
            }
        }
        
        return back()->withErrors([
            'email' => 'Email tidak terdaftar',
        ])->onlyInput('email');
    }
    
    
}
