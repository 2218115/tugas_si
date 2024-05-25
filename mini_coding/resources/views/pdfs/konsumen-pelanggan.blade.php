@extends('layouts.report')

@section('content')
<table class="ui celled table">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Peran</th>
        <th>Email</th>
        <th>Provinsi</th>
        <th>Kota</th>
        <th>Kelurahan</th>
        <th>Detail Alamat</th>
        <th>Telepon</th>
    </tr>
</thead>

<tbody>
    {{$no = 1}}
    @foreach ($konsumenOrPelangganList as $konsumenOrPelanggan)
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $konsumenOrPelanggan->nama }}</td>
        @if($konsumenOrPelanggan->role == "Pelanggan")
            <td><span class="badge bg-primary">{{ $konsumenOrPelanggan->role }}</span></td>
        @else
            <td><span class="badge bg-dark">{{ $konsumenOrPelanggan->role }}</span></td>
        @endif
        
        <td>{{ $konsumenOrPelanggan->email }}</td>
        
        @if($konsumenOrPelanggan->detailPengguna != null)
            <td>{{ $konsumenOrPelanggan->detailPengguna->provinsi }}</td>
            <td>{{ $konsumenOrPelanggan->detailPengguna->kota }}</td>
            <td>{{ $konsumenOrPelanggan->detailPengguna->kelurahan }}</td>
            <td>{{ $konsumenOrPelanggan->detailPengguna->detail_alamat }}</td>
            <td>{{ $konsumenOrPelanggan->detailPengguna->telepon }}</td>
        @endif        
    </tr>                        
    @endforeach
</tbody>
</table>
@endsection