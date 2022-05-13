<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parkingslot;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as DB;

class ParkingslotController extends Controller
{
    public function getall()
    {
        $parkingslot = parkingslot::all();
        $response["parkingslot"] = $parkingslot;
        $response["success"] = 1;
        return response()->json($response);
    }


    public function getbyid($id)
    {
        $parkingslot = DB::table('parkingslots')->where('name', $id)->orderBy('id', 'asc')->get();
        return response()->json($parkingslot);
    }

    public function getbyparkingid($id)
    {
        $parkingslot = DB::table('parkingslots')->where('parking_id', $id)->orderBy('id', 'asc')->get();
        return response()->json($parkingslot);
    }

    public function insert(Request $request)
    {
        $date = Carbon::now();
        $parkingslot = new parkingslot();
        $parkingslot->name = $request->name;
        $parkingslot->level = $request->level;
        $parkingslot->parking_id = $request->parking_id;
        $parkingslot->status = $request->status;
        $parkingslot->created_at = $date;
        $parkingslot->save();
        $response['parkingslot'] = $parkingslot;
        return response()->json($response);
    }

    public function delete($id)
    {
        $parkingslot = parkingslot::find($id);
        $parkingslot->delete();
        return response()->json('Removed successfully.');
    }
    public function update(Request $request, $id)
    {
        $parkingslot = parkingslot::find($id);
        $parkingslot->name = $request->name;
        $parkingslot->level = $request->level;
        $parkingslot->parking_id = $request->parking_id;
        $parkingslot->status = $request->status;
        $parkingslot->update();
        $response["parkingslot"] = $parkingslot;
        $response['success'] = 1;
        return response()->json($response);
    }
    public function updatestatus(Request $request, $id)
    {
        $parkingslot = parkingslot::find($id);
        $parkingslot->parking_id = $request->parking_id;
        $parkingslot->status = $request->status;
        $parkingslot->update();
        $response["parkingslot"] = $parkingslot;
        $response['success'] = 1;
        return response()->json($response);
    }
}
