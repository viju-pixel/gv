@extends('admin.layouts.app')
@section('title') Countries @endsection
@section('content')
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between mb-4 pb-2 gap-4">
                <h1 class="page-title">Countries</h1>
                @can('country-create')
                    <a class="btn btn-secondary" href="{{ route('admin.user-management.country.create') }}">
                        {{-- Plus Sign svg --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentcolor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        <span>Add New</span>
                    </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-hover country-table" aria-describedby="country-list">
                <thead class="">
                    <tr class="align-middle text-center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Iso3</th>
                        <th>Phone code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle text-center"></tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script type="text/javascript">
    jQuery(function ($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $.noConflict();
        var table = $('.country-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.user-management.country.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'iso3', name: 'iso3'},
                {data: 'phone_code', name: 'phone_code'},
                {data: 'action', name: 'action'},
            ],
            "language": {

           "search": '<svg width="24" height="25" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.5682 0.513723C7.87981 0.791267 5.3928 1.97763 3.46088 3.90411C2.12214 5.24285 1.21876 6.70132 0.641902 8.45366C-0.125426 10.7828 -0.125426 13.1991 0.641902 15.5283C1.21876 17.2861 2.12758 18.75 3.47176 20.0833C6.12747 22.7227 9.74643 23.9199 13.4797 23.392C15.4007 23.1199 17.3272 22.3308 18.8401 21.1935C19.0033 21.0683 19.1503 20.9758 19.172 20.9812C19.1938 20.9921 20.8427 22.603 22.8345 24.5621C25.1039 26.7933 26.5351 28.1593 26.6657 28.2191C27.199 28.4695 27.7977 28.1538 27.9065 27.5661C27.9936 27.109 28.2983 27.4355 22.3339 21.5472L20.4727 19.7078L20.7883 19.3377C22.1488 17.765 23.0468 15.7732 23.3896 13.5964C23.5202 12.7474 23.5202 11.191 23.3896 10.3312C23.0032 7.83326 21.9094 5.6891 20.0863 3.8769C17.583 1.38989 14.0946 0.154551 10.5682 0.513723ZM13.1749 2.33681C15.3735 2.65789 17.3054 3.61568 18.8346 5.13946C20.7067 7.01696 21.6808 9.35159 21.6808 11.991C21.6808 12.9651 21.5937 13.6345 21.3652 14.478C20.2115 18.7663 16.2986 21.7322 11.7926 21.7322C9.10971 21.7322 6.61726 20.7146 4.75608 18.8534C3.49353 17.5908 2.65001 16.1324 2.19288 14.4399C1.79017 12.9325 1.79017 11.0495 2.19288 9.54206C3.10714 6.13535 5.81184 3.45242 9.22399 2.57081C10.4648 2.24973 11.9831 2.15722 13.1749 2.33681Z" fill="#A2A2A2"></path></svg>',
           "searchPlaceholder": "search",

       }
        });

        $('body').on('click','.deleteCountry',function(){
            var id=$(this).data("id");
            var confirmBtn =confirm("Are you sure want to delete");
            if(confirmBtn == true){
                $.ajax({
                    type:"DELETE",
                    url:"{{route('admin.user-management.country.index')}}/" + id,
                    success:function(){
                        table.draw();
                    },
                    error:function(data){
                        console.log('Error:',data);
                    }
                });
            }else{
                alert('delete Abort');
            }
        });
    });
</script>
@endsection
