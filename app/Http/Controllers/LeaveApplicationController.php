<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use Illuminate\Http\Request;
use Redirect;

class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //this has to be retireved from the session    
        $employee_id = 12;
        $applications = LeaveApplication::where('applicant_id', $employee_id )->get();

        return view('leaves/leave_index', ["applications" => $applications] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leaves/leave_apply');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_data = $request->validate(
            [
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'leave_type' => 'required',
                'employee_id' => 'required',
                'contact_location' => 'required',

            ]
            );       
        $leaveApp = new LeaveApplication();

        $leaveApp->start_date = $request->start_date;
        $leaveApp->end_date = $request->end_date;
        $leaveApp->reason = "test";
        $leaveApp->type = $request->leave_type;
        $leaveApp->applicant_id= $request->employee_id;
        $leaveApp->contact_location = $request->contact_location;
        $leaveApp->status = "pending";
        
        // below are dummy values set for the purpose of testing
        #$leaveApp->substitute_employee_id = $request->substitute_employee_id;
        $leaveApp->supervisor_employee_id = 15;

        $leaveApp->save();
        return Redirect::to('leaves');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveApplication $leaveApplication)
    {
        //
        //dd($leaveApplication);
        print("show called");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveApplication $leaveApplication)
    {
        //dump($leaveApplication);
        //print($leaveApplication);
        return view('leaves/leave_edit', [ "applications" => $leaveApplication ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveApplication $leaveApplication)
    {
        $validate_data = $request->validate(
            [
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'leave_type' => 'required',
                'employee_id' => 'required',
                'contact_location' => 'required',
            ]
            );       
        $leave = $leaveApplication->save();
        return view('leaves/leave_edit', [ "messages" => "Your changes were saved!", "applications" => $leaveApplication ] );        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveApplication $leaveApplication)
    {
        $leaveApplication->delete();
    }
}
