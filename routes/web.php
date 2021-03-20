<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeaveApplicationController;

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

Route::get('/login/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'si', 'ta'])) {
        abort(400);
    }
    App::setLocale($locale);
    return view('login/login');
});

Route::post('/signIn', [AuthController::class, 'checkLoginData']);

Route::get('/dashboard/{userId}', function () {
    return view('dashboard/dashboard');
});

Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/sign_up', function () {
    return view('sign_up/sign_up');
});

##################Leave application routes##########################
Route::get('/leave', [ LeaveApplicationController::class, 'create']);
#Route::get('/leave/index', [ LeaveApplicationController::class, 'index']);
Route::post('/leave', [ LeaveApplicationController::class, 'store']);



