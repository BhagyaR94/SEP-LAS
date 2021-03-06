<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class AuthController extends Controller
{
    public function checkLoginData(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required'
        ]);

        $userData = DB::select("select * from users where email = '" . $request->username . "'");
        if (!empty($userData) && $request->password === $userData[0]->password) {
            $request->session()->flash('loggedInUser', $userData[0]);
            return redirect('dashboard/'.$userData[0]->id);
        }
        return redirect()->back()->with('error', 'Invalid User Name or Password');;
    }

    public function logout(Request $request)
    {
        if ($request->session('loggedInUser')) {
            $request->session()->forget('loggedInUser');
            return redirect('login/'. App::getLocale());
        }
    }
   
}
