@extends('layouts.auth')

@section('styles')
<link href="{{asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Job Position</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('position.index') }}"> Back</a>
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
   
<form action="{{ route('position.update',$position->id) }}" method="POST">
    @csrf
    @method('PUT') 
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Job Position:</strong>
                <input type="text" name="name" value="{{ $position->name }}" class="form-control" placeholder="Job Position Name">
            </div>
        </div>
       
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

@endsection
@section('scripts')
<script src="{{asset('assets/auth/plugins/apexcharts/apexcharts.js')}}"></script> 
@endsection
 