@extends('layouts.admin-dashboard')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('script')
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
@endsection

@section('content')            
<?php $no = 1 ?>
<div class="main-content container-fluid">
    <div class="page-title">
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
               <h3>Data Nilai Tukar Poin</h3>                   
                <a href="/admin/nilai-tukar-poin/create" class="btn icon icon-left btn-primary"> <i data-feather="plus-circle" width="20"></i>Masukkan Nilai Tukar Poin</a>

                <a href="/admin/nilai-tukar-poin/report" class="btn icon icon-left btn-success"> <i data-feather="printer" width="20"></i> Cetak</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="alert alert-info">
                        <h4 class="alert-heading">{{$nilaiTukarPoinList->first()->nilai_tukar}}</h4>
                        <p>Nilai Tukar Yang berlaku saat ini.</p>
                    </div>
                </di>
                
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nilai Tukar</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($nilaiTukarPoinList as $nilaiTukarPoin)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$nilaiTukarPoin->id_nilai_tukar_poin}}</td>
                        <td>{{$nilaiTukarPoin->nilai_tukar}}</td>
                        <td>{{$nilaiTukarPoin->tanggal_dibuat}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection


