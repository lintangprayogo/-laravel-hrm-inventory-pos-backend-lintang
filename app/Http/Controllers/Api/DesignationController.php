<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        return Response([
            "message" => 'designation List',
            "data" => $designations
        ]);
    }



    public function store(Request $request)
    {

        $request->validate([
            "name" => "required"
        ]);

        $request->validate([
            'department_id' => 'required',
            'name' => 'required',
        ]);

        $designation = new designation();
        $user = $request->user();

        $designation->company_id = 1;
        $designation->department_id = $request->department_id;
        $designation->name = $request->name;
        $designation->created_by = $user->id;
        $designation->save();

        return Response([
            "message" => 'designation created',
            "data" => $designation
        ], 201);
    }


    public function show($id)
    {
        $designation =  designation::find($id, "id");
        if (!$designation) {
            return Response([
                "message" => 'designation Not Found'
            ], 404);
        }

        return Response([
            "message" => 'designation Detail',
            "data" => $designation
        ], 200);
    }

    public function update(Request $request)
    {
        $designation =  designation::find($request->designation_id, "id");
        if (!$designation) {
            return Response([
                "message" => 'designation Not Found'
            ], 404);
        }

        $designation->department_id = $request->department_id;
        $designation->name = $request->name;
        $designation->description = $request->description;
        $designation->save();


        return Response([
            "message" => 'designation updated',
            "data" => $designation
        ], 200);
    }


    public function destroy($id)
    {
        $designation =  designation::find($id, "id");
        if (!$designation) {
            return Response([
                "message" => 'designation  Not Found'
            ], 404);
        }

        $designation->delete();
        return Response([
            "message" => 'designation deleted',
            "data" => $designation
        ], 200);
    }
}
