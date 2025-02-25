@extends('layouts.app')

@section('title', 'Edit Workflow Approval')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Workflow Approval</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('workflow-approvals.update', $approval->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Modul</label>
                <input type="text" name="modul" class="form-control" value="{{ $approval->modul }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipe</label>
                <select name="type" id="type" class="form-select" required>
                    @foreach (\App\Models\WorkflowApproval::TYPE_OPTIONS as $type)
                        <option value="{{ $type }}" {{ $approval->type == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3" id="valueField">
                <label class="form-label">Value</label>
                <input type="number" name="value" class="form-control" value="{{ $approval->value }}" required>
            </div>

            <div class="mb-3" id="nikField">
                <label for="nik" class="form-label">NIK</label>
                <select name="nik" id="nik" class="form-control" required>
                    <option value="">-- Pilih NIK --</option>
                    @foreach ($employees as $nik => $name)
                        <option value="{{ $nik }}" {{ $approval->nik == $nik ? 'selected' : '' }}>{{ $nik }} - {{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3" id="nameField">
                <label class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $approval->name }}" disabled>
            </div>

            <div class="mb-3" id="emailField">
                <label class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $approval->email }}" disabled>
            </div>

            <div class="mb-3" id="positionField">
                <label class="form-label">Jabatan</label>
                <input type="text" name="position" id="position" class="form-control" value="{{ $approval->position }}" disabled>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('workflow-approvals.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typeField = document.getElementById('type');
        const valueField = document.getElementById('valueField');
        const nikField = document.getElementById('nikField');
        const nameField = document.getElementById('nameField');
        const emailField = document.getElementById('emailField');
        const positionField = document.getElementById('positionField');

        const nikInput = document.getElementById('nik');
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const positionInput = document.getElementById('position');

        const saveButton = document.getElementById('save-button');

        function toggleFields() {
            if (typeField.value === 'Custom') {
                valueField.style.display = 'none';
                nikField.style.display = 'block';
                nameField.style.display = 'block';
                emailField.style.display = 'block';
                positionField.style.display = 'block';
            } else if (typeField.value === 'HRIS') {
                valueField.style.display = 'none';
                nikField.style.display = 'none';
                nameField.style.display = 'none';
                emailField.style.display = 'none';
                positionField.style.display = 'none';
            } else {
                valueField.style.display = 'block';
                nikField.style.display = 'block';
                nameField.style.display = 'block';
                emailField.style.display = 'block';
                positionField.style.display = 'block';
            }
        }

        nikInput.addEventListener('change', function() {
            const selectedNik = this.value;

            if (selectedNik) {
                fetch(`/get-employee/${selectedNik}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            nameInput.value = data.name;
                            emailInput.value = data.email;
                            positionInput.value = data.position;
                        }
                    })
                    .catch(error => console.error('Error fetching employee data:', error));
            } else {
                nameInput.value = '';
                emailInput.value = '';
                positionInput.value = '';
            }
        });

        typeField.addEventListener('change', toggleFields);
        toggleFields();
    });
</script>
@endpush
