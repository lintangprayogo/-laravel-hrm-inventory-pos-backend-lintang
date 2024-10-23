<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    //index
    public function index()
    {
        $leaves = Leave::all();
        return response([
            "message" => "Leave  List",
            "data" => $leaves
        ]);
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'leave_type_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'total_days' => 'required|integer',
            'is_half_day' => 'required|boolean',
            'reason' => 'nullable|string',
            'is_paid' => 'required|boolean',
            'status' => 'required'
        ]);

        $leave =  new Leave();
        $leave->user_id = $request->user_id;
        $leave->created_by = $request->user()->id;
        $leave->leave_type_id = $request->leave_type_id;
        $leave->company_id = $request->company_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->total_days = $request->total_days;
        $leave->is_half_day = $request->is_half_day;
        $leave->reason = $request->reason;
        $leave->is_paid = $request->is_paid;
        $leave->status = $request->status;
        $leave->save();

        return response([
            'message' => 'Leave  created',
            'data' => $leave
        ], 201);
    }


    //update
    public function update(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'leave_type_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'total_days' => 'required|integer',
            'is_half_day' => 'required|boolean',
            'reason' => 'nullable|string',
            'is_paid' => 'required|boolean',
            'status' => 'required'
        ]);

        $leave = Leave::find("id", $request->id);
        if (!$leave) {
            return response([
                "message" => "Leave  Not Found",
            ], 404);
        }

        $leave =  new Leave();
        $leave->user_id = $request->user_id;
        $leave->created_by = $request->user()->id;
        $leave->leave_type_id = $request->leave_type_id;
        $leave->company_id = $request->company_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->total_days = $request->total_days;
        $leave->is_half_day = $request->is_half_day;
        $leave->reason = $request->reason;
        $leave->is_paid = $request->is_paid;
        $leave->status = $request->status;
        $leave->save();

        return response([
            'message' => 'Leave  updated',
            'data' => $leave
        ], 200);
    }


    //show
    public function show($id)
    {
        $leave = Leave::find("id", $id);

        if (!$leave) {
            return response([
                "message" => "Leave  Not Found",
            ], 404);
        }
        return response([
            "message" => "Leave  details",
            "data" => $leave
        ]);
    }

    //destory
    public function destroy($id)
    {
        $leave = Leave::find("id", $id);

        if (!$leave) {
            return response([
                "message" => "Leave Not Found",
            ], 404);
        }

        $leave->delete();

        return response([
            'message' => 'Leave deleted'
        ], 200);
    }
}
