<!--begin::Card-->
<div class="row">
    <div class="col-md-12 col-12">
        {{-- <div class="card card-custom gutter-b" style="background-position: right top; background-size: 40% auto; background-image: url({{ asset('dist/assets/media/svg/shapes/abstract-1.svg') }})"> --}}
        <div class="card card-custom gutter-b">
                <div class="card-header">
                <div class="card-title">
                    <span class="card-icon"><i class="@yield('panel-icon') text-primary"></i></span>
                    <h3 class="card-label">@yield('panel-title')</h3>
                </div>
                <div class="card-toolbar">
                    <!-- Button trigger modal-->
                    <!--begin::Button-->
                    <button id="btn_add" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <circle fill="#000000" cx="9" cy="15" r="6"/>
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                        </g>
                        </svg><!--end::Svg Icon--></span>	New Record
                    </button>
                    <!--end::Button-->

                    @section('modal-size', 'modal-lg')
                    @include('pages.reference.component.modal')

                    @section('modal-secondary-size', 'modal-lg')
                    @include('pages.reference.component.secondary_modal')

                    @section('modal-inner-size', '')
                    @include('pages.reference.component.inner_modal')
                </div>
            </div>
            <div class="card-body" id="user_table_body">
                <!--begin::Search Form-->
                <div class="mb-7 search-form">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-8 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="query_search" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>

                                @isset ($checker )
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Sort by:</label>
                                            <select class="form-control" id="sort_by_fund_source">
                                                <option value="">All</option>
                                                <option value="GAA">GAA</option>
                                                <option value="SAA">SAA</option>
                                            </select>
                                        </div>
                                    </div>
                                @endisset
                            

                            </div>
                        </div>
                        <div class="col-md-2 col-lg-3 col-xl-4 mt-5 mt-lg-0 text-right" >
                            <button class="btn btn-light-primary px-6 font-weight-bold" id="btn_search">Search</button>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body pt-2 pb-0 mt-n3">
                        <div class="table-responsive" id="table_populate">
                            <div id="table_content"></div>
                        </div>
                        <div id="content"></div>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Card-->
