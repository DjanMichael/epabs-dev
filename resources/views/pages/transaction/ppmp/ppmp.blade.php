@extends('layouts.app')
@section('title','PPMP')
@section('content')

{{ $data["wfp_act_id"]  }}
<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
    <span class="label label-rounded label-danger mr-2" style="position:absolute;left:0;top:0;">12</span>
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
            <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/metronic/theme/html/demo12/dist/assets/media/svg/shapes/abstract-3.svg)">
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
                            <p class="font-weight-normal mb-0">Timeframe</p>
                            <div class="symbol-list d-flex flex-wrap">
                                <div class="symbol mr-3 mb-1">
                                    {{-- @if(count($data["ppmp_items"]) != 0)

                                    @if($data["ppmp_items"])<span class="symbol-label font-size-sm">JAN</span> @endif


                                    @endif --}}
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
                    <form>
                        <!--begin::Categories-->
                        <div class="form-group mb-11">
                            <label class="font-size-h3 font-weight-bolder text-dark mb-7">Categories</label>
                            <!--begin::Checkbox list-->
                            <div class="checkbox-list">
                                <label class="checkbox checkbox-lg mb-7">
                                    <input type="checkbox" name="electronics">
                                    <span></span>
                                    <div class="font-size-lg text-dark-75 font-weight-bold">Electronics</div>
                                    <div class="ml-auto text-muted font-weight-bold">28</div>
                                </label>
                                <label class="checkbox checkbox-lg mb-7">
                                    <input type="checkbox" name="sportsequipment">
                                    <span></span>
                                    <div class="font-size-lg text-dark-75 font-weight-bold">Sports Equipments</div>
                                    <div class="ml-auto text-muted font-weight-bold">307</div>
                                </label>
                                <label class="checkbox checkbox-lg mb-7">
                                    <input type="checkbox" name="appliances">
                                    <span></span>
                                    <div class="font-size-lg text-dark-75 font-weight-bold">Appliances</div>
                                    <div class="ml-auto text-muted font-weight-bold">54</div>
                                </label>
                                <label class="checkbox checkbox-lg mb-7">
                                    <input type="checkbox" name="appliances">
                                    <span></span>
                                    <div class="font-size-lg text-dark-75 font-weight-bold">Software Solutions</div>
                                    <div class="ml-auto text-muted font-weight-bold">762</div>
                                </label>
                                <label class="checkbox checkbox-lg">
                                    <input type="checkbox" name="appliances">
                                    <span></span>
                                    <div class="font-size-lg text-dark-75 font-weight-bold">Food &amp; Groceries</div>
                                    <div class="ml-auto text-muted font-weight-bold">95</div>
                                </label>
                            </div>
                            <!--end::Checkbox list-->
                        </div>
                        <!--end::Categories-->
                        <button type="submit" class="btn btn-primary font-weight-bolder mr-2 px-8">Reset</button>
                        <button type="reset" class="btn btn-clear font-weight-bolder text-muted px-8">Setup</button>
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
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">New Arrivals</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-primary font-weight-bolder font-size-sm">New Report</a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                            <thead>
                                <tr class="text-left">
                                    <th class="pl-0" style="width: 30px">
                                        <label class="checkbox checkbox-lg checkbox-inline mr-2">
                                            <input type="checkbox" value="1">
                                            <span></span>
                                        </label>
                                    </th>
                                    <th class="pl-0" style="min-width: 120px">Order id</th>
                                    <th style="min-width: 110px">Country</th>
                                    <th style="min-width: 110px">
                                        <span class="text-primary">Date</span>
                                        <span class="svg-icon svg-icon-sm svg-icon-primary">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Navigation/Down-2.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <rect fill="#000000" opacity="0.3" x="11" y="4" width="2" height="10" rx="1"></rect>
                                                    <path d="M6.70710678,19.7071068 C6.31658249,20.0976311 5.68341751,20.0976311 5.29289322,19.7071068 C4.90236893,19.3165825 4.90236893,18.6834175 5.29289322,18.2928932 L11.2928932,12.2928932 C11.6714722,11.9143143 12.2810586,11.9010687 12.6757246,12.2628459 L18.6757246,17.7628459 C19.0828436,18.1360383 19.1103465,18.7686056 18.7371541,19.1757246 C18.3639617,19.5828436 17.7313944,19.6103465 17.3242754,19.2371541 L12.0300757,14.3841378 L6.70710678,19.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 15.999999) scale(1, -1) translate(-12.000003, -15.999999)"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </th>
                                    <th style="min-width: 120px">Company</th>
                                    <th style="min-width: 120px">Status</th>
                                    <th class="pr-0 text-right" style="min-width: 160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pl-0 py-6">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            <input type="checkbox" value="1">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="pl-0">
                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">56037-XDER</a>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brasil</span>
                                        <span class="text-muted font-weight-bold">Code: BR</span>
                                    </td>
                                    <td>
                                        <span class="text-primary font-weight-bolder d-block font-size-lg">05/28/2020</span>
                                        <span class="text-muted font-weight-bold">Paid</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                                        <span class="text-muted font-weight-bold">Web, UI/UX Design</span>
                                    </td>
                                    <td>
                                        <span class="label label-lg label-light-primary label-inline">Approved</span>
                                    </td>
                                    <td class="pr-0 text-right">
                                        <button type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" >
                                            <i class="   fas fa-plus text-primary"></i>
                                        </button>
                                    </td>
                                </tr>

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
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        /*
            EVENTS
        */
        $("#pi_ppmp_select").on('change',function(e){
            var _url ="{{ route('get_ppmp_details') }}";
            var _data = { twapi_id : $(this).val() };

            if($(this).val() != ''){
                $.ajax({
                    method:"GET",
                    url: _url,
                    data:_data,
                    success:function(data){
                        // alert(data);
                        $("#balance_amount").html('₱ ' + data.cost.balance);
                        $("#balance_percentage").html(data.cost.balance_amount_p + '%');
                        $("#balance_progress").css('width:' + data.cost.balance_amount_p + '%');
                        $("#utilize_amount").html('₱ ' + data.cost.ppmp_amount);
                        $("#utilize_percentage").html(data.cost.ppmp_amount_p + '%');
                        $("#utilize_progress").css('width:' + data.cost.ppmp_amount_p + '%');

                    }
                });
            }
        });

        /*
            FUNCTIONS
        */

        function fetchPerIndicatorActivityCart(twapi_id){

        }
    });
</script>
@endpush
