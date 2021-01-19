@extends('layouts.app')
@section('title','Activity List')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">System Activity</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Activity List</a>
    </li>
@endsection

@section('content')
    {{-- @section('panel-title', 'Calendar List View')
    @section('panel-icon', 'flaticon-event-calendar-symbol') --}}
    <div id="container">
        <div id="content"></div>
    </div>
    {{-- <div class="card card-custom">
        <div class="card-header">
         <div class="card-title">
          <h3 class="card-label">
           Calendar List View
          </h3>
         </div>
         <div class="card-toolbar">
          <a href="#" class="btn btn-light-primary font-weight-bold">
          <i class="ki ki-plus "></i> Add Event
          </a>
         </div>
        </div>
        <div class="card-body">
         <div id="kt_calendar"></div>
        </div>
       </div> --}}
@endsection

@push('scripts')
<script>

        $(document).ready(function() {
        /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */
            populateList();

            // Populate List
            function populateList(){
                var _url = "{{ route('d_get_activity_list') }}";
                $.ajax({
                    method:"GET",
                    url: _url,
                    beforeSend:function(){
                        KTApp.block('#container', {
                            overlayColor: '#000000',
                            state: 'primary',
                            message: 'Loading. . .'
                        });
                    },
                    success:function(data){
                        KTApp.unblock('#container');
                        document.getElementById("content").innerHTML= data;
                    },
                    complete:function(){
                    }

                });
            }

        });

    </script>
@endpush
