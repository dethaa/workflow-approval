<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NeedApprovalController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WorkflowApprovalController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('employees.index');
});

Route::get('/workflow-approvals', [WorkflowApprovalController::class, 'index'])->name('workflow-approvals.index');
Route::get('/workflow-approvals/create', [WorkflowApprovalController::class, 'create'])->name('workflow-approvals.create');
Route::post('/workflow-approvals', [WorkflowApprovalController::class, 'store'])->name('workflow-approvals.store');
Route::get('/workflow-approvals/{id}/edit', [WorkflowApprovalController::class, 'edit'])->name('workflow-approvals.edit');
Route::put('/workflow-approvals/{id}', [WorkflowApprovalController::class, 'update'])->name('workflow-approvals.update');
Route::delete('/workflow-approvals/{id}', [WorkflowApprovalController::class, 'destroy'])->name('workflow-approvals.destroy');

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

Route::get('/need-approvals', [NeedApprovalController::class, 'index'])->name('need-approvals.index');

Route::get('/get-employee/{nik}', function ($nik) {
    $employee = Employee::where('nik', $nik)->first();
    return response()->json($employee);
});