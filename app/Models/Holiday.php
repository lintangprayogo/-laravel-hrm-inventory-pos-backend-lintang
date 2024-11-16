<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'date',
        'month',
        'year',
        'is_weekend',
        'created_by',
    ];

    protected $casts = [
        'is_weekend' => 'boolean',
    ];
}
