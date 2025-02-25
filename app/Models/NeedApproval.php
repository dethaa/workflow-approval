<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeedApproval extends Model
{
    protected $fillable = [
        'modul_id',
        'transaction_id',
        'nik',
        'name',
        'email',
        'position',
        'level',
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
