@extends('layouts.master')
@extends('layouts.actions')
<div id="e_leave_report">
    <div class="container">
        <div id="e_leave_report-row" class="row justify-content-center">
            <div id="e_leave_report-column" class="col-md-6">

                <div id="e_leave_report-box" class="col-md-12">
                    <form id="e_leave_report-form" class="form" action="{{ url('/requestEReport') }}" method="POST">
                        @csrf
                        <h3 class="text-center text-info">{{__('e_leave_report.Request_e_Leaves_Report')}}</h3>
                        <input type="text" value="{{$user}}" id="id" name="id">
                        <div class="form-group">
                            <label for="start_date" class="text-info">{{__('e_leave_report.start_date')}}:</label><br>
                            <input type="date" name="start_date" id="start_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="end_date" class="text-info">{{__('e_leave_report.end_date')}}:</label><br>
                            <input type="date" name="end_date" id="end_date" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="Row align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="{{__('e_leave_report.submit')}}">
                                </div>
                            </div>
                            <br>
                            <div class="Row align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-info btn-md" name="cancel" href="{{url('/dashboard/dashboard')}}">{{__('e_leave_report.submit1')}}</a>
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