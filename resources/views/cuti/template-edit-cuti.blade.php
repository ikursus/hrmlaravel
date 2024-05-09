@extends('layouts.master')

@section('page-title')
Edit Cuti - {{ $cuti->detailUser->first_name }}
@endsection

@section('page-subtitle')
Please fill in the form below
@endsection

@section('page-content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Cuti Information
    </div>
    <div class="card-body">

        @include('layouts.alerts')

        <form method="POST" action="{{ route('cuti.update', $cuti->id) }}">
            @csrf
            @method('PATCH')
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-floating">
                        <select name="user_id" class="form-control">
                            <option value="{{ $cuti->user_id }}">{{ $cuti->detailUser->first_name }}</option>
                        </select>
                        <label for="inputFirstName">User</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" name="tarikh_mula" type="date" value="{{ old('tarikh_mula') ?? $cuti->tarikh_mula }}" />
                        <label>Tarikh Mula Cuti</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" name="tarikh_akhir" type="date" value="{{ old('tarikh_akhir') ?? $cuti->tarikh_akhir }}" />
                        <label>Tarikh Tamat Cuti</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-floating mb-3 mb-md-0">
                        <textarea class="form-control" name="reason">{{ old('reason') ?? $cuti->reason }}</textarea>
                        <label>Reason</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <select name="type" class="form-control">
                            <option value="">-- Pilih Jenis Cuti --</option>
                            @foreach (config('hrm.site.jenis_cuti') as $key => $value)
                            <option value="{{ $key }}" {{ $key == (old('type') ?? $cuti->type) ? 'selected="selected"' : NULL }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <label>Jenis Cuti</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select name="status" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            @foreach (config('hrm.site.status.cuti') as $key => $value)
                            <option value="{{ $key }}" {{ $key == (old('status') ?? $cuti->status) ? 'selected="selected"' : NULL }}>{{ $value }}</option>
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
