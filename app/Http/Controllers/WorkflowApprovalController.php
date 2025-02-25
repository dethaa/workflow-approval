<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\WorkflowApproval;
use Illuminate\Http\Request;

class WorkflowApprovalController extends Controller
{
    public function index()
    {
        $approvals = WorkflowApproval::all();
        return view('workflow-approvals.index', compact('approvals'));
    }

    public function create()
    {
        $employees = Employee::all()->pluck('name', 'nik');
        return view('workflow-approvals.create', compact('employees'));
    }

    public function store(Request $request)
    {
        WorkflowApproval::create($request->all());

        return redirect()->route('workflow-approvals.index')->with('success', 'Workflow Approval berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $approval = WorkflowApproval::findOrFail($id);
        $employees = Employee::pluck('name', 'nik');
        
        return view('workflow-approvals.edit', compact('approval', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'modul' => 'required|string|max:255',
            'type' => 'required|string',
            'value' => 'nullable|numeric',
            'nik' => 'nullable|string|max:255',
        ]);

        $approval = WorkflowApproval::findOrFail($id);
        $employee = Employee::where('nik', $request->nik)->first();

        $approval->update([
            'modul' => $request->modul,
            'type' => $request->type,
            'value' => $request->value,
            'nik' => $request->nik,
            'name' => $employee->name ?? null,
            'email' => $employee->email ?? null,
            'position' => $employee->position ?? null,
        ]);

        return redirect()->route('workflow-approvals.index')->with('success', 'Workflow Approval berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $approval = WorkflowApproval::findOrFail($id);
        $approval->delete();

        return redirect()->route('workflow-approvals.index')->with('success', 'Workflow Approval berhasil dihapus.');
    }
}
