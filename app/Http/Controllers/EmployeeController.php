<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {

    }

    public function show()
    {

    }

    public function getEmployeeById($employeeId)
    {
        $employee = new Employee();
        $employee = Employee::findOrFail($employeeId);

        return $employee;
    }

    public static function getTeachersList()
    {
        return Employee::all();
    }

}
