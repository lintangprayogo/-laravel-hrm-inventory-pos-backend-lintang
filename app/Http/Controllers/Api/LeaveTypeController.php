<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    //index
    public function index()
    {
        $leaveTypes = LeaveType::all();
        return response([
            "message" => "Leave Type List",
            "data" => $leaveTypes
        ]);
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "is_paid" => "required",
            "total_leaves" => "required",
            "max_leave_per_month" => "nullable"
        ]);

        $leaveType =  new LeaveType();
        $leaveType->name = $request->name;
        $leaveType->company_id = 1;
        $leaveType->is_paid = $request->is_paid;
        $leaveType->total_leaves = $request->total_leaves;
        $leaveType->max_leave_per_month = $request->max_leave_per_month;
        $leaveType->created_by = $request->user()->id;

        $leaveType->save();

        return response([
            'message' => 'Leave type created',
            'data' => $leaveType
        ], 201);
    }


    //update
    public function update(Request $request)
    {
        $request->validate([
            "id"=>"required",
            "name" => "required",
            "is_paid" => "required",
            "total_leaves" => "required",
            "max_leave_per_month" => "nullable"
        ]);

        $leaveType = LeaveType::find("id", $request->id);
        if (!$leaveType) {
            return response([
                "message" => "Leave Type Not Found",
            ], 404);
        }
        $leaveType->name = $request->name;
        $leaveType->is_paid = $request->is_paid;
        $leaveType->total_leaves = $request->total_leaves;
        $leaveType->max_leave_per_month = $request->max_leave_per_month;
        $leaveType->save();

        return response([
            'message' => 'Leave type created',
            'data' => $leaveType
        ], 201);
    }


    //show
    public function show($id)
    {
        $leaveType = LeaveType::find("id", $id);

        if (!$leaveType) {
            return response([
                "message" => "Leave Type Not Found",
            ], 404);
        }
        return response([
            "message" => "Leave Type details",
            "data" => $leaveType
        ]);
    }

       //destory
       public function destroy($id)
       {
           $leaveType = LeaveType::find("id", $id);

           if (!$leaveType) {
               return response([
                   "message" => "Leave Type Not Found",
               ], 404);
           }

           $leaveType->delete();

           return response([
               'message' => 'Leave Type deleted'
           ], 200);
       }
}
