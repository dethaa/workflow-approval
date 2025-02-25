@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Employees</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Approver 1</th>
                <th>Approver 2</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $index => $employee)
                <tr>
                    <td>{{ $employee->nik }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->approver1_nik ? ($employee->approver1_nik . " - " . $employee->approver1_name . " - " . $employee->approver1_position) : '' }}</td>
                    <td>{{ $employee->approver2_nik ? ($employee->approver2_nik . " - " . $employee->approver2_name . " - " . $employee->approver2_position) : '' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data karyawan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
