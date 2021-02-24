@extends('layouts.master')
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="form">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <div class="col-md-6">
                                <div class="col-md-4">
                                <a href="{{ url('/login/si') }}" class="btn btn-xs btn-info pull-right">Sinhala</a>
                                </div>
                                <div class="col-md-4">
                                <a href="{{ url('/login/ta') }}" class="btn btn-xs btn-info pull-right">Tamil</a>
                                </div>
                                <div class="col-md-4">
                                <a href="{{ url('/login/en') }}" class="btn btn-xs btn-info pull-right">English</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>