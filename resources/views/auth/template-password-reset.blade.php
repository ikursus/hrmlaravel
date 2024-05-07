@extends('auth.induk')

@section('page-title')
Forgot Password
@endsection

@section('borang-title')
Request Password Reset
@endsection

@section('borang-content')
<form method="POST" action="{{ route('password.request') }}">
    @csrf
    <div class="form-floating mb-3">
        <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
        <label for="inputEmail">Email address</label>
    </div>
    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
        <a class="small" href="{{ route('login') }}">Return to login</a>
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </div>
</form>
@endsection

@section('borang-footer')
<div class="small">
    <a href="{{ route('register.page') }}">Need an account? Sign up!</a>
</div>
@endsection
