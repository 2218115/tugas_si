@extends('layouts.report')

@section('content')
<h1>Data kategori barang</h1>
<table class="ui celled table">
    <thead>
        <th>No</th>
        <th>ID</th>
        <th>Nama Kategori</th>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        @foreach($kategoriBarangList as $kategoriBarang)
            <tr>  
                <td>{{$no++}}</td>
                <td>{{$kategoriBarang->id_kategori_barang}}</td>
                <td>{{$kategoriBarang->nama}}</td>
            </tr>
        @endforeach
    <tbody>
</table>
@endsection