<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function loadAvailableResources(Request $request)
    {
        $query = "SELECT * FROM employee WHERE id NOT IN (SELECT applicant_id FROM leave_applications WHERE start_date >= '".$request->start_date."' AND end_date <= '".$request->end_date."')";
        return DB::select($query);
    }

    public function loadAllEmployees(){
        $query = "SELECT * FROM employee WHERE user_type=1";
        $users = DB::select($query);

        return view('employee/employee')->with('users',$users);
    }

    public function deleteUserById(Request $request){
        DB::table('employee')->where('id', '=', $request->user_id)->delete();
        return redirect('dashboard/dashboard');
    }
}
