@extends('layouts.app')
@section('title','WORK AND FINANCIAL PLAN')
@section('content')

<div style="min-height:400px;">
    <div class="row p-5" >
        <div class="col-12 col-md-4">
            <div class="form-group">
                <input class="form-control"  type="text" placeholder="Search Division, Section Program Manager Here.." id="query_search" >
            </div>
        </div>
        <div class="col-12 col-md-4"></div>
        <div class="col-12 col-md-4 text-right">
            <button type="button"  id="btn_search_wfp"
            class="mb-1 btn btn-primary btn-shadow font-weight-bold mr-1 col-12 col-md-5">
            <i class="icon-2x flaticon2-search mr-3"></i>Search
            </button>
            <button type="button"  id="btn_show_year_wfp"
            class="btn btn-primary btn-shadow font-weight-bold col-12 col-md-5">
                <i class="icon-2x flaticon-add mr-3"></i>Create
            </button>
        </div>
    </div>
    <div id="wfp_list" style="z-index: 1000;"></div>
</div>

<!-- Modal-->
<div class="modal fade" id="modal_create_wfp" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_functions_delivery_search" aria-hidden="true" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-dark font-weight-bolder my-7">Create Work and Financial Plan <span class="label label-primary label-inline font-weight-bolder mr-2" id="year_selected"></span></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" style="padding:0px;margin:0px;position:relative;top:30px;height:300px;">
                <div class="card card-custom bgi-no-repeat gutter-b card-stretch" style="background-color: #1B283F; background-position:center right; background-size: 100% auto; background-image: url({{ asset('dist/assets/media/svg/patterns/rhone.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="p-4">
                            <p class="text-muted font-size-lg mb-7">
                                You may change your <b>YEAR</b> thru  <br>
                                Global Settings located on settings  <br>
                            </p>
                            <button type="button" id="btn_create_wfp_year" class="btn btn-danger font-weight-bold px-6 py-3">Create Report</a>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
{{-- {{ route('r_create_wfp') }} --}}
<script>
    $(document).ready(function(){

        var settings = JSON.parse(localStorage.getItem('GLOBAL_SETTINGS'));
        var page_wfp;
        /*
            INITIALIZED
        */

        fetch_wfp_list();

        $("#btn_create_wfp_year").on('click',function(){
            $(this).attr('disabled',true);
            var redirectTo = "{{ route('r_create_wfp') }}";
            var _url ="{{ route('f_generate_code_wfp') }}";
            var a = localStorage.getItem('GLOBAL_SETTINGS');
            a = a ?  JSON.parse(a) : {} ;
            var _data= {
                year_id: a["year"]
            };

            $.ajax({
                method:"GET",
                url: _url,
                data: _data,
                beforeSend:function(){
                    KTApp.block('#modal_create_wfp', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Creating WFP for ' + a["year_data"]
                    });
                    $(this).addClass('spinner spinner-white spinner-right');
                },
                success:function(data){
                    $(this).removeClass('spinner spinner-white spinner-right');
                    KTApp.unblock('#modal_create_wfp');
                    if(data.message == 'success'){
                        KTApp.block('#modal_create_wfp', {
                            overlayColor: '#000000',
                            state: 'primary',
                            message: 'Redirecting. . .'
                        });
                        window.location.href = redirectTo + '?wfp_act_id=' + data.wfp_act_id + '&wfp_code=' + data.wfp_code;
                    }else if(data.message =='duplicate'){
                        $("#modal_create_wfp").modal('hide');
                        swal.fire({
                                title:"Already Created WFP for Year " + a["year_data"],
                                text:'Try Searching it',
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                        });
                    }else if (data.message == 'no budget'){
                        $("#modal_create_wfp").modal('hide');
                        swal.fire({
                                title:"No Budget Allocated on you for Year " + a["year_data"],
                                text:'Please Contact  your budget Officer',
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                        });
                    }else if(data.message == 'only program coordinator can generate wfp or you may update your settings'){
                        $("#modal_create_wfp").modal('hide');
                        swal.fire({
                                title:"Opss!",
                                text: "Only Program Coordinator Can Generate WFP or Set your Program on Settings",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                        });
                    }else if(data.message ='You only have already created wfp this year'){
                        $("#modal_create_wfp").modal('hide');
                        swal.fire({
                                title:"Opss!",
                                text: "You only have already created wfp this year",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                        });
                    }else{
                        $("#modal_create_wfp").modal('hide');
                        swal.fire({
                                title:"Network Error",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                        });
                    }

                },
                complete:function(){
                    $("#btn_create_wfp_year").attr('disabled',false);
                }
            });
        });


        $("#btn_show_year_wfp").on('click',function(){
            var a = localStorage.getItem('GLOBAL_SETTINGS');
            a = a ?  JSON.parse(a) : {} ;
            $("#year_selected").html(a["year_data"]);
            $("#modal_create_wfp").modal({
                show:true,
                backdrop:'static',
                focus: true,
                keyboard:false
            });
        });

        $("#btn_search_wfp").on('click',function(e){
            e.preventDefault();
            fetch_wfp_list(null,$("#query_search").val(),null);
        });


        /*
         FUNCTIONS
        */

        function fetch_wfp_list(_page =null,_q =null,_sort_by=null){
            var _url = "{{ route('d_get_all_wfp_list') }}";

            var _data = {
                page : _page,
                q: _q,
                year : settings.year,
                sort : _sort_by
            };
            if(settings.year != null || settings.year != undefined)
            {
                $.ajax({
                    method:"GET",
                    url:_url,
                    data:_data,
                    beforeSend:function(){
                        KTApp.block('#kt_body', {
                            overlayColor: '#000000',
                            state: 'primary',
                            message: 'Retrieving WFP Data. . .'
                        });
                    },
                    success:function(data){
                        document.getElementById('wfp_list').innerHTML = data;
                    },
                    complete(){
                        KTApp.unblock('#kt_body');
                        $("#pagination_wfp_list .pagination a").on('click',function(e){
                            e.preventDefault();
                            page_wfp = $(this).attr('href').split('page=')[1]
                            fetch_wfp_list(page_wfp, $("#query_search").val(),$("#query_sort_by").val())
                        });
                    },
                    error:function(xhr, textStatus, errorThrown){
                        if (xhr.status == 401) {
                            $.ajaxSetup().tryCount++;
                            if($.ajaxSetup().tryCount != $.ajaxSetup().retryLimit)
                            {
                                setTimeout(function(){
                                    fetch_wfp_list();
                                }, $.ajaxSetup().retryAfter);
                            }
                        }
                    }
                });
            }else{
                swal.fire({
                        title:"Warning",
                        text:'Please setup your Year on Global Settings',
                        icon: "warning",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                });
            }

        }


    });



</script>

@endpush
