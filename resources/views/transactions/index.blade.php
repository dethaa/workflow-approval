@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Transactions</h2>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Add Transaction</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Modul Name</th>
                <th>Amount</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $index => $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->modul->modul }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->created_by . " - " . $transaction->employee->name }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete transaction?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
