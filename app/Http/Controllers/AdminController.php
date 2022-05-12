<?php

namespace App\Http\Controllers;

use App\Exports\RegistrationExport;
use App\Exports\SecurityExport;
use App\Exports\SlotExport;
use Illuminate\Http\Request;
use App\Models\parkingsecurity;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Illuminate\Support\Facades\DB as DB;

class AdminController extends Controller
{
    public function getreports(Request $request, $id)
    {
        $type = $request->type;
        $filter = $request->filter;
        $reports = [];
        if ($filter == 'today') {
            $date = date("Y-m-d");
            switch ($type) {
                case 'security':
                    $security = DB::table('parkingsecurities')->where('parking_id', $id)->where('created_at', $date)->get();
                    array_push($reports, $security);
                    $response['reports'] = $reports;
                    break;
                case 'parkingslots':
                    $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                    array_push($reports, $parkingslot);
                    $response['reports'] = $reports;
                    break;
                case 'registrations':
                    $registrations = DB::table('registrations')->where('parking_id', $id)->where('date', $date)->get();
                    array_push($reports, $registrations);
                    $response['reports'] = $reports;
                    break;
                case 'all':
                    $registrations = DB::table('registrations')->where('parking_id', $id)->where('date', $date)->get();
                    $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                    $security = DB::table('parkingsecurities')->where('parking_id', $id)->where('created_at', $date)->get();
                    array_push($reports, $security, $registrations, $parkingslot);
                    $response['reports'] = $reports;
                    break;
            }
            return response()->json($response);
        } else if ($filter == 'this-week') {
            $startweek = Carbon::now()->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
            $endweek = Carbon::now()->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');
            switch ($type) {
                case 'security':
                    $security = DB::table('parkingsecurities')->where('parking_id', $id)->whereBetween('created_at', [$startweek, $endweek])->get();
                    array_push($reports, $security);
                    $response['reports'] = $reports;
                    break;
                case 'parkingslots':
                    $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                    array_push($reports, $parkingslot);
                    $response['reports'] = $reports;
                    break;
                case 'registrations':
                    $registrations = DB::table('registrations')->where('parking_id', $id)->whereBetween('date', [$startweek, $endweek])->get();
                    array_push($reports, $registrations);
                    $response['reports'] = $reports;
                    break;
                case 'all':
                    $registrations = DB::table('registrations')->where('parking_id', $id)->whereBetween('date', [$startweek, $endweek])->get();
                    $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                    $security = DB::table('parkingsecurities')->where('parking_id', $id)->whereBetween('created_at', [$startweek, $endweek])->get();
                    array_push($reports, $security, $registrations, $parkingslot);
                    $response['reports'] = $reports;
                    break;
            }
            return response()->json($response);
        } else if ($filter == 'prev-week') {
            $startweek = Carbon::now()->subWeek()->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
            $endweek = Carbon::now()->subWeek()->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');
            switch ($type) {
                case 'security':
                    $security = DB::table('parkingsecurities')->where('parking_id', $id)->whereBetween('created_at', [$startweek, $endweek])->get();
                    array_push($reports, $security);
                    $response['reports'] = $reports;
                    break;
                case 'parkingslots':
                    $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                    array_push($reports, $parkingslot);
                    $response['reports'] = $reports;
                    break;
                case 'registrations':
                    $registrations = DB::table('registrations')->where('parking_id', $id)->whereBetween('date', [$startweek, $endweek])->get();
                    array_push($reports, $registrations);
                    $response['reports'] = $reports;
                    break;
                case 'all':
                    $registrations = DB::table('registrations')->where('parking_id', $id)->whereBetween('date', [$startweek, $endweek])->get();
                    $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                    $security = DB::table('parkingsecurities')->where('parking_id', $id)->whereBetween('created_at', [$startweek, $endweek])->get();
                    array_push($reports, $security, $registrations, $parkingslot);
                    $response['reports'] = $reports;
                    break;
            }
            return response()->json($response);
        } else if ($filter == 'this-month') {
            $startmonth = Carbon::now()->format('m');
            $endmonth = Carbon::now()->format('m');
            switch ($type) {
                case 'security':
                    $security = DB::table('parkingsecurities')->where('parking_id', $id)->whereBetween('created_at', [$startmonth, $endmonth])->get();
                    array_push($reports, $security);
                    $response['reports'] = $reports;
                    break;
                case 'parkingslots':
                    $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                    array_push($reports, $parkingslot);
                    $response['reports'] = $reports;
                    break;
                case 'registrations':
                    $registrations = DB::table('registrations')->where('parking_id', $id)->whereBetween('date', [$startmonth, $endmonth])->get();
                    array_push($reports, $registrations);
                    $response['reports'] = $reports;
                    break;
                case 'all':
                    $registrations = DB::table('registrations')->where('parking_id', $id)->whereBetween('date', [$startmonth, $endmonth])->get();
                    $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                    $security = DB::table('parkingsecurities')->where('parking_id', $id)->whereBetween('created_at', [$startmonth, $endmonth])->get();
                    array_push($reports, $security, $registrations, $parkingslot);
                    $response['reports'] = $reports;
                    break;
            }
            return response()->json($response);
        } else if ($filter == 'prev-month') {
            $startmonth = Carbon::now()->subMonth()->format('m');
            $endmonth = Carbon::now()->subMonth()->format('m');
            switch ($type) {
                case 'security':
                    $security = DB::table('parkingsecurities')->where('parking_id', $id)->whereBetween('created_at', [$startmonth, $endmonth])->get();
                    array_push($reports, $security);
                    $response['reports'] = $reports;
                    break;
                case 'parkingslots':
                    $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                    array_push($reports, $parkingslot);
                    $response['reports'] = $reports;
                    break;
                case 'registrations':
                    $registrations = DB::table('registrations')->where('parking_id', $id)->whereBetween('date', [$startmonth, $endmonth])->get();
                    array_push($reports, $registrations);
                    $response['reports'] = $reports;
                    break;
                case 'all':
                    $registrations = DB::table('registrations')->where('parking_id', $id)->whereBetween('date', [$startmonth, $endmonth])->get();
                    $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                    $security = DB::table('parkingsecurities')->where('parking_id', $id)->whereBetween('created_at', [$startmonth, $endmonth])->get();
                    array_push($reports, $security, $registrations, $parkingslot);
                    $response['reports'] = $reports;
                    break;
            }
            return response()->json($response);
        } else {
            $response['reports'] = $reports;
            return response()->json($response);
        }
    }
    public function getcustomreports(Request $request, $id)
    {
        $reports = [];
        $type = $request->type;
        $from = $request->from;
        $to = $request->to;
        switch ($type) {
            case 'security':
                $security = DB::table('parkingsecurities')->where('parking_id', $id)->whereBetween('created_at', [$from, $to])->get();
                array_push($reports, $security);
                $response['reports'] = $reports;
                break;
            case 'parkingslots':
                $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                array_push($reports, $parkingslot);
                $response['reports'] = $reports;
                break;
            case 'registrations':
                $registrations = DB::table('registrations')->where('parking_id', $id)->whereBetween('date', [$from, $to])->get();
                array_push($reports, $registrations);
                $response['reports'] = $reports;
                break;
            case 'all':
                $registrations = DB::table('registrations')->where('parking_id', $id)->whereBetween('date', [$from, $to])->get();
                $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->get();
                $security = DB::table('parkingsecurities')->where('parking_id', $id)->whereBetween('created_at', [$from, $to])->get();
                array_push($reports, $security, $registrations, $parkingslot);
                $response['reports'] = $reports;
                break;
        }
        return response()->json($response);
    }

    public function getdailystatistics($id)
    {
        $today = date("Y-m-d");
        $registrations = DB::table('registrations')->where('parking_id', $id)->where('date', $today)->get();
        $availableslots = DB::table('parkingslots')->where('parking_id', $id)->where('status', 'available')->get();
        $outslots = DB::table('parkingslots')->where('parking_id', $id)->where('status', 'out of order')->get();
        $response['registrations'] = $registrations;
        $response['available_slots'] = $availableslots;
        $response['out_slots'] = $outslots;
        return response()->json($response);
    }
    public function getweeklychart($id)
    {
        $startolddate = Carbon::now()->subWeek()->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
        $endolddate = Carbon::now()->subWeek()->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');

        $startnewdate = Carbon::now()->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
        $endnewdate = Carbon::now()->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');

        $oldperiod = CarbonPeriod::create($startolddate, $endolddate);
        $olddates = $oldperiod->toArray();
        $newperiod = CarbonPeriod::create($startnewdate, $endnewdate);
        $newdates = $newperiod->toArray();

        $lastweek = array();
        $thisweek = array();

        for ($i = 0; $i < count($olddates); $i++) {
            $oldvalues = DB::table('registrations')->where('parking_id', $id)->where('date', $olddates[$i])->count();
            array_push($lastweek, $oldvalues);
        }
        for ($i = 0; $i < count($newdates); $i++) {
            $oldvalues = DB::table('registrations')->where('parking_id', $id)->where('date', $newdates[$i])->count();
            array_push($thisweek, $oldvalues);
        }
        $response['old_values'] = $lastweek;
        $response['new_values'] = $thisweek;
        return response()->json($response);
    }
    public function getparkingid($id)
    {
        $user = DB::table('users')->where('id', $id)->orderBy('id', 'asc')->get();
        $parking = DB::table('parkingspaces')->where('admin_id', $id)->orderBy('id', 'asc')->get();
        $response['user'] = $user;
        $response['parking'] = $parking;
        return response()->json($response);
    }
    public function getid($id)
    {
        $admin_id = DB::table('parkingspaces')->where('id', $id)->pluck('admin_id');
        $user = DB::table('users')->where('id', $admin_id)->orderBy('id', 'asc')->get();
        $response['user'] = $user;
        return response()->json($response);
    }
    public function getbyemail($id)
    {
        $check = DB::table('users')->where('email', $id)->exists();
        if ($check) {
            $user = DB::table('users')->where('email', $id)->orderBy('id', 'asc')->get();
            $response['user'] = $user;
            $response['code'] = 200;
            return response()->json($response);
        } else {
            return response()->json(['message' => 'Record not found.', 'code' => 404]);
        }
    }
    public function getallsecurity($id)
    {
        $security = DB::table('parkingsecurities')->where('parking_id', $id)->orderBy('id', 'asc')->get();
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
    public function exportregistration($id)
    {
        return (new RegistrationExport($id))->download('registrations.xlsx');
    }
    public function exportsecurity($id)
    {
        return (new SecurityExport($id))->download('securities.xlsx');
    }
    public function exportslots($id)
    {
        return (new SlotExport($id))->download('parkingslots.xlsx');
    }
}
