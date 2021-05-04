<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use App\Models\User;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use \Datetime;
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
        $employee_id = Session::get('loggedInUser')[0]->id;
        $session=Session::get('loggedInUser')[0];       
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
        //dump(Session::all());
        $employeeController = new EmployeeController();
        //$availableTeachers=$employeeController->loadAvailableResources(); 
        //return view('leaves/leave_apply_v2', ["teachers" => EmployeeController::getTeacherList()] );
        return view('leaves/leave_apply_v2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dump($request);

        
        $validate_data = $request->validate(
            [
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'leave_type' => 'required',
                'contact_location' => 'required',

            ]
            );       
        
        $date1 = new DateTime($request->start_date);
        $date2 = new DateTime($request->end_date);
        $interval = $date1->diff($date2);
        
        //print($interval);

        $leaveApp = new LeaveApplication();
        
        $leaveApp->applicant_id = Session::get('loggedInUser')[0]->id;
        $leaveApp->start_date = $request->start_date;
        $leaveApp->end_date = $request->end_date;
        $leaveApp->reason = $request->reason;
        $leaveApp->leave_type = $request->leave_type;
        $leaveApp->contact_location = $request->contact_location;
        $leaveApp->status = "pending";
        $leaveApp->number_of_days = $interval->format('%d');     
        $leaveApp->telephone = $request->telno;
        $leaveApp->substitute_employee_id = $request->backup_resource;        
        $leaveApp->save();
        return view('material_attaching/material_attaching')->with('leave',$leaveApp->id);        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveApplication $leaveApplication)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveApplication $leaveApplication)
    {        
        
        if ( !empty( $leaveApplication->substitute_employee_id )){
            $name = EmployeeController::getNameById($leaveApplication->substitute_employee_id);
            $leaveApplication->setAttribute('backup_resource_name', $name[0]->full_name);
            return view('leaves/leave_edit_v2', [ "applications" => $leaveApplication ] );
        }        
        return view('leaves/leave_edit_v2', [ "applications" => $leaveApplication ] );
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
        //dump($leaveApplication);
        $validate_data = $request->validate(
            [
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'leave_type' => 'required',                
                'contact_location' => 'required',
            ]
            );       

            $date1 = new DateTime($request->start_date);
            $date2 = new DateTime($request->end_date);
            $interval = $date1->diff($date2);

            $leaveApplication->applicant_id = Session::get('loggedInUser')[0]->id;
            $leaveApplication->start_date = $request->start_date;
            $leaveApplication->end_date = $request->end_date;
            $leaveApplication->reason = $request->reason;
            $leaveApplication->leave_type = $request->leave_type;
            $leaveApplication->contact_location = $request->contact_location;
            $leaveApplication->status = "pending";
            $leaveApplication->number_of_days = $interval->format('%d');     
            $leaveApplication->telephone = $request->telno;
            $leaveApplication->substitute_employee_id = $request->backup_resource;        
            $leaveApplication->save();

        return Redirect::to('leaves')->with('success', 'Requested leave application has been changed.');
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
        return Redirect::to('leaves')->with('success', 'Requested leave has been deleted.');
    }
}
