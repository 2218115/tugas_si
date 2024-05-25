@extends('layouts.report')

@section('content')
<h1>Nilai Tukar Poin</h1>
<table class="ui celled table">
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nilai Tukar</th>
            <th>Tanggal Dibuat</th>
        </tr>
    </thead>
    
    <tbody>
    <?php $no = 1 ?>
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
@endsection

                    