<?php

use App\Http\Controllers\WorkflowApprovalController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/workflow-approvals', [WorkflowApprovalController::class, 'index'])->name('workflow-approvals.index');
Route::get('/workflow-approvals/create', [WorkflowApprovalController::class, 'create'])->name('workflow-approvals.create');
Route::post('/workflow-approvals', [WorkflowApprovalController::class, 'store'])->name('workflow-approvals.store');

Route::get('/get-employee/{nik}', function ($nik) {
    $employee = Employee::where('nik', $nik)->first();
    return response()->json($employee);
});