@extends('layouts.basic')

@section('content')
    <div id="error">
        
    <div class="container text-center pt-32">
        <h1 class='error-title'>403</h1>
        <p>Hmmm. anda tidak di perbolehkan ke sini</p>
        <a href="/auth/login" class='btn btn-primary'>Kembali</a>
    </div>

    <div class="footer pt-32">
            <p class="text-center">Copyright &copy; Voler 2020</p>
        </div>
    </div>
@endsection