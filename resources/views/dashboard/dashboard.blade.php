@extends('layouts.master')
<div class="h1">DASHBOARD HERE</div>
@if(session('loggedInUser'))
<div class="h2">You are Logged in as {{session('loggedInUser')->full_name}} </div>
@endif

<a href="{{url('/logout')}}" class="btn btn-danger">Logout</a>
<a class="btn btn-primary" href="{{url('/sign_up')}}">{{__('sign_up.Sign_Up')}}</a></div>