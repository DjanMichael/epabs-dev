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



<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b card-stretch  ribbon ribbon-clip ribbon-right" onclick="wfp_drawer_open(1)" style="cursor:pointer;" id="wfp_card">
                    <div class="ribbon-target" style="top: 12px;">
                        <span class="ribbon-inner bg-warning"></span>Status
                       </div>
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Section-->
                        <div class="row">
                            <div class="col-12 d-flex align-items-center">
                                <div class="symbol-list d-flex flex-wrap">
                                    <div class="symbol symbol-60 mr-3">
                                        <span class="symbol-label font-size-h6">P</span>
                                    </div>
                                   
                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column mr-auto">
                                    <!--begin: Title-->
                                    <a href="#" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">DJAN MICAHEL ANTHONY A. PENGSON</a>
                                    <span class="text-muted font-weight-bold">PROGRAMMER</span>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed separator-border-2 separator-secondary mb-3 mt-6"></div>
                        <!--end::Section-->
                        {{-- <!--begin::Content-->
                        <div class="d-flex flex-wrap mt-14">
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="d-block font-weight-bold mb-4">Start Date</span>
                                <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">14 Jan, 16</span>
                            </div>
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="d-block font-weight-bold mb-4">Due Date</span>
                                <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">21 Nov, 18</span>
                            </div>
                            <!--begin::Progress-->
                            <div class="flex-row-fluid mb-7">
                                <span class="d-block font-weight-bold mb-4">Progress</span>
                                <div class="d-flex align-items-center pt-2">
                                    <div class="progress progress-xs mt-2 mb-2 w-100">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ml-3 font-weight-bolder">78%</span>
                                </div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Content--> --}}
                       
                        <!--begin::Blog-->
                        <div class="d-flex flex-wrap">
                            <!--begin: Item-->
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-4">Cost</span>
                                <span class="font-weight-bolder font-size-h5 pt-1">
                                <span class="font-weight-bold text-dark-50">Php</span>1,249,500</span>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-4">Budget Source</span>
                                <span class="font-weight-bolder font-size-h5 pt-1">
                                <span class="font-weight-bold text-dark-50"></span>NEP</span>
                            </div>
                            <!--end::Item-->
                               <!--begin::Item-->
                               <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-4">Budget Year</span>
                                <span class="font-weight-bolder font-size-h5 pt-1">
                                <span class="font-weight-bold text-dark-50"></span>2020</span>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-4">No. of Activities</span>
                                <span class="font-weight-bolder font-size-h5 pt-1">
                                <span class="font-weight-bold text-dark-50"></span>17</span>
                            </div>
                            <!--end::Item-->
                        </div>
                  
                        <!--end::Blog-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer d-flex align-items-center">
                        <div class="d-flex">
                            {{-- <div class="d-flex align-items-center mr-7">
                                <span class="svg-icon svg-icon-gray-500">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Communication/Group-chat.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
                                            <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <a href="#" class="font-weight-bolder text-primary ml-2">648 Comments</a>
                            </div> --}}
                            <div class="d-flex align-items-center mr-7">
                                <span class="label label-primary label-inline font-weight-bolder mr-2" >MAIP</span>
                            </div>
                        </div>
                         {{-- <button type="button" class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto" onclick="wfp_drawer_open(1)">View</button> --}}
                         
                       
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
           
          
        </div>
        <!--end::Row-->
   
    </div>
    <!--end::Container-->
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
                    }else{
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
            console.log(a);
            $("#year_selected").html(a["year_data"]);
            $("#modal_create_wfp").modal({
                show:true,
                backdrop:'static',
                focus: true,
                keyboard:false
            });
        });
    });
</script>

@endpush