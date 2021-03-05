<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

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
    'middleware' => 'locale'
], function () {
    Route::post('/signIn', [AuthController::class, 'checkLoginData']);

    Route::get('/dashboard/{userId}', function () {
        return view('dashboard/dashboard');
    });

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/sign_up', function (Request $request) {
        return view('sign_up/sign_up');
    });
});
