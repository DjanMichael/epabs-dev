@extends('layouts.app')
@section('title','User')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Manage User Accounts</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'User')
    @section('panel-icon', 'fas fa-users')
    @include('pages.reference.component.panel')
@endsection

@push('scripts')
    <script src="{{ asset('dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('dist/assets/js/controllers/reference.js') }}"></script>

    <script>

        $(document).ready(function() {
            /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */

            populateTable("{{ route('d_user') }}", "{{ route('d_get_user_by_page') }}",
                                'table_populate', 'table_content', 'table_pagination');

            $("#alert").delay(0).hide(0);
            $('#btn_add').hide();

            var btn_search = KTUtil.getById("btn_search");

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */

            // Change user account status event
            $(document).on('click', 'input[type="checkbox"]', function(){
                switchChangeValue($(this).attr('id'), 'ACTIVE', 'INACTIVE')
                var id = $(this).data('id');
                var status = $(this).val();
                $.ajax({
                    url: "{{ route('u_account_status') }}",
                    method: 'POST',
                    data: { id : id, status : status },
                    beforeSend:function(){
                        KTApp.block('.table', {
                            overlayColor: '#000000',
                            state: 'primary',
                            message: 'Loading. . .'
                        });
                    },
                    success: function(result) {
                        KTApp.unblock('.table');
                        if (result['type'] == 'update') {
                            toastr.success(result['message']);
                        } else {
                            Swal.fire("System Message", result['message'], "error");
                        }
                    },
                    error: function(result) {
                        KTApp.unblock('.table');
                        Swal.fire("System Message", result['message'], "error");
                    }
                });
            });

            // Search button event
            $("#btn_search").on('click',function(){
                var search_value = $("#query_search").val();
                KTUtil.btnWait(btn_search, "spinner spinner-right spinner-white pr-15", "Searching...");
                populateTableBySearch("{{ route('d_get_user_search') }}", search_value, 'table_populate', 'table_content', 'table_pagination');
                setTimeout(function() { KTUtil.btnRelease(btn_search); }, 700);
            });

            // Reset account password event
            $(document).on('click', 'a[data-role=reset]', function(){
                var id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to reset the password!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    reverseButtons: true
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: "{{ route('u_reset_password') }}",
                            method: 'POST',
                            data: { id : id },
                            beforeSend:function() {
                                KTApp.block('.table', {
                                    overlayColor: '#000000',
                                    state: 'primary',
                                    message: 'Loading. . .'
                                });
                            },
                            success: function(result) {
                                KTApp.unblock('.table');
                                if (result['type'] == 'update') {
                                    toastr.success(result['message']);
                                }
                                else {
                                    Swal.fire("System Message", result['message'], "error");
                                }
                            },
                            error: function(result) {
                                KTApp.unblock('.table');
                                Swal.fire("System Message", result['message'], "error");
                            }
                        });

                    }
                });

            });

        /*
        |--------------------------------------------------------------------------
        | FUNCTIONS
        |--------------------------------------------------------------------------
        */

        });

    </script>
@endpush
