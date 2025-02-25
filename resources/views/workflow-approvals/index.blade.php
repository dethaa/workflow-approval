@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Workflow Approval</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('workflow-approvals.create') }}" class="btn btn-primary mb-3">Tambah Workflow Approval</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nama Modul</th>
                <th>Tipe</th>
                <th>Value</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Aksi</th>
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
                    <td>
                        <a href="{{ route('workflow-approvals.edit', $approval->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('workflow-approvals.destroy', $approval->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
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
