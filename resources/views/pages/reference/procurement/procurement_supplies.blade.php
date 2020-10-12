@extends('layouts.app')
@section('title','Supplies')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Procurement Supplies</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'Procurement Supplies')
    @section('panel-icon', 'flaticon2-box-1')
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
            populateTable("{{ route('d_get_procurement_supplies') }}", "{{ route('d_get_procurement_supplies_by_page') }}");

            $("#alert").delay(0).hide(0);

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

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */
            $(document).on('click', '#chk_status', function(){ switchChangeValue('chk_status', 'ACTIVE', 'INACTIVE') });
            $(document).on('click', '#chk_fix_price', function(){ switchChangeValue('chk_fix_price', 'Y', 'N') });

            $("#btn_search").on('click',function(){
                var str = $("#query_search").val();
                populateTableBySearch("{{ route('d_get_procurement_supplies_search') }}", str);
            });

            $(document).on('click', 'a[data-role=price]', function(){
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('d_get_procurement_supplies_price') }}",
                    data : { "id" : id },
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    $('#modal_reference').modal('toggle');
                });
            });

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
                    url: "{{ route('d_add_procurement_supplies') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    if (id) {
                        $('#procurement_supplies_id').val(id);
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

            // Close alert event
            $("#btn_alert_close").on('click',function(){
                $("#alert").delay(0).fadeOut(600);
            });

            $("#kt_btn_1").on('click', function(e){
                var id = $("#procurement_supplies_id").val();
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
                        url: "{{ route('a_procurement_supplies') }}",
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
                            if (result['type'] == 'insert' || result['type'] == 'update') {
                                $('#modal_reference').modal('toggle');
                                populateTable("{{ route('d_get_procurement_supplies') }}", "{{ route('d_get_procurement_supplies_by_page') }}");
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


 $('#submitid').on('click', function() {

    var vid = $( "#vid" ).val();
       //var id=$(this).data('id');

        $.ajax({
              url: '/inquiryVendor',
              type: "Get",
              dataType: 'json',//this will expect a json response
              data:{id:$("#vid").val()},
               success: function(response){
                    $("#inputfieldid1").val(response.id);

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
