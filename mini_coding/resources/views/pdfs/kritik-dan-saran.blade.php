@extends('layouts.report')

@section('content')
<table class="ui celled table">
    <thead>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Saran - Kritk</th>
        <th>Tanggal Submit</th>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        @foreach($kritikDanSaranList as $kritikDanSaran)
            <tr>  
                <td>{{$no++}}</td>
                <td>{{$kritikDanSaran->pengguna->nama}}</td>
                <td>{{$kritikDanSaran->saran_kritik}}</td>
                <td>{{$kritikDanSaran->tanggal_submit}}</td>
            </tr>
        @endforeach
    <tbody>
</table>
@endsection