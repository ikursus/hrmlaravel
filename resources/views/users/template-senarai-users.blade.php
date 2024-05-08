@extends('layouts.master')

@section('page-title')
Senarai Users
@endsection

@section('page-subtitle')
Summary
@endsection

@section('page-content')

<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Senarai Users
    </div>
    <div class="card-body">

        @include('layouts.alerts')

        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($senaraiUsers as $pengguna)
                <tr>
                    <td>{{ $pengguna->first_name }}</td>
                    <td>{{ $pengguna->last_name }}</td>
                    <td>{{ $pengguna->email }}</td>
                    <td>{{ $pengguna->phone }}</td>
                    <td>{{ $pengguna->role }}</td>
                    <td>{{ $pengguna->status }}</td>
                    <td>
                        <a href="{{ route('users.edit', $pengguna->id) }}" class="btn btn-info">Edit</a>

                        <form method="POST" action="{{ route('users.destroy', $pengguna->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
