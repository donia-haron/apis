<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parkingsecurity;
use Illuminate\Support\Facades\DB as DB;

class AdminController extends Controller
{
    public function getparkingid($id)
    {
        $user = DB::table('users')->where('id', $id)->get();
        $parking = DB::table('parkingspaces')->where('admin_id', $id)->get();
        $response['user'] = $user;
        $response['parking'] = $parking;
        return response()->json($response);
    }
    public function getbyemail($email)
    {
        $user = DB::table('users')->where('email', $email)->get();
        $response['user'] = $user;
        return response()->json($response);
    }
    public function getallsecurity($id)
    {
        $security = DB::table('parkingsecurities')->where('parking_id', $id)->get();
        $response['security'] = $security;
        return response()->json($response);
    }
    public function changestatus(Request $request, $id)
    {
        $security = new parkingsecurity();
        $security = parkingsecurity::find($id);
        $security->status = $request->status;
        $security->update();
        $response["security"] = $security;
        return response()->json($response);
    }
    public function insert(Request $request)
    {
        $security = new parkingsecurity();
        $security->security_id = $request->security_id;
        $security->name = $request->name;
        $security->email = $request->email;
        $security->address = $request->address;
        $security->gender = $request->gender;
        $security->phone = $request->phone;
        $security->status = $request->status;
        $security->dob = $request->dob;
        $security->work_hours = $request->work_hours;
        $security->created_at = $request->created_at;
        $security->parking_id = $request->parking_id;
        $security->save();
        $response["security"] = $security;
        return response()->json($response);
    }
    public function delete($id)
    {
        $security = parkingsecurity::find($id);
        $security->delete();
        $response["security"] = $security;
        return response()->json($response);
    }
    public function update(Request $request, $id)
    {
        $security = new parkingsecurity();
        $security = parkingsecurity::find($id);
        $security->security_id = $request->security_id;
        $security->name = $request->name;
        $security->email = $request->email;
        $security->address = $request->address;
        $security->gender = $request->gender;
        $security->phone = $request->phone;
        $security->status = $request->status;
        $security->dob = $request->dob;
        $security->work_hours = $request->work_hours;
        $security->created_at = $request->created_at;
        $security->update();
        $response["security"] = $security;
        return response()->json($response);
    }
}
