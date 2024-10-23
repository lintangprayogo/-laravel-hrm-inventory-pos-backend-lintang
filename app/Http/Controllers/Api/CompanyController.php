<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function editCompany(Request $request)
    {
        // 'name',
        // 'email',
        // 'phone',
        // 'website',
        // 'logo',
        // 'address',
        // 'status',
        // 'total_users',
        // 'clock_in_time',
        // 'clock_out_time',
        // 'early_clock_in_time',
        // 'allow_clout_out_till',
        // 'self_clocking'

        $company = Company::where("id", 1)->first();

        if ($request->hasFile("logo")) {
            $request->validate(['logo' => 'required|image|mimes:jpeg,png,gif|max:2048|dimensions:min_width=100,min_height=100,max_width=800,max_height=600']);
            $logo  = $request->file("logo");
            $logo_name = time() . '.' . $logo->getClientOriginalName();
            $logo->move(public_path('uploads/company', $logo_name));
            $company->logo = $logo_name;
            $company->save();
        }


        if ($request->has('name')) {
            $company->name = $request->name;
            $company->save();
        }

        if ($request->has('email')) {
            $company->email = $request->email;
        }


        if ($request->has('phone')) {
            $company->email = $request->phone;
            $company->save();
        }

        if ($request->has("website")) {
            $company->website = $request->website;
        }

        if ($request->has('status')) {
            $company->status = $request->status;
            $company->save();
        }

        if ($request->has('total_users')) {
            $company->total_users = $request->total_users;
            $company->save();
        }

        if ($request->has("clock_in_time")) {
            $company->total_users = $request->clock_in_time;
            $company->save();
        }

        if ($request->has("clock_out_time")) {
            $company->total_users = $request->clock_out_time;
            $company->save();
        }
        if ($request->has("early_clock_in_time")) {
            $company->early_clock_in_time = $request->early_clock_in_time;
            $company->save();
        }
        if ($request->has("allow_clout_out_till")) {
            $company->allow_clout_out_till = $request->allow_clout_out_till;
            $company->save();
        }

        if ($request->has("self_clocking")) {
            $company->self_clocking =  $request->self_clocking;
            $company->save();
        }

        return Response(["message" => "Company updated successfully", "company" => $company]);
    }
}
