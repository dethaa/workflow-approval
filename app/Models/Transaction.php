<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'modul_id',
        'amount',
        'created_by',
    ];

    public function modul()
    {
        return $this->belongsTo(WorkflowApproval::class, 'modul_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'created_by', 'nik');
    }
}
