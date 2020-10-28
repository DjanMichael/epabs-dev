@extends('layouts.app')
@section('title','Output Function')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Output Function</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'Output Function')
    @section('panel-icon', 'flaticon2-files-and-folders')
    @include('pages.reference.component.panel')
@endsection

@push('scripts')
    <script src="{{ asset('dist/assets/js/form_validate.js') }}"></script>
    <script src="{{ asset('dist/assets/js/controllers/reference.js') }}"></script>

    <script>
        $(document).ready(function() {

            /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */
            populateTable("{{ route('d_output_function') }}", "{{ route('d_get_output_function_by_page') }}",
                                'table_populate', 'table_content', 'table_pagination');

            $("#alert").delay(0).hide(0);

            let data = { function_deliverables_id :'', description :'', program_id : '' };

            let rules = { function_deliverables_id :'required', description :'required', program_id :'required' };

            var btn = KTUtil.getById("kt_btn_1");
            var btn_search = KTUtil.getById("btn_search");

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */

            // Search button event
            $("#btn_search").on('click',function(){
                var search_value = $("#query_search").val();
                KTUtil.btnWait(btn_search, "spinner spinner-right spinner-white pr-15", "Searching...");
                populateTableBySearch("{{ route('d_get_output_function_search') }}", search_value, 'table_populate', 'table_content', 'table_pagination');
                setTimeout(function() { KTUtil.btnRelease(btn_search); }, 700);
            });

            $(document).on('click', '#btn_add, a[data-role=edit]', function(){
                var id = $(this).data('id');
                var function_class = $('#'+id).children('td[data-target=function_class]').text();
                var description = $('#'+id).children('td[data-target=description]').text();
                var program = $('#'+id).children('td[data-target=program]').text();
                $.ajax({
                    url: "{{ route('d_add_output_function') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    if (id) {
                        $('#output_function_id').val(id);
                        $("#function_deliverables option:contains(" + function_class +")").attr("selected", true);
                        $('#description').val(description);
                        $("#program option:contains(" + program +")").attr("selected", true);
                    }
                    $('#modal_reference').modal('toggle');
                });
            });

            // Close alert event
            $("#btn_alert_close").on('click',function(){
                $("#alert").delay(0).fadeOut(600);
            });

            // Insert data event
            $("#kt_btn_1").on('click', function(e){
                var id = $("#output_function_id").val();
                var function_deliverables = $("#function_deliverables option:selected").text();
                var program = $("#program option:selected").text();
                data.function_deliverables_id = $("#function_deliverables").val();
                data.description = $("#description").val();
                data.program_id = $("#program").val();

                let validation = new Validator(data, rules);
                if (validation.passes()) {
                    e.preventDefault();
                    $("#alert").delay(300).fadeOut(600);
                    $.ajax({
                        url: "{{ route('a_output_function') }}",
                        method: 'POST',
                        data: {
                            id                       : id,
                            function_deliverables_id : data.function_deliverables_id,
                            function_deliverables    : function_deliverables,
                            description              : data.description,
                            program_id               : data.program_id,
                            program                  : program
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
                                populateTable("{{ route('d_output_function') }}", "{{ route('d_get_output_function_by_page') }}",
                                                    'table_populate', 'table_content', 'table_pagination');
                                toastr.success(result['message']);
                            }
                            else if (result['type'] == 'update') {
                                $('#modal_reference').modal('toggle');
                                $('#'+id).children('td[data-target=function_class]').html($("#function_deliverables option:selected").text());
                                $('#'+id).children('td[data-target=description]').html(data.description);
                                $('#'+id).children('td[data-target=program]').html($("#program option:selected").text());
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
