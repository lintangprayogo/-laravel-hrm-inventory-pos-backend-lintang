<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{

    protected $fillable = [
        "company_id",
        "clock_in_time",
        "clock_out_time",
        "name",
        "isSelfClocking",
        "early_clock_in_time",
        "allow_clock_out_till"
    ];
}
