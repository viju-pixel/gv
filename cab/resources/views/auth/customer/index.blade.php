@extends('layouts.auth')
@section('content')
    
<div class="container mt-5">
    <h2 class="mb-4"></h2>
    <table class="table table-bordered  table-hover category-table" aria-describedby="category-list" >
        <thead>
            <tr class="align-middle text-center" data-id="$category->id']">
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
    
                $(".category-table").on("click", ".statuscheck", function () {
                    let status = $(this).prop("checked") ? 1 : 0;
                  
                    var categoryId = $(this).data('id');
                   //console.log(categoryId);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{route('updatestatus')}}",
                        data: {
                            'status': status,
                            'categoryId': categoryId
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data.success);
                        }
                    });
                })


  });
</script>
@endsection