<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LeaveApplication;
use App\Http\Controllers\PDFController;

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

    public function getAllPendingLeaves()
    {
        return view('leave/view_leaves')->with('leaves', DB::table('leave_applications')->where('status', 'pending')->get());
    }

    public function getAllApprovedLeaves()
    {
        return view('leave/view_users_on_leave')->with('leaves', DB::table('leave_applications')->where('status', 'approved')->get());
    }

    public function approveLeaveById(Request $request)
    {
        DB::table('leave_applications')->where('id', $request->leaveId)->update(['status' => 'approved']);
        return view('dashboard/dashboard')->with('successMsg','Property is updated .');;
    }

    public function rejectLeaveById(Request $request)
    {
        DB::table('leave_applications')->where('id', $request->leaveId)->update(['status' => 'rejected']);
        return view('dashboard/dashboard')->with('successMsg','Property is updated .');;
    }

    public function setPendingLeaveById(Request $request)
    {
        DB::table('leave_applications')->where('id', $request->leaveId)->update(['status' => 'pending']);
        return view('dashboard/dashboard')->with('successMsg','Property is updated .');;
    }

    public function requestEReport(Request $request){
        $leaveQuery  = "SELECT * FROM leave_applications WHERE applicant_id = ". $request->id ."  AND  start_date >= '". $request->start_date ."' AND  end_date <= '".$request->end_date."'";
        $leaveData = DB::select($leaveQuery);
        $userQuery = "SELECT * FROM employee WHERE id = ". $request->id;
        $userData = DB::select($userQuery);
        $pdfController = new PDFController();
        return $pdfController->generateLeaveFormPDF($userData, $leaveData);
    }
}
