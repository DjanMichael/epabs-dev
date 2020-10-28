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
    <script src="{{ asset('dist/assets/js/pages/features/miscellaneous/sweetalert2.js') }}"></script>
    <script src="{{ asset('dist/assets/js/form_validate.js') }}"></script>
    <script src="{{ asset('dist/assets/js/controllers/reference.js') }}"></script>
    {{-- <script src="{{ asset('dist/assets/js/pages/crud/ktdatatable/base/html-table.js?v=7.1.1') }}"></script> --}}
    <script>
        var settings = JSON.parse(localStorage.getItem('GLOBAL_SETTINGS'));
        var current_page;

        $(document).ready(function() {
        $("#alert").hide();

        /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */
        getAllBudgetLineItem();
        getBudgetUtilization(settings.year);
        $("#btn_save_budget").attr('disabled',true);
        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */

            $("#bli_name").on('change',function(){
                var _bli = $("#bli_name option:selected").text();
                var _bli_id = $("#bli_name option:selected").val();
                var _year = settings.year;
                var _data = {
                    year : _year,
                    bli : _bli,
                    bli_id : _bli_id
                };
                var _url ="{{ route('get_budget_amount_by_bli_and_year') }}";
                $.ajax({
                    method:"GET",
                    url : _url,
                    data :_data,
                    success:function(data){
                        var nf = new Intl.NumberFormat();
                        $("#bli_balance_selected").val(data.calc.balance_year_bli_amount);
                        $("#txt_amount_bli").html( '₱ ' + nf.format(data.calc.balance_year_bli_amount));
                        if(data.calc.balance_year_bli_amount <= 0 ){
                            $("#btn_save_budget").attr('disabled',true);
                        }else{
                            $("#btn_save_budget").attr('disabled',false);
                        }
                    }

                });
            })

            $("#btn_alert_close").on('click',function(){
                $("#alert").delay(0).fadeOut(600);
            });

            $("#btn_alert_close").on('click',function(){
                $("#pi_alert").delay(0).fadeOut(600);
            });

            $("#btn_update_budget").on('click',function(){

                var projected_balance = $("#bli_balance_selected").val() - $("#bli_amount").val() ;
                var validate_balance_less_than_allocated = true;
                if( projected_balance == 0){
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Budget Line Balance will be Zero",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, Save it!"
                    }).then(function(result) {
                       if(result.value){
                            var edit_bli = $("#bli_name").val();
                            var edit_amount =  $("#bli_amount").val();

                            var unit_id = $("#edit_bli_unit_id").val();
                            var user_id = $("#edit_bli_user_id").val();
                            var year_id = $("#edit_bli_year_id").val();
                            var bli_id = $("#edit_bli_id").val();

                            var _data = {
                                    q_bli_id : edit_bli,
                                    q_bli_amount : edit_amount,
                                    r_unit_id : unit_id,
                                    r_user_id : user_id,
                                    r_year_id : year_id,
                                    r_bli_id  : bli_id
                                };

                            var _url = "{{ route('db_budget_update_allocation_per_user') }}";
                            $.ajax({
                                method:"GET",
                                url: _url,
                                data: _data,
                                beforeSend:function(){
                                    $("#btn_update_budget").addClass('spinner spinner-white spinner-right');
                                    $("#btn_update_budget").html('Processing');
                                    $("#btn_update_budget").attr('disabled',true);
                                },
                                success:function(data){
                                    if(data =="success"){
                                        toastr.success("Budget Allocation Sucessfully Save", "Good Job");
                                        getUnitYearlyBudgetPerBLI(unit_id,year_id,user_id,$("#bli_program_id").val());
                                        $("#bli_name").val("");
                                        $("#bli_amount").val("");
                                    }else{
                                        toastr.error("Something went wrong", "Opss");
                                    }
                                },
                                complete:function(){
                                    $("#btn_update_budget").removeClass('spinner spinner-white spinner-right');
                                    $("#btn_update_budget").html('Update Budget');
                                    $("#btn_update_budget").attr('disabled',true);

                                    $("#btn_save_budget").attr('disabled',false);
                                    $("#bli_balance_selected").val(0);
                                    $("#txt_amount_bli").html( '₱ 0.00');
                                }
                            });
                       }
                    });
                }else{

                    if(projected_balance < 0 ){
                        Swal.fire({
                            title: "Opps!",
                            text: "Not enough Budget Line Item",
                            icon: "error",
                            confirmButtonText: "Ok"
                        });
                        validate_balance_less_than_allocated = false
                    }

                    if(validate_balance_less_than_allocated){
                        var edit_bli = $("#bli_name").val();
                        var edit_amount =  $("#bli_amount").val();

                        var unit_id = $("#edit_bli_unit_id").val();
                        var user_id = $("#edit_bli_user_id").val();
                        var year_id = $("#edit_bli_year_id").val();
                        var bli_id = $("#edit_bli_id").val();

                        var _data = {
                                q_bli_id : edit_bli,
                                q_bli_amount : edit_amount,
                                r_unit_id : unit_id,
                                r_user_id : user_id,
                                r_year_id : year_id,
                                r_bli_id  : bli_id
                            };

                        var _url = "{{ route('db_budget_update_allocation_per_user') }}";
                        $.ajax({
                            method:"GET",
                            url: _url,
                            data: _data,
                            beforeSend:function(){
                                $("#btn_update_budget").addClass('spinner spinner-white spinner-right');
                                $("#btn_update_budget").html('Processing');
                                $("#btn_update_budget").attr('disabled',true);
                            },
                            success:function(data){
                                if(data =="success"){
                                    toastr.success("Budget Allocation Sucessfully Save", "Good Job");
                                    getUnitYearlyBudgetPerBLI(unit_id,year_id,user_id,$("#bli_program_id").val());
                                    $("#bli_name").val("");
                                    $("#bli_amount").val("");
                                }else{
                                    toastr.error("Something went wrong", "Opss");
                                }
                            },
                            complete:function(){
                                $("#btn_update_budget").removeClass('spinner spinner-white spinner-right');
                                $("#btn_update_budget").html('Update Budget');
                                $("#btn_update_budget").attr('disabled',true);

                                $("#btn_save_budget").attr('disabled',false);
                                $("#bli_balance_selected").val(0);
                                $("#txt_amount_bli").html( '₱ 0.00');
                            }
                        });
                    }

                }
            });

            $("#btn_save_budget").on('click',function(e){
                let msg ="";
                var projected_balance = $("#bli_balance_selected").val() - $("#bli_amount").val() ;
                var validate_balance_less_than_allocated = true;


                if( projected_balance == 0){
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Budget Line Balance will be Zero",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, Save it!"
                    }).then(function(result) {
                        if (result.value) {
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
                                year_id : $("#bli_year_id").val(),
                                program_id : $("#bli_program_id").val()
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
                                            getUnitYearlyBudgetPerBLI(bli_data.unit_id,bli_data.year_id,$("#bli_user_id").val(),$("#bli_program_id").val());
                                            fetch_budget_allocation(current_page, $("#query_search").val(),settings.year,$("#query_sort_by").val())
                                            $("#bli_name").val("");
                                            $("#bli_amount").val("");
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
                        }
                    });
                }else{

                    if(projected_balance < 0 ){
                        Swal.fire({
                            title: "Opps!",
                            text: "Not enough Budget Line Item",
                            icon: "error",
                            confirmButtonText: "Ok"
                        });
                        validate_balance_less_than_allocated = false
                    }

                    if(validate_balance_less_than_allocated){
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
                            year_id : $("#bli_year_id").val(),
                            program_id : $("#bli_program_id").val()
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
                                        getUnitYearlyBudgetPerBLI(bli_data.unit_id,bli_data.year_id,$("#bli_user_id").val(),$("#bli_program_id").val());
                                        fetch_budget_allocation(current_page, $("#query_search").val(),settings.year,$("#query_sort_by").val())
                                        $("#bli_name").val("");
                                        $("#bli_amount").val("");
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
                    }
                }
            });

 function deleteAllAllocation(unit_id1,year_id1){
            Swal.fire({
                title: "Are you sure, You want to delete all allocation?",
                text: "You won\'t be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!"
            }).then(function(result) {
                if (result.value) {
                    var _url = "{{ route('db_budget_delete_allocation_per_user') }}";
                    var _data = {
                        unit_id : unit_id1,
                        year_id : year_id1
                    };
                    $.ajax({
                        method:"GET",
                        url : _url,
                        data: _data,
                        success:function(data){
                            if(data =="success"){
                                Swal.fire(
                                    "Deleted!",
                                    "Budget line Item Allocation has been deleted.",
                                    "success"
                                )
                                fetch_budget_allocation(current_page, $("#query_search").val(),settings.year,$("#query_sort_by").val())
                            }else{
                                Swal.fire(
                                    "Opss!",
                                    "Something went wrong",
                                    "error"
                                )
                            }
                        },
                    })

                    // result.dismiss can be "cancel", "overlay",
                    // "close", and "timer"
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Nothing Changes",
                        "error"
                    )
                }
            });

        }

        /*
        |--------------------------------------------------------------------------
        | FUNCTIONS
        |--------------------------------------------------------------------------
        */



            function getBudgetUtilization(year = null){
                var d = new Date();
                var y =  year == null ? d.getFullYear() : year ;
                var _url = "{{ route('d_budget_allocation_utilization') }}";
                var _q =  $("#query_search").val();
                $.ajax({
                    method:"GET",
                    url:_url,
                    data:{ year: y , q:_q},
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
                            fetch_budget_allocation($(this).attr('href').split('page=')[1], $("#query_search").val(),settings.year,$("#query_sort_by").val())
                        });
                    }
                });
                KTApp.unblock('#kt_body');

            }

            function getAllBudgetLineItem(){
                var _url = "{{ route('d_bli_all') }}";
                $.ajax({
                    method:"GET",
                    data: {year : settings.year },
                    url: _url,
                    success:function(data){
                        document.getElementById('bli_name').innerHTML = data;
                    }
                })
            }

        });

        function fetch_budget_allocation(_page , _q,year = null,sortby){
            var d = new Date();
            var y =  year == null ? d.getFullYear() : year ;
            var _url = "{{ route('d_budget_allocation_utilization') }}";
            current_page = _page;
            var _data = {
                page: _page,
                q:_q,
                year:y,
                sort:sortby
            };
            $.ajax({
                method:"GET",
                url:_url,
                data: _data,
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
                        fetch_budget_allocation($(this).attr('href').split('page=')[1], $("#query_search").val(),settings.year,$("#query_sort_by").val())
                    });
                }
            });
            KTApp.unblock('#kt_body');
        }

    </script>
@endpush
