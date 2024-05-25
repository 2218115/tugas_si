@extends('layouts.admin-dashboard')

@section('content')            
<div class="main-content container-fluid">
    <div class="page-title">
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Buat Nilai Tukar Poin</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="/admin/nilai-tukar-poin" method="POST">
                
                @csrf
                
                <div class="form-body">
                    <div class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama">Nilai Tukar</label>
                                <input type="number" name="nilaiTukar" class="form-control" placeholder="Masukkan nilai tukar poin" id="first-name-icon">
                                @error('nilaiTukar')
                                    <div class="alert alert-light-danger color-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                    
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Masukkan</button>
                        <a type="reset" class="btn btn-light-secondary me-1 mb-1" href="/admin/nilai-tukar-poin">Batal</a>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection
