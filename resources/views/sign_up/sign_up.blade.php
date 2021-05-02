@extends('layouts.master')
@extends('layouts.actions')
<div id="sign_up">
    <div class="container">
        <div id="sign_up-row" class="row justify-content-center">
            <div id="sign_up-column" class="col-md-6">

                <div id="sign_up-box" class="col-md-12">
                    <form id="sign_up-form" class="form" action="{{ url('/signUpUser') }}" method="POST">
                        @csrf
                        <h3 class="text-center text-info">{{__('sign_up.Sign_Up')}}</h3>
                        <div class="form-group">
                            <label for="user_name" class="text-info">{{__('sign_up.userName')}}:</label><br>
                            <input type="text" name="user_name" id="user_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="full_name" class="text-info">{{__('sign_up.fullName')}}:</label><br>
                            <input type="text" name="full_name" id="full_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="initials" class="text-info">{{__('sign_up.initials')}}:</label><br>
                            <input type="text" name="initials" id="initials" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="text-info">{{__('sign_up.lastName')}}:</label><br>
                            <input type="text" name="last_name" id="last_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="designation" class="text-info">{{__('sign_up.designation')}}:</label><br>
                            <input type="text" name="designation" id="designation" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="date_joined" class="text-info">{{__('sign_up.dateJoined')}}:</label><br>
                            <input type="date" name="date_joined" id="date_joined" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="primary_address" class="text-info">{{__('sign_up.primaryAddress')}}:</label><br>
                            <input type="text" name="primary_address" id="primary_address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="secondary_address" class="text-info">{{__('sign_up.secondarAddress')}}:</label><br>
                            <input type="text" name="secondary_address" id="secondary_address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="primary_contact" class="text-info">{{__('sign_up.primaryContact')}}:</label><br>
                            <input type="text" name="primary_contact" id="primary_contact" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="secondary_contact" class="text-info">{{__('sign_up.secondaryContact')}}:</label><br>
                            <input type="text" name="secondary_contact" id="secondary_contact" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-info">{{__('sign_up.email')}}:</label><br>
                            <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">{{__('sign_up.password')}}:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="text-info">{{__('sign_up.confirm_password')}}:</label><br>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <div class="Row  align-items-center">
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="{{__('sign_up.submit')}}">
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