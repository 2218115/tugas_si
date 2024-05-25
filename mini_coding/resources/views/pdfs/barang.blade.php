@extends('layouts.report')

@section('content')
<table class="ui celled table">
    <thead>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Kategori Barang</th>
        <th>Satuan</th>
        <th>Harga</th>
        <th>Keterangan</th>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        @foreach($barangList as $barang)
            <tr>  
                <td>{{$no++}}</td>
                <td>{{$barang->nama}}</td>
                <td>{{$barang->kategoriBarang->nama}}</td>
                <td>{{$barang->satuan}}</td>
                <td>{{$barang->harga}}</td>
                <td>{{$barang->keterangan}}</td>

            </tr>
        @endforeach
    <tbody>
</table>
@endsection