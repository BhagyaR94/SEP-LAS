<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeaveApplicationController;
use Illuminate\Http\Request;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RequstELeaves;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MaterialAttaching;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('splash/splash');
});

Route::get('/login/{locale}', function (Request $request) {
    if (!in_array($request->locale, ['en', 'si', 'ta'])) {
        abort(400);
    }
    $request->session()->put('session', $request->locale);
    App::setLocale(session('session'));
    return view('login/login');
});

Route::group([
    'middleware' => 'locale',
], function () {
    Route::post('/signIn', [AuthController::class, 'checkLoginData']);

    Route::get('/dashboard/{userId}', function () {
        return view('dashboard/dashboard');
    });

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/sign_up', function () {
        return view('sign_up/sign_up');
    });

    Route::post('/signUpUser', [SignUpController::class, 'storeDataDb']);

    Route::get('/leave', function () {
        return view('leave/leave');
    });

    Route::get('/getLeavesByUserId', [LeaveController::class, 'getLeaveInformationByUserId']);

    Route::post('/leave', [LeaveController::class, 'storeLeaveDataDb']);

    Route::get('/e_leave_report/{userId}', function (Request $request) {
        return view('e_leave_report/e_leave_report')->with('user', $request->userId);
    });

    Route::get('/getpdf', [PDFController::class, 'getpdf']);

    Route::resource('/leaves', LeaveApplicationController::class)->parameters([
        'leaves' => 'leaveApplication'
    ]);

    Route::get('/sendEmail', [NotificationController::class, 'sendEmail']);

    Route::get('/loadAvailableResources', [EmployeeController::class, 'loadAvailableResources']);

    Route::get('/getAllPendingLeaves', [LeaveController::class, 'getAllPendingLeaves']);

    Route::get('/getAllApprovedLeaves', [LeaveController::class, 'getAllApprovedLeaves']);

    Route::get('/approveLeaveById/{leaveId}', [LeaveController::class, 'approveLeaveById']);

    Route::get('/rejectLeaveById/{leaveId}', [LeaveController::class, 'rejectLeaveById']);

    Route::get('/setPendingLeaveById/{leaveId}', [LeaveController::class, 'setPendingLeaveById']);

    Route::post('/requestEReport', [LeaveController::class, 'requestEReport']);

    Route::get('checkAjax', function () {
        echo "AJAX HERE";
    });

    //Route::get('/material_attaching', [MaterialAttaching::class, 'createForm']);
    Route::get('/material_attaching', function () {
        return view('material_attaching/material_attaching');
    });
    
    Route::post('/material_attaching', [MaterialAttaching::class, 'fileUpload'])->name('fileUpload');

});
