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
    @foreach ($distributorList as $distributor)
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $distributor->nama }}</td>
        <td><span class="badge bg-dark">{{ $distributor->role }}</span></td>
        <td>{{ $distributor->email }}</td>
        
        @if($distributor->detailPengguna != null)
            <td>{{ $distributor->detailPengguna->provinsi }}</td>
            <td>{{ $distributor->detailPengguna->kota }}</td>
            <td>{{ $distributor->detailPengguna->kelurahan }}</td>
            <td>{{ $distributor->detailPengguna->detail_alamat }}</td>
            <td>{{ $distributor->detailPengguna->telepon }}</td>
        @endif        
    </tr>                        
    @endforeach
</tbody>
</table>
@endsection