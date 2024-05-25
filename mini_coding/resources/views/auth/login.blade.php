@extends('layouts.basic')

@section('title', 'Masuk')

@section('content')
<div id="auth">  
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <h3>Masuk</h3>
                        <p>Masuk ke dalam akun anda.</p>
                    </div>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="/auth/login" method="POST">
                        
                        @csrf
                                     
                        <div class="form-group position-relative has-icon-left">
                            <label for="email">Email</label>
                            <div class="position-relative">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                                <div class="form-control-icon">
                                    <i data-feather="mail"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Kata Sandi</label>
                            </div>
                            <div class="position-relative">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Masukkan Password">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

                        <div class='form-check clearfix my-4'>
                            <div class="float-end">
                                <a href="/auth/register">Belum punya akun?</a>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button class="btn btn-primary float-end">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection