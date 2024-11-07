<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        return Response([
            "message" => 'Departments List',
            "data" => $departments
        ]);
    }



    public function store(Request $request)
    {

        $request->validate([
            "name" => "required"
        ]);

        $department =  new  Department();
        $department->company_id = 1;
        $department->name =  $request->name;
        $department->description = $request->description;
        $department->created_by = $request->user()->id;
        $department->save();

        return Response([
            "message" => 'Department created',
            "data" => $department
        ], 201);
    }


    public function show($id)
    {
        $department =  Department::find($id);
        if (!$department) {
            return Response([
                "message" => 'Department Not Found'
            ], 404);
        }

        return Response([
            "message" => 'Department Detail',
            "data" => $department
        ], 200);
    }

    public function update(Request $request)
    {
        $department =  Department::find($request->id);
        if (!$department) {
            return Response([
                "message" => 'Department Not Found'.$request->id
            ], 404);
        }
        $department->name =  $request->name;
        $department->description = $request->description;
        $department->save();

        return Response([
            "message" => 'Department updated',
            "data" => $department
        ], 200);
    }


    public function destroy($id)
    {
        $department =  Department::find($id);
        if (!$department) {
            return Response([
                "message" => 'Department  Not Found'
            ], 404);
        }

        $department->delete();
        return Response([
            "message" => 'Department deleted',
            "data" => $department
        ], 200);
    }
}
