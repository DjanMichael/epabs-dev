@extends('layouts.app')
@section('title','WORK AND FINANCIAL PLAN')
@section('content')

<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2 col-12 col-md-10 mb-3">
            <!--begin::Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Work and Financial Plan</h5>
            <!--end::Title-->
            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Search Form-->
            <div class="d-flex align-items-center " id="kt_subheader_search">
                <form class="ml-5">
                    <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                        <input type="text" class="form-control" id="kt_subheader_search_form" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/General/Search.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Search Form-->
        </div>
        <button type="button"  id="btn_show_year_wfp" class="btn btn-primary btn-shadow font-weight-bold mr-2 col-12 col-md-2"><i class="icon-2x flaticon-add mr-3"></i>Create</button>
     </div>
</div>


<div id="wfp_list"></div>



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


        /*
            INITIALIZED
        */

        fetch_wfp_list();

        $("#btn_create_wfp_year").on('click',function(){
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
                    if(data == 'success'){
                        KTApp.block('#modal_create_wfp', {
                            overlayColor: '#000000',
                            state: 'primary',
                            message: 'Redirecting. . .'
                        });
                        window.location.href = redirectTo;
                    }else if(data =='duplicate'){
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
                    }else if (data == 'no budget'){
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



        /*
         FUNCTIONS
        */
        function fetch_wfp_list(){
            var _url = "{{ route('d_get_all_wfp_list') }}";
            $.ajax({
                method:"GET",
                url:_url,
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
                }
            })
        }

    });
</script>

@endpush
