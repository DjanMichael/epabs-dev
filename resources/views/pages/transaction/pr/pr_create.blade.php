@extends('layouts.app')
@section('title','CREATE PURCHASE REQUEST')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('r_pr') }}" class="text-muted">Purchase Request</a>
</li>
<li class="breadcrumb-item">
    <span class="text-muted">Create Purchase Request</span>
</li>
@endsection
@section('content')
<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
    <!--begin::Item-->
    <li class="nav-item mb-2"  data-toggle="tooltip" title="Show Purchase Request" data-placement="left" data-original-title="Show Purchase Request">
        <button type="button" onclick="pr_drawer_open('{{ $data['ppmp_code'] }}')" class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" >
            <i class="flaticon-file-2 text-primary"></i>
        </button>
    </li>
    <!--end::Item-->
</ul>
<div class="container">
  <div class="row">
     <div class="flex-column col-md-12">
                <div id="pi_card" class="card card-custom bgi-no-repeat card-stretch gutter-b" >
                    <div class="card-title p-5 bg-dark mb-0">
                    <span class="card-label font-weight-bolder text-light">Purchase Request # {{ $data['ppmp_code'] }}</span>
                    </div>
                    <!--begin::Body-->
                    <div class="card-body my-4">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="font-weight-normal mb-0">Select Approved WFP</p>
                                <div class="form-group " style="">
                                    <select class="form-control form-control-solid" id="wfp_select">
                                        <option value="" selected></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="font-weight-normal mb-0">Select Activity</p>
                                <div class="form-group " style="">
                                    <select class="form-control form-control-solid" id="wfp_activity_select">
                                        <option value="" selected></option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
            </div>


    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-4">

                    </div>
                </div>
            </div>
            <div class="col-12">
            <div class="card card-custom mb-8" id="table_ppmp">
                <!--begin::Header-->
                <div class="card-header border-0 py-5 bg-dark">
                    <div class="row w-100">
                        <div class="col-12 col-md-6">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-light">Item List</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">You may select Item here.</span>
                            </h3>
                        </div>
                    </div>
                    {{-- <div class="card-toolbar">
                    </div> --}}
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-vertical-center">
                            <thead>
                                <tr class="text-left">
                                    {{-- <th class="pl-0" style="width: 30px">
                                        <label class="checkbox checkbox-lg checkbox-inline mr-2">
                                            <input type="checkbox" value="1">
                                            <span></span>
                                        </label>
                                    </th> --}}
                                    {{-- <th class="pl-0" style="min-width: 120px">ID</th> --}}
                                    <th style="min-width: 110px">ITEM DESCRIPTION</th>
                                    <th style="min-width: 110px">
                                        <span>Qty</span>
                                    </th>
                                    <th style="min-width: 120px">UNIT</th>
                                    <th style="min-width: 110px">
                                        <span>PRICE</span>
                                    </th>
                                    <th style="min-width: 110px">
                                        <span>Total</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="items_activity">
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Body-->
            </div>
            </div>
        </div>
        <!-- end row-->
    </div>
    <!--end col-10 -->
</div>
<!--end row -->


<input type="hidden" id="pr_code" value="{{ $data["ppmp_code"] }}">
@push('scripts')
    <script>
        function fetchWFPApproved(){
            var _url = "{{ route('get_approved_wfp') }}";
            $.ajax({
                method:"GET",
                url:_url,
                success:function(data){
                    document.getElementById('wfp_select').innerHTML = data;
                }
            });
        }

        function addItemToPr(_wfp_code,_wfp_act_id,_pr_code,_item_type,_item_id,_qty,_price){
            var _url ="{{ route('add_item_pr_details') }}";
            var _data = { wfp_code: _wfp_code, wfp_act_id : _wfp_act_id,pr_code: _pr_code,item_type: _item_type , item_id : _item_id, qty: _qty, price:_price};
            $.ajax({
                method:"GET",
                url: _url,
                data:_data,
                success:function(data){
                    if(data == 'success'){
                        fetchItemList();
                    }
                }
            })
        }
        function fetchItemList(){
            if($("#wfp_activity_select option:selected").val() != '' && $("#wfp_select option:selected").val() != ''){
                var _url ="{{ route('get_item_act') }}";
                var _data = { wfp_code : $("#wfp_select option:selected").val() ,wfp_act_id : $("#wfp_activity_select option:selected").val() ,pr_code : $("#pr_code").val()};
                $.ajax({
                    method:"GET",
                    url: _url,
                    data: _data,
                    success:function(data){
                        document.getElementById('items_activity').innerHTML = data;
                    }
                });
            }
        }

        function delPrItem(_id){
            var _url = "{{ route('pr_del_item') }}";
            $.ajax({
                method:"GET",
                url:_url,
                data:{id:_id},
                success:function(data){
                    if(data == 'success'){
                        swal.fire({
                                title:"Good Job!",
                                text: "Successfully Deleted!" ,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                        });
                        fetchItemList();
                        pr_drawer_close();
                    }
                }
            })
        }
         $(document).ready(function(){
            fetchWFPApproved();

            $("#wfp_select").on('change',function(){
                var _wfp_code = $("#wfp_select option:selected").val();
                var _data = { wfp_code : _wfp_code };
                var _url ="{{ route('get_pr_wfp_act_by_wfp') }}";
                if(_wfp_code != ''){
                    $.ajax({
                        method:"GET",
                        url:_url,
                        data: _data,
                        success:function(data){
                            document.getElementById('wfp_activity_select').innerHTML = data;
                        }
                    })
                }
            });

            $("#wfp_activity_select").on('change',function(){
                // items_activity
                fetchItemList();
            });


         });
    </script>
@endpush
@endsection
