<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function checkLoginData(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required'
        ]);
        $query = "SELECT * FROM employee WHERE email = '" . $request->username . "'";
        $userData = DB::select($query);
        if (!empty($userData) && $request->password === $userData[0]->password) {
            Session::push('loggedInUser', $userData[0]);
            return redirect('dashboard/' . $userData[0]->id);
        }
        return redirect()->back()->with('error', 'Invalid User Name or Password');
    }

    public function logout(Request $request)
    {
        if ($request->session('loggedInUser')) {
            $request->session()->forget('loggedInUser');
            return redirect('login/' . App::getLocale());
        }
    }
}
