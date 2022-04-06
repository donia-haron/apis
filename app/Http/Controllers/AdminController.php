<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parkingsecurity;
use Illuminate\Support\Facades\DB as DB;

class AdminController extends Controller
{
    public function getstatistics($id)
    {
        $registrations = DB::table('registrations')->where('parking_id', $id)->get();
        $availableslots = DB::table('parkingslots')->where('parking_id', $id)->where('status', 'available')->get();
        $outslots = DB::table('parkingslots')->where('parking_id', $id)->where('status', 'out of order')->get();
        $response['registrations'] = $registrations;
        $response['available_slots'] = $availableslots;
        $response['out_slots'] = $outslots;
        return response()->json($response);
    }
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
    public function insert(Request $request, $id)
    {
        $security = new parkingsecurity();
        $security->parking_id = $id;
        $security->security_id = $request->security_id;
        $security->name = $request->name;
        $security->email = $request->email;
        $security->gender = $request->gender;
        $security->address = $request->address;
        $security->dob = $request->dob;
        $security->work_hours = $request->work_hours;
        $security->phone = $request->phone;
        $security->status = $request->status;
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
        $security->gender = $request->gender;
        $security->address = $request->address;
        $security->dob = $request->dob;
        $security->work_hours = $request->work_hours;
        $security->phone = $request->phone;
        // $security->status = $request->status;
        // $security->created_at = $request->created_at;
        $security->update();
        $response["security"] = $security;
        return response()->json($response);
    }
}
