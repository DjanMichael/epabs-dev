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

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */
            $("#btn_alert_close").on('click',function(){
                $("#alert").delay(0).fadeOut(600);
            });


            $("#btn_add_budget").on('click',function(e){
                e.preventDefault();
                $("#modal_budget_program").modal({
                    show:true,
                    backdrop:'static',
                    focus: true,
                    keyboard:false
                });
            });


        /*
        |--------------------------------------------------------------------------
        | FUNCTIONS
        |--------------------------------------------------------------------------
        */

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



        });

    </script>
@endpush
