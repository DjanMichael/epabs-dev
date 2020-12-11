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
                        <input type="text" class="form-control" id="query_search" placeholder="PR Code or Program Coordinator">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="btnSearchPR" type="button">Search</button>
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
                        <th style="min-width: 50px">Office</th>
                        <th style="min-width: 50px">Program</th>
                        <th style="min-width: 150px">Allocation</th>
                        <th style="min-width: 50px">Status</th>
                        <th class="pr-0 text-right" style="min-width: 200px">action</th>
                    </tr>
                </thead>
                <tbody id="pr_content_list">

                </tbody>
                </table>
            </div>
        </div>
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
<div class="modal fade" id="modal_status_change" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_status_change" aria-hidden="true" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-dark font-weight-bolder my-7">PR STATUS </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" style="padding:0px;margin:0px;position:relative;top:30px;height:300px;">
                <div class="card card-custom bgi-no-repeat gutter-b card-stretch" style="background-color: #1B283F; background-position:center right; background-size: 100% auto; background-image: url({{ asset('dist/assets/media/svg/patterns/rhone.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="" class="text-light">Status</label>
                            <select id="pr_status" class="form-control mb-3">
                                <option value="FOR CANVAS">FOR CANVASS</option>
                                <option value="OPEN CALL">OPEN CALL</option>
                                <option value="ABSTRACT">ABSTRACT</option>
                                <option value="P.O">P.O</option>
                                <option value="NTC">NTC</option>
                                <option value="BIDDING">BIDDING</option>
                                <option value="WAIVE">WAIVE</option>
                                <option value="PS DBM">PS DBM</option>
                                <option value="CANCEL">CANCEL</option>
                                <option value="ON HOLD">ON HOLD</option>
                                <option value="ADDITIONAL CANVASS">ADDITIONAL CANVASS</option>
                                <option value="RE-CANVAS">RE-CANVASS</option>
                            </select>
                            <button type="button" id="btn_save_status" class="btn btn-primary" onclick="saveStatusPr()">Change</button>
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
    var select_for_update;
    function printPR(pr_code){
        var _url ="{{ route('pr_prgoram_print') }}" + '?pr_code=' + pr_code;
        window.open(_url,'_blank','menubar=0,titlebar=0');
    }

    function editPR(pr_code){
        var _url ="{{ route('pr_program_edit') }}" + '?pr_code=' + pr_code;
        window.location.href =_url;
    }

    function fetchPRList(_page,_q)
    {
        var _url = "{{ route('d_pr_list') }}";
        $.ajax({
            method:"GET",
            url : _url,
            data: { page: _page , q: _q },
            beforeSend:function(){
                KTApp.block('#pr_content_list', {
                    overlayColor: '#000000',
                    state: 'primary',
                    message: 'Loading. . .'
                });
            },
            success:function(data){
                document.getElementById('pr_content_list').innerHTML = data;
            },
            complete:function(){
                KTApp.unblock('#pr_content_list');
                $("#pagination_pr_list .pagination a").on('click',function(e){
                    e.preventDefault();
                    pr_list_page = $(this).attr('href').split('page=')[1];
                    fetchPRList(pr_list_page, $("#query_search").val());
                });
            }
        });
    }



    function showStatusChangeModal(_pr_code){
        $("#modal_status_change").modal({
            show:true,
            backdrop:'static',
            focus: true,
            keyboard:false
        });
        select_for_update = _pr_code
    }

    function saveStatusPr(){
        if($("#pr_status option:selected").val() != ""){
            $("#btn_save_status").attr('disabled',true);
            $("#btn_save_status").addClass('spinner spinner-white spinner-right');
            var _url = "{{ route('pr_status_change') }}";
            $.ajax({
                method:"GET",
                url:_url,
                data: {pr_code: select_for_update, status : $("#pr_status option:selected").val() },
                success:function(data){
                    if(data == 'success'){
                        swal.fire({
                                title:"Good Job!",
                                text: "PR Status Updated!" ,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                        });
                        $("#modal_status_change").modal('hide');
                        fetchPRList();
                    }
                },complete:function(){
                    $("#btn_save_status").attr('disabled',false);
                    $("#btn_save_status").removeClass('spinner spinner-white spinner-right');
                }
            })
        }else{
            swal.fire({
                    title:"Opps!",
                    text: "Please select a status" ,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
            });
        }

        }

    function deletePR(_pr_code){
        var _url ="{{ route('del_program_pr') }}";
        $.ajax({
            method:"GET",
            url:_url,
            data: {pr_code: _pr_code},
            success:function(data){
                if(data =='success'){
                    // alert('PR deleted!');
                    swal.fire({
                                title:"PR has been deleted!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                        });
                    fetchPRList();
                }
            }
        })
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

        fetchPRList();

        $("#btnSearchPR").on('click',function(){
            fetchPRList(1,$("#query_search").val());
        })

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
