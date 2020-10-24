@extends('layouts.app')
@section('title','Unit Program')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Assign Coordinator</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'Program Coordinators')
    @section('panel-icon', 'flaticon-users')
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
            populateTable("{{ route('d_unit_program') }}", "{{ route('d_get_unit_program_by_page') }}",
                                'table_populate', 'table_content', 'table_pagination');

            $("#alert").delay(0).hide(0);

            let data = { program_id :'', unit_id :'', coordinator_id :'' };

            let rules = { program_id :'required', unit_id :'required', coordinator_id :'required' };

            var btn = KTUtil.getById("kt_btn_1");
            var btn_search = KTUtil.getById("btn_search");

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */
            $(document).on('click', '#chk_status', function(){ switchChangeValue('chk_status', 'ACTIVE', 'INACTIVE') });

            // Search button event
            $("#btn_search").on('click',function(){
                var str = $("#query_search").val();
                KTUtil.btnWait(btn_search, "spinner spinner-right spinner-white pr-15", "Searching...");
                populateTableBySearch("{{ route('d_get_unit_program_search') }}", str, 'table_populate', 'table_content', 'table_pagination');
                setTimeout(function() { KTUtil.btnRelease(btn_search); }, 700);
            });

            $(document).on('click', '#btn_add, a[data-role=edit]', function(){
                var id = $(this).data('id');
                var program = $('#'+id).children('td[data-target=program]').text();
                var unit = $('#'+id).children('td[data-target=unit]').text();
                var coordinator = $('#'+id).children('td[data-target=coordinator]').text();
                $.ajax({
                    url: "{{ route('d_add_unit_program') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    $('#program_unit_id').val(id);
                    $("#program option:contains(" + program +")").attr("selected", true);
                    $("#unit option:contains(" + unit +")").attr("selected", true);
                    $("#coordinator option:contains(" + coordinator +")").attr("selected", true);
                    $('#modal_reference').modal('toggle');
                });
            });

            // Close alert event
            $("#btn_alert_close").on('click',function(){
                $("#alert").delay(0).fadeOut(600);
            });

            // Insert data event
            $("#kt_btn_1").on('click', function(e){
                var id = $("#program_unit_id").val();
                var program = $("#program option:selected").text();
                var unit = $("#unit option:selected").text();
                var coordinator = $("#coordinator option:selected").text();
                data.program_id = $("#program").val();
                data.unit_id = $("#unit").val();
                data.coordinator_id = $("#coordinator").val();

                let validation = new Validator(data, rules);
                if (validation.passes()) {
                    e.preventDefault();
                    $("#alert").delay(300).fadeOut(600);
                    $.ajax({
                        url: "{{ route('a_unit_program') }}",
                        method: 'POST',
                        data: {
                            "id"            : id,
                            "program_id"    : data.program_id,
                            "program"       : program,
                            "unit_id"       : data.unit_id,
                            "unit"          : unit,
                            "user_id"       : data.coordinator_id,
                            "user"          : coordinator
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
                                populateTable("{{ route('d_unit_program') }}", "{{ route('d_get_unit_program_by_page') }}",
                                                    'table_populate', 'table_content', 'table_pagination');
                                toastr.success(result['message']);
                            }
                            else if (result['type'] == 'update') {
                                $('#modal_reference').modal('toggle');
                                $('#'+id).children('td[data-target=program]').html($("#program option:selected").text());
                                $('#'+id).children('td[data-target=unit]').html($("#unit option:selected").text());
                                $('#'+id).children('td[data-target=coordinator]').html($("#coordinator option:selected").text());
                                toastr.success(result['message']);
                            }
                            else {
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
