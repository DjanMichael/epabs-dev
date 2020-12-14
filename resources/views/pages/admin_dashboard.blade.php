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
            <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
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
                <span class="text-dark-50 font-weight-bold">₱</span> {{ number_format(($data["budget_allocation"] != null ? $data["budget_allocation"][0]["yearly_pi_utilized"] : 0),2) }}</span>
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
                <span class="text-dark-50 font-weight-bold">₱</span> {{ number_format(($data["budget_allocation"] != null ? $data["budget_allocation"][0]["yearly_budget"] : 0) -  ($data["budget_allocation"] != null ? $data["budget_allocation"][0]["yearly_pi_utilized"] : 0) ,2) }}</span>
            </div>
        </div>
        <!--end: Item-->
    </div>
    <!--begin: Items-->
</div>
</div>
@endif
<!-- begin:dashboard planning -->
@if(Auth::user()->role->roles == "BUDGET" || Auth::user()->role->roles == "PLANNING" || Auth::user()->role->roles == "ADMINISTRATOR")
<div class="row">
    <div class="col-md-3 col-12">
        <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('dist/assets/media/svg/shapes/abstract-1.svg') }})">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-2x svg-icon-info">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Communication/Mail-opened.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
                            <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">
                    {{$data["wfp_not_submitted"]}}
                </span>
                <span class="font-weight-bold text-muted font-size-sm">NOT SUBMITTED</span>
            </div>
            <!--end::Body-->
        </div>

    </div>
    <div class="col-md-3 col-12">
        <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('dist/assets/media/svg/shapes/abstract-1.svg') }})">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-2x svg-icon-info">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Communication/Mail-opened.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
                            <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">
                    {{$data["wfp_submitted"]}}
                </span>
                <span class="font-weight-bold text-muted font-size-sm">SUBMITTED</span>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-md-3 col-12">
        <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('dist/assets/media/svg/shapes/abstract-1.svg') }})">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-2x svg-icon-info">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Communication/Mail-opened.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
                            <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">
                    {{$data["wfp_approved"]}}
                </span>
                <span class="font-weight-bold text-muted font-size-sm">APPROVED</span>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-md-3 col-12">
        <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('dist/assets/media/svg/shapes/abstract-1.svg') }})">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-2x svg-icon-info">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Communication/Mail-opened.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
                            <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">
                    {{$data["wfp_revision"]}}
                </span>
                <span class="font-weight-bold text-muted font-size-sm">REVISION</span>
            </div>
            <!--end::Body-->
        </div>
    </div>
</div>
<!-- end:dashboard planning -->
<div class="row">
    <div class="col-md-8 col-12">
        <div class="card card-custom gutter-b">
            <div class="card-header">
             <div class="card-title">
              <h3 class="card-label">
               WFP Status
               <small></small>
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
                                {{-- <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                        <select class="form-control" id="kt_datatable_search_type">
                                            <option value="">All</option>
                                            <option value="1">Online</option>
                                            <option value="2">Retail</option>
                                            <option value="3">Direct</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-3 col-xl-4 mt-5 mt-lg-0 text-right" >
                            <button class="btn btn-light-primary px-6 font-weight-bold" id="btn_search_user">Search</button>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->
                <!--end: Search Form-->
                {{-- <div class="table-responsive">
                   <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Last Login</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pt-10">1</td>
                                <td>
                                    <div class="btn btn-light-success d-inline-flex align-items-center btn-lg mr-5">
                                        <span class="symbol symbol-40">
                                            <img alt="Pic" src="{{ asset('dist/assets/media/users/300_25.jpg') }}"/>
                                        </span>
                                        <div class="d-flex flex-column text-left pl-3">
                                            <span class="text-dark-75 font-weight-bold font-size-sm">Sean</span>
                                            <span class="font-weight-bolder font-size-sm">Program Manager</span>
                                        </div>

                                    </div>
                                </td>
                                <td class="pt-10">
                                    <div class="d-flex flex-column text-left pl-3">
                                    5 hours ago
                                    </div>
                                </td>
                                <td  class="pt-10">
                                    <span class="label pulse pulse-warning mr-0 bg-transparent">
                                        <span class="position-relative"><span class="label label-dot label-warning label-lg"></span></span>
                                        <span class="pulse-ring"></span>
                                    </span>
                                    <span class="font-size-sm pl-0 font-weight-bolder">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-10">2</td>
                                <td>
                                    <div class="btn btn-light-success d-inline-flex align-items-center btn-lg mr-5">
                                        <span class="symbol symbol-40">
                                            <img alt="Pic" src="{{ asset('dist/assets/media/users/300_25.jpg') }}"/>
                                        </span>
                                        <div class="d-flex flex-column text-left pl-3">
                                            <span class="text-dark-75 font-weight-bold font-size-sm">Sean</span>
                                            <span class="font-weight-bolder font-size-sm">Program Manager</span>
                                        </div>

                                    </div>
                                </td>
                                <td class="pt-10">
                                    <div class="d-flex flex-column text-left pl-3">
                                    5 hours ago
                                    </div>
                                </td>
                                <td  class="pt-10">
                                    <span class="label pulse pulse-info mr-0 bg-transparent">
                                        <span class="position-relative"><span class="label label-dot label-info label-lg"></span></span>
                                        <span class="pulse-ring"></span>
                                    </span>
                                    <span class="font-size-sm pl-0 font-weight-bolder">Offline</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-10">1</td>
                                <td>
                                    <div class="btn btn-light-success d-inline-flex align-items-center btn-lg mr-5">
                                        <span class="symbol symbol-40">
                                            <img alt="Pic" src="{{ asset('dist/assets/media/users/300_25.jpg') }}"/>
                                        </span>
                                        <div class="d-flex flex-column text-left pl-3">
                                            <span class="text-dark-75 font-weight-bold font-size-sm">Sean</span>
                                            <span class="font-weight-bolder font-size-sm">Program Manager</span>
                                        </div>

                                    </div>
                                </td>
                                <td class="pt-10">
                                    <div class="d-flex flex-column text-left pl-3">
                                    5 hours ago
                                    </div>
                                </td>
                                <td  class="pt-10">
                                    <span class="label pulse pulse-danger mr-0 bg-transparent">
                                        <span class="position-relative"><span class="label label-dot label-danger label-lg"></span></span>
                                        <span class="pulse-ring"></span>
                                    </span>
                                    <span class="font-size-sm pl-0 font-weight-bolder">InActive</span>
                                </td>
                            </tr>
                        </tbody>
                   </table> --}}

                   <div class="card card-custom card-stretch gutter-b">
                    {{-- <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">New Arrivals</span>
                            <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                        </h3>
                        <div class="card-toolbar">
                            <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                <li class="nav-item">
                                    <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_5_1">Month</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_5_2">Week</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_5_3">Day</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end::Header--> --}}
                    <!--begin::Body-->
                    <div class="card-body pt-2 pb-0 mt-n3">
                        <div class="tab-content mt-5" id="myTabTables5">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_tab_pane_5_3" role="tabpanel" aria-labelledby="kt_tab_pane_5_3">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center">
                                        <thead class="py-5">
                                            <tr >
                                                <th class="p-0 min-w-200px" colspan="2">PROGRAM MANAGER</th>
                                                <th class="p-0 min-w-140px">PROGRAM</th>
                                                <th class="p-0 min-w-110px">STATUS</th>
                                                <th class="p-0 min-w-50px"></th>
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
    <div class="col-md-4 col-12">
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
                <div class="timeline timeline-5 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 300px">
                    <div class="timeline-items "  id="event_logs">
                    </div>
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

        $(document).ready(function(){
            //remove parameter for duplicate events for isMobile
            setTimeout(function(){
                var newURL = location.href.split("?")[0];
                window.history.pushState('object', document.title, newURL);
                fetchAllSystemLogs();
                fetchhUserWfpStatusList(null,$("#search_query").val(),$("#wfp_status option:selected").text());
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
