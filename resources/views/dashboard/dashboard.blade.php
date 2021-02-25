@extends('layouts.master')
<div class="h1">DASHBOARD HERE</div>
@if(session('loggedInUser'))
<div class="h2">You are Logged in as {{session('loggedInUser')->name}} </div>
@endif

<a href="{{url('/logout')}}" class="btn btn-danger">Logout</div>