@extends('layouts.app')
@section('title','Program')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">System Reference</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Unit Program</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'Program')
    @section('panel-icon', 'fas fa-clipboard-list')
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
            populateTable("{{ route('d_program') }}", "{{ route('d_get_program_by_page') }}",
                                'table_populate', 'table_content', 'table_pagination');

            $("#alert").delay(0).hide(0);

            let data = { program :'' };

            let rules = { program :'required' };

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
                populateTableBySearch("{{ route('d_get_program_search') }}", str, 'table_populate', 'table_content', 'table_pagination');
                setTimeout(function() { KTUtil.btnRelease(btn_search); }, 700);
            });

            $(document).on('click', '#btn_add, a[data-role=edit]', function(){
                var id = $(this).data('id');
                var program = $('#'+id).children('td[data-target=program]').text();
                var status = $('#'+id).children('td[data-target=status]').find('span').text();
                $.ajax({
                    url: "{{ route('d_add_program') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    $('#program_id').val(id);
                    $('#program').val(program);
                    $('.div_status').css("display", ((id == null) ? 'none' : ''));
                    $('#chk_status').prop('checked', status == 'ACTIVE' ? false : true).trigger('click');
                    $('#modal_reference').modal('toggle');
                });
            });

            // Close alert event
            $("#btn_alert_close").on('click',function(){
                $("#alert").delay(0).fadeOut(600);
            });

            // Insert data event
            $("#kt_btn_1").on('click', function(e){
                var id = $("#program_id").val();
                var status = (id == "") ? 'ACTIVE' : $("#chk_status").val();
                data.program = $("#program").val();
                let validation = new Validator(data, rules);
                if (validation.passes()) {
                    e.preventDefault();
                    $("#alert").delay(300).fadeOut(600);
                    $.ajax({
                        url: "{{ route('a_program') }}",
                        method: 'POST',
                        data: {
                            "id"            : id,
                            "program_name"  : data.program,
                            "status"        : status
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
                                populateTable("{{ route('d_program') }}", "{{ route('d_get_program_by_page') }}",
                                                    'table_populate', 'table_content', 'table_pagination');
                                toastr.success(result['message']);
                            }
                            else if (result['type'] == 'update') {
                                $('#modal_reference').modal('toggle');
                                $('#'+id).children('td[data-target=program]').html(data.program);
                                $('#'+id).children('td[data-target=status]').html('<span class="label label-inline label-light-'+ (status == "ACTIVE" ? "success" : "danger") +' font-weight-bold">'+status+'</span>');
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
