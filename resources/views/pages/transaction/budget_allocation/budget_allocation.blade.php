@extends('layouts.app')
@section('title','Budget Allocation')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Budget Allocation</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'Budget Allocation')
    @section('panel-icon', 'flaticon2-box')
    @include('pages.transaction.budget_allocation.modals')
    @include('pages.transaction.budget_allocation.panel')
@endsection

@push('scripts')
    <script src="{{ asset('dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('dist/assets/js/form_validate.js') }}"></script>
    <script src="{{ asset('dist/assets/js/controllers/reference.js') }}"></script>
    {{-- <script src="{{ asset('dist/assets/js/pages/crud/ktdatatable/base/html-table.js?v=7.1.1') }}"></script> --}}
    <script>
        $(document).ready(function() {
        $("#alert").hide();
        /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */

        getAllBudgetLineItem();
        getBudgetUtilization();

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */
            $("#btn_alert_close").on('click',function(){
                $("#alert").delay(0).fadeOut(600);
            });

            $("#btn_alert_close").on('click',function(){
                $("#pi_alert").delay(0).fadeOut(600);
            });

            $("#btn_save_budget").on('click',function(e){
                let msg ="";

                let bli_rules = {
                    budget_line_item_id :'required',
                    amount:'required',
                }

                let options = {
                    'required.budget_line_item_id' : 'Budget Line Item is Required',
                    'required.amount' : 'Budget Line Item Amount is Required',
                }

                let bli_data = {
                    budget_line_item_id : $("#bli_name option:selected").val(),
                    amount : $("#bli_amount").val() != 0 ? $("#bli_amount").val() : null,
                    unit_id : $("#bli_unit_id").val(),
                    year_id : $("#bli_year_id").val()
                }

                let validation = new Validator(bli_data, bli_rules, options);
                if (validation.passes()) {
                    var _url = "{{ route('db_bli_allocation_unit_save') }}";
                    var _data = bli_data;
                    $.ajax({
                        method:"GET",
                        url: _url,
                        data : _data,
                        beforeSend:function(){
                            $("#btn_save_budget").addClass('spinner spinner-white spinner-right');
                            $("#btn_save_budget").html('Processing');
                            $("#btn_save_budget").attr('disabled',true);
                        },
                        success:function(data){
                            if (data == 'success'){
                                getUnitYearlyBudgetPerBLI(bli_data.unit_id,bli_data.year_id,$("#bli_user_id").val());
                                toastr.success("Budget Allocation Sucessfully Save", "Good Job");
                            }else if (data == 'duplicate'){
                                toastr.error("Budget Line Item Already Exist", "Opps");
                            }else{
                                toastr.error("Something went wrong", "Opps");
                            }
                        },
                        complete:function(){
                            $("#btn_save_budget").removeClass('spinner spinner-white spinner-right');
                            $("#btn_save_budget").html('Save Budget');
                            $("#btn_save_budget").attr('disabled',false);
                        }
                    });
                }else{
                    $.each(validation.errors.all(),function(key,value){
                        msg += '<li>' + value + '</li>';
                    });
                    $("#alert").delay(400).fadeIn(600);
                    $("#modal_budget_program").animate({ scrollTop:0 },700);
                    $("#alert").addClass('fade show');
                    $("#alert_text").html(msg);

                    $("#btn_save_budget").removeClass('spinner spinner-white spinner-right');
                    $("#btn_save_budget").html('Save Budget');
                    $("#btn_save_budget").attr('disabled',false);
                }


            });

        /*
        |--------------------------------------------------------------------------
        | FUNCTIONS
        |--------------------------------------------------------------------------
        */



            function getBudgetUtilization(year = null){
                var d = new Date();
                var y =  year == null ? d.getFullYear() : year ;
                var _url = "{{ route('d_budget_allocation_utilization') }}";

                $.ajax({
                    method:"GET",
                    url:_url,
                    data:{ year: y},
                    beforeSend:function(){
                        KTApp.block('#kt_body', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Loading . . .'
                    });
                    },
                    success:function(data){
                        document.getElementById('table_unit_budget_allocation_content').innerHTML = data;
                    },
                    complete:function(){
                        $("#pagination_budget_allocation .pagination a").on('click',function(e){
                            e.preventDefault();
                            fetch_budget_allocation($(this).attr('href').split('page=')[1], $("#query_search").val())
                        });
                    }
                });
                KTApp.unblock('#kt_body');

            }

            function getAllBudgetLineItem(){
                var _url = "{{ route('d_bli_all') }}";
                $.ajax({
                    method:"GET",
                    url: _url,
                    success:function(data){
                        document.getElementById('bli_name').innerHTML = data;
                    }
                })
            }

            function fetch_budget_allocation(_page , _q){

                var _url = "{{ route('d_budget_allocation_utilization') }}";

                $.ajax({
                    method:"GET",
                    url:_url,
                    data:{ page: _page, q:_q },
                    beforeSend:function(){
                        KTApp.block('#kt_body', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Loading . . .'
                    });
                    },
                    success:function(data){
                        document.getElementById('table_unit_budget_allocation_content').innerHTML = data;
                    },
                    complete:function(){
                        $("#pagination_budget_allocation .pagination a").on('click',function(e){
                            e.preventDefault();
                            fetch_budget_allocation($(this).attr('href').split('page=')[1], $("#query_search").val())
                        });
                    }
                });
                KTApp.unblock('#kt_body');
            }




        });

    </script>
@endpush
