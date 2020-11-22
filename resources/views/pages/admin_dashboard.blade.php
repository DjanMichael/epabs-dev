@extends('layouts.app')
@section('title','DASHBOARD')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="" class="text-muted">Features</a>
</li>
<li class="breadcrumb-item">
    <a href="" class="text-muted">Icons</a>
</li>
<li class="breadcrumb-item">
    <a href="" class="text-muted">Flaticon</a>
</li>
@endsection

@section('content')
<!-- begin:dashboard budget -->
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('dist/assets/media/svg/shapes/abstract-1.svg') }})">
            <!--begin::Body-->
            <div class="card-body row">
                <div class="col-12 col-md-4">
                    <div class="p-5">
                        <div class="col-12 d-flex align-items-center">
                            <div class="symbol-list d-flex flex-wrap">
                                <div class="symbol symbol-60 mr-3">
                                    <span class="symbol-label font-size-h6">{{ strtoupper(Str::substr(Str::words( $data["user_info"] != null ? $data["user_info"][0]["name"] : 'NO USER INFO',2),0,1)) }}</span>
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="d-flex flex-column mr-auto">
                                <!--begin: Title-->
                                <span class="card-title text-hover-primary fnt-weight-bolder font-size-h5 text-dark mb-1">{{ $data["user_info"] != null ? $data["user_info"][0]["name"] : 'NO USER INFO' }}</span>
                                <span class="text-muted font-weight-bold">{{ $data["user_info"] == null ? 'NO DESIGNATION' : $data["user_info"][0]["designation"] }}</span>
                                {{-- <span class="label label-inline font-weight-bolder mr-2" >{{ $row["division"] . ' - ' .  $row["section"]  }}</span> --}}
                                <!--end::Title-->
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
                        {{-- {{dd($data)}} --}}
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
            <!--end::Body-->
        </div>

    </div>
</div>
<!-- end:dashboard budget -->

<!-- begin:dashboard planning -->
<div class="row">
    <div class="col-md-4 col-12">
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
                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">1</span>
                <span class="font-weight-bold text-muted font-size-sm">SUBMITTED</span>
            </div>
            <!--end::Body-->
        </div>

    </div>
    <div class="col-md-4 col-12">
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
                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">5</span>
                <span class="font-weight-bold text-muted font-size-sm">REVISION</span>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <div class="col-md-4 col-12">
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
                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">33</span>
                <span class="font-weight-bold text-muted font-size-sm">APPROVED</span>
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
                                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                        <select class="form-control" id="status">
                                            <option value="">All</option>
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
                                    <table class="table table-borderless table-vertical-center">
                                        <thead>
                                            <tr>
                                                <th class="p-0 w-50px"></th>
                                                <th class="p-0 min-w-150px"></th>
                                                <th class="p-0 min-w-140px"></th>
                                                <th class="p-0 min-w-110px"></th>
                                                <th class="p-0 min-w-50px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="py-5 pl-0">
                                                    <div class="symbol symbol-50 symbol-light mr-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset('dist/assets/media/users/300_25.jpg') }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Top Authors</a>
                                                    <span class="text-muted font-weight-bold d-block">Successful Fellas</span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-muted font-weight-500">ReactJs, HTML</span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="label label-lg label-light-primary label-inline">Approved</span>
                                                </td>
                                                <td class="text-right pr-0">
                                                    <a href="#" class="btn btn-icon btn-light btn-sm">
                                                        <span class="svg-icon svg-icon-md svg-icon-success">
                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0 py-5">
                                                    <div class="symbol symbol-50 symbol-light mr-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset('dist/assets/media/users/300_25.jpg') }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Popular Authors</a>
                                                    <span class="text-muted font-weight-bold d-block">Most Successful</span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-muted font-weight-500">Python, MySQL</span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                </td>
                                                <td class="text-right pr-0">
                                                    <a href="#" class="btn btn-icon btn-light btn-sm">
                                                        <span class="svg-icon svg-icon-md svg-icon-success">
                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-5 pl-0">
                                                    <div class="symbol symbol-50 symbol-light mr-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset('dist/assets/media/users/300_25.jpg') }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">New Users</a>
                                                    <span class="text-muted font-weight-bold d-block">Awesome Users</span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-muted font-weight-500">Laravel,Metronic</span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="label label-lg label-light-success label-inline">Success</span>
                                                </td>
                                                <td class="text-right pr-0">
                                                    <a href="#" class="btn btn-icon btn-light btn-sm">
                                                        <span class="svg-icon svg-icon-md svg-icon-success">
                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-5 pl-0">
                                                    <div class="symbol symbol-50 symbol-light mr-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset('dist/assets/media/users/300_25.jpg') }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Active Customers</a>
                                                    <span class="text-muted font-weight-bold d-block">Best Customers</span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-muted font-weight-500">AngularJS, C#</span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="label label-lg label-light-danger label-inline">Rejectedasd</span>
                                                </td>
                                                <td class="text-right pr-0">
                                                    <a href="#!" class="btn btn-icon btn-light btn-sm" onclick="wfp_drawer_open()">
                                                        <span class="svg-icon svg-icon-md svg-icon-success">
                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-5 pl-0">
                                                    <div class="symbol symbol-50 symbol-light mr-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset('dist/assets/media/users/300_25.jpg') }}" class="h-50 align-self-center" alt="">
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Bestseller Theme</a>
                                                    <span class="text-muted font-weight-bold d-block">Amazing Templates</span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-muted font-weight-500">ReactJS, Ruby</span>
                                                </td>
                                                <td class="text-right">
                                                    <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                </td>
                                                <td class="text-right pr-0">
                                                    <a href="#" class="btn btn-icon btn-light btn-sm">
                                                        <span class="svg-icon svg-icon-md svg-icon-success">
                                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                        </div>
                    </div>
                    <!--end::Body-->


                   <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex flex-wrap py-2 mr-3">
                        <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-double-arrow-back icon-xs"></i></a>
                        <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-arrow-back icon-xs"></i></a>

                        <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                        <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">23</a>
                        <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">24</a>
                        <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">25</a>
                        <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">26</a>

                        <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>

                        <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-arrow-next icon-xs"></i></a>
                        <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i class="ki ki-bold-double-arrow-next icon-xs"></i></a>
                    </div>
                    <div class="d-flex align-items-center py-3">
                        {{-- <div class="d-flex align-items-center">
                            <div class="mr-2 text-muted">Loading...</div>
                            <div class="spinner spinner-primary mr-10"></div>
                        </div> --}}

                        <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="text-muted">Displaying 10 of 230 records</span>
                    </div>
                </div>
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
                <div class="timeline timeline-5">
                    <div class="timeline-items scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 300px" id="event_logs">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>






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
							<option value="">All</option>
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
            //remove parameter for duplicate events
            setTimeout(function(){
                var newURL = location.href.split("?")[0];
                window.history.pushState('object', document.title, newURL);
                fetchAllSystemLogs();
            },1500)

        });

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

            KTApp.block('#user_table_body', {
                overlayColor: '#000000',
                state: 'primary',
                message: 'Processing...'
                });

            setTimeout(function() {
                KTApp.unblock('#user_table_body');
            }, 2000);
        });


</script>
@endpush
