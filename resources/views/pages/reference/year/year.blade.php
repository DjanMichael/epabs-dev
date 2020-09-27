@extends('layouts.app')
@section('title','Year')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li> 
    <li class="breadcrumb-item">
        <a class="text-muted">System Year</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'Year')
    @section('panel-icon', 'flaticon2-box-1') 
    @include('pages.reference.component.panel')
@endsection

@push('scripts')
    <script src="{{ asset('dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('dist/assets/js/form_validate.js') }}"></script>
    <script src="{{ asset('dist/assets/js/controllers/reference.js') }}"></script>
    {{-- <script src="{{ asset('dist/assets/js/pages/crud/ktdatatable/base/html-table.js?v=7.1.1') }}"></script> --}}
    <script>
        $(document).ready(function() {
          
        /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */
            populateTable("{{ route('d_year') }}", "{{ route('d_get_year_by_page') }}");
           
            $("#alert").delay(0).hide(0);

            let data = { year :'' };

            let rules = { year :'required' };

            var btn = KTUtil.getById("kt_btn_1");

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */

            $("#btn_search").on('click',function(){
                var str = $("#query_search").val();
                populateTableBySearch("{{ route('d_get_year_search') }}", str);
            });
            
            $("#btn_add").on('click',function(){
                $.ajax({
                    url: "{{ route('d_add_year') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    $('#modal_reference').modal('toggle');
                });
            });

            $("#kt_btn_1").on('click', function(e){
                data.year = $("#year").val();
             
                let validation = new Validator(data, rules);
                if (validation.passes()) {
                    e.preventDefault();
                    $("#alert").delay(300).fadeOut(600);
                    $.ajax({
                        url: "{{ route('a_year') }}",
                        method: 'POST',
                        data: {
                            "year": data.year
                        },
                        beforeSend:function(){
                            KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Processing...");
                        },
                        success: function(result) {
                           setTimeout(function() {
                                KTUtil.btnRelease(btn);
                            }, 1000);
                            if (result['type'] == 'insert') {
                                $('#modal_reference').modal('toggle');
                                populateTable("{{ route('d_year') }}", "{{ route('d_get_year_by_page') }}");
                                toastr.success(result['message']);
                            } else {
                                Swal.fire("System Message", result['message'], "error");
                            }
                        },
                        error: function(result) {
                            setTimeout(function() {
                                KTUtil.btnRelease(btn);
                            }, 1000);
                            Swal.fire("System Message", result['message'], "error");
                        }
                    });  

                } else {

                    var msg = "";
                    $.each(validation.errors.all(),function(key,value){
                        msg += '<li>' + value + '</li>';
                    });
                    $("#alert").delay(400).fadeIn(600);
                    $("#modal_reference").animate({ scrollTop:0 },700);
                    $("#alert").addClass('fade show');
                    $("#alert_text").html(msg);
                    
                }
            });

        /*
        |--------------------------------------------------------------------------
        | FUNCTIONS
        |--------------------------------------------------------------------------
        */

            


        });
      
    </script>
@endpush