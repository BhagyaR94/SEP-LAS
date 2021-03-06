@extends('layouts.master')
<h1></h1>
<div id="sign_up">
    <div class="container">
        <div id="sign_up-row" class="row justify-content-center">
            <div id="sign_up-column" class="col-md-6">

                <div id="sign_up-box" class="col-md-12">
                    <form id="sign_up-form" class="form" action="{{ url('/signUpUser') }}" method="POST">
                        @csrf
                        <h3 class="text-center text-info">{{__('sign_up.Sign_Up')}}</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">{{__('sign_up.userName')}}:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
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

                        <div class="form-group">

                            <input type="submit" name="submit" class="btn btn-info btn-md" value="{{__('sign_up.submit')}}">
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