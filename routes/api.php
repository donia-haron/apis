<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NonregisteredController;
use App\Http\Controllers\ParkingspaceController;
use App\Http\Controllers\ParkingslotController;
use App\Http\Controllers\RegistrationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//user apis
Route::get('/user', [UserController::class, 'getall']);
Route::get('/user/{id}', [UserController::class, 'getbyid']);
Route::get('/useremail/{id}', [UserController::class, 'getusername']);
Route::get('/user/car/{id}', [UserController::class, 'getusercar']);
Route::post('/user/insert', [UserController::class, 'insert']);
Route::post('/user/delete/{id}', [UserController::class, 'delete']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::post('/user/updatepass/{id}', [UserController::class, 'updatepass']);

//admin apis
Route::get('/admin/{id}', [AdminController::class, 'getbyemail']);
Route::post('/admin/newpass/{id}', [AdminController::class, 'newpass']);
Route::get('/admin/dashboard/{id}', [AdminController::class, 'getdailystatistics']);
Route::get('/admin/chart/{id}', [AdminController::class, 'getweeklychart']);
Route::get('/admin/parking/{id}', [AdminController::class, 'getparkingid']);
Route::get('/admin/user/{id}', [AdminController::class, 'getadmin']);
Route::get('/admin/reports/{id}/{filter}', [AdminController::class, 'getreports']);
Route::get('/admin/reports/custom/{id}/{from}/{to}', [AdminController::class, 'getcustomreports']);
Route::get('/admin/exportreg/{id}', [AdminController::class, 'exportregistration']);
Route::get('/admin/exportsec/{id}', [AdminController::class, 'exportsecurity']);
Route::get('/admin/exportslot/{id}', [AdminController::class, 'exportslots']);

//security apis
Route::get('/security/{id}', [AdminController::class, 'getallsecurity']);
Route::post('/security/{id}', [AdminController::class, 'changestatus']);
Route::post('/security/insert/{id}', [AdminController::class, 'insert']);
Route::delete('/security/delete/{id}', [AdminController::class, 'delete']);
Route::post('/security/update/{id}', [AdminController::class, 'update']);

//car apis
Route::get('/car', [CarController::class, 'getall']);
Route::get('/car/{id}', [CarController::class, 'getbyid']);
Route::post('/car/insert', [CarController::class, 'insert']);
Route::post('/car/delete/{id}', [CarController::class, 'delete']);
Route::post('/car/update/{id}', [CarController::class, 'update']);
Route::get('/usercar/{id}', [CarController::class, 'getbyuser']);

//nonregistered apis
Route::get('/nonregistered', [NonregisteredController::class, 'getall']);
Route::get('/nonregistered/{id}', [NonregisteredController::class, 'getbyid']);
Route::post('/nonregistered/insert', [NonregisteredController::class, 'insert']);
Route::post('/nonregistered/delete/{id}', [NonregisteredController::class, 'delete']);
Route::post('/nonregistered/update/{id}', [NonregisteredController::class, 'update']);
Route::get('/nonregistered/security/{id}', [NonregisteredController::class, 'getbysecurityman']);

//parkingspace apis
Route::get('/parkingspace', [ParkingspaceController::class, 'getall']);
Route::get('/parkingspace/{id}', [ParkingspaceController::class, 'getbyid']);
Route::get('/parkingspace/category/{id}', [ParkingspaceController::class, 'getbycategory']);
Route::post('/parkingspace/insert', [ParkingspaceController::class, 'insert']);
Route::post('/parkingspace/delete/{id}', [ParkingspaceController::class, 'delete']);
Route::post('/parkingspace/update/{id}', [ParkingspaceController::class, 'update']);
// Route::post('/parkingspace/securityman/{id}', [ParkingspaceController::class, 'getparkingsecurity']);



//parkingslot apis
Route::get('/parkingslot', [ParkingslotController::class, 'getall']);
Route::get('/parkingslot/{id}', [ParkingslotController::class, 'getbyid']);
Route::get('/parkingslot/parking/{id}', [ParkingslotController::class, 'getbyparkingid']);
Route::post('/parkingslot/insert', [ParkingslotController::class, 'insert']);
Route::post('/parkingslot/delete/{id}', [ParkingslotController::class, 'delete']);
Route::post('/parkingslot/update/{id}', [ParkingslotController::class, 'update']);
Route::post('/parkingslot/updatestatus/{id}', [ParkingslotController::class, 'updatestatus']);

//registrations apis

Route::get('/registration', [RegistrationController::class, 'getall']);
Route::get('/registration/{id}', [RegistrationController::class, 'getbyid']);
Route::get('/registration/parking/{id}', [RegistrationController::class, 'getbyparkingid']);
Route::get('/registration/user/{id}', [RegistrationController::class, 'getbyuserid']);
Route::post('/registration/insert', [RegistrationController::class, 'insert']);
Route::post('/registration/delete/{id}', [RegistrationController::class, 'delete']);
Route::post('/registration/update/{id}', [RegistrationController::class, 'update']);
Route::post('/registration/updatestatus/{id}', [RegistrationController::class, 'updatestatus']);
