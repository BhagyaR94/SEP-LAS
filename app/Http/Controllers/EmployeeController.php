<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Employee; 

class EmployeeController extends Controller
{
    public function loadAvailableResources(Request $request)
    {
        $query = "SELECT * FROM employee WHERE id NOT IN (SELECT applicant_id FROM leave_applications WHERE start_date >= '".$request->start_date."' AND end_date <= '".$request->end_date."')";
        return DB::select($query);
    }

    public function getAvailableTeachers(Request $request)
    {
        $query = "SELECT id,full_name FROM employee WHERE id NOT IN (SELECT applicant_id FROM leave_applications WHERE start_date >= '".$request->start_date."' AND end_date <= '".$request->end_date."') AND id <> '".$request->employeeId."'";
        return Response::json(DB::select($query));
        //return Response::json(array('start_date' => $request->startDate, 'end_date' => $request->endDate, 'id' => $request->employeeId));
    }

    public static function getNameById($id)
    {
        $query = "SELECT id,full_name FROM employee WHERE id =$id";
        return (DB::select($query));        
    } 
    

}
