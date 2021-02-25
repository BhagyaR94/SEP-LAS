@extends('layouts.master')

<div class="container">
    <div class="text-center h1" style="color:yellow">Leave Application System</div>
</div>
<br>
<div class="Row text-center">
    <div class="container container-sm mx-auto">
        <img src="{{asset('/images/logo/logo.png')}}" class=" rounded img-thumbnail" alt="Responsive image">
    </div>
</div>
<br><br>
<div class="container">
    <div class="Row align-items-center">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ url('/login/si') }}" class="btn btn-lg btn-primary pull-right">සිංහල</a>
            <a href="{{ url('/login/ta') }}" class="btn btn-lg btn-warning pull-right">தமிழ்</a>
            <a href="{{ url('/login/en') }}" class="btn btn-lg btn-success pull-right">English</a>
        </div>
    </div>
</div>