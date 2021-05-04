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
        
        $leavedeatails = new LeaveApplication();
        $leavedeatails->applicant_id = 1;
        $leavedeatails->start_date = $request->input('startdate');
        $leavedeatails->end_date = $request->input('enddate');
        $leavedeatails->number_of_days = $request->input('numberofdateapply');
        $leavedeatails->reason = $request->input('reason');
        $leavedeatails->leave_type = $request->input('leave_type');
        $leavedeatails->contact_location = $request->input('address');
        $leavedeatails->telephone = $request->input('telno');
        $leavedeatails->status = $request->input('leavestatus');
        $leavedeatails->substitute_employee_id = $request->input('backupersonname');
        $leavedeatails->save();
        return view('material_attaching/material_attaching')->with('leave',$leavedeatails->id);
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
        return redirect('dashboard/dashboard')->withErrors('successMsg','Property is updated .');
    }

    public function rejectLeaveById(Request $request)
    {
        DB::table('leave_applications')->where('id', $request->leaveId)->update(['status' => 'rejected']);
        return redirect('dashboard/dashboard')->withErrors('successMsg','Property is updated .');
    }

    public function setPendingLeaveById(Request $request)
    {
        DB::table('leave_applications')->where('id', $request->leaveId)->update(['status' => 'pending']);
        return redirect('dashboard/dashboard')->withErrors('successMsg','Property is updated .');
    }

    public function requestEReport(Request $request){
        $leaveQuery  = "SELECT * FROM leave_applications WHERE applicant_id = ". $request->id ."  AND  start_date >= '". $request->start_date ."' AND  end_date <= '".$request->end_date."'";
        $leaveData = DB::select($leaveQuery);
        $userQuery = "SELECT * FROM employee WHERE id = ". $request->id;
        $userData = DB::select($userQuery);
        $pdfController = new PDFController();
        return $pdfController->generateLeaveFormPDF($userData, $leaveData);
    }

    public function loadLeaveSummary(Request $request)
    {
        $currentYear = now()->year;
        $startDate = $currentYear.'01-01';
        $endDate = $currentYear.'12-31';
        $leaveQueryCasual = "SELECT COUNT(*) AS CASUAL FROM leave_applications WHERE applicant_id = " .$request->user_id. " AND start_date >= '".$startDate."' AND end_date <= '".$endDate."' AND STATUS='approved' AND leave_type LIKE '%c%'";
        $casualLeaveCount = DB::select($leaveQueryCasual)[0];
        $leaveQueryMedical = "SELECT COUNT(*) AS MEDICAL FROM leave_applications WHERE applicant_id = " .$request->user_id. " AND start_date >= '".$startDate."' AND end_date <= '".$endDate."' AND STATUS='approved' AND leave_type LIKE '%m%'";
        $medicalLeaveCount = DB::select($leaveQueryMedical)[0];
        return view('leave/leave_summary', ['casual_count'=> $casualLeaveCount->CASUAL, 'medical_count'=>$medicalLeaveCount->MEDICAL]);
    }
}
