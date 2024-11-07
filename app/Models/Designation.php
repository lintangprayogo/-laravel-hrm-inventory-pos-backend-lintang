<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    //
    protected $fillable = [
    'company_id',
    'name',
    'created_by',
    ];

    public function company(){
        $this->belongsTo(Company::class);
    }
}
