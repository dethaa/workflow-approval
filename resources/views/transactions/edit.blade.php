@extends('layouts.app')

@section('title', 'Edit Transaction')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Transaction</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="modul_id" class="form-label">Modul</label>
                <select name="modul_id" id="modul_id" class="form-control" required>
                    <option value="">-- Pilih Modul --</option>
                    @foreach ($modules as $key => $name)
                        <option value="{{ $key }}" {{ $transaction->modul_id == $key ? 'selected' : '' }}>
                            {{ $key }} - {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" value="{{ $transaction->amount }}" required>
            </div>

            <div class="mb-3">
                <label for="created_by" class="form-label">Created By</label>
                <select name="created_by" id="created_by" class="form-control" required>
                    <option value="">-- Pilih NIK --</option>
                    @foreach ($employees as $nik => $name)
                        <option value="{{ $nik }}" {{ $transaction->created_by == $nik ? 'selected' : '' }}>
                            {{ $nik }} - {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
