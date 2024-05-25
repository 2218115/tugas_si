@extends('layouts.admin-dashboard')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('script')
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
@endsection

@section('content')            
<div class="main-content container-fluid">
    <div class="page-title">
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
               <h3>Kritik dan Saran Pelanggan</h3>
               
               <a href="/admin/kritik-dan-saran/report" class="btn icon icon-left btn-success"> <i data-feather="printer" width="20"></i>Cetak</a>                
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pengguna</th>
                            <th>Kritik Saran</th>
                            <th>Tanggal Submit</th>
                        </tr>
                    </thead>
                    <?php $no = 1 ?>
                    <tbody>
                        @foreach ($kritikDanSaranList as $kritikDanSaran)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $kritikDanSaran->pengguna->nama }}</td>
                            <td>{{ $kritikDanSaran->saran_kritik }}</td>
                            <td>{{ $kritikDanSaran->tanggal_submit }}</td>
                        </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection


