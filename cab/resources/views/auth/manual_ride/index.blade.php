@extends('layouts.auth')

@section('styles')
<link href="{{asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Job Position</h2>
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
   
<form action="{{ route('position.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-sm-4 ">
            <div class="form-group">
                <strong>start location:</strong>
                <input type="text" name="location"  id="location" class="form-control" >
            </div>
        </div>

        <div class="col-sm-4 ">
            <div class="form-group">
                <strong>date:</strong>
                <input type="date" name="date" class="form-control"  >
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  
</form>


@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv43m2Fjq9Whd-a9epcECN_NBocoL4Q0c&libraries=places"></script>                 

<script>
    $( document ).ready(function() {
    var autocomplete;
    var to ='location';
    autocomplete=new google.maps.places.Autocomplete((document.getElementById(to)),{
        types:['geocode'] ,   
    });
  
    });
</script>
@endsection