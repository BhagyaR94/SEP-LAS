@extends('layouts.master')
<div id="material-attaching">
    <div class="container">
        <div id="material_attaching-row" class="row justify-content-center">
            <div id="material_attaching-column" class="col-md-6">
                <div id="material_attaching-box" class="col-md-12">
                    <form id="material_attaching-form" class="form" action="{{ url('/material_attaching')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h3 class="text-center text-info">{{__('material_attaching.Materials_Attaching_Form')}}</h3>
                        @csrf
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row align-items-start">
                            <div class="col">
                                <label for="Subject" class="text-info">{{__('material_attaching.Subject')}}:</label><br>
                                <input type="text" name="Subject" id="Subject" class="form-control">
                            </div>
                            <div class="col">
                                <label for="File1" class="text-info">{{__('material_attaching.File1')}}:</label><br>
                                <input type="file" name="file" class="btn btn-info btn-md" value="{{__('material_attaching.upload')}}">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="Row align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="{{__('material_attaching.OK')}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="Row align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="{{__('material_attaching.cancel')}}">
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