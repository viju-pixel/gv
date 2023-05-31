@extends('layouts.auth')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cab Driver</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cabdriver.create') }}"> Create New </a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Gender</th>
            <th>Profile_image</th>
            <th width="310px">Action</th>
            <th>Driver Approve Status</th>
        </tr>
        @foreach ($drivers as $driver)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $driver->full_name }}</td>
            <td>{{ $driver->email }}</td>
            <td>{{ $driver->contact }}</td>
            <td>{{ $driver->gender }}</td>
            <td><img src="/uploads/driver/{{ $driver->profile_image }}" width="80px"  height="70px"></td>

            <td>
                <form action="{{ route('cabdriver.destroy',$driver->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('cabdriver.show',$driver->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('cabdriver.edit',$driver->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>

            <td><a href="{{ route('admin.driver.approve', $driver->id) }}" class="btn btn-success btn-sm">Approve</a>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
