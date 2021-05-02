@extends('layouts.master')
@extends('layouts.actions')
<div class="container">
    <table class="table table-dark">
        <thead>
            <tr>
                <td scope="col">Applicant</td>
                <td scope="col">Start Date</td>
                <td scope="col">End Date</td>
                <td scope="col">Backup Resource</td>
                <td scope="col">Status</td>
                <td scope="col">Approve</td>
                <td scope="col">Reject</td>
            </tr>
        </thead>
        <tbody>
            @foreach ( $leaves as $leave)

            <tr scope="row">
                <td>{{$leave->applicant_id}}</td>
                <td>{{$leave->start_date}}</td>
                <td>{{$leave->end_date}}</td>
                <td>{{$leave->substitute_employee_id}}</td>
                <td>Pending</td>
                <td><a href="{{'/approveLeaveById/'.$leave->id}}" class="btn btn-success">Approve</a></td>
                <td><a href="{{'/rejectLeaveById/'.$leave->id}}" class="btn btn-danger">Reject</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>