<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
  public function storeDataDb(Request $request)
  {
   
    $this->validate($request, [
      'username' => 'required|min:3|max:50',
      'email' => 'email',
      'password' => 'required|confirmed|min:6',
  ]);

    $user = new User();
    $user->name = $request->input('username');
    $user->email = $request->input('email');
    $user->password = $request->input('password');
    $user->user_type = 1;
    $user->save();
    return redirect('dashboard/dashboard');
  }
}
