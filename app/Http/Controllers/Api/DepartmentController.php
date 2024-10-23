<?php

namespace App\Http\Controllers;

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

        $role =  new  Department();
        $role->company_id = 1;
        $role->name =  $request->name;
        $role->save();

        return Response([
            "message" => 'Department created',
            "data" => $role
        ], 201);
    }


    public function show($id)
    {
        $department =  Department::find("id", $id);
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
        $department =  Department::find("id", $request->role_id);
        if (!$department) {
            return Response([
                "message" => 'Role Not Found'
            ], 404);
        }
        $department->name =  $request->name;
        $department->save();

        return Response([
            "message" => 'Department updated',
            "data" => $department
        ], 200);
    }


    public function destroy($id)
    {
        $department =  Department::find("id", $id);
        if (!$department) {
            return Response([
                "message" => 'Department  Not Found'
            ], 404);
        }

        $department->deleted();
        return Response([
            "message" => 'Department deleted',
            "data" => $department
        ], 200);
    }
}
