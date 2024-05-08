@extends('layouts.master')

@section('page-title')
Edit User - {{ $user->first_name }}
@endsection

@section('page-subtitle')
Please fill in the form below
@endsection

@section('page-content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        User Information
    </div>
    <div class="card-body">

        @include('layouts.alerts')

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PATCH')
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" type="text" placeholder="Enter your first name" value="{{ old('first_name') ?? $user->first_name }}" />
                        <label for="inputFirstName">First name</label>
                    </div>
                    @error('first_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" name="last_name" type="text" placeholder="Enter your last name" value="{{ old('last_name') ?? $user->last_name }}" />
                        <label for="inputLastName">Last name</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" name="email" type="email" placeholder="name@example.com" value="{{ old('email') ?? $user->email }}" />
                        <label for="inputEmail">Email address</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" name="phone" type="text" placeholder="0123456789" value="{{ old('phone') ?? $user->phone }}" />
                        <label>Phone</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="password" type="password" placeholder="Create a password" value="{{ old('password') }}" />
                        <label for="inputPassword">Password</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm password" value="{{ old('password_confirmation') }}" />
                        <label for="inputPasswordConfirm">Confirm Password</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <select name="role" class="form-control">
                            <option value="">-- Pilih Role --</option>
                            @foreach (config('hrm.site.role') as $key => $value)
                            <option value="{{ $key }}" {{ $key == (old('role') ?? $user->role) ? 'selected="selected:' : NULL }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <label for="inputFirstName">Role</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select name="status" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            @foreach (config('hrm.site.status.user') as $key => $value)
                            <option value="{{ $key }}" {{ $key == (old('status') ?? $user->status) ? 'selected="selected:' : NULL }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <label>Status</label>
                    </div>
                </div>
            </div>

            <div class="mt-4 mb-0">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
