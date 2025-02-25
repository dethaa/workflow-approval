<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowApproval extends Model
{
    protected $fillable = [
        'modul',
        'type',
        'value',
        'nik',
        'name',
        'email',
        'position',
    ];

    public const TYPE_CUSTOM = 'Custom';
    public const TYPE_HRIS = 'HRIS';
    public const TYPE_MORE_THAN_EQUAL = 'Total Amount >=';
    public const TYPE_MORE_THAN = 'Total Amount >';
    public const TYPE_LESS_THAN_EQUAL = 'Total Amount <=';
    public const TYPE_LESS_THAN = 'Total Amount <';

    public const TYPE_OPTIONS = [
        self::TYPE_CUSTOM,
        self::TYPE_HRIS,
        self::TYPE_MORE_THAN_EQUAL,
        self::TYPE_MORE_THAN,
        self::TYPE_LESS_THAN_EQUAL,
        self::TYPE_LESS_THAN,
    ];
}
