<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    //
    public function index()
    {
        $roles = Role::all();
        return Response([
            "message" => 'Roles List',
            "data" => $roles
        ]);
    }



    public function store(Request $request)
    {

        $request->validate([
            "name" => "required"
        ]);

        $role =  new  Role();
        $role->company_id = 1;
        $role->name =  $request->name;
        $role->display_name = $request->name;
        $role->description = $request->description;
        $role->save();

        return Response([
            "message" => 'Role created',
            "data" => $role
        ],201);
    }


    public function show($id){
        $role =  Role::find("id",$id);
        if(!$role){
            return Response([
                "message" => 'Role Not Found'
            ],404);
        }

        return Response([
            "message" => 'Role Detail',
            "data" => $role
        ],200);

    }

    public function update(Request $request)
    {

        $request->validate([
            "role_id" => "required",
            "permissionIds" => "required|array"
        ]);

        $role =  Role::find("id",$request->role_id);
        if(!$role){
            return Response([
                "message" => 'Role Not Found'
            ],404);
        }


        $role->permissions()->sync($request->permissionIds);

        $role->company_id = 1;
        $role->name =  $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        return Response([
            "message" => 'Role updated',
            "data" => $role
        ],200);
    }


    public function destroy($id){
        $role =  Role::find("id",$id);
        if(!$role){
            return Response([
                "message" => 'Role Not Found'
            ],404);
        }

        $role->deleted();
        return Response([
            "message" => 'Role deleted',
            "data" => $role
        ],200);
    }


}
