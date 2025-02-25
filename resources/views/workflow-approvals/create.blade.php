@extends('layouts.app')

@section('title', 'Tambah Workflow Approval')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Workflow Approval</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('workflow-approvals.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Modul Name</label>
                <input type="text" name="modul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="Custom">Custom</option>
                    <option value="HRIS">HRIS</option>
                    <option value="Total Amount >=">Total Amount >=</option>
                    <option value="Total Amount >">Total Amount ></option>
                    <option value="Total Amount <=">Total Amount <=</option>
                    <option value="Total Amount <">Total Amount <</option>
                </select>
            </div>

            <div class="mb-3" id="valueField">
                <label class="form-label">Value</label>
                <input type="number" name="value" class="form-control">
            </div>

            <div class="mb-3" id="nikField">
                <label for="nik" class="form-label">NIK</label>
                <select name="nik" id="nik" class="form-control">
                    <option value="">-- Pilih NIK --</option>
                    @foreach ($employees as $nik => $name)
                        <option value="{{ $nik }}">{{ $nik }} - {{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3" id="nameField">
                <label class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" disabled>
            </div>

            <div class="mb-3" id="emailField">
                <label class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" disabled>
            </div>

            <div class="mb-3" id="positionField">
                <label class="form-label">Jabatan</label>
                <input type="text" name="position" id="position" class="form-control" disabled>
            </div>

            <button type="button" id="save-button" class="btn btn-primary">Simpan</button>
            <a href="{{ route('workflow-approvals.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection

@push('scripts')
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

        saveButton.addEventListener('click', function() {
            const modul = document.querySelector('input[name="modul"]').value;
            const type = document.querySelector('select[name="type"]').value;
            const value = document.querySelector('input[name="value"]')?.value || null;
            const nik = document.querySelector('select[name="nik"]').value;
            const name = document.querySelector('input[name="name"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const position = document.querySelector('input[name="position"]').value;

            fetch("{{ route('workflow-approvals.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    modul: modul,
                    type: type,
                    value: value,
                    nik: nik,
                    name: name,
                    email: email,
                    position: position
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "{{ route('workflow-approvals.index') }}"; // Redirect ke index
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Gagal menyimpan data.");
            });
        });

        function toggleFields() {
            if (typeField.value === 'Custom') {
                valueField.style.display = 'none';
                nikField.style.display = 'block';
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

        // Fetch employee data when NIK is selected
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
