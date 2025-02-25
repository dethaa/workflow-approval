<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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
        Transaction::create($request->all());

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
