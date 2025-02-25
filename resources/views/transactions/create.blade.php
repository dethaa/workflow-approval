@extends('layouts.app')

@section('title', 'Add Transaction')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Transaction</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf        
            <div class="mb-3">
                <label for="modul_id" class="form-label">Modul</label>
                <select name="modul_id" id="modul_id" class="form-control">
                    <option value="">-- Pilih Modul --</option>
                    @foreach ($modules as $key => $name)
                        <option value="{{ $key }}">{{ $key }} - {{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control">
            </div>

            <div class="mb-3">
                <label for="created_by" class="form-label">Created By</label>
                <select name="created_by" id="created_by" class="form-control">
                    <option value="">-- Pilih NIK --</option>
                    @foreach ($employees as $nik => $name)
                        <option value="{{ $nik }}">{{ $nik }} - {{ $name }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" id="save-button" class="btn btn-primary">Simpan</button>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection