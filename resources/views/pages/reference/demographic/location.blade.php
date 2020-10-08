@extends('layouts.app')
@section('title','Demographic')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">System Location</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'Demographic')
    @section('panel-icon', 'flaticon-map-location')
    @include('pages.reference.component.panel')

@endsection

@push('scripts')
    <script src="{{ asset('dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('dist/assets/js/form_validate.js') }}"></script>
    <script src="{{ asset('dist/assets/js/controllers/reference.js') }}"></script>

    <script>
        $(document).ready(function() {

        /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */
            populateTable("{{ route('d_location') }}", "{{ route('d_get_location_by_page') }}");

            $("#alert").delay(0).hide(0);

            let data = { region : '',
                         province : '',
                         city : ''
                        };

            let rules = { region : 'required',
                          province : 'required',
                          city : 'required'
                        };

            var btn = KTUtil.getById("kt_btn_1");

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */
            $(document).on('click', '#chk_outside', function(){ switchChangeValue('chk_outside', 'Y', 'N') });
            $(document).on('click', '#chk_status', function(){ switchChangeValue('chk_status', 'ACTIVE', 'INACTIVE') });

            // Search button event
            $("#btn_search").on('click',function(){
                var str = $("#query_search").val();
                populateTableBySearch("{{ route('d_get_location_search') }}", str);
            });

            $(document).on('click', '#btn_add, a[data-role=edit]', function(){
                var id = $(this).data('id');
                var region = $('#'+id).children('td[data-target=region]').text();
                var province = $('#'+id).children('td[data-target=province]').text();
                var city = $('#'+id).children('td[data-target=city]').text();
                var outside = $('#'+id).children('td[data-target=outside]').find('span').text();
                var status = $('#'+id).children('td[data-target=status]').find('span').text();
                 $.ajax({
                    url: "{{ route('d_add_location') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    $('#location_id').val(id);
                    $('#region').val(region);
                    $('#province').val(province);
                    $('#city').val(city);
                    $('#chk_outside').prop('checked', outside == 'Yes' ? true : false);
                    $('#chk_status').prop('checked', status == 'ACTIVE' ? true : false);
                    $('#modal_reference').modal('toggle');
                });
            });

            // Close alert event
            $("#btn_alert_close").on('click',function(){
                $("#alert").delay(0).fadeOut(600);
            });

            // Insert data event
            $("#kt_btn_1").on('click', function(e){
                var id = $("#location_id").val();
                var outside = $("#chk_outside").val();
                var status = $("#chk_status").val();
                data.region = $("#region").val();
                data.province = $("#province").val();
                data.city = $("#city").val();

                let validation = new Validator(data, rules);

                if (validation.passes()) {
                    e.preventDefault();
                    $("#alert").delay(300).fadeOut(600);
                    $.ajax({
                        url: "{{ route('a_location') }}",
                        method: 'POST',
                        data: {
                            "location_id"   : id,
                            "region"        : data.region,
                            "province"      : data.province,
                            "city"          : data.city,
                            "outside"       : outside,
                            "status"        : status
                        },
                        beforeSend:function(){
                            KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Processing...");
                        },
                        success: function(result) {
                           setTimeout(function() {
                                KTUtil.btnRelease(btn);
                            }, 1000);
                            if (result['type'] == 'insert' || result['type'] == 'update') {
                                $('#modal_reference').modal('toggle');
                                populateTable("{{ route('d_location') }}", "{{ route('d_get_location_by_page') }}");
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