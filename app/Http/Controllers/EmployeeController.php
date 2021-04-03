<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function loadAvailableResources(Request $request)
    {
        $userData = DB::select("SELECT * FROM employee WHERE id NOT IN (SELECT applicant_id FROM leave_applications WHERE start_date >= '2020-02-10' AND end_date <= '2020-02-10')
        ");
        return $userData;
    }
}
