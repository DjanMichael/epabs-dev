@extends('layouts.app')
@section('title','PPMP')
@section('content')
<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
    <span class="label label-rounded label-danger mr-2" style="position:absolute;left:0;top:0;" id="cart_count_badge">0</span>
    <!--begin::Item-->
<li class="nav-item mb-2"  onclick="wfp_act_cart_drawer_open('{{ $data['wfp_code'] }}','{{ $data['wfp_act_id'] }}')" data-toggle="tooltip" title="" data-placement="right" data-original-title="Show Selected Items">
        <button type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" >
            <i class="fas fa-box-open text-primary"></i>
        </button>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="nav-item mb-2"  onclick="wfp_drawer_open('{{ $data['wfp_code'] }}')" data-toggle="tooltip" title="" data-placement="right" data-original-title="Open Wfp Activity">
        <button type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" >
            <i class="fas fa-stream text-primary"></i>
        </button>
    </li>
    <!--end::Item-->
</ul>
<div class="row">
    <div class="col-12 col-md-12">
        <div class="flex-column col-md-12">
            <div id="pi_card" class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('dist/assets/media/svg/shapes/abstract-2.svg') }})">
                <div class="card-title p-5 bg-dark mb-0">
                        <h4 class="text-light">Wfp Activity</h4>
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
                            {{-- <p class="font-weight-normal mb-0"></p>
                            <div class="symbol-list d-flex flex-wrap">
                                <div class="symbol mr-3 mb-1">
                                    @if(count($data["ppmp_items"]) != 0)

                                    @if($data["ppmp_items"])<span class="symbol-label font-size-sm">JAN</span> @endif


                                    @endif
                                </div>
                            </div> --}}
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
                    <form>
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
            <div class="card card-custom"  id="table_ppmp">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Item List</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">You may select Item through items below.</span>
                    </h3>
                    <div class="card-toolbar">
                        {{-- <a href="#" class="btn btn-primary font-weight-bolder font-size-sm">New Report</a> --}}
                    </div>
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
                Balance :<span id="lbl_balance" style="font-weight:bold;">0</span>
                <button type="button" class="btn btn-primary" onclick="savePiCart()" >Add Item</button>
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
            setTimeout(function(){
                getAllPPMPItemsList();
            },1000);
        /*
            EVENTS
        */
        $("#pi_ppmp_select").on('change',function(e){
            fetchPIDetails();
        });




        /*
            FUNCTIONS
        */

        function fetchPerIndicatorActivityCart(twapi_id){

        }
    });
    //end $(document).ready

    function fetchPIDetails(){
            var _url ="{{ route('get_ppmp_details') }}";
            var _data = { twapi_id : $("#pi_ppmp_select").val() };

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
                    },complete:function(){
                        // $("#pi_card").removeClass('spinner spinner-primary spinner-right');
                        KTApp.unblock('#pi_card');
                    }
                });
            }else{
                $("#balance_amount").html('₱ 0.00');
                $("#balance_percentage").html('0%');
                $("#balance_progress").css('width:0%');
                $("#utilize_amount").html('₱ 0.00');
                $("#utilize_percentage").html('0%');
                $("#utilize_progress").css('width:0%');
                $("#cart_count_badge").html('0');
            }
        }

    function getAllPPMPItemsList(_page,_q){
        var _url = "{{ route('get_all_ppmp_items_list') }}";
        var _data = {
            page :_page,
            sorted : sortedBy
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
        if($("#pi_ppmp_select option:selected").val() != ""){
            var _url = "{{ route('add_pi_ppmp_items') }}";
            var _data = {
                type: __type,
                id:__id,
                twapi : $("#pi_ppmp_select option:selected").val(),
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
                        fetchPIDetails();
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
    }
</script>
@endpush
