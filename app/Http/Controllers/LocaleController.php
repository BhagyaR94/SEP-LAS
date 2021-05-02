<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function setLocale(Request $request){
        $request->session()->put('session', $request->locale);
        App::setLocale(session('session'));
        return back();
    }
}
