@extends('layouts.app')
@section('title','Budget Item')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Budget Line Item</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'Budget Item')
    @section('panel-icon', 'flaticon-list')
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
            populateTable("{{ route('d_budget_line_item') }}", "{{ route('d_get_budget_line_item_by_page') }}");

            $("#alert").delay(0).hide(0);

            let data = { budget_item :'' };

            let rules = { budget_item :'required' };

            var btn = KTUtil.getById("kt_btn_1");

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */
            $(document).on('click', '#chk_status', function(){ switchChangeValue('chk_status', 'ACTIVE', 'INACTIVE') });

            // Search button event
            $("#btn_search").on('click',function(){
                var str = $("#query_search").val();
                populateTableBySearch("{{ route('d_get_budget_line_item_search') }}", str);
            });

            $(document).on('click', '#btn_add, a[data-role=edit]', function(){
                var id = $(this).data('id');
                var budget_item = $('#'+id).children('td[data-target=budget_item]').text();
                var status = $('#'+id).find('span').text();
                $.ajax({
                    url: "{{ route('d_add_budget_line_item') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    $('#budget_item_id').val(id);
                    $('#budget_item').val(budget_item);
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
                var id = $("#budget_item_id").val();
                var status = $("#chk_status").val();
                data.budget_item = $("#budget_item").val();

                let validation = new Validator(data, rules);
                if (validation.passes()) {
                    e.preventDefault();
                    $("#alert").delay(300).fadeOut(600);
                    $.ajax({
                        url: "{{ route('a_budget_line_item') }}",
                        method: 'POST',
                        data: {
                            "id"            : id,
                            "budget_item"   : data.budget_item,
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
                                populateTable("{{ route('d_budget_line_item') }}", "{{ route('d_get_budget_line_item_by_page') }}");
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
