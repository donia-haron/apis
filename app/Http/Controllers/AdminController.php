<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\security;
use Illuminate\Support\Facades\DB as DB;

class AdminController extends Controller
{
    public function getallsecurity($id)
    {
        $security = DB::table('users')->where('role', 'securityman')->get();
        $parking = DB::table('parkingsecuritys')->where('parking_id', $id)->get();
        $response['security'] = $security;
        $response['parking'] = $parking;
        return response()->json($response);
    }
    public function changestatus(Request $request, $id)
    {
        $security = new security();
        $security = security::find($id);
        $security->status = $request->status;
        $security->update();
        $response["security"] = $security;
        $response['success'] = 200;
        return response()->json($response);
    }
    public function insert(Request $request)
    {
        $security = new security();
        $security->id = $request->id;
        $security->name = $request->name;
        $security->email = $request->email;
        $security->address = $request->address;
        $security->gender = $request->gender;
        $security->phone = $request->phone;
        $security->status = $request->status;
        $security->dob = $request->dob;
        $security->work_hours = $request->work_hours;
        $security->date = $request->date;
        $security->save();
        return response()->json(['msg' => 'success', 200]);
    }
    public function delete($id)
    {
        $security = security::find($id);
        $security->delete();
        return response()->json('Removed successfully.');
    }
    public function update(Request $request, $id)
    {
        $security = new security();
        $security = security::find($id);
        $security->id = $request->id;
        $security->name = $request->name;
        $security->email = $request->email;
        $security->address = $request->address;
        $security->gender = $request->gender;
        $security->phone = $request->phone;
        $security->status = $request->status;
        $security->dob = $request->dob;
        $security->work_hours = $request->work_hours;
        $security->date = $request->date;
        $security->update();
        $response["security"] = $security;
        $response['success'] = 200;
        return response()->json($response);
    }
}
