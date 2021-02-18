@extends('layouts.app')
@section('title','DASHBOARD')
@section('breadcrumb')
<li class="breadcrumb-item">
    <span class="text-muted">{{ Auth::user()->role->roles }}</span>
</li>
@endsection

@section('content')
@if(Auth::user()->role->roles == "PROGRAM COORDINATOR")
<!-- begin:dashboard budget -->
{{-- <div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('dist/assets/media/svg/shapes/abstract-1.svg') }})">
            <div class="card-body row">
                <div class="col-12 col-md-4">
                    <div class="p-5">
                        <div class="col-12 d-flex align-items-center">
                            <div class="symbol-list d-flex flex-wrap">
                                <div class="symbol symbol-60 mr-3">
                                    <span class="symbol-label font-size-h6">{{ strtoupper(Str::substr(Str::words( $data["user_info"] != null ? $data["user_info"][0]["name"] : 'NO USER INFO',2),0,1)) }}</span>
                                </div>
                            </div>
                            <div class="d-flex flex-column mr-auto">
                                <span class="card-title text-hover-primary fnt-weight-bolder font-size-h5 text-dark mb-1">{{ $data["user_info"] != null ? $data["user_info"][0]["name"] : 'NO USER INFO' }}</span>
                                <span class="text-muted font-weight-bold">{{ $data["user_info"] == null ? 'NO DESIGNATION' : $data["user_info"][0]["designation"] }}</span>
                            </div>
                        </div>
                        <div class="separator separator-dashed separator-border-2 separator-secondary mb-3 mt-6"></div>
                        <span style="font-size:15px;font-weight:bold;">{{ $data["user_info"] != null ? $data["user_info"][0]["program_name"] : 'NO USER INFO' }}</span>
                        <h5>{{ $data["user_info"] != null ? $data["user_info"][0]["division"] : 'NO USER INFO'}} <span class="label label-dot label-dark mr-3 ml-3"></span> {{ $data["user_info"] != null ? $data["user_info"][0]["section"] : 'NO USER INFO' }}</h5>
                    </div>
                </div>
                <div class="col-12 col-md-8 h-100">
                    <div class="row h-100" >
                        <div class="col-12 col-md-4 mb-md-0 mb-3">
                            <div class="p-5 bg-secondary rounded">
                                <h1>₱ {{ number_format(($data["budget_allocation"] != null ? $data["budget_allocation"][0]["yearly_budget"] : 0),2) }}</h1>
                                <span>Total Budget Allocation</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-md-0 mb-3">
                            <div class="p-5 bg-secondary rounded">
                                <h1>₱ {{ number_format(($data["budget_allocation"] != null ? $data["budget_allocation"][0]["yearly_utilized"] : 0),2) }}</h1>
                                <span>Total Budget Utilization</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-md-0 mb-3">
                            <div class="p-5 bg-secondary rounded">
                                <h1>₱ {{ number_format(($data["budget_allocation"] != null ? $data["budget_allocation"][0]["yearly_budget"] : 0) -  ($data["budget_allocation"] != null ? $data["budget_allocation"][0]["yearly_utilized"] : 0) ,2) }}</h1>
                                <span>Total Budget Balance</span>
                            </div>
                        </div>
                        <div class="col-12 mt-2  h-100">
                            <div class="p-5 bg-info text-light rounded">
                              <div class="row">
                                <?php $total_budget = 0; ?>

                                @if($data["budget_allocation"]  != null)
                                    @foreach($data["budget_allocation"] as $row)
                                        <?php
                                            $total_budget += $row["program_budget"];
                                        ?>
                                        <div class="col-12">
                                            <span>{{ $row["budget_item"] }}</span>
                                            <span style="float:right;">₱ {{ number_format($row["program_budget"],2) }}</span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">NO ALLOCATED BUDGET</div>
                                @endif
                                  <div class="separator separator-dashed separator-border-2 separator-primary mb-3 mt-6"></div>
                                  <div class="col-12">
                                    <span>TOTAL</span>
                                    <span style="float:right;font-weight:bold;">₱ {{ number_format($total_budget,2) }}</span>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> --}}
<!-- end:dashboard budget -->


<!--- NEW STYLE -->
<div class="card card-custom gutter-b">
<div class="card-body">
    <div class="d-flex">
        <!--begin: Pic-->
        <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
            <div class="symbol symbol-50 symbol-lg-120">
              <span class="symbol-label font-size-h1">{{ strtoupper(Str::substr(Str::words( $data["user_info"] != null ? $data["user_info"][0]["name"] : 'NO USER INFO',2),0,1)) }}</span>
            </div>
            <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none ">
                <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
            </div>
        </div>
        <!--end: Pic-->
        <!--begin: Info-->
        <div class="flex-grow-1">
            <!--begin: Title-->
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="mr-3">
                    <!--begin::Name-->
                    <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $data["user_info"] != null ? $data["user_info"][0]["name"] : 'NO USER INFO' }} /  {{ $data["user_info"] != null ? $data["user_info"][0]["program_name"] : 'NO USER INFO'}}
                    <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                    <!--end::Name-->
                    <!--begin::Contacts-->
                    <div class="d-flex flex-wrap my-2">
                        <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Communication/Mail-notification.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                    <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>{{ Auth::user()->email }} </a>
                        <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/General/Lock.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <mask fill="white">
                                        <use xlink:href="#path-1"></use>
                                    </mask>
                                    <g></g>
                                    <path d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z" fill="#000000"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->

                        </span>{{ $data["user_info"] == null ? 'NO DESIGNATION' : $data["user_info"][0]["designation"] }}</a>
                        <a href="#" class="text-muted text-hover-primary font-weight-bold">
                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Map/Marker2.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span> {{ $data["user_info"] != null ? $data["user_info"][0]["division"] : 'NO USER INFO'}} |  {{ $data["user_info"] != null ? $data["user_info"][0]["section"] : 'NO USER INFO'}}</a>
                    </div>
                    <!--end::Contacts-->
                </div>
                <div class="my-lg-0 my-1">
                    <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">Registered <b>{{ Carbon\Carbon::parse(Auth::user()->created_at)->diffForHumans() }}</b></span>
                    {{-- <a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">Say Hi!</a> --}}
                </div>
            </div>
            <!--end: Title-->
           <div class="col-12 mt-2  h-100">
                            <div class="p-5 bg-info text-light rounded">
                              <div class="row">
                                <?php $total_budget = 0; ?>

                                @if($data["budget_allocation"]  != null)
                                    @foreach($data["budget_allocation"] as $row)
                                        <?php
                                            $total_budget += $row["program_budget"];
                                        ?>
                                        <div class="col-12">
                                            <span>{{ $row["budget_item"] }}</span>
                                            <span style="float:right;">₱ {{ number_format($row["program_budget"],2) }}</span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">NO ALLOCATED BUDGET</div>
                                @endif
                                  <div class="separator separator-dashed separator-border-2 separator-primary mb-3 mt-6"></div>
                                  <div class="col-12">
                                    <span>TOTAL</span>
                                    <span style="float:right;font-weight:bold;">₱ {{ number_format($total_budget,2) }}</span>
                                </div>
                              </div>
                            </div>
                        </div>
        </div>
        <!--end: Info-->
    </div>
    <div class="separator separator-solid my-7"></div>
    <!--begin: Items-->
    <div class="d-flex align-items-center flex-wrap">
        <!--begin: Item-->
        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
            <span class="mr-4">
                <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
            </span>
            <div class="d-flex flex-column text-dark-75">
                <span class="font-weight-bolder font-size-sm">Total Budget Allocation</span>
                <span class="font-weight-bolder font-size-h5">
                <span class="text-dark-50 font-weight-bold">₱</span> {{ number_format(($data["budget_allocation"] != null ? $data["budget_allocation"][0]["yearly_budget"] : 0),2) }}</span>
            </div>
        </div>
        <!--end: Item-->
        <!--begin: Item-->
        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
            <span class="mr-4">
                <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
            </span>

            <div class="d-flex flex-column text-dark-75">
                <span class="font-weight-bolder font-size-sm">Total Budget Utilization</span>
                <span class="font-weight-bolder font-size-h5">
                <span class="text-dark-50 font-weight-bold">₱</span> {{ number_format(($data["budget_allocation"] != null ? collect($data["budget_allocation"])->sum('utilized_pi') : 0),2) }}</span>
            </div>
        </div>
        <!--end: Item-->
        <!--begin: Item-->
        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
            <span class="mr-4">
                <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
            </span>
            <div class="d-flex flex-column text-dark-75">
                <span class="font-weight-bolder font-size-sm">Balance</span>
                <span class="font-weight-bolder font-size-h5">
                <span class="text-dark-50 font-weight-bold">₱</span> {{ number_format(($data["budget_allocation"] != null ? $data["budget_allocation"][0]["yearly_budget"] : 0) -  ($data["budget_allocation"] != null ? collect($data["budget_allocation"])->sum('utilized_pi') : 0) ,2) }}</span>
            </div>
        </div>
        <!--end: Item-->
    </div>
    <!--begin: Items-->
</div>
</div>
@endif

<!-- begin:dashboard planning -->
@if(Auth::user()->role->roles == "BUDGET" || Auth::user()->role->roles == "PLANNING" || Auth::user()->role->roles == "ADMINISTRATOR" )
<div class="row">
    <div class="col-12 col-md-6">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                    <h1> WFP STATUS {{ $data["year"]->year ?? 'NO YEAR SELECTED' }}</h1>
                    <div id="wfp_chart"></div>
                    <div class="separator separator-solid my-7"></div>
                        <div class="d-flex align-items-center flex-wrap">
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-notes icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">TOTAL No. of WFP</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold" id="wfp_total">0</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-clock icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">NOT SUBMITTED</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold" id="wfp_notsubmitted">0</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-list icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">SUBMITTED</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold" id="wfp_submitted">0</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-like icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">APPROVED</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold" id="wfp_approved">0</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-interface-4 icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">REVISION</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold" id="wfp_revision">0</span>
                                </div>
                            </div>
                            <!--end: Item-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <h1>PPMP STATUS {{ $data["year"]->year ?? 'NO YEAR SELECTED' }}</h1>
                        <div id="ppmp_chart"></div>
                        <div class="separator separator-solid my-7"></div>
                        <div class="d-flex align-items-center flex-wrap">
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-notes icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">TOTAL No. of PPMP</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold" id="ppmp_total">0</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-clock icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">NOT SUBMITTED</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold" id="ppmp_notsubmitted">0</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-list icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">SUBMITTED</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold" id="ppmp_submitted">0</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-like icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">APPROVED</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold" id="ppmp_approved">0</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                <span class="mr-4">
                                    <i class="flaticon-interface-4 icon-2x text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">REVISION</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold" id="ppmp_revision">0</span>
                                </div>
                            </div>
                            <!--end: Item-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- end:dashboard planning -->
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-custom gutter-b">
            <div class="card-header">
             <div class="card-title">
              <h3 class="card-label">
               WFP Status
               <small>{{ $data["year"]->year ?? 'NO YEAR SELECTED' }}</small>
              </h3>
             </div>
            </div>
            <div class="card-body" id="user_table_body">
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-8 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                        <select class="form-control" id="wfp_status">
                                            <option value="">ALL</option>
                                            <option value="4">Approved</option>
                                            <option value="5">Revision</option>
                                            <option value="6">Submitted</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-2 col-lg-3 col-xl-4 mt-5 mt-lg-0 text-right" >
                            <button class="btn btn-light-primary px-6 font-weight-bold" id="btn_search_user">Search</button>
                        </div>
                    </div>
                </div>


                   <div class="card card-custom card-stretch gutter-b">

                    <!--begin::Body-->
                    <div class="card-body pt-2 pb-0 mt-n3">
                        <div class="tab-content mt-5" id="myTabTables5">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_tab_pane_5_3" role="tabpanel" aria-labelledby="kt_tab_pane_5_3">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center">
                                        <thead class="py-5">
                                            <tr>
                                                <th class="p-0 " colspan="2">PROGRAM MANAGER</th>
                                                <th class="p-0 " >PROGRAM</th>
                                                <th class="p-0 text-center ">WFP CODE</th>
                                                <th class="p-0 text-center ">WFP STATUS</th>
                                                <th class="p-0  text-center ">PPMP STATUS</th>
                                                <th class="p-0 "></th>
                                            </tr>
                                        </thead>
                                        <tbody id="wfp_user_status_content">
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-12">
        <div class="card card-custom gutter-b">
            <div class="card-header">
             <div class="card-title">
              <h3 class="card-label">
               Event Logs
               <small>System Activity</small>
              </h3>
             </div>
            </div>
            <div class="card-body">
                <div class="timeline timeline-5 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 700px">
                    <div class="timeline-items "  id="event_logs">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
            <h1> BUDGET SUMMARY {{ $data["year"]->year ?? 'NO YEAR SELECTED' }}</h1>
            <br>
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center">
                    <thead class="py-5">
                        <tr >
                            <th class="p-0 min-w-200px">EXPENSE CLASS</th>
                            <th class="p-0 min-w-140px">No. of Activities</th>
                            <th class="p-0 min-w-110px text-center ">Cost</th>
                        </tr>
                    </thead>
                    <tbody id="budget_expense_class">
                        <tr>
                            <td>MAINTENANCE & OTHER OPERATING EXPENSES</td>
                            <td id="mooe_act_no"></td>
                            <td id="mooe_total" class="text-right"></td>
                        </tr>
                        <tr>
                            <td>CAPITAL OUTLAY</td>
                            <td id="co_act_no"></td>
                            <td id="co_total" class="text-right"></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td colspan="2" class="text-right" id="total_expense_class"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
            <h1> BUDGET SUMMARY FUNCTION CLASS {{ $data["year"]->year ?? 'NO YEAR SELECTED' }}</h1>
            <br>
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center">
                    <thead class="py-5">
                        <tr >
                            <th class="p-0 min-w-200px">FUNCTION CLASS</th>
                            <th class="p-0 min-w-140px">No. of Activities</th>
                            <th class="p-0 min-w-110px text-center ">Cost</th>
                        </tr>
                    </thead>
                    <tbody id="budget_expense_class">
                        <tr>
                            <td>STRATEGIC FUNCTION</td>
                            <td id="sf_no"></td>
                            <td id="sf_cost" class="text-right"></td>
                        </tr>
                        <tr>
                            <td>CORE FUNCTION</td>
                            <td id="cf_no"></td>
                            <td id="cf_cost" class="text-right"></td>
                        </tr>
                        <tr>
                            <td>SUPPORT FUNCTION</td>
                            <td id="spf_no"></td>
                            <td id="spf_cost" class="text-right"></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td colspan="2" class="text-right" id="total_function_class"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
            <h1> GENDER AND DEVELOPMENT {{ $data["year"]->year ?? 'NO YEAR SELECTED' }}</h1>
            <br>
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center">
                    <thead class="py-5">
                        <tr >
                            <th class="p-0 min-w-200px">GAD RELATED ACTIVITY</th>
                            <th class="p-0 min-w-140px">No. of Activities</th>
                            <th class="p-0 min-w-110px text-center ">Cost</th>
                        </tr>
                    </thead>
                    <tbody id="budget_expense_class">
                        <tr>
                            <td >YES</td>
                            <td id="yes_gad_act_no"></td>
                            <td id="total_gad_yes" class="text-right"></td>
                        </tr>
                        <tr>
                            <td>NO</td>
                            <td id="no_gad_act_no"></td>
                            <td id="total_gad_no" class="text-right"></td>
                        </tr>

                        <tr>
                            <td>Total</td>
                            <td colspan="2" class="text-right" id="GAD_total"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



@endif




<!--begin::Modal-->
<div id="kt_datatable_modal_2" class="modal fade" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content" style="min-height: 590px;">
			<div class="modal-header py-5">
				<h5 class="modal-title">
					Datatable
					<span class="d-block text-muted font-size-sm">Remote data source</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>

			<div class="modal-body">
				<!--begin: Search Form-->
                <!--begin::Search Form-->
<div class="mb-5">
	<div class="row align-items-center">
		<div class="col-lg-9 col-xl-8">
			<div class="row align-items-center">
				<div class="col-md-4 my-2 my-md-0">
					<div class="input-icon">
						<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query_3" />
						<span><i class="flaticon2-search-1 text-muted"></i></span>
					</div>
				</div>

                				<div class="col-md-4 my-2 my-md-0">
					<div class="d-flex align-items-center">
						<label class="mr-3 mb-0 d-none d-md-block">Status:</label>
						<select class="form-control" id="kt_datatable_search_status_3">
							<option value="">All</option>
							<option value="1">Pending</option>
							<option value="2">Delivered</option>
							<option value="3">Canceled</option>
							<option value="4">Success</option>
							<option value="5">Info</option>
							<option value="6">Danger</option>
						</select>
					</div>
				</div>
				<div class="col-md-4 my-2 my-md-0">
					<div class="d-flex align-items-center">
						<label class="mr-3 mb-0 d-none d-md-block">Type:</label>
						<select class="form-control" id="kt_datatable_search_type_3">
							<option value="">ALL</option>
							<option value="1">Online</option>
							<option value="2">Retail</option>
							<option value="3">Direct</option>
						</select>
					</div>
				</div>
                			</div>
		</div>
		<div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
			<a href="#" class="btn btn-light-primary px-6 font-weight-bold">
				Search
			</a>
		</div>
	</div>
</div>
<!--end::Search Form-->
				<!--end: Search Form-->

				<!--begin: Datatable-->
				<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_2"></div>
				<!--end: Datatable-->
			</div>
		</div>
	</div>
</div>
<!--end::Modal-->


{{-- @include('components.global.rside-drawer-user') --}}
@endsection
@push('scripts')
<script src="{{ asset('dist/assets/js/pages/features/miscellaneous/blockui.js') }}"></script>
<script>
var nf = new Intl.NumberFormat();
const primary = "#6993FF"
  , success = "#1BC5BD"
  , info = "#8950FC"
  , warning = "#FFA800"
  , danger = "#F64E60";
        $(document).ready(function(){

            function fetchStatusData(){
            var _url ="{{ route('get_dstat_data2') }}";
            $.ajax({
                method:"GET",
                url: _url,
                success:function(data){
                    // data.wfp
                    // submited,approved,revision,not submitted
                    var options = {
                        series: [
                                data.wfp.wfp_submitted,
                                data.wfp.wfp_approved,
                                data.wfp.wfp_revision,
                                data.wfp.wfp_not_submitted
                            ],
                        chart: {
                            width: 470,
                            type: "pie"
                        },
                        labels: ["SUBMITTED", "APPROVED", "REVISION", "NOT SUBMITTED"],
                        responsive: [
                        {
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 300
                                },
                                legend: {
                                    position: "bottom"
                                }
                            }
                        },
                        {
                            breakpoint: 320,
                            options: {
                                chart: {
                                    width: 100
                                },
                                legend: {
                                    position: "bottom"
                                }
                            }
                        }
                        ],
                        colors: [primary, success, warning, danger]
                    }

                    var options2 = {
                        series: [
                                data.ppmp.ppmp_submitted,
                                data.ppmp.ppmp_approved,
                                data.ppmp.ppmp_revision,
                                data.ppmp.ppmp_not_submitted
                        ],
                        chart: {
                            width:470,
                            type: "pie"
                        },
                        labels: ["SUBMITTED", "APPROVED", "REVISION", "NOT SUBMITTED"],
                        responsive: [
                        {
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 300
                                },
                                legend: {
                                    position: "bottom"
                                }
                            }
                        },
                        {
                            breakpoint: 320,
                            options: {
                                chart: {
                                    width: 100
                                },
                                legend: {
                                    position: "bottom"
                                }
                            }
                        }
                        ],
                        colors: [primary, success, warning, danger]
                    }

                    var chart = new ApexCharts(document.querySelector('#wfp_chart'), options);
                    chart.render();

                    $("#wfp_submitted").html(data.wfp.wfp_submitted);
                    $("#wfp_approved").html(data.wfp.wfp_approved);
                    $("#wfp_revision").html(data.wfp.wfp_revision);
                    $("#wfp_notsubmitted").html(data.wfp.wfp_not_submitted);
                    $("#wfp_total").html(data.wfp.total_count.wfp_count);

                    var chart2 = new ApexCharts(document.querySelector('#ppmp_chart'), options2);
                    chart2.render();


                    $("#ppmp_submitted").html(data.ppmp.ppmp_submitted);
                    $("#ppmp_approved").html(data.ppmp.ppmp_approved);
                    $("#ppmp_revision").html(data.ppmp.ppmp_revision);
                    $("#ppmp_notsubmitted").html(data.ppmp.ppmp_not_submitted);
                    $("#ppmp_total").html(data.ppmp.total_count.ppmp_count);

                    $("#mooe_act_no").html(data.budget.expense_class.mooe.act_no);
                    $("#mooe_total").html( '₱ ' + nf.format(data.budget.expense_class.mooe.amount));

                    $("#co_act_no").html(data.budget.expense_class.co.act_no);
                    $("#co_total").html( '₱ ' + nf.format(data.budget.expense_class.co.amount));

                    $("#total_expense_class").html('₱ ' + nf.format(data.budget.expense_class.mooe.amount + data.budget.expense_class.co.amount))

                    if (data.budget.function_class.strategic !=0 ){
                        $("#sf_no").html(data.budget.function_class.strategic.no_act);
                        $("#sf_cost").html('₱ ' + nf.format(data.budget.function_class.strategic.total));
                    }else{
                        $("#sf_no").html(0);
                        $("#sf_cost").html('₱ 0');
                    }

                    if (data.budget.function_class.core != 0){
                        $("#cf_no").html(data.budget.function_class.core.no_act);
                        $("#cf_cost").html('₱ ' + nf.format(data.budget.function_class.core.total));

                    }else{
                        $("#cf_no").html(0);
                        $("#cf_cost").html('₱ 0');
                    }

                    if (data.budget.function_class.support != 0){
                        $("#spf_no").html(data.budget.function_class.support.no_act);
                        $("#spf_cost").html('₱ ' + nf.format(data.budget.function_class.support.total));
                    }else{
                        $("#spf_no").html(0);
                        $("#spf_cost").html('₱ 0');
                    }

                    $("#total_function_class").html('₱ ' + nf.format(Number(data.budget.function_class.strategic.total ?? 0) + Number(data.budget.function_class.core.total ?? 0) + Number(data.budget.function_class.support.total ?? 0)))


                    $("#no_gad_act_no").html(data.budget.GAD.NO.act_no);
                    $("#yes_gad_act_no").html(data.budget.GAD.YES.act_no);
                    $("#total_gad_yes").html('₱ ' + nf.format(Number(data.budget.GAD.YES.total)));
                    $("#total_gad_no").html('₱ ' + nf.format(Number(data.budget.GAD.NO.total)));
                    $("#GAD_total").html('₱ ' + nf.format(Number( data.budget.GAD.NO.total) + Number(data.budget.GAD.YES.total)));
                },error:function(err){
                    console.log(err);
                }
            });
        }






            //remove parameter for duplicate events for isMobile
            setTimeout(function(){
                var newURL = location.href.split("?")[0];
                window.history.pushState('object', document.title, newURL);
                fetchAllSystemLogs();
                fetchhUserWfpStatusList(null,$("#search_query").val(),$("#wfp_status option:selected").text());
                fetchStatusData();
            },1500)


        });



        function fetchhUserWfpStatusList(_page = null, _q = null,status = null){
            var _url = "{{ route('get_program_wfp_status_list') }}";
            $.ajax({
                method:"GET",
                url : _url,
                data: { q : _q, status : status ,page:_page},
                beforeSend:function(){
                    KTApp.block('#user_table_body', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Loading..'
                    });
                },
                success:function(data){
                    document.getElementById('wfp_user_status_content').innerHTML = data;
                },
                complete:function(){
                    $("#pagination_user_list .pagination a").on('click',function(e){
                        e.preventDefault();
                        fetchhUserWfpStatusList($(this).attr('href').split('page=')[1], $("#search_query").val(),$("#wfp_status option:selected").text())
                    });
                    KTApp.unblock('#user_table_body');
                }
            })
        }


        function fetchAllSystemLogs(){
            var _url = "{{ route('get_system_logs') }}";
            $.ajax({
                method:"GET",
                url:_url ,
                beforeSend:function(){
                    KTApp.block('#event_logs', {
                            overlayColor: '#000000',
                            state: 'primary',
                            message: '<i class="flaticon2-reload-1 mr-2" ></i>Initilizing Logs'
                        });
                },
                success:function(data){
                    document.getElementById('event_logs').innerHTML = data;
                    KTApp.unblock('#event_logs');
                }
            })
        }

        $("#btn_search_user").on('click',function(e){
            e.preventDefault();
            fetchhUserWfpStatusList(null, $("#search_query").val(),$("#wfp_status option:selected").text());
        });


</script>
@endpush
