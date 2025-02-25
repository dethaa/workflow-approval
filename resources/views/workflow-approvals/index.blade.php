@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Workflow Approval</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('workflow-approvals.create') }}" class="btn btn-primary mb-3">Tambah Approval</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nama Modul</th>
                <th>Type</th>
                <th>Value</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($approvals as $index => $approval)
                <tr>
                    <td>{{ $approval->id }}</td>
                    <td>{{ $approval->modul }}</td>
                    <td>{{ $approval->type }}</td>
                    <td>{{ $approval->value ?? '-' }}</td>
                    <td>{{ $approval->nik ?? '-' }}</td>
                    <td>{{ $approval->name }}</td>
                    <td>{{ $approval->email }}</td>
                    <td>{{ $approval->position }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data approval.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
