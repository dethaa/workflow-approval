<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\NeedApproval;
use App\Models\Transaction;
use App\Models\WorkflowApproval;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $modules = WorkflowApproval::all()->pluck('modul', 'id');
        $employees = Employee::all()->pluck('name', 'nik');
        return view('transactions.create', compact('employees', 'modules'));
    }

    public function store(Request $request)
    {
        $transaction = Transaction::create($request->all());

        $modul = $transaction->modul;

        // Create NeedApprovals        
        if ($modul->type == WorkflowApproval::TYPE_HRIS) {
            $employee = $transaction->employee;
            if ($employee->approver1_nik) {
                NeedApproval::create([
                    'modul_id' => $modul->id,
                    'transaction_id' => $transaction->id,
                    'nik' => $employee->approver1_nik,
                    'name' => $employee->approver1_name,
                    'email' => $employee->approver1_email,
                    'position' => $employee->approver1_position,
                    'level' => 1,
                ]);
            }

            if ($employee->approver2_nik) {
                NeedApproval::create([
                    'modul_id' => $modul->id,
                    'transaction_id' => $transaction->id,
                    'nik' => $employee->approver2_nik,
                    'name' => $employee->approver2_name,
                    'email' => $employee->approver2_email,
                    'position' => $employee->approver2_position,
                    'level' => 2,
                ]);
            }
        } else {
            $amount = $transaction->amount;
            $value = $modul->value;
            if (
                ($modul->type == WorkflowApproval::TYPE_MORE_THAN_EQUAL && $amount < $value) ||
                ($modul->type == WorkflowApproval::TYPE_MORE_THAN && $amount <= $value) ||
                ($modul->type == WorkflowApproval::TYPE_LESS_THAN_EQUAL && $amount > $value) ||
                ($modul->type == WorkflowApproval::TYPE_LESS_THAN && $amount >= $value)
            ) {
                // tidak butuh approval, early return
                return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
            }


            NeedApproval::create([
                'modul_id' => $modul->id,
                'transaction_id' => $transaction->id,
                'nik' => $modul->nik,
                'name' => $modul->name,
                'email' => $modul->email,
                'position' => $modul->position,
                'level' => 0, // belum tau levelnya dapat darimana
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $modules = WorkflowApproval::all()->pluck('modul', 'id');
        $employees = Employee::all()->pluck('name', 'nik');
        
        return view('transactions.edit', compact('transaction', 'modules', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update([
            'modul_id' => $request->modul_id,
            'amount' => $request->amount,
            'created_by' => $request->created_by,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
