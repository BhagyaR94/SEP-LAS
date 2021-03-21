<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    public function getLeaveInformationByUserId(Request $request)
    {
        return DB::table('leave_applications')->where('user_id', $request->id)->get();
    }
}