<?php

namespace App\Http\Controllers;

use App\Models\NeedApproval;

class NeedApprovalController extends Controller
{
    public function index()
    {
        $needApprovals = NeedApproval::all();
        return view('need-approvals.index', compact('needApprovals'));
    }
}
