<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffConttoller extends Controller
{
    //
    //
    public function index()
    {
        $roles =  DB::table("users")->select(
            "users.name",
            "shifts.name as shift",
            "users.status",
            "users.email",
            "users.username",
            "users.profile_image",
            "departments.name as department",
            "designations.name as designation"
        )
            ->leftJoin(
                'designations',
                'users.designation_id',
                '=',
                'designations.id'
            )
            ->leftJoin(
                'departments',
                'users.department_id',
                '=',
                'departments.id'
            )
            ->leftJoin(
                'shifts',
                'users.shift_id',
                '=',
                'shifts.id'
            )->get();

        return Response([
            "message" => 'Staff List',
            "data" => $roles
        ]);
    }
}
