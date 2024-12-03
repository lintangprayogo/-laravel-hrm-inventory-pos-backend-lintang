<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function store(Request $request)
    {

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'is_superadmin' => 'nullable|boolean',
            'warehouse_id' => 'nullable|exists:warehouses,id',
            'role_id' => 'required|exists:roles,id',
            'user_type' => 'nullable|string',
            'login_enabled' => 'nullable|boolean',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:15',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'nullable|string',
            'status' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'shift_id' => 'required|exists:shifts,id',
        ]);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images/staff', $filename, 'public');
            $validated['profile_image'] = $filePath;
        }

        $user = new User($validated);
        $user->company_id = 1; // Set to single company
        $user->password = Hash::make($request->password);
        $user->save();

        $user->roles()->sync([$request->role_id]);

        $user->load(['shift', 'department', 'designation', 'roles']);

        return response([
            'message' => 'Staff member created successfully',
            'data' => $user,
        ], 201);

        $user =  new User();
    }
}
