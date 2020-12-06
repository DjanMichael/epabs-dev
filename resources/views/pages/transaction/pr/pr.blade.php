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

    </div>
    <div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card card-custom gutter-b">
            <div class="card-header mt-5">
                <div class="col-3">
                    <div class="card-title">
                        <h3 class="card-label">
                            Purchase Request
                            <small>List</small>
                        </h3>
                    </div>
                </div>
                @if(Auth::user()->role->roles == "PROGRAM COORDINATOR")
                <div class="col-9 text-right">
                    <button class="btn btn-primary" id="btn_show_modal_pr">CREATE</button>
                </div>
                @else
                <div class="form-group col-12 col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="PR Code or Program Coordinator">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">Search</button>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="card-body table-responsive">
              <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                <thead>
                    <tr class="text-left">
                        <th style="min-width: 50px">PR CODE#</th>
                        <th style="min-width: 200px">Program Coordinator</th>
                        <th style="min-width: 150px">Office</th>
                        <th style="min-width: 150px">Program</th>
                        <th style="min-width: 150px">Allocation</th>
                        <th style="min-width: 150px">Status</th>
                        <th class="pr-0 text-right" style="min-width: 150px">action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($data["pr_list"] as $row)

                    <tr>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row["pr_code"] }}</span>
                        </td>
                        <td class="pl-0" style="float:left;width:100%">
                            <div class="row">

                                <div class="col-12 pt-2 pl-6">
                                    <span class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" style= "text-transform: capitalize;">{{ $row["name"] }}</span>
                                    <span class="text-muted font-weight-bold text-muted d-block">{{ $row["designation"]  }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row["division"] }}</span>
                            <span class="text-muted font-weight-bold">{{ $row["section"] }}</span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row["program_name"] }}</span>
                        </td>
                        <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">₱ {{ number_format($row["pr_cost"],2) }}</span>
                        </td>
                        <td>
                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row["pr_status"] != null ? $row["pr_status"] : 'QUEUE'  }}</span>
                        </td>
                        <td class="pr-0 text-right">
                            <button type="button" onclick="printPR('{{ $row['pr_code'] }}')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                <span class="svg-icon svg-icon-md svg-icon-primary">
                                    <i class="fas fa-print text-primary"></i>
                                </span>
                            </button>
                            <button type="button" onclick="editPR('{{ $row['pr_code'] }}')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                <span class="svg-icon svg-icon-md svg-icon-primary">
                                   <i class="far fa-edit text-primary"></i>
                                </span>
                            </button>
                            <button type="button" onclick="openModalPRTrack('{{ $row['pr_code'] }}')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                <span class="svg-icon svg-icon-md svg-icon-primary">
                                   <i class="fas fa-history text-primary"></i>
                                </span>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">NO DATA</td>
                    </tr>
                @endforelse
                </tbody>
                </table>
            </div>
        </div>

        <div class="card card-custom gutter-b col-12 col-md-12">
            <div class="card-body">
                {{ $data["pr_list"]->links('components.global.pagination') }}
            </div>
        </div>

{{-- @if(count($data["unit_budget_allocation"]) != 0)
<div id="pagination_budget_allocation">
{{ $data["unit_budget_allocation"]->links('components.global.pagination') }}
</div>
@endif --}}


            <!--begin::Card-->
            {{-- <div class="card card-custom gutter-b card-stretch  ribbon ribbon-clip ribbon-right m-0 m-md-2"
                style="height:250px;cursor:pointer;"
                style="cursor:pointer;"
               > --}}
                <!--begin::Body-->
                {{-- <div class="card-body"> --}}
                    <!--begin::Section-->
                    {{-- <div class="row mt-4">
                        <div class="col-12 d-flex align-items-center"> --}}
                            <!--begin::Info-->
                            {{-- <div class="d-flex flex-column mr-auto"> --}}
                                <!--begin: Title-->
                                {{-- <span class="card-title text-hover-primary fnt-weight-bolder font-size-h5 text-dark mb-1">PR</span>
                                <span class="text-muted font-weight-bold">Date Created</span>
                                <span class="label label-inline font-weight-bolder mr-2" > asdasd</span> --}}
                                <!--end::Title-->
                            {{-- </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed separator-border-2 separator-secondary mb-3 mt-6"></div> --}}
                    <!--end::Section-->
                    <!--begin::Blog-->
                    {{-- <div class="d-flex flex-wrap "> --}}
                        <!--begin: Item-->
                        {{-- <div class="mr-12 d-flex flex-column mb-7">
                            <span class="font-weight-bolder mb-1 mt-5">PR</span>
                            <span class="font-weight-bolder pt-1" style="font-size:13px">
                                <span class="font-weight-bold text-dark-50">₱</span>
                                asd
                            </span>
                        </div> --}}
                        <!--end::Item-->
                        <!--begin::Item-->
                        {{-- <div class=" d-flex flex-column mb-7">
                            <span class="font-weight-bolder mb-1 mt-5">Balance</span>
                            <span class="font-weight-bolder pt-1" style="font-size:13px">
                                <span class="font-weight-bold text-dark-50">₱</span>
                                asd
                            </span>
                        </div> --}}
                        <!--end::Item-->
                    {{-- </div> --}}
                    <!--end::Blog-->
                {{-- </div> --}}
                <!--end::Body-->
                <!--begin::Footer-->
                {{-- <div class="card-footer row pt-3 pb-3 bg-dark m-0" style="height: 60px;wdith:100%">
                    <div class="col-4">
                        <span class="label label-inline font-weight-bolder mr-2 " >STATUS</span>
                    </div>
                    <div class="col-8 text-right">

                        <button class="btn btn-transparent-primary btn-sm font-weight-bold mr-2">Edit</button>
                        <button class="btn btn-transparent-white btn-sm font-weight-bold mr-2" onclick="printPR('1')">Print</button>
                        <button class="btn btn-transparent-danger btn-sm font-weight-bold mr-2">Track</button>
                    </div>
                </div> --}}
                <!--end::Footer-->
            {{-- </div> --}}
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



<!-- Modal-->
<div class="modal fade" id="modal_track_pr" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Track Purchase Request # <span id="pr_tracking_no" style="font-weight: bold;"><span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="timeline timeline-6 mt-3" id="pr_track_content">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function printPR(pr_code){
        var _url ="{{ route('pr_prgoram_print') }}" + '?pr_code=' + pr_code;
        window.open(_url,'_blank','menubar=0,titlebar=0');
    }

    function editPR(pr_code){
        var _url ="{{ route('pr_program_edit') }}" + '?pr_code=' + pr_code;
        window.location.href =_url;
    }

    function openModalPRTrack(_pr_code){
        $("#pr_tracking_no").html(_pr_code);
        $("#modal_track_pr").modal({
            show:true,
            backdrop:'static',
            focus: true,
            keyboard:false
        });
        var _url = "{{ route('pr_track_history') }}";
        $.ajax({
            method:"GET",
            url:_url,
            data:{pr_code: _pr_code},
            success:function(data){
                document.getElementById('pr_track_content').innerHTML = data;
            }
        });
    }

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
