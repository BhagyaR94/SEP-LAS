<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class SignUpController extends Controller
{
  public function storeDataDb(Request $request)
  {
   
    $this->validate($request, [
      'user_name' => 'required|min:3|max:50',
      'email' => 'email',
      'password' => 'required|confirmed|min:6',
  ]);

    $user = new Employee();
    $user->user_name = $request->input('user_name');
    $user->email = $request->input('email');
    $user->password = $request->input('password');
    $user->full_name = $request->input('full_name');
    $user->initials = $request->input('initials');
    $user->last_name = $request->input('last_name');
    $user->designation = $request->input('designation');
    $user->date_joined = $request->input('date_joined');
    $user->primary_address = $request->input('primary_address');
    $user->secondary_address = $request->input('secondary_address');
    $user->primary_contact = $request->input('primary_contact');
    $user->secondary_contact = $request->input('secondary_contact');
    $user->user_type = 1;

    
    $user->save();
    return redirect('dashboard/dashboard');
  }
}
