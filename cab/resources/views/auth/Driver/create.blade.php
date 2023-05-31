@extends('layouts.auth')

@section('styles')
<link href="{{asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Driver</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('cabdriver.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('cabdriver.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Driver Name:</strong>
                <input type="text" name="full_name" class="form-control" placeholder="Enter Driver full name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control">
            </div>
        </div>
       
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="password" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password</strong>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact</strong>
                <input type="text" name="contact" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="radio">
                <label>
                    <input type="radio" name="gender"  value="male">
                    Male
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender"  value="female">
                    Female
                </label>
            </div>
        </div>

       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Driver Image:</strong>
                <input type="file" name="profile_image" class="form-control">
            </div>
       </div>
 
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

@endsection


 