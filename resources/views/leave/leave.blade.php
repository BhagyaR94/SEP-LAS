@extends('layouts.master')
@extends('layouts.actions')
<div id="leave">
    <div class="container">
        <div id="leave-row" class="row justify-content-center">
            <div id="leave-column" class="col-md-6">
                <div id="leave-box" class="col-md-12">
                    <form id="leave-form" class="form" action="{{ url('/leave')}}" method="POST">
                        @csrf
                        <h3 class="text-center text-info">{{__('leave.Leave_Form_Akuressa_Maha_Vidyalaya')}}</h3>
                        <div class="dropdown">
                            <label for="leavetype" class="text-info">{{__('leave.leave_type')}}:</label><br>
                            <select class="form-select" name="leave_type" aria-label="Default select example">
                                <option value="{{__('leave.casual_leave')}}">{{__('leave.casual_leave')}}</option>
                                <option value="{{__('leave.sick_leave')}}">{{__('leave.sick_leave')}}</option>
                                <option value="{{__('leave.other')}}">{{__('leave.other')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Date" class="text-info">{{__('leave.startdate')}}:</label><br>
                            <input type="date" name="startdate" id="startdate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Date" class="text-info">{{__('leave.enddate')}}:</label><br>
                            <input type="date" name="enddate" id="enddate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Number Of Dates Apply" class="text-info">{{__('leave.Number_Of_Days_Apply')}}:</label><br>
                            <input type="text" name="numberofdateapply" id="numberofdateapply" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reason" class="text-info">{{__('leave.Reason')}}:</label><br>
                            <input type="text" name="reason" id="reason" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Address When On Leave" class="text-info">{{__('leave.Address_When_On_Leave')}}:</label><br>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Tel No" class="text-info">{{__('leave.Tel_No')}}:</label><br>
                            <input type="text" name="telno" id="telno" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Leave Status" class="text-info">{{__('leave.Leave_Status')}}:</label><br>
                            <input type="text" name="leavestatus" id="leavestatus" class="form-control">
                        </div>
                        <div class="dropdown">
                            <label for="Backup Person Name" class="text-info">{{__('leave.Backup_Person_Name')}}</label><br>
                            <select class="form-select" id="backupersonname" name="backupersonname" aria-label="Default select example">
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="Row align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="{{__('leave.submit')}}">
                                </div>
                            </div>
                            <br>
                            <div class="Row align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <input type="button" name="cancel" class="btn btn-info btn-md" value="{{__('leave.submit1')}}">
                                </div>
                            </div>
                        </div>
                    </form>

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $errorItem)
                            <li>{{$errorItem}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>