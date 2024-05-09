@extends('layouts.master')

@section('page-title')
Senarai Cuti User
@endsection

@section('page-subtitle')
Summary
@endsection

@section('page-content')

<a href="{{ route('cuti.create') }}" class="btn btn-primary mb-3">Add New Cuti</a>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Senarai Cuti
    </div>
    <div class="card-body">

        @include('layouts.alerts')

        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Jenis Cuti</th>
                    <th>Tarikh Mula</th>
                    <th>Tarikh Akhir</th>
                    <th>Jumlah Hari</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama User</th>
                    <th>Jenis Cuti</th>
                    <th>Tarikh Mula</th>
                    <th>Tarikh Akhir</th>
                    <th>Jumlah Hari</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($senaraiCuti as $cuti)
                <tr>
                    <td>{{ $cuti->user_id }}</td>
                    <td>{{ $cuti->type }}</td>
                    <td>{{ $cuti->tarikh_mula }}</td>
                    <td>{{ $cuti->tarikh_akhir }}</td>
                    <td>{{ $cuti->jumlah_hari }}</td>
                    <td>{{ $cuti->reason }}</td>
                    <td>{{ $cuti->status }}</td>
                    <td>
                        <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn btn-info">Edit</a>

                        <form method="POST" action="{{ route('cuti.destroy', $cuti->id) }}">
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
