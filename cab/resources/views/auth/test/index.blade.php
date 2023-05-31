@extends('layouts.auth')

@section('content')
    <section class="container py-4">
        <div class="row">
            <div class="col-md-12">
                                                                                                      
                <h2>Tabs</h2>
                <ul id="tabs" class="nav nav-tabs">
                    <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab"
                            class="nav-link small text-uppercase active">Home</a></li>
                    <li class="nav-item"><a href="" data-target="#profile1" data-toggle="tab"
                            class="nav-link small text-uppercase ">Profile</a></li>
                    <li class="nav-item"><a href="" data-target="#messages1" data-toggle="tab"
                            class="nav-link small text-uppercase">Messages</a></li>
                </ul>
                <br>
                <div id="tabsContent" class="tab-content">
                    <div id="home1" class="tab-pane fade active show">
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
                                <div class="col-xs-12 col-sm-4 col-md-6">
                                    <div class="form-group">
                                        Driver Name:<input type="text" name="full_name"
                                            class="form-control py-2 rounded-pill mr-1 pr-5"
                                            placeholder="Enter Driver full name">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="email" name="email"
                                            class="form-control py-2 rounded-pill mr-1 pr-5">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Password</strong>
                                        <input type="password" name="password"
                                            class="form-control py-2 rounded-pill mr-1 pr-5">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Confirm Password</strong>
                                        <input type="password" name="password_confirmation"
                                            class="form-control py-2 rounded-pill mr-1 pr-5">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Contact</strong>
                                        <input type="text" name="contact"
                                            class="form-control py-2 rounded-pill mr-1 pr-5">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="female">
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
                    </div>
                        <div id="profile1" class="tab-pane fade ">
                            <div class="row pb-2">
                                <div class="container mt-5">
                                    <h2 class="mb-4"></h2>
                                    <table class="table table-bordered  table-hover category-table" aria-describedby="category-list" >
                                        <thead>
                                            <tr class="align-middle text-center" data-id="$category->id">
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div id="messages1" class="tab-pane fade">
                            <div class="list-group"><a href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">44</span> Message 1</a> <a
                                    href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">8</span> Message 2</a> <a
                                    href="" class="list-group-item d-inline-block"><span
                                        class="float-right badge badge-pill badge-dark">23</span> Message 3</a> <a
                                    href="" class="list-group-item d-inline-block text-muted">Message n..</a></div>
                        </div>
                
                </div>
            </div>
    </section>
@endsection

@section('scripts')

<script type="text/javascript">
  $(function () {
    
    var table = $('.category-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('customer.index') }}",
        columns: [
            {data: 'customer_name', name: 'customer_name'},
            {data: 'email', name: 'email'},

            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
             


  });
</script>
@endsection

