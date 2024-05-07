@extends('layouts.master')

@section('page-title')
Add New User
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

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                    <label for="inputFirstName">First name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                    <label for="inputLastName">Last name</label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
            <label for="inputEmail">Email address</label>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                    <label for="inputPassword">Password</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                    <label for="inputPasswordConfirm">Confirm Password</label>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-0">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </div>

    </div>
</div>
@endsection
