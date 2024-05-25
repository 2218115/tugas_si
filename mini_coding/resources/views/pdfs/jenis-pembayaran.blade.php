@extends('layouts.report')

@section('content')
<h1>Jenis Pembayaran</h1>
<table class="ui celled table">
    <thead>
        <th>No</th>
        <th>ID</th>
        <th>Jenis Pembayaran</th>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        @foreach($jenisPembayaranList as $jenisPembayaran)
            <tr>  
                <td>{{$no++}}</td>
                <td>{{$jenisPembayaran->id_jenis_pembayaran}}</td>
                <td>{{$jenisPembayaran->jenis}}</td>
            </tr>
        @endforeach
    <tbody>
</table>
@endsection