@extends('layouts.master')
<div class="h1">DASHBOARD HERE</div>
@if(session('loggedInUser'))
<div class="h2">You are Logged in as {{session('loggedInUser')->name}} </div>
@endif

<a href="{{url('/logout')}}" class="btn btn-danger">Logout</a>
<a class="btn btn-primary" href="{{url('/sign_up')}}">Sign Up</a></div>

 <div class>
    <a class="btn btn-primary img-thumbnail" href="{{url('/sign_up')}}" > <img src="{{asset('/images/logo/signup.png')}}"  alt="Responsive image">
</div>
