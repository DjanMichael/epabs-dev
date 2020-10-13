@extends('layouts.app')
@section('title','Medicines')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Procurement Medicines</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'Procurement Medicines')
    @section('panel-icon', 'flaticon2-box')
    @include('pages.reference.component.panel')
@endsection

@push('scripts')
    <script src="{{ asset('dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('dist/assets/js/form_validate.js') }}"></script>
    <script src="{{ asset('dist/assets/js/controllers/reference.js') }}"></script>
    {{-- <script src="{{ asset('dist/assets/js/pages/crud/ktdatatable/base/html-table.js?v=7.1.1') }}"></script> --}}
    <script>
        $(document).ready(function() {

        /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */
            populateTable("{{ route('d_get_procurement_medicine') }}", "{{ route('d_get_procurement_medicine_by_page') }}",
                                'table_populate', 'table_content', 'table_pagination');

            $("#alert").delay(0).hide(0);
            $("#alert_inner").delay(0).hide(0);

            let data = {
                description :'',
                unit:'',
                classification: '',
                price: '',
                effective_date: ''
            };

            let rules = {
                description :'required',
                unit:'required',
                classification: 'required',
                price: 'required',
                effective_date: 'required'
            };

            var btn = KTUtil.getById("kt_btn_1");
            var btn2 = KTUtil.getById("kt_btn_2");
            var btn_search = KTUtil.getById("btn_search");

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */

            $(document).on('click', '#chk_status', function(){ switchChangeValue('chk_status', 'ACTIVE', 'INACTIVE') });
            $(document).on('click', '#chk_fix_price', function(){ switchChangeValue('chk_fix_price', 'Y', 'N') });

            $(document).on('keypress', '.number', function(event){
                if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });

            $("#btn_search").on('click',function(){
                var str = $("#query_search").val();
                populateTableBySearch("{{ route('d_get_procurement_medicine_search') }}", str, 'table_populate', 'table_content', 'table_pagination');
            });

            $(document).on('click', 'a[data-role=price]', function(){
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('d_get_procurement_medicine_price') }}",
                    data : { "id" : id },
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('second_modal_content').innerHTML= data;
                    $('#secondary_modal_reference').modal('toggle');
                });
            });

            // Edit medicine event
            $(document).on('click', '#btn_add, a[data-role=edit]', function(){
                var id = $(this).data('id');
                var description = $('#'+id).children('td[data-target=description]').text();
                var unit_name = $('#'+id).children('td[data-target=unit_name]').text();
                var classification = $('#'+id).children('td[data-target=classification]').text();
                var price = $('#'+id).children('td[data-target=price]').text();
                var effective_date = $('#'+id).children('td[data-target=effective_date]').text();
                var fix_price = $('#'+id).children('td[data-target=fix_price]').find('span').text();
                var status = $('#'+id).children('td[data-target=status]').find('span').text();
                $.ajax({
                    url: "{{ route('d_add_procurement_medicine') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    if (id) {
                        $('#procurement_medicine_id').val(id);
                        $('#item_description').val(description);
                        $("#item_unit option:contains(" + unit_name +")").attr("selected", true);
                        $("#item_classification option:contains(" + classification +")").attr("selected", true);
                        $('#item_price').val(price);
                        $('#effective_date').val(effective_date);
                        $('#chk_fix_price').prop('checked', fix_price == 'Yes' ? false : true).trigger('click');
                        $('#chk_status').prop('checked', status == 'ACTIVE' ? false : true).trigger('click');
                    }
                    else {
                        $('#chk_fix_price').prop('checked', true).trigger('click');
                        $('#chk_status').prop('checked', true).trigger('click');
                    }
                    $('#modal_reference').modal('toggle');
                });
            });

            $("#btn_alert_close").on('click',function(){
                $("#alert").delay(0).fadeOut(600);
            });

            $("#kt_btn_1").on('click', function(e){
                var id = $("#procurement_medicine_id").val();
                var status = $("#chk_status").val();
                var fix_price = $("#chk_fix_price").val();
                data.description = $("#item_description").val();
                data.unit = $("#item_unit").val();
                data.classification = $("#item_classification").val();
                data.price = $("#item_price").val();
                data.effective_date = $("#effective_date").val();

                let validation = new Validator(data, rules);
                if (validation.passes()) {
                    e.preventDefault();
                    $("#alert").delay(300).fadeOut(600);
                    $.ajax({
                        url: "{{ route('a_procurement_medicine') }}",
                        method: 'POST',
                        data: {
                            "id": id,
                            "description": data.description,
                            "unit_id": data.unit,
                            "classification_id": data.classification,
                            "price": data.price,
                            "effective_date": data.effective_date,
                            "fix_price": fix_price,
                            "status": status
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
                                populateTable("{{ route('d_get_procurement_medicine') }}", "{{ route('d_get_procurement_medicine_by_page') }}",
                                                'table_populate', 'table_content', 'table_pagination');
                                toastr.success(result['message']);
                            }
                            else if (result['type'] == 'update') {
                                fix_price = fix_price == 'Y' ? 'Yes' : 'No';
                                $('#modal_reference').modal('toggle');
                                $('#'+id).children('td[data-target=description]').html(data.description);
                                $('#'+id).children('td[data-target=unit_name]').html($("#item_unit option:selected").text());
                                $('#'+id).children('td[data-target=classification]').html($("#item_classification option:selected").text());
                                $('#'+id).children('td[data-target=fix_price]').html((fix_price == "Yes" ? '<span>Yes</span>' : '<a data-role="price" data-id="'+id+'" class="btn btn-light-primary"><i class="flaticon-price-tag"></i></a>'));
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
        | PRICE
        |--------------------------------------------------------------------------
        */

            // Show price form event (Add or Update)
            $(document).on('click', '#btn_add_price, a[data-role=edit-price]', function(){
                var id = $(this).data('id');
                var price = $('#'+id).children('td[data-target=price]').text();
                var effective_date = $('#'+id).children('td[data-target=effective_date]').text();
                $.ajax({
                    url: "{{ route('d_change_price_procurement_medicine') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('inner_modal_content').innerHTML= data;
                    $('#procurement_medicine_price_id').val(id);
                    $('#change_item_price').val(price);
                    $('#change_effective_date').val(effective_date);
                    $('#inner_modal_reference').modal('toggle');
                });
            });

            $("#kt_btn_2").on('click', function(e){
                var id = $("#procurement_medicine_price_id").val();
                var item_id = $("#procurement_medicine_id").val();
                var price = $("#change_item_price").val();
                var effective_date = $("#change_effective_date").val();

                e.preventDefault();
                $("#alert_inner").delay(300).fadeOut(600);
                $.ajax({
                    url: "{{ route('a_procurement_medicine_price') }}",
                    method: 'POST',
                    data: {
                        "id": id,
                        "procurement_item_id": item_id,
                        "price": price,
                        "effective_date": effective_date
                    },
                    beforeSend:function(){
                        KTUtil.btnWait(btn2, "spinner spinner-right spinner-white pr-15", "Processing...");
                    },
                    success: function(result) {
                        setTimeout(function() {
                            KTUtil.btnRelease(btn2);
                        }, 1000);
                        if (result['type'] == 'insert') {
                            $('#inner_modal_reference').modal('toggle');
                            // populateTable("{{ route('d_get_procurement_medicine') }}", "{{ route('d_get_procurement_medicine_by_page') }}");
                            toastr.success(result['message']);
                        }
                        else if (result['type'] == 'update') {
                            $('#inner_modal_reference').modal('toggle');
                            $('#'+id).children('td[data-target=price]').html(price);
                            $('#'+id).children('td[data-target=effective_date]').html(effective_date);
                            toastr.success(result['message']);
                        }
                        else {
                            Swal.fire("System Message", result['message'], "error");
                        }
                    },
                    error: function(result) {
                        setTimeout(function() {
                            KTUtil.btnRelease(btn2);
                        }, 1000);
                        Swal.fire("System Message", result['message'], "error");
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
