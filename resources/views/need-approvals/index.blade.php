@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Need Approvals</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Modul</th>
                <th>Transaction</th>
                <th>Created By</th>
                <th>Approver</th>
            </tr>
        </thead>
        <tbody>
            @forelse($needApprovals as $index => $needApproval)
                <tr>
                    <td>{{ $needApproval->id }}</td>
                    <td>{{ $needApproval->modul->id . " - " . $needApproval->modul->modul }}</td>
                    <td>{{ $needApproval->transaction->amount }}</td>
                    <td>{{ $needApproval->transaction->created_by }}</td>
                    <td>{{ $needApproval->nik . " - " . $needApproval->name . " - " . $needApproval->position }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data need approval.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
