@extends('layouts.app')
@section('title','PURCHASE REQUEST')
@section('breadcrumb')
<li class="breadcrumb-item">
    <span class="text-muted">Purchase Request</span>
</li>
@endsection
@section('content')
<div class="container w-100">
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-9 text-right">
            <button class="btn btn-primary" id="btn_show_modal_pr">CREATE</button>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-4">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch  ribbon ribbon-clip ribbon-right m-0 m-md-2"
                style="height:250px;cursor:pointer;"
                style="cursor:pointer;"
               >
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Section-->
                    <div class="row mt-4">
                        <div class="col-12 d-flex align-items-center">
                            <!--begin::Info-->
                            <div class="d-flex flex-column mr-auto">
                                <!--begin: Title-->
                                <span class="card-title text-hover-primary fnt-weight-bolder font-size-h5 text-dark mb-1">PR</span>
                                <span class="text-muted font-weight-bold">Date Created</span>
                                <span class="label label-inline font-weight-bolder mr-2" > asdasd</span>
                                <!--end::Title-->
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed separator-border-2 separator-secondary mb-3 mt-6"></div>
                    <!--end::Section-->
                    <!--begin::Blog-->
                    <div class="d-flex flex-wrap ">
                        <!--begin: Item-->
                        <div class="mr-12 d-flex flex-column mb-7">
                            <span class="font-weight-bolder mb-1 mt-5">PR</span>
                            <span class="font-weight-bolder pt-1" style="font-size:13px">
                                <span class="font-weight-bold text-dark-50">₱</span>
                                asd
                            </span>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class=" d-flex flex-column mb-7">
                            <span class="font-weight-bolder mb-1 mt-5">Balance</span>
                            <span class="font-weight-bolder pt-1" style="font-size:13px">
                                <span class="font-weight-bold text-dark-50">₱</span>
                                asd
                            </span>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Blog-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer row pt-3 pb-3 bg-dark m-0" style="height: 60px;wdith:100%">
                    <div class="col-4">
                        <span class="label label-inline font-weight-bolder mr-2 " >STATUS</span>
                    </div>
                    <div class="col-8 text-right">
                        {{-- <span class="label label-primary label-inline font-weight-bolder mr-2" >asda</span> --}}
                        <button class="btn btn-transparent-primary btn-sm font-weight-bold mr-2">Edit</button>
                        <button class="btn btn-transparent-danger btn-sm font-weight-bold mr-2">Track</button>
                    </div>
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Card-->
        </div>
    </div>
</div>


<!-- Modal-->
<div class="modal fade" id="modal_create_pr" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_create_pr" aria-hidden="true" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-dark font-weight-bolder my-7">Create Purchase Request <span class="label label-primary label-inline font-weight-bolder mr-2" id="year_selected"></span></h3>
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
                            <button type="button" id="btn_create_pr" class="btn btn-danger font-weight-bold px-6 py-3">Create Report</a>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function(){
        var a = localStorage.getItem('GLOBAL_SETTINGS');
        a = a ?  JSON.parse(a) : {} ;
        $("#year_selected").html(a["year_data"]);

        $("#btn_show_modal_pr").on('click',function(){
            $("#modal_create_pr").modal({
                show:true,
                backdrop:'static',
                focus: true,
                keyboard:false
            });
        });

        $("#btn_create_pr").on('click',function(){
            $("#modal_create_pr").modal('hide');
            KTApp.block('#kt_body', {
                overlayColor: '#000000',
                state: 'primary',
                message: '<i class="fas fa-file-alt mr-2 text-primary"></i>Creating Purchase Order'
            });

            setTimeout(() => {
                KTApp.unblock('#kt_body');
            },4000);

            window.location.href="{{ route('r_pr_create') }}";
        });
    });
</script>
@endpush

@endsection
