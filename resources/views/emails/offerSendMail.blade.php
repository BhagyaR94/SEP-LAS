@extends('layouts.master')

<div class="container">
    <h1>{{$offer['title']}}</h1>
    <label>{{$offer['body']}}</label>

    <a href="{{url('https://sep-las.herokuapp.com/')}}" class="btn btn-success">GOTO SEP LAS</a>

    Thanks,<br>
    {{ $offer['regards'] }}
</div>