<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LeaveApplication;

class LeaveController extends Controller
{
    public function getLeaveInformationByUserId(Request $request)
    {
        return DB::table('leave_applications')->where('user_id', $request->id)->get();
    }
    public function storeLeaveDataDb(Request $request)
    {
        $this->validate($request, [
            'leave_type' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'numberofdateapply' => 'required',
            'reason' => 'required',
            'address' => 'required',
        ]);


        // $session_id = session('loggedInUser')->id;
        //$userData = DB::select("select * from employee where id = '" . $session_id . "'");
        $leavedeatails = new LeaveApplication();
        $leavedeatails->applicant_id = 1;
        $leavedeatails->start_date = $request->input('startdate');
        $leavedeatails->end_date = $request->input('enddate');
        $leavedeatails->number_of_days = $request->input('numberofdateapply');
        $leavedeatails->reason = $request->input('reason');
        $leavedeatails->type = $request->input('leave_type');
        $leavedeatails->contact_location = $request->input('address');
        $leavedeatails->telephone = $request->input('telno');
        $leavedeatails->status = $request->input('leavestatus');
        $leavedeatails->substitute_employee_id = $request->input('backupersonname');
        $leavedeatails->save();
        return redirect('dashboard/dashboard');
    }
}
