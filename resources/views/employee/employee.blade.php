@extends('layouts.master')
@extends('layouts.actions')
<div class="table-responsive">
    <table class="table table-dark">
        <thead>
            <tr>
                <td scope="col">{{__('sign_up.fullName')}}</td>
                <td scope="col">{{__('sign_up.lastName')}}</td>
                <td scope="col">{{__('sign_up.email')}}</td>
                <td scope="col">{{__('sign_up.primaryAddress')}}</td>
                <td scope="col">{{__('sign_up.action')}}</td>
            </tr>
        </thead>
        <tbody>
        @foreach ( $users as $user)
            <tr scope="row">
                <td>{{$user->full_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->primary_address}}</td>
                <td><a href="{{'/deleteUserById/'.$user->id}}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>