<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaveType extends Model
{
    //
    protected $fillable = [
        "name",
        "is_paid",
        "total_leaves",
        "max_leave_per_month",
        "created_by"
    ];

    public function company(){
        $this->BelongsTo(Company::class);
    }

    public function createdBy(){
        $this->BelongsTo(User::class,"created_by");
    }
}
