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
        $workflow = WorkflowApproval::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Workflow berhasil disimpan!',
            'data' => $workflow
        ]);
    }

}
