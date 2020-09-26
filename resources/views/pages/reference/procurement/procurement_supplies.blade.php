@extends('layouts.app')
@section('title','Supplies')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="" class="text-muted">System Modules</a>
    </li> 
    <li class="breadcrumb-item">
        <a href="" class="text-muted">Procurement Supplies</a>
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

    <script>
        $(document).ready(function() {
          
        /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */
            populateOutputFunctionsAll();
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

            $("#chk_fix_price").on('click',function(){ switchChangeValue('chk_fix_price') });

            $("#btn_search").on('click',function(){
                var str = $("#query_search").val();
                // alert(str);
                populateOutputFunctionsSearch(str);
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
                            toastr.success(result['message']);
                          },
                        error: function(result) {
                            setTimeout(function() {
                                KTUtil.btnRelease(btn);
                            }, 1000);
                            Swal.fire("Good job!", "You clicked the button!", "error");
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

            function switchChangeValue(ob,type = null){
                var el = document.getElementById(ob);
                if (type == 'default'){
                    el.value = 'N';
                }else{
                    el.value = (el.value == 'Y') ? 'N' : 'Y';
                }
            }

            function populateOutputFunctionsAll(_url){
                var _url = "{{ route('d_get_procurement_supplies') }}";
                $.ajax({
                    method:"GET",
                    url: _url,
                    beforeSend:function(){
                        KTApp.block('#populate_table', {
                            overlayColor: '#000000',
                            state: 'primary',
                            message: 'Loading. . .'
                        });
                    },
                    success:function(data){
                        KTApp.unblock('#populate_table');
                        // alert(data);
                        document.getElementById('modal_content_output_functions').innerHTML= data;
                        
                    },
                    complete:function(){
                        $("#table_pagination .pagination a").on('click',function(e){
                            e.preventDefault();
                            fetch_output_function($(this).attr('href').split('page=')[1])
                        });
                    }
                });
            }

            function fetch_output_function(page1){
                var _url= "{{ route('d_get_procurement_supplies_by_page') }}";
                $.ajax({
                    method:"GET",
                    url: _url,
                    data : { page: page1},
                    beforeSend:function(){
                        KTApp.block('#populate_table', {
                            overlayColor: '#000000',
                            state: 'primary',
                            message: 'Loading. . .'
                        });
                    },
                    success:function(data){
                        KTApp.unblock('#populate_table');
                        document.getElementById('modal_content_output_functions').innerHTML= data;
                    },
                    complete:function(){
                        $("#table_pagination .pagination a").on('click',function(e){
                            e.preventDefault();
                            // console.log($(this).attr('href').split('page=')[1]);
                            fetch_output_function($(this).attr('href').split('page=')[1])
                        });
                    }
                })
            }

            function populateOutputFunctionsSearch(query){
                var datastr = "q=" + query;
                var _url = "{{ route('d_get_procurement_supplies_search') }}"
            
                $.ajax({
                    method: "GET",
                    url: _url,
                    data: datastr,
                    beforeSend:function(){
                        KTApp.block('#populate_table', {
                            overlayColor: '#000000',
                            state: 'primary',
                            message: 'Loading. . .'
                        });
                    },
                    success:function(data){
                        KTApp.unblock('#populate_table');
                        document.getElementById('modal_content_output_functions').innerHTML= data;
                    },
                    error:function(err){
                        if(err.status == 500){
                            populateOutputFunctionsSearch($("#output_function_search").val());
                        }
                    }
                });
            }


        });

        //     $('#kt_btn_1').on('click', function(e){
        // 		e.preventDefault();
        //         var group = $('#group').val();
        //         var category = $('#category').val();
        //         var subcategory = $('#sub-category').val();
        //         var title = $('#title').val();
        //         var code = $('#code').val();
        
        //         $.ajax({
        //             data: { group:group, category:category, sub_category:subcategory, title:title, code:code },
        //     		url: _url,
        // 			method: 'POST',
        //             beforeSend:function(){
        //                 KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Processing...");
        //             },
        //             success:function(data) {
        //                 alert('success');
        //                 // getData();
        //                 setTimeout(function() {
        //                     KTUtil.btnRelease(btn);
        //                 }, 1000);
        //             },
        //             error:function(err) {
        //                 alert(err.statusText);
        //                 // alert(err.statusText);
        //                 setTimeout(function() {
        //                     KTUtil.btnRelease(btn);
        //                 }, 1000);
        //             }
        // 	    });
        //     });

            
        // });

        // function getData()
        //     {
        //         var _data =""; //if naay param

        //         $.ajax({
        //             method:"GET",
        //             url: _url,
        //             data: _data,
        //             beforeSend:function(){
        //                 // implement pre-loading 
        //                 KTApp.block('#data', {
        //                     overlayColor: '#000000',
        //                     state: 'primary',
        //                     message: 'Processing...'
        //                 });
        //             },
        //             success:function(data){
        //                 document.getElementById('data').innerHTML= data;
        //                 //hide loading
        //                 setTimeout(function() {
        //                 KTApp.unblock('#data');
        //             }, 3000);
        //             },
        //             error:function(err)
        //             {
        //                 alert(err.statusText);
        //                 //hide loading
        //                 setTimeout(function() {
        //                 KTApp.unblock('#data');
        //             }, 3000);
        //             }
        //         })
        //     }
    </script>
@endpush