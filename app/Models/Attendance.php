<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'leave_id',
        'leave_type_id',
        'holiday_id',
        'date',
        'is_holiday',
        'is_leave',
        'clock_in_date_time',
        'clock_out_date_time',
        'total_duration',
        'is_late',
        'is_half_day',
        'is_paid',
        'status',
        'reason',
    ];
}
