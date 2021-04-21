@extends('layouts.master')
<div class="h1">DASHBOARD HERE</div>
@if(session('loggedInUser'))
<div class="h2">You are Logged in as {{Session::get('loggedInUser')->full_name}} </div>
@endif

<a href="{{url('/logout')}}" class="btn btn-danger">Logout</a>
<a class="btn btn-primary" href="{{url('/sign_up')}}">{{__('sign_up.Sign_Up')}}</a></div>
<a class="btn btn-primary" href="{{url('/getAllPendingLeaves')}}">Gel All Pending Leaves</a></div>
<a class="btn btn-primary" href="{{url('/getAllApprovedLeaves')}}">Gel All Approved Leaves</a></div>
<a class="btn btn-primary" href="{{'/e_leave_report/'.Session::get('loggedInUser')->id}}">E Report</a></div>

@if(!empty($successMsg))
  <div class="alert alert-success"> {{ $successMsg }}</div>
@endif