<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        $Holidays = Holiday::all();
        return Response([
            "message" => 'Holidays List',
            "data" => $Holidays
        ]);
    }



    public function store(Request $request)
    {

        $request->validate([
            "name" => "required"
        ]);

        $request->validate([
            'name' => 'required',
            'month' => 'required',
            'year' => 'required',
            'date' => 'required',
            'is_weekend' => 'required',
        ]);

        $holiday = new Holiday();
        $holiday->company_id = 1;
        $holiday->name = $request->name;
        $holiday->month = $request->month;
        $holiday->year = $request->year;
        $holiday->date = $request->date;
        $holiday->is_weekend = $request->is_weekend;
        $holiday->created_by = $request->user()->id;
        $holiday->save();

        return Response([
            "message" => 'Holiday created',
            "data" => $holiday
        ], 201);
    }


    public function show($id)
    {
        $Holiday =  Holiday::find("id", $id);
        if (!$Holiday) {
            return Response([
                "message" => 'Holiday Not Found'
            ], 404);
        }

        return Response([
            "message" => 'Holiday Detail',
            "data" => $Holiday
        ], 200);
    }

    public function update(Request $request)
    {
        $holiday =  Holiday::find($request->id);
        if (!$holiday) {
            return Response([
                "message" => 'Holiday Not Found'
            ], 404);
        }
        $holiday->name = $request->name;
        $holiday->month = $request->month;
        $holiday->year = $request->year;
        $holiday->date = $request->date;
        $holiday->is_weekend = $request->is_weekend;
        $holiday->save();

        return Response([
            "message" => 'Holiday updated',
            "data" => $holiday
        ], 200);
    }


    public function destroy($id)
    {
        $Holiday =  Holiday::find($id);
        if (!$Holiday) {
            return Response([
                "message" => 'Holiday  Not Found'
            ], 404);
        }

        $Holiday->delete();
        return Response([
            "message" => 'Holiday deleted',
            "data" => $Holiday
        ], 200);
    }
}
