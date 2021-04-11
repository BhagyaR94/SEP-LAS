@extends('layouts.master')
<div id="leave">
    <div class="container">
        <div id="leave-row" class="row justify-content-center">
            <div id="leave-column" class="col-md-6">
                <div id="leave-box" class="col-md-12">
                    <form id="leave-form" class="form" action="{{ url('/leaves')}}" method="POST">
                        @csrf
                        <h3 class="text-center text-info">{{__('leave.Leave_Form_Akuressa_Maha_Vidyalaya')}}</h3>
                            <div class="form-group">
                                <label for="name" class="text-info">{{__('leave.name')}}:</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="designation" class="text-info">{{__('leave.designation')}}:</label><br>
                                <input type="text" name="designation" id="designation" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="department" class="text-info">{{__('leave.department')}}:</label><br>
                                <input type="text" name="department" id="depatment" class="form-control">
                            </div>
                            <div class="form-group">  
                                <label for="leave_type" class="text-info">{{__('leave.leave_type')}}:</label><br>
                                <select name="leave_type" id="leave_type">
                                    <option value= "casual"> {{__('leave.casual_leave')}} </option>
                                    <option value= "sick"> {{__('leave.sick_leave')}} </option>
                                    <option value= "other"> {{__('leave.other')}} </option>
                                </select>                         
                                
                            </div>
                            <div class="form-group">
                                <label for="start_date" class="text-info">{{__('leave.start_date')}}:</label><br>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="end_date" class="text-info">{{__('leave.end_date')}}:</label><br>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="reason" class="text-info">{{__('leave.Reason')}}:</label><br>
                                <input type="text" name="reason" id="reason" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="First Appoinment Date" class="text-info">{{__('leave.First_Appoinment_Date')}}:</label><br>
                                <input type="text" name="firstappoinmentdate" id="firstappoinmentdate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Reserved Person Name" class="text-info">{{__('leave.Reserved_Person_Name')}}:</label><br>
                                <input type="text" name="reservedpersonname" id="reservedpersonname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Address When On Leave" class="text-info">{{__('leave.Address_When_On_Leave')}}:</label><br>
                                <input type="text" name="contact_location" id="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Tel No" class="text-info">{{__('leave.Tel_No')}}:</label><br>
                                <input type="text" name="telno" id="telno" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="{{__('leave.submit')}}">
                            </div>
                            <div class="form-group">
                                <input type="button" name="cancel" class="btn btn-info btn-md" value="{{__('leave.submit1')}}">
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