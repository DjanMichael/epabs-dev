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
    {{-- <script src="{{ asset('dist/assets/js/pages/crud/ktdatatable/base/html-table.js?v=7.1.1') }}"></script> --}}
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
                fix_price:''
            };

            let rules = {
                description :'required',
                unit:'required',
                classification: 'required',
                price: 'required',
                fix_price:'required'
            };

            var btn = KTUtil.getById("kt_btn_1");

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */

            $(document).on('click', '#chk_fix_price', function(){ switchChangeValue('chk_fix_price') });

            $("#btn_search").on('click',function(){
                var str = $("#query_search").val();
                populateTableBySearch("{{ route('d_get_procurement_supplies_search') }}", str);
            });

            // $("#btn_add").on('click',function(){
            //     showModalContent("{{ route('d_add_procurement_supplies') }}");
            // });

            // function showModalContent(_url){
            //     $.ajax({
            //         url: _url,
            //         method: 'GET',
            //     }).done(function(data) {
            //         document.getElementById('dynamic_content').innerHTML= data;
            //         $('#modal_reference').modal('toggle');
            //     });
            // }

            
            $(document).on('click', 'a[data-role=price]', function(){
                var id = $(this).data('id');
                alert(id);
                // var course = $('#'+id).children('td[data-target=course]').text();
                // $('#edit-course').val(course);
                // $('#course-id').val(id);
                // $('#edit-modal').modal('toggle');
            });
            
            $("#btn_add").on('click',function(){
                $.ajax({
                    url: "{{ route('d_add_procurement_supplies') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    $('#modal_reference').modal('toggle');
                });
            });

            $("#kt_btn_1").on('click', function(e){
                data.description = $("#item_description").val();
                data.unit = $("#item_unit").val();
                data.classification = $("#item_classification").val();
                data.price = $("#item_price").val();
                data.fix_price = $("#chk_fix_price").val();

                let validation = new Validator(data, rules);
                if (validation.passes()) {
                    e.preventDefault();
                    $("#alert").delay(300).fadeOut(600);
                    $.ajax({
                        url: "{{ route('a_procurement_supplies') }}",
                        method: 'POST',
                        data: {
                            "description": data.description,
                            "unit_id": data.unit,
                            "classification_id": data.classification,
                            "price": data.price,
                            "fix_price": data.fix_price
                        },
                        beforeSend:function(){
                            KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Processing...");
                        },
                        success: function(result) {
                           setTimeout(function() {
                                KTUtil.btnRelease(btn);
                            }, 1000);
                            $('#modal_reference').modal('toggle');
                            populateTable("{{ route('d_get_procurement_supplies') }}", "{{ route('d_get_procurement_supplies_by_page') }}");
                            toastr.success(result['message']);
                          },
                        error: function(result) {
                            setTimeout(function() {
                                KTUtil.btnRelease(btn);
                            }, 1000);
                            Swal.fire("System Message", "Something went wrong!", "error");
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