@extends('auth.induk')

@section('page-title')
Login
@endsection

@section('borang-title')
Login Area
@endsection

@section('borang-content')
<form method="POST" action="{{ route('login.authenticate') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{ csrf_field() }}
    @csrf

    <div class="form-floating mb-3">
        <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
        <label for="inputEmail">Email address</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="inputPassword" type="password" placeholder="Password" />
        <label for="inputPassword">Password</label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
        <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
    </div>
    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
        <a class="small" href="{{ route('password.forgot') }}">Forgot Password?</a>
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>
@endsection

@section('borang-footer')
<div class="small">
    <a href="{{ route('register.page') }}">Need an account? Sign up!</a>
</div>
@endsection
