@extends('layouts.master')

<div class="container container-sm mx-auto">

  <div class="row">
    @if(session('loggedInUser'))
    <h1 style="color: white">Hello, {{Session::get('loggedInUser')->full_name}}!!!</h1>
    <p style="color: white">Welcome to the Online Leave Application System of Akuressa Central</p>
    @endif
  </div>

  <!-- Admin's Menu Menu-->
  @if(session('loggedInUser') && Session::get('loggedInUser')->user_type === 2)
  <div class="row">
    <div class="col-xs-3 col-md-3">
      <div class="card thumbnail">
        <a class="card-body btn btn-primary " href="{{url('/sign_up')}}">{{__('sign_up.Sign_Up')}}</a>
      </div>
    </div>

    <div class="col-xs-3 col-md-3">
      <div class="card thumbnail">
        <a class="card-body btn btn-primary" href="{{url('/getAllPendingLeaves')}}">{{__('leave.pending')}}</a>
      </div>
    </div>


    <div class="col-xs-3 col-md-3">
      <div class="card thumbnail">
        <a class="card-body btn btn-primary" href="{{url('/getAllApprovedLeaves')}}">{{__('leave.approved')}}</a>
      </div>
    </div>

    <div class="col-xs-3 col-md-3">
      <div class="card thumbnail">
        <a class="card-body btn btn-primary" href="{{'/e_leave_report/'.Session::get('loggedInUser')->id}}">{{__('leave.requestereport')}}</a>
      </div>
    </div>

  </div>
  @endif

  <!--End  Admin's Menu-->

  <!-- Teacher's Menu-->
  @if(session('loggedInUser') && Session::get('loggedInUser')->user_type === 1)
  <div class="row">
    <div class="col-xs-3 col-md-3">
      <div class="card thumbnail">
        <a class="card-body btn btn-primary " href="{{url('/leave')}}">{{__('leave.applyleaves')}}</a>
      </div>
    </div>
<hr>
    <div class="col-xs-3 col-md-3">
      <div class="card thumbnail">
        <a class="card-body btn btn-primary " href="{{'/leave_summary/'.Session::get('loggedInUser')->id}}">{{__('leave.viewleaves')}}</a>
      </div>
    </div>

  </div>
  @endif
  <!--End Teacher's Menu-->

  <br>

  <div class="row">
    <div class="col-xs-3 col-md-3">
      <div class="card thumbnail">
        <a href="{{url('/logout')}}" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>

@if(!empty($successMsg))
<div class="alert alert-success"> {{ $successMsg }}</div>
@endif