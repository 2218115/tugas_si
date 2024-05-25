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
               <h3>Data Jenis Pembayaran</h3>                   
                <a href="/admin/jenis-pembayaran/create" class="btn icon icon-left btn-primary"> <i data-feather="plus-circle" width="20"></i> Tambah Jenis Pembayaran</a>

                <a href="/admin/jenis-pembayaran/report" class="btn icon icon-left btn-success"> <i data-feather="printer" width="20"></i> Cetak</a>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Jenis Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php $no = 1 ?>
                    <tbody>
                        @foreach ($jenisPembayaranList as $jenisPembayaran)
                        <tr>
                            <td>{{ $no++ }}</th>
                            <td>{{ $jenisPembayaran->id_jenis_pembayaran }}</td>
                            <td>{{ $jenisPembayaran->jenis }}</td>
                            <td>
                                <a href="/admin/jenis-pembayaran/edit/{{$jenisPembayaran->id_jenis_pembayaran}}" class="btn icon icon-left btn-info">
                                <i data-feather="edit" width="20"></i> 
                                    Rubah
                                </a>
                                
                                <form action="/admin/jenis-pembayaran/delete/{{$jenisPembayaran->id_jenis_pembayaran}}" method="post" class="mt-2">                      
                                    @csrf
                                    <button type="submit" class="btn icon icon-left btn-danger">
                                        <i data-feather="trash" width="20"></i>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection


