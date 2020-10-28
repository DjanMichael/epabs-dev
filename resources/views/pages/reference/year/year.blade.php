@extends('layouts.app')
@section('title','Year')
@push('styles')
    {{-- <script src="{{ asset('test/css/footable.core.standalone.css') }}"></script> --}}
    {{-- <script src="{{ asset('test/css/reference.js') }}"></script> --}}
@endpush
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
    @section('panel-icon', 'flaticon2-calendar-1')
    @include('pages.reference.component.panel')

    <table class="table" data-show-toggle="false" data-expand-first="true">
        <thead>
            <tr>
                <th data-visible="false">ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th data-breakpoints="xs">Job Title</th>
                <th data-breakpoints="xs sm">Started On</th>
                <th data-breakpoints="all" data-title="DOB">Date of Birth</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Dennise</td>
                <td>Fuhrman</td>
                <td>High School History Teacher</td>
                <td>November 8th 2011</td>
                <td>July 25th 1960</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Elodia</td>
                <td>Weisz</td>
                <td>Wallpaperer Helper</td>
                <td>October 15th 2010</td>
                <td>March 30th 1982</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Raeann</td>
                <td>Haner</td>
                <td>Internal Medicine Nurse Practitioner</td>
                <td>November 28th 2013</td>
                <td>February 26th 1966</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Junie</td>
                <td>Landa</td>
                <td>Offbearer</td>
                <td>October 31st 2010</td>
                <td>March 29th 1966</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Solomon</td>
                <td>Bittinger</td>
                <td>Roller Skater</td>
                <td>December 29th 2011</td>
                <td>September 22nd 1964</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Bar</td>
                <td>Lewis</td>
                <td>Clown</td>
                <td>November 12th 2012</td>
                <td>August 4th 1991</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Usha</td>
                <td>Leak</td>
                <td>Ships Electronic Warfare Officer</td>
                <td>August 14th 2012</td>
                <td>November 20th 1979</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Lorriane</td>
                <td>Cooke</td>
                <td>Technical Services Librarian</td>
                <td>September 21st 2010</td>
                <td>April 7th 1969</td>
            </tr>
        </tbody>
    </table>
@endsection

@push('scripts')
    <script src="{{ asset('test/js/footable.core.js') }}"></script>
    <script src="{{ asset('dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('dist/assets/js/form_validate.js') }}"></script>
    <script src="{{ asset('dist/assets/js/controllers/reference.js') }}"></script>

    {{-- <script src="{{ asset('test/js/reference.js') }}"></script> --}}

    {{-- <script src="{{ asset('dist/assets/plugins/custom/datatables/datatables.bundle.js?v=7.1.2') }}"></script> --}}
    {{-- <script src="{{ asset('dist/assets/js/pages/crud/datatables/basic/basic.js?v=7.1.2') }}"></script> --}}

    <script>
        // jQuery(function($){

        // });
        $(document).ready(function() {

            // $('#kt_datatable').DataTable( {
            //     paging: false,
            //     searching: false,
            //     info: false,
            //     responsive: true
            // } );

           /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */
            populateTable("{{ route('d_year') }}", "{{ route('d_get_year_by_page') }}", 'table_populate', 'table_content', 'table_pagination');
            $("#alert").delay(0).hide(0);

            let data = { year :'' };

            let rules = { year :'required' };

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
                populateTableBySearch("{{ route('d_get_year_search') }}", str, 'table_populate', 'table_content', 'table_pagination');
                setTimeout(function() { KTUtil.btnRelease(btn_search); }, 700);
            });

            $(document).on('click', '#btn_add, a[data-role=edit]', function(){
                var id = $(this).data('id');
                var year = $('#'+id).children('td[data-target=year]').text();
                var status = $('#'+id).children('td[data-target=status]').find('span').text();
                $.ajax({
                    url: "{{ route('d_add_year') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    $('#year_id').val(id);
                    $('#year').val(year);
                    $('.div_status').css("display", (id == null) ? 'none' : '');
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
                var id = $("#year_id").val();
                var status = (id == "") ? 'ACTIVE' : $("#chk_status").val();
                data.year = $("#year").val();

                let validation = new Validator(data, rules);
                if (validation.passes()) {
                    e.preventDefault();
                    $("#alert").delay(300).fadeOut(600);
                    $.ajax({
                        url: "{{ route('a_year') }}",
                        method: 'POST',
                        data: {
                            "year_id"   : id,
                            "year"      : data.year,
                            "status"    : status
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
                                populateTable("{{ route('d_year') }}", "{{ route('d_get_year_by_page') }}", 'table_populate', 'table_content', 'table_pagination');
                                toastr.success(result['message']);
                            }
                            else if (result['type'] == 'update') {
                                $('#modal_reference').modal('toggle');
                                $('#'+id).children('td[data-target=year]').html(data.year);
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
