@extends('layouts.app')
@section('title','SYSTEM MODULES')
@section('content')
<!-- begin::system modules-->
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5 bg-dark">
        <div class="d-flex align-items-center mb-1">
            <!--begin::Symbol-->
            <div class="symbol symbol-40 symbol-light-primary mr-5 mb-3">
                <span class="symbol-label">
                    <span class="svg-icon svg-icon-xl svg-icon-primary">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </span>
            </div>
            <!--end::Symbol-->
            <!--begin::Text-->
            <div class="d-flex flex-column font-weight-bold mb-3">
                <span class="text-light  mb-1 font-size-lg">System Modules</span>
                <span class="text-muted">List</span>
            </div>
            <!--end::Text-->
        </div>
        <!--end::Item-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-0 pl-0 pr-0">
        <!-- begin::title -->
       <div class="row  ml-0  mr-0 p-3 mb-10 bg-radial-gradient-dark">
           <div class="col-12 d-inline-flex">
                <div class="symbol symbol-20 symbol-light-primary mr-5">
                    <span class="symbol-label">
                        <span class="svg-icon svg-icon-md svg-icon-primary">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                    <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </span>
                </div>
                <div class="d-flex flex-column font-weight-bold text-left">
                    <a href="#" class="text-light mb-1 font-size-md">System Activity</a>
                </div>
           </div>
       </div>
       <!-- end::title -->
       <div class="row ml-1 mr-1">
           <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button onclick="window.location.href='{{ route('r_wfp') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="{{ route('r_wfp') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Work and Financial Plan</a>
                        <span class="text-muted">Create your WFP</span>
                    </div>
                    <!--end::Text-->
                </button>
            </div>
           </div>
           {{-- <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button onclick="window.location.href='{{ route('r_ppmp') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo12/dist/../src/media/svg/icons/Files/File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                        <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left" >
                        <a href="{{ route('r_ppmp') }}" class="text-dark text-hover-primary mb-1 font-size-lg float-left">PPMP</a>
                        <span class="text-muted">Create your PPMP</span>
                    </div>
                    <!--end::Text-->
                </button>
            </div>
           </div> --}}
           <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button onclick="window.location.href='{{ route('r_product_item') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="{{ route('r_product_item') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Product Item Module</a>
                        <span class="text-muted">Check Available Item</span>
                    </div>
                    <!--end::Text-->
                </button>
            </div>
           </div>
           <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button onclick="window.location.href='{{ route('r_budget_allocation') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="{{ route('r_budget_allocation') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Budget Allocation Management</a>
                        <span class="text-muted">Manage your Budget</span>
                    </div>
                    <!--end::Text-->
                </button>
            </div>
           </div>
           <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button onclick="window.location.href='{{ route('r_pr') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="{{ route('r_pr') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Purchase Request</a>
                        <span class="text-muted">Create your Purchase Request</span>
                    </div>
                    <!--end::Text-->
                </button>
            </div>
           </div>
           <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button onclick="window.location.href='{{ route('r_aop') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="{{ route('r_aop') }}" class="text-dark text-hover-primary mb-1 font-size-lg">AOP</a>
                        <span class="text-muted">Create your AOP</span>
                    </div>
                    <!--end::Text-->
                </button>
            </div>
           </div>
           <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button  onclick="window.location.href='{{ route('r_activity_calendar') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M10.9630156,7.5 L11.0475062,7.5 C11.3043819,7.5 11.5194647,7.69464724 11.5450248,7.95024814 L12,12.5 L15.2480695,14.3560397 C15.403857,14.4450611 15.5,14.6107328 15.5,14.7901613 L15.5,15 C15.5,15.2109164 15.3290185,15.3818979 15.1181021,15.3818979 C15.0841582,15.3818979 15.0503659,15.3773725 15.0176181,15.3684413 L10.3986612,14.1087258 C10.1672824,14.0456225 10.0132986,13.8271186 10.0316926,13.5879956 L10.4644883,7.96165175 C10.4845267,7.70115317 10.7017474,7.5 10.9630156,7.5 Z" fill="#000000"/>
                                        <path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="{{ route('r_activity_calendar') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Activity Calendar</a>
                        <span class="text-muted">View all scheduled activities</span>
                    </div>
                    <!--end::Text-->
                </button>
            </div>
           </div>
        </div>
     <!-- begin::title -->
     <div class="row  ml-0  mr-0 p-3 mb-10 bg-radial-gradient-dark">
        <div class="col-12 d-inline-flex">
             <div class="symbol symbol-20 symbol-light-primary mr-5">
                 <span class="symbol-label">
                     <span class="svg-icon svg-icon-md svg-icon-primary">
                         <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <rect x="0" y="0" width="24" height="24"></rect>
                                 <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                 <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                             </g>
                         </svg>
                         <!--end::Svg Icon-->
                     </span>
                 </span>
             </div>
             <div class="d-flex flex-column font-weight-bold text-left">
                 <a href="#" class="text-light mb-1 font-size-md">System Reports</a>
             </div>
        </div>
    </div>
    <div class="row ml-1 mr-1">
        <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button  onclick="window.location.href='{{ route('r_rep_wfp_consolidate') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                        <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="{{ route('r_rep_wfp_consolidate') }}" class="text-dark text-hover-primary mb-1 font-size-lg">WFP Consolidated</a>
                        <span class="text-muted">Generate Per Catergory/Budget Line Item</span>
                    </div>
                    <!--end::Text-->
               </button>
            </div>
        </div>
        {{-- <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button onclick="window.location.href='{{ route('r_rep_bli') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                        <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="{{ route('r_rep_bli') }}" class="text-dark text-hover-primary mb-1 font-size-lg">WFP Per Budget Line Item</a>
                        <span class="text-muted">Generate Consolidated B.L.I</span>
                    </div>
                    <!--end::Text-->
               </button>
            </div>
        </div> --}}
        <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
            <button onclick="window.location.href='{{ route('r_rep_app') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                        <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="{{ route('r_rep_app') }}" class="text-dark text-hover-primary mb-1 font-size-lg">APP</a>
                        <span class="text-muted">Generate Consolidated APP</span>
                    </div>
                    <!--end::Text-->
               </button>
            </div>
        </div>
    </div>
    <!-- end::title -->



        <!-- begin::title -->
        <div class="row  ml-0  mr-0 p-3 mb-10 bg-radial-gradient-dark">
            <div class="col-12 d-inline-flex">
                <div class="symbol symbol-20 symbol-light-primary mr-5">
                    <span class="symbol-label">
                        <span class="svg-icon svg-icon-md svg-icon-primary">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                    <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </span>
                </div>
                <div class="d-flex flex-column font-weight-bold text-left">
                    <a href="#" class="text-light mb-1 font-size-md">System Reference</a>
                </div>
            </div>
        </div>
        <!-- end::title -->

        <div class="row ml-1 mr-1">
        @if (Auth::user()->role->roles == 'ADMINISTRATOR')
            <div class="col-12 col-md-4">
             <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                 <button onclick="window.location.href='{{ route('r_procurement_supplies') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M20.4061385,6.73606154 C20.7672665,6.89656288 21,7.25468437 21,7.64987309 L21,16.4115967 C21,16.7747638 20.8031081,17.1093844 20.4856429,17.2857539 L12.4856429,21.7301984 C12.1836204,21.8979887 11.8163796,21.8979887 11.5143571,21.7301984 L3.51435707,17.2857539 C3.19689188,17.1093844 3,16.7747638 3,16.4115967 L3,7.64987309 C3,7.25468437 3.23273352,6.89656288 3.59386153,6.73606154 L11.5938615,3.18050598 C11.8524269,3.06558805 12.1475731,3.06558805 12.4061385,3.18050598 L20.4061385,6.73606154 Z" fill="#000000" opacity="0.3"/>
                                        <polygon fill="#000000" points="14.9671522 4.22441676 7.5999999 8.31727912 7.5999999 12.9056825 9.5999999 13.9056825 9.5999999 9.49408582 17.25507 5.24126912"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                     <!--end::Symbol-->
                     <!--begin::Text-->
                     <div class="d-flex flex-column font-weight-bold text-left">
                         <a href="{{ route('r_procurement_supplies') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Supplies</a>
                         <span class="text-muted">Build your Supplies Database</span>
                     </div>
                     <!--end::Text-->
                </button>
             </div>
            </div>
            <div class="col-12 col-md-4">
             <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                 <button onclick="window.location.href='{{ route('r_procurement_medicine') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                     <!--begin::Symbol-->
                     <div class="symbol symbol-40 symbol-light-primary mr-5">
                         <span class="symbol-label">
                             <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                 <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                         <rect x="0" y="0" width="24" height="24"></rect>
                                         <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                         <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                     </g>
                                 </svg>
                                 <!--end::Svg Icon-->
                             </span>
                         </span>
                     </div>
                     <!--end::Symbol-->
                     <!--begin::Text-->
                     <div class="d-flex flex-column font-weight-bold text-left" >
                         <a href="{{ route('r_procurement_medicine') }}" class="text-dark text-hover-primary mb-1 font-size-lg float-left">Drugs and Medicines</a>
                         <span class="text-muted">Build your Medical commodities</span>
                     </div>
                     <!--end::Text-->
                </button>
             </div>
            </div>
            <div class="col-12 col-md-4">
             <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                 <button onclick="window.location.href='{{ route('r_user') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                     <!--end::Symbol-->
                     <!--begin::Text-->
                     <div class="d-flex flex-column font-weight-bold text-left">
                         <a href="{{ route('r_user') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Users Management</a>
                         <span class="text-muted">Manage your users</span>
                     </div>
                     <!--end::Text-->
                </button>
             </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_uacs') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
                                            <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_uacs') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Unified Accounts Code Structure</a>
                            <span class="text-muted">Manage your UACS</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_dm_category') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L10.1818182,16 C8.76751186,16 8,15.2324881 8,13.8181818 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_dm_category') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Drugs and Medicine Category</a>
                            <span class="text-muted">Organize your category</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_program') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z" fill="#000000" opacity="0.3"/>
                                            <path d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z" fill="#000000"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_program') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Programs</a>
                            <span class="text-muted">Build your programs</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_unit_program') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M18,16 L9,16 C8.44771525,16 8,15.5522847 8,15 C8,14.4477153 8.44771525,14 9,14 L17,14 C17.5522847,14 18,13.5522847 18,13 C18,12.4477153 17.5522847,12 17,12 L9,12 C7.34314575,12 6,13.3431458 6,15 C6,16.6568542 7.34314575,18 9,18 L19.5,18 C21,18 21,18.5 21,19 C21,19.5 21,20 19.5,20 L7,20 C4.790861,20 3,18.209139 3,16 L3,8 C3,5.790861 4.790861,4 7,4 L17,4 C19.209139,4 21,5.790861 21,8 L21,13.0000005 C21,14.6568542 19.6568542,16 18,16 Z" fill="#000000"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_unit_program') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Assign Program Coordinators</a>
                            <span class="text-muted">Choose your coordinators</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_budget_line_item') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
                                            <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_budget_line_item') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Budget Line Item</a>
                            <span class="text-muted">Manage your Budget Line Item</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>

        @endif
        @if (Auth::user()->role->roles == "ADMINISTRATOR" Or  Auth::user()->role->roles == "PROGRAM COORDINATOR")
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_output_function') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M9.07117914,12.5710461 L13.8326627,12.5710461 C14.108805,12.5710461 14.3326627,12.3471885 14.3326627,12.0710461 L14.3326627,0.16733734 C14.3326627,-0.108805035 14.108805,-0.33266266 13.8326627,-0.33266266 C13.6282104,-0.33266266 13.444356,-0.208187188 13.3684243,-0.0183579985 L8.6069408,11.8853508 C8.50438409,12.1417426 8.62909204,12.4327278 8.8854838,12.5352845 C8.94454394,12.5589085 9.00756943,12.5710461 9.07117914,12.5710461 Z" fill="#000000" opacity="0.3" transform="translate(11.451854, 6.119192) rotate(-270.000000) translate(-11.451854, -6.119192) "/>
                                            <path d="M9.23851648,24.5 L14,24.5 C14.2761424,24.5 14.5,24.2761424 14.5,24 L14.5,12.0962912 C14.5,11.8201488 14.2761424,11.5962912 14,11.5962912 C13.7955477,11.5962912 13.6116933,11.7207667 13.5357617,11.9105959 L8.77427814,23.8143047 C8.67172143,24.0706964 8.79642938,24.3616816 9.05282114,24.4642383 C9.11188128,24.4878624 9.17490677,24.5 9.23851648,24.5 Z" fill="#000000" transform="translate(11.500000, 18.000000) scale(1, -1) rotate(-270.000000) translate(-11.500000, -18.000000) "/>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="11" y="2" width="2" height="20" rx="1"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_output_function') }}" class="text-dark text-hover-primary mb-1 font-size-lg">WFP Output and Deliverables</a>
                            <span class="text-muted">Build your WFP Output Function</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
        @endif
        @if (Auth::user()->role->roles == "ADMINISTRATOR")
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_office_unit') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M4.95312427,14.3025791 L3.04687573,13.6974209 C4.65100965,8.64439903 7.67317997,6 12,6 C16.32682,6 19.3489903,8.64439903 20.9531243,13.6974209 L19.0468757,14.3025791 C17.6880467,10.0222676 15.3768837,8 12,8 C8.62311633,8 6.31195331,10.0222676 4.95312427,14.3025791 Z M12,8 C12.5522847,8 13,7.55228475 13,7 C13,6.44771525 12.5522847,6 12,6 C11.4477153,6 11,6.44771525 11,7 C11,7.55228475 11.4477153,8 12,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M5.73243561,6 L9.17070571,6 C9.58254212,4.83480763 10.6937812,4 12,4 C13.3062188,4 14.4174579,4.83480763 14.8292943,6 L18.2675644,6 C18.6133738,5.40219863 19.2597176,5 20,5 C21.1045695,5 22,5.8954305 22,7 C22,8.1045695 21.1045695,9 20,9 C19.2597176,9 18.6133738,8.59780137 18.2675644,8 L14.8292943,8 C14.4174579,9.16519237 13.3062188,10 12,10 C10.6937812,10 9.58254212,9.16519237 9.17070571,8 L5.73243561,8 C5.38662619,8.59780137 4.74028236,9 4,9 C2.8954305,9 2,8.1045695 2,7 C2,5.8954305 2.8954305,5 4,5 C4.74028236,5 5.38662619,5.40219863 5.73243561,6 Z M12,8 C12.5522847,8 13,7.55228475 13,7 C13,6.44771525 12.5522847,6 12,6 C11.4477153,6 11,6.44771525 11,7 C11,7.55228475 11.4477153,8 12,8 Z M4,19 C2.34314575,19 1,17.6568542 1,16 C1,14.3431458 2.34314575,13 4,13 C5.65685425,13 7,14.3431458 7,16 C7,17.6568542 5.65685425,19 4,19 Z M4,17 C4.55228475,17 5,16.5522847 5,16 C5,15.4477153 4.55228475,15 4,15 C3.44771525,15 3,15.4477153 3,16 C3,16.5522847 3.44771525,17 4,17 Z M20,19 C18.3431458,19 17,17.6568542 17,16 C17,14.3431458 18.3431458,13 20,13 C21.6568542,13 23,14.3431458 23,16 C23,17.6568542 21.6568542,19 20,19 Z M20,17 C20.5522847,17 21,16.5522847 21,16 C21,15.4477153 20.5522847,15 20,15 C19.4477153,15 19,15.4477153 19,16 C19,16.5522847 19.4477153,17 20,17 Z" fill="#000000"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_office_unit') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Division and Units</a>
                            <span class="text-muted">Build your office units</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_activity_category') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
                                            <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_activity_category') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Activity Category</a>
                            <span class="text-muted">Build your activity categories</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_classification') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M6,7 C7.1045695,7 8,6.1045695 8,5 C8,3.8954305 7.1045695,3 6,3 C4.8954305,3 4,3.8954305 4,5 C4,6.1045695 4.8954305,7 6,7 Z M6,9 C3.790861,9 2,7.209139 2,5 C2,2.790861 3.790861,1 6,1 C8.209139,1 10,2.790861 10,5 C10,7.209139 8.209139,9 6,9 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M7,11.4648712 L7,17 C7,18.1045695 7.8954305,19 9,19 L15,19 L15,21 L9,21 C6.790861,21 5,19.209139 5,17 L5,8 L5,7 L7,7 L7,8 C7,9.1045695 7.8954305,10 9,10 L15,10 L15,12 L9,12 C8.27142571,12 7.58834673,11.8052114 7,11.4648712 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M18,22 C19.1045695,22 20,21.1045695 20,20 C20,18.8954305 19.1045695,18 18,18 C16.8954305,18 16,18.8954305 16,20 C16,21.1045695 16.8954305,22 18,22 Z M18,24 C15.790861,24 14,22.209139 14,20 C14,17.790861 15.790861,16 18,16 C20.209139,16 22,17.790861 22,20 C22,22.209139 20.209139,24 18,24 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M18,13 C19.1045695,13 20,12.1045695 20,11 C20,9.8954305 19.1045695,9 18,9 C16.8954305,9 16,9.8954305 16,11 C16,12.1045695 16.8954305,13 18,13 Z M18,15 C15.790861,15 14,13.209139 14,11 C14,8.790861 15.790861,7 18,7 C20.209139,7 22,8.790861 22,11 C22,13.209139 20.209139,15 18,15 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_classification') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Classifications</a>
                            <span class="text-muted">Manage your classifications</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_function_deliverables') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                            <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                            <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
                                            <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_function_deliverables') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Function Deliverables</a>
                            <span class="text-muted">Mange your function deliverables</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_item_unit') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M15,7 L15,8 C15,8.55228475 15.4477153,9 16,9 C16.5522847,9 17,8.55228475 17,8 L17,7 L19,7 L19,10 C19,10.5522847 19.4477153,11 20,11 C20.5522847,11 21,10.5522847 21,10 L21,7 C22.1045695,7 23,7.8954305 23,9 L23,15 C23,16.1045695 22.1045695,17 21,17 L3,17 C1.8954305,17 1,16.1045695 1,15 L1,9 C1,7.8954305 1.8954305,7 3,7 L3,10 C3,10.5522847 3.44771525,11 4,11 C4.55228475,11 5,10.5522847 5,10 L5,7 L7,7 L7,8 C7,8.55228475 7.44771525,9 8,9 C8.55228475,9 9,8.55228475 9,8 L9,7 L11,7 L11,10 C11,10.5522847 11.4477153,11 12,11 C12.5522847,11 13,10.5522847 13,10 L13,7 L15,7 Z" fill="#000000" transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) "/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_item_unit') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Item Unit</a>
                            <span class="text-muted">Build your item measurements</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_location') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_location') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Demographics</a>
                            <span class="text-muted">Manage your locations</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_sof') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                            <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_sof') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Fund Source</a>
                            <span class="text-muted">Manage your source of Funds</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_year') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" x="2" y="5" width="19" height="4" rx="1"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="11" width="19" height="10" rx="1"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>

                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="{{ route('r_year') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Year</a>
                            <span class="text-muted">Build your system years</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
    @endif
         </div>
         <!-- end::row-->
         {{-- <div class="row  ml-0  mr-0 p-3 mb-10 bg-radial-gradient-dark">
            <div class="col-12 d-inline-flex">
                 <div class="symbol symbol-20 symbol-light-primary mr-5">
                     <span class="symbol-label">
                         <span class="svg-icon svg-icon-md svg-icon-primary">
                             <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                     <rect x="0" y="0" width="24" height="24"></rect>
                                     <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                     <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                 </g>
                             </svg>
                             <!--end::Svg Icon-->
                         </span>
                     </span>
                 </div>
                 <div class="d-flex flex-column font-weight-bold text-left">
                     <a href="#" class="text-light mb-1 font-size-md">System Administrator</a>
                 </div>
            </div>
        </div>
        <div class="row ml-1 mr-1">
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button  class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo12\dist/../src/media/svg/icons\Devices\Server.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M5,2 L19,2 C20.1045695,2 21,2.8954305 21,4 L21,6 C21,7.1045695 20.1045695,8 19,8 L5,8 C3.8954305,8 3,7.1045695 3,6 L3,4 C3,2.8954305 3.8954305,2 5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L16,6 C16.5522847,6 17,5.55228475 17,5 C17,4.44771525 16.5522847,4 16,4 L11,4 Z M7,6 C7.55228475,6 8,5.55228475 8,5 C8,4.44771525 7.55228475,4 7,4 C6.44771525,4 6,4.44771525 6,5 C6,5.55228475 6.44771525,6 7,6 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,13 C21,14.1045695 20.1045695,15 19,15 L5,15 C3.8954305,15 3,14.1045695 3,13 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L16,13 C16.5522847,13 17,12.5522847 17,12 C17,11.4477153 16.5522847,11 16,11 L11,11 Z M7,13 C7.55228475,13 8,12.5522847 8,12 C8,11.4477153 7.55228475,11 7,11 C6.44771525,11 6,11.4477153 6,12 C6,12.5522847 6.44771525,13 7,13 Z" fill="#000000"/>
                                        <path d="M5,16 L19,16 C20.1045695,16 21,16.8954305 21,18 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,18 C3,16.8954305 3.8954305,16 5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L16,20 C16.5522847,20 17,19.5522847 17,19 C17,18.4477153 16.5522847,18 16,18 L11,18 Z M7,20 C7.55228475,20 8,19.5522847 8,19 C8,18.4477153 7.55228475,18 7,18 C6.44771525,18 6,18.4477153 6,19 C6,19.5522847 6.44771525,20 7,20 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            </span>

                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Database Backup</a>
                            <span class="text-muted">Backup your data </span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>

        </div> --}}
        <!--end::row -->
        {{-- <div style="postion:absolute;bottom:0; height:200px;top:0;" class="wave wave-animate-slow wave-primary"></div> --}}
    </div>
    <!--end::Body-->
</div>
<!-- end::system modules-->

@endsection

@push('scripts')
    <script src="{{ asset('dist/assets/js/pages/widgets.js')}}"></script>
    <script src="{{ asset('dist/assets/js/controllers/system-menu.js')}}"></script>

@endpush
