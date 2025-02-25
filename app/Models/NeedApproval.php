<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeedApproval extends Model
{
    protected $fillable = [
        'transaction_id',
        'workflow_approval_id',
        'status',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function workflowApproval()
    {
        return $this->belongsTo(WorkflowApproval::class, 'modul_id', 'id');
    }
}
