@extends('layouts.app')
@section('title','PPMP')
@section('content')
<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
    <span class="label label-rounded label-danger mr-2" style="position:absolute;left:0;top:0;" id="cart_count_badge">0</span>
    <!--begin::Item-->
<li class="nav-item mb-2"  onclick="wfp_act_cart_drawer_open('{{ $data['wfp_code'] }}','{{ $data['wfp_act_id'] }}')" data-toggle="tooltip" title="" data-placement="left" data-original-title="Show Selected Items">
        <button type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" >
            <i class="fas fa-shopping-cart text-primary"></i>
        </button>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="nav-item mb-2"  onclick="wfp_drawer_open('{{ $data['wfp_code'] }}')" data-toggle="tooltip" title="" data-placement="left" data-original-title="Open Wfp Activity">
        <button type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" >
            <i class="fas fa-stream text-primary"></i>
        </button>
    </li>
    <!--end::Item-->
     <!--begin::Item-->
     <li class="nav-item mb-2"  onclick="wfp_ppmp_viewer_drawer_open('{{ $data['wfp_code'] }}','{{ $data['wfp_act_id'] }}')" data-toggle="tooltip" title="" data-placement="left" data-original-title="Open PPMP">
        <button type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" >
            <i class="fas fa-boxes text-primary"></i>
        </button>
    </li>
    <!--end::Item-->
</ul>
<div class="row">
    <div class="col-12 col-md-12">
        <div class="flex-column col-md-12">
            <div id="pi_card" class="card card-custom bgi-no-repeat card-stretch gutter-b" >
                <div class="card-title p-5 bg-dark mb-0">
                        <h4 class="text-light">CREATE PPMP</h4>
                </div>
                <!--begin::Body-->
                <div class="card-body my-4">
                    <div class="row">
                        <div class="col-12 col-md-4 mb-2">
                            <span class="card-title font-weight-bolder font-size-h6 mb-0 text-hover-state-dark d-block"><i class="fas fa-money-bill text-primary mr-2"></i>Budget</span>
                            <div class="font-weight-bold text-muted font-size-sm">
                            <span class="text-dark-75 font-weight-bolder font-size-h2 mr-2" id="balance_amount">₱ 0.00</span> <span id="balance_percentage">0%</span></div>
                            <div class="progress progress-xs mt-1 bg-info-o-60">
                            <div class="progress-bar bg-info" id = "balance_progress" role="progressbar" style="width:0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="card-title font-weight-bolder font-size-h6 mb-0  mt-4 text-hover-state-dark d-block"><i class="fas fa-money-bill text-danger mr-2"></i>Utilized</span>
                            <div class="font-weight-bold text-muted font-size-sm">
                            <span class="text-dark-75 font-weight-bolder font-size-h2 mr-2" id="utilize_amount">₱ 0.00</span> <span id="utilize_percentage">0%</span></div>
                            <div class="progress progress-xs mt-1 bg-info-o-60">
                                <div class="progress-bar bg-danger" id= "utilize_progress" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <p class="font-weight-normal mb-0">Select Performance Indicator</p>
                            <div class="form-group " style="">
                                <select class="form-control form-control-solid" id="pi_ppmp_select">
                                    <option value="" selected></option>
                                    @foreach($data["wfp_act_pi"] as $row)
                                        <option value="{{ $row["id"] }}">{{ $row["performance_indicator"] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div id="batch_wrapper">
                                        <p class="font-weight-normal mb-0">Select Batch No</p>
                                        <div class="form-group" style="">
                                            <select class="form-control form-control-solid" id="pi_batch_no">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div id="pi_region_wrapper">
                                        <p class="font-weight-normal mb-0">Select Region</p>
                                        <div class="form-group" style="">
                                            <select class="form-control form-control-solid" id="pi_region">
                                                <option value="" selected></option>
                                                @foreach($data["location"] as $row)
                                                    <option value="{{ $row["id"] }}">{{ $row["region"] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div id="pi_prov_wrapper">
                                        <p class="font-weight-normal mb-0">Select Province</p>
                                        <div class="form-group" style="">
                                            <select class="form-control form-control-solid" id="pi_prov">
                                                <option value="" selected></option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div id="pi_city_wrapper">
                                        <p class="font-weight-normal mb-0">Select City</p>
                                        <div class="form-group " style="">
                                            <select class="form-control form-control-solid" id="pi_city">
                                                <option value="" selected></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
        </div>



    </div>
    <div class="col-12 col-md-3">
        <div class="flex-column  col-md-12" id="kt_profile_aside">
            <!--begin::Forms Widget 15-->
            <div class="card card-custom gutter-b">
                <!--begin::Body-->
                <div class="card-body">

                    <!--begin::Form-->
                    <form id="side_isppmp">
                        <!--begin::Categories-->
                        <div class="form-group mb-11">
                            <label class="font-size-h3 font-weight-bolder text-dark mb-7">Categories</label>
                            <!--begin::Checkbox list-->
                            <div class="checkbox-list">
                                @foreach($data["ppmp_item_category"] as $row)
                                    <label class="checkbox checkbox-lg mb-7" >
                                    <input type="checkbox" value="false" id="sort_list_{{ str_replace(' ','_',$row['classification']) }}" onclick="ppmpItemSortedCategory('{{ $row['classification'] }}')" >
                                        <span></span>
                                        <div class="font-size-lg text-dark-75 font-weight-bold">{{ $row["classification"] }}</div>
                                        <div class="ml-auto text-muted font-weight-bold">{{ $row["item_count"] }}</div>
                                    </label>
                                @endforeach
                            </div>
                            <!--end::Checkbox list-->
                        </div>
                        <!--end::Categories-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Forms Widget 15-->
        </div>
    </div>
    <div class="col-12 col-md-9">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-4">

                    </div>
                </div>
            </div>

            <div class="col-12">
            <div class="card card-custom " id="table_ppmp">
                <!--begin::Header-->
                <div class="card-header border-0 py-5 bg-dark">
                    <div class="row w-100">
                        <div class="col-12 col-md-6">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-light">Item List</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">You may select Item here.</span>
                            </h3>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <div class="row mt-3">
                                <input type="text" class="form-control form-control-solid col-12 col-md-8 mb-3 mb-md-0" placeholder="Search Item" id="search_txt"/>
                                <button class="btn btn-light-primary font-weight-bold col-12 col-md-3 ml-md-2" type="button" id="btnSearchItem">Search</button>
                            </div>
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
                                    <th style="min-width: 120px">UNIT</th>
                                    <th style="min-width: 110px">
                                        <span>PRICE</span>
                                    </th>
                                    <th class="pr-0 text-right" style="min-width: 160px">Action</th>
                                </tr>
                            </thead>
                            <tbody id="ppmp_med_supplies_items">
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

<!-- Modal modal_qty_cart_item-->
<div class="modal fade modal-sticky modal-sticky-bottom-center" id="modal_qty_cart_item" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true" style="z-index:1095" >
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quantity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-6 col-md-3">January</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="jan_cart" onclick="addTotalQty('jan_cart')" onkeyup="addTotalQty('jan_cart')" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">Febuary</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="feb_cart"onclick="addTotalQty('feb_cart')"  onkeyup="addTotalQty('feb_cart')" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">March</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="mar_cart" onclick="addTotalQty('mar_cart')"  onkeyup="addTotalQty('mar_cart')" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">April</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="apr_cart" onclick="addTotalQty('apr_cart')"  onkeyup="addTotalQty('apr_cart')" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">May</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="may_cart" onclick="addTotalQty('may_cart')"  onkeyup="addTotalQty('may_cart')" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">June</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="june_cart" onclick="addTotalQty('june_cart')"  onkeyup="addTotalQty('june_cart')" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-6 col-md-3">July</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="july_cart" onclick="addTotalQty('july_cart')"   onkeyup="addTotalQty('july_cart')" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">August</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="aug_cart" onclick="addTotalQty('aug_cart')"  onkeyup="addTotalQty('aug_cart')" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">September</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="sept_cart" onclick="addTotalQty('sept_cart')"  onkeyup="addTotalQty('sept_cart')" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">October</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="oct_cart" onclick="addTotalQty('oct_cart')"  onkeyup="addTotalQty('oct_cart')" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">November</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="nov_cart" onclick="addTotalQty('nov_cart')"  onkeyup="addTotalQty('nov_cart')" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">December</div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <input type="number" value="0" id="dec_cart" onclick="addTotalQty('dec_cart')"  onkeyup="addTotalQty('dec_cart')" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    </div>
                    <div class="col-12">
                        <input type="hidden" id="balance_amount_input" value=""/>
                        <input type="hidden" id="item_price_input" value=""/>

                    </div>
                </div>

            </div>
            <div class="modal-footer" style="float:left">
                Total :<span id="qty_total" style="font-weight:bold;">0</span> |
                Price :<span id="lbl_price" style="font-weight:bold;">0</span> |
                SubTotal :<span id="lbl_sub_total" style="font-weight:bold;">0</span> |
                Balance :<span id="lbl_balance" style="font-weight:bold;">0</span>
                <button type="button" class="btn btn-primary" onclick="savePiCart()" id="btnSavePiCart" >Add Item</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal catering_service-->
<div class="modal fade modal-sticky modal-sticky-bottom-center" id="modal_catering_service" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true" style="z-index:1095" >
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CATERING SERVICE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <!--begin::Item-->
                                    <tr>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">BOARD AND LODGING</td>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">100.00 X</td>
                                        <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6"><input type="number" id="txt_catering_input_bal" class="form-control"></td>
                                    </tr>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <tr>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">BREAKFAST</td>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">100.00 X</td>
                                        <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6"><input type="number" id="txt_catering_input_b" class="form-control"></td>
                                    </tr>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <tr>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">DINNER</td>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">100.00 X</td>
                                        <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6"><input type="number" id="txt_catering_input_d" class="form-control"></td>
                                    </tr>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <tr>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">LUNCH</td>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">100.00 X</td>
                                        <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6"><input type="number" id="txt_catering_input_l" class="form-control"></td>
                                    </tr>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <tr>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">SNACK AM</td>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">100.00 X</td>
                                        <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6"><input type="number" id="txt_catering_input_sam" class="form-control"></td>
                                    </tr>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <tr>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">SNACK PM</td>
                                        <td class="font-size-lg font-weight-bolder text-dark-75 align-middle w-150px pb-6">100.00 X</td>
                                        <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6"><input type="number" id="txt_catering_input_spm" class="form-control"></td>
                                    </tr>
                                    <!--end::Item-->

                                </tbody>
                            </table>
                        </div>

                        <div class="col-12 col-md-4">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="float:left">
                <h1 id="c_sub_total">TOTAL : 0.00</h1> |
                <button type="button" class="btn btn-primary" >Add Item</button>
            </div>
        </div>
    </div>
</div>


</div>
<!--end row -->
@endsection

@push('scripts')
<script>
    var sortedBy = [];

    $(document).ready(function(){
        /*
            INITIALIZE
        */



            $("#catering_form").hide();
            $("#side_catering").hide();
            $("#batch_wrapper").hide();
            $("#pi_region_wrapper").hide();
            $("#pi_prov_wrapper").hide();
            $("#pi_city_wrapper").hide();
            setTimeout(function(){
                getAllPPMPItemsList();
            },1000);
        /*
            EVENTS
        */
        $("#pi_ppmp_select").on('change',function(e){
            $("#pi_batch_no").val("");
            fetchPIDetails("ALL");
        });

        $("#pi_region").on('change',function(){
            fetchProvLocation($("#pi_region option:selected").text());
        });

        $("#pi_prov").on('change',function(){
            fetchCityLocation($("#pi_prov option:selected").text());
        });

        $("#btnSearchItem").on('click',function(){
            getAllPPMPItemsList();
        });
        /*
            FUNCTIONS
        */

        function fetchPerIndicatorActivityCart(twapi_id){

        }

        function fetchlocation(_id){
            var _url = "{{ route('get_catering_location') }}";
            $.ajax({
                method:"GET",
                url: _url,
                data: { id : _id }
                success:function(data){
                    console.log(data);
                }
            })
        }

        $("#pi_batch_no").on('change',function(){
            if($(this).val() == ''){
                fetchPIDetails("ALL");
            }else{
                var _url = "{{ route('get_catering_batch_details') }}";
                var _data = { pi_id : $("#pi_ppmp_select option:selected").val(), batch_id : $("#pi_batch_no option:selected").val() }
                $.ajax({
                    method:"GET",
                    url: _url,
                    data: _data,
                    success:function(data){
                        $("#cart_count_badge").html(data.data.data.ppmp_items.length);
                        console.log(data.data.data.catering_location);
                        if(data.data.data.catering_location.length == 1){
                            fetchlocation($(this).val());
                            $("#pi_region").val(data.data.data.catering_location.id);
                            $("#pi_prov").val(data.data.data.catering_location.id);
                            $("#pi_city").val(data.data.data.catering_location.id);
                        }
                        document.getElementById('wfp_act_cart_drawer').innerHTML = data.data.data.view;
                    }
                })
            }
        });

        document.addEventListener('click',function(e){
            if(e.target && e.target.id== 'btn_set_catering_pax'){
                    //do something

                    $("#modal_catering_service").modal({
                        show:true,
                        backdrop:'static',
                        focus: true,
                        keyboard:false
                    });
                }
            });
        });
        var catering_grand_total=0;
        var nf = new Intl.NumberFormat();
        var catering_temp_total =0;
        document.addEventListener('keyup',function(e){


            if(e.target && e.target.id== 'txt_catering_input_bal'){
                $("#c_sub_total").html( '₱' + nf.format(get_catering_total_qty()));
            }
            if(e.target && e.target.id== 'txt_catering_input_b'){
                $("#c_sub_total").html( '₱' + nf.format(get_catering_total_qty()));
            }
            if(e.target && e.target.id== 'txt_catering_input_d'){
                $("#c_sub_total").html( '₱' + nf.format(get_catering_total_qty()));
            }
            if(e.target && e.target.id== 'txt_catering_input_l'){
                $("#c_sub_total").html( '₱' + nf.format(get_catering_total_qty()));
            }
            if(e.target && e.target.id== 'txt_catering_input_sam'){
                $("#c_sub_total").html( '₱' + nf.format(get_catering_total_qty()));
            }
            if(e.target && e.target.id== 'txt_catering_input_spm'){
                $("#c_sub_total").html( '₱' + nf.format(get_catering_total_qty()));
            }

        });
    //end $(document).ready

    function get_catering_total_qty(){
            return (($("#txt_catering_input_bal").val() - 0) +
                    ($("#txt_catering_input_b").val() - 0) +
                    ($("#txt_catering_input_d").val() - 0) +
                    ($("#txt_catering_input_l").val() - 0) +
                    ($("#txt_catering_input_sam").val() - 0) +
                    ($("#txt_catering_input_spm").val() - 0) ) * 100; // testing 100 need to get unit price for multiplication
    }
    var is_catering = 'N';
    function fetchPIDetails(type){
        var _url ="{{ route('get_ppmp_details') }}";
        var _data = { twapi_id : $("#pi_ppmp_select").val() , batch_id : $("#pi_batch_no option:selected").val() };

        if($("#pi_ppmp_select").val() != ''){
            $.ajax({
                method:"GET",
                url: _url,
                data:_data,
                beforeSend:function(){
                    // $("#pi_card").addClass('spinner spinner-primary spinner-right');
                    KTApp.block('#pi_card', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Retrieving Details. . .'
                    });
                },
                success:function(data){
                    // alert(data);
                    $("#balance_amount").html('₱ ' + data.cost.balance);
                    $("#balance_amount_input").val(data.cost.balance);

                    $("#balance_percentage").html(data.cost.balance_amount_p + '%');
                    $("#balance_progress").css('width:' + data.cost.balance_amount_p + '%');
                    $("#utilize_amount").html('₱ ' + data.cost.ppmp_amount);
                    $("#utilize_percentage").html(data.cost.ppmp_amount_p + '%');
                    $("#utilize_progress").css('width:' + data.cost.ppmp_amount_p + '%');
                    $("#cart_count_badge").html(data.ppmp_items.length);

                    if (data.wfp_act_pi.is_catering == "Y"){
                        is_catering = 'Y';
                        $("#batch_wrapper").show();
                        $("#pi_region_wrapper").show();
                        $("#pi_prov_wrapper").show();
                        $("#pi_city_wrapper").show();
                        // $("#cart_count_badge").html(0);
                        fetchPiCateringBatches(_data,type);

                    }else{
                        is_catering = 'N';
                        // $("#side_catering").hide();
                        $("#batch_wrapper").hide();
                        $("#pi_region_wrapper").hide();
                        $("#pi_prov_wrapper").hide();
                        $("#pi_city_wrapper").hide();
                        $("#table_ppmp").show();
                        $("#side_isppmp").show();
                        // $("#cart_count_badge").html(data.ppmp_items.length);
                    }

                    // data.wfp_act.data_arr.forEach(setAttrbtnSetCatering);

                },complete:function(){
                    // $("#pi_card").removeClass('spinner spinner-primary spinner-right');
                    KTApp.unblock('#pi_card');
                }
            });
        }else if ($("#pi_ppmp_select").val() == ''){
            $("#balance_amount").html('₱ 0.00');
            $("#balance_percentage").html('0%');
            $("#balance_progress").css('width:0%');
            $("#utilize_amount").html('₱ 0.00');
            $("#utilize_percentage").html('0%');
            $("#utilize_progress").css('width:0%');
            $("#cart_count_badge").html('0');

            $("#batch_wrapper").hide();
            $("#pi_region_wrapper").hide();
            $("#pi_prov_wrapper").hide();
            $("#pi_city_wrapper").hide();
        }
    }

    function fetchPiCateringBatches(_data,_type){
        var _url ="{{ route('get_pi_batches') }}";
        var data = {
            d : _data,
            t : [
                 _type,
                 $("#pi_batch_no option:selected").val()
            ]
        }

        $.ajax({
            method:"GET",
            url : _url,
            data:data,
            success:function(data){
                if(data.type != undefined || data.type == 'ADDING_ITEM'){
                    $("#pi_batch_no").val(data.batch_id);
                }else{
                    document.getElementById('pi_batch_no').innerHTML = data;
                }
            }
        })

    }

    function fetchProvLocation(region){
        var _url = "{{ route('get_pi_prov') }}";
         $.ajax({
            method:"GET",
            url : _url,
            data:{ reg : region },
            success:function(data){
                document.getElementById('pi_prov').innerHTML = data;
            }
        })
    }

    function fetchCityLocation(province){
        var _url = "{{ route('get_pi_city') }}";
         $.ajax({
            method:"GET",
            url : _url,
            data:{ prov : province },
            success:function(data){
                document.getElementById('pi_city').innerHTML = data;
            }
        })

    }

    function getAllPPMPItemsList(_page,_q){
        var _url = "{{ route('get_all_ppmp_items_list') }}";
        var _data = {
            page :_page,
            sorted : sortedBy,
            q : $("#search_txt").val()
        }
        $.ajax({
            method:"GET",
            url:_url,
            data: _data,
            beforeSend:function(){
                KTApp.block('#table_ppmp', {
                    overlayColor: '#000000',
                    state: 'primary',
                    message: 'Loading. . .'
                });
            },
            success:function(data){
                document.getElementById('ppmp_med_supplies_items').innerHTML = data;
            },complete:function(){
                KTApp.unblock('#table_ppmp');
                $("#med_supplies_pagination .pagination a").on('click',function(e){
                    e.preventDefault();
                    page = $(this).attr('href').split('page=')[1];
                    getAllPPMPItemsList(page,'');
                    // alert(page);
                });
            }
        });
    }

    var __type ;
    var __id ;
    var __price ;

    function savePiCart(){
        $("#btnSavePiCart").addClass('spinner spinner-primary spinner-right');
        $("#btnSavePiCart").attr('disabled',true);
        if($("#pi_ppmp_select option:selected").val() != ""){
            var _url = "{{ route('add_pi_ppmp_items') }}";
            if(is_catering == 'Y' && $("#pi_batch_no").val() != '' ){
                var _data = {
                    type: __type,
                    id:__id,
                    twapi : $("#pi_ppmp_select option:selected").val(),
                    batch : $("#pi_batch_no option:selected").val(),
                    price :__price,
                    jan : parseInt($("#jan_cart").val()),
                    feb : parseInt($("#feb_cart").val()),
                    mar : parseInt($("#mar_cart").val()),
                    apr : parseInt($("#apr_cart").val()),
                    may : parseInt($("#may_cart").val()),
                    june : parseInt($("#june_cart").val()),
                    july : parseInt($("#july_cart").val()),
                    aug : parseInt($("#aug_cart").val()),
                    sept : parseInt($("#sept_cart").val()),
                    oct : parseInt($("#oct_cart").val()),
                    nov : parseInt($("#nov_cart").val()),
                    dec : parseInt($("#dec_cart").val())
                };

                $.ajax({
                    method:"GET",
                    url: _url,
                    data:_data,
                    beforeSend:function(){
                        KTApp.block('#modal_qty_cart_item', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Saving. . .'
                    });

                    },
                    success:function(data){
                        if(data =='success'){
                            $("#modal_qty_cart_item").modal('hide');
                            Swal.fire(
                                "Good Job!",
                                "Item Added to Cart",
                                "success"
                            )
                            fetchPIDetails("ADDING_ITEM");
                        }else if(data == 'duplicate'){
                            $("#modal_qty_cart_item").modal('hide');
                            Swal.fire(
                                "Opss!",
                                "You already added this item",
                                "warning"
                            )
                        }else{
                            $("#modal_qty_cart_item").modal('hide');
                            Swal.fire(
                                "Ops!",
                                "Something went wrong!",
                                "error"
                            )
                        }

                    },complete:function(){

                        KTApp.unblock('#modal_qty_cart_item');
                        $("#btnSavePiCart").removeClass('spinner spinner-primary spinner-right');
                        $("#btnSavePiCart").attr('disabled',false);
                    }
                });
            }else if(is_catering == 'N'){
                var _data = {
                type: __type,
                id:__id,
                twapi : $("#pi_ppmp_select option:selected").val(),
                batch : '',
                price :__price,
                jan : parseInt($("#jan_cart").val()),
                feb : parseInt($("#feb_cart").val()),
                mar : parseInt($("#mar_cart").val()),
                apr : parseInt($("#apr_cart").val()),
                may : parseInt($("#may_cart").val()),
                june : parseInt($("#june_cart").val()),
                july : parseInt($("#july_cart").val()),
                aug : parseInt($("#aug_cart").val()),
                sept : parseInt($("#sept_cart").val()),
                oct : parseInt($("#oct_cart").val()),
                nov : parseInt($("#nov_cart").val()),
                dec : parseInt($("#dec_cart").val())
            };
            $.ajax({
                    method:"GET",
                    url: _url,
                    data:_data,
                    beforeSend:function(){
                        KTApp.block('#modal_qty_cart_item', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Saving. . .'
                    });

                    },
                    success:function(data){
                        if(data =='success'){
                            $("#modal_qty_cart_item").modal('hide');
                            Swal.fire(
                                "Good Job!",
                                "Item Added to Cart",
                                "success"
                            )
                            fetchPIDetails("ADDING_ITEM");
                        }else if(data == 'duplicate'){
                            $("#modal_qty_cart_item").modal('hide');
                            Swal.fire(
                                "Opss!",
                                "You already added this item",
                                "warning"
                            )
                        }else{
                            $("#modal_qty_cart_item").modal('hide');
                            Swal.fire(
                                "Ops!",
                                "Something went wrong!",
                                "error"
                            )
                        }
                    },complete:function(){
                        KTApp.unblock('#modal_qty_cart_item');
                    }
                });
            }else{
                $("#modal_qty_cart_item").modal('hide');
                Swal.fire(
                    "Opss!",
                    "Please Select Batch",
                    "error"
                )
            }
        }else{
            Swal.fire(
                "Opss!",
                "Please Select Performance Indicator",
                "error"
            )
        }
    }


    function getTotalQty(){
        return  parseInt($("#jan_cart").val()) +
                parseInt($("#feb_cart").val()) +
                parseInt($("#mar_cart").val()) +
                parseInt($("#apr_cart").val()) +
                parseInt($("#may_cart").val()) +
                parseInt($("#june_cart").val()) +
                parseInt($("#july_cart").val()) +
                parseInt($("#aug_cart").val()) +
                parseInt($("#sept_cart").val()) +
                parseInt($("#oct_cart").val()) +
                parseInt($("#nov_cart").val()) +
                parseInt($("#dec_cart").val()) ;
    }

    function addPiCart(_type,_id,_price){
        if($("#pi_ppmp_select option:selected").val() != ""){
            $("#modal_qty_cart_item").modal({
                show:true,
                backdrop:'static',
                focus: true,
                keyboard:false
            });
            //set default 0
            $("#jan_cart").val(0);
            $("#feb_cart").val(0);
            $("#mar_cart").val(0);
            $("#apr_cart").val(0);
            $("#may_cart").val(0);
            $("#june_cart").val(0);
            $("#july_cart").val(0);
            $("#aug_cart").val(0);
            $("#sept_cart").val(0);
            $("#oct_cart").val(0);
            $("#nov_cart").val(0);
            $("#dec_cart").val(0);

            $("#qty_total").html('0');
            $("#lbl_price").html('₱ 0.00');
            $("#lbl_balance").html('₱ 0.00');
            $("#lbl_sub_total").html('₱ 0.00');


            __type = _type ;
            __id = _id;
            __price = _price;

            $("#item_price_input").val(_price);
            $("#lbl_price").html('₱ ' + _price);
        }else{
            Swal.fire(
                "Opss!",
                "Please Select Performance Indicator",
                "error"
            )
        }

    }


    function ppmpItemSortedCategory(classification){
        classification = classification.split(' ').join('_');
        // alert(classification);
        $("#sort_list_" + classification).val(!Boolean($("#sort_list_" + classification).val()));

        var i =0;
        var found =0;
        var index_found =0;

        for(i=0; i < sortedBy.length; i++){
            if(sortedBy[i] == classification){
                found = 1;
                index_found = i;
            }
        }

        if(Boolean($("#sort_list_" + classification).val()) == true && found == 0){
            sortedBy.push(classification);
        }else{
            sortedBy.splice(index_found,1);
        }
        // alert(sortedBy);
        // alert(sortedBy);

        getAllPPMPItemsList();
    }

    function addTotalQty(el){
        var nf = new Intl.NumberFormat();

        var qty = getTotalQty();
        var price =  $("#item_price_input").val();
        var budget = $("#balance_amount_input").val();
        budget = budget.replace(',','');
        var deducted = budget - (qty * price);

        $("#lbl_balance").html('₱ ' +  nf.format(deducted));
        $("#qty_total").html(qty);
        $("#lbl_sub_total").html('₱ ' + nf.format((qty * price)));
    }
</script>
@endpush
