@extends('layouts.master')
<h1></h1>
<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text-info">{{__('login.login')}}</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">{{__('login.userName')}}:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">{{__('login.password')}}:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span>{{__('login.remember_me')}}</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="{{__('login.submit')}}">
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="#" class="text-info">{{__('login.trouble')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>