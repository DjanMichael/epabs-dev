@extends('layouts.app')
@section('title','SYSTEM MODULES')
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
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo12/dist/../src/media/svg/icons/Communication/Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
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
           <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg float-left">PPMP</a>
                        <span class="text-muted">Create your PPMP</span>
                    </div>
                    <!--end::Text-->
                </button>
            </div>
           </div>
           <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo12/dist/../src/media/svg/icons/Shopping/Cart1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Shopping Module</a>
                        <span class="text-muted">Shop your Item</span>
                    </div>
                    <!--end::Text-->
                </button>
            </div>
           </div>
           <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo12/dist/../src/media/svg/icons/Shopping/Money.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Budget Allocation Management</a>
                        <span class="text-muted">Manage your Budget</span>
                    </div>
                    <!--end::Text-->
                </button>
            </div>
           </div>
           <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Purchase Request</a>
                        <span class="text-muted">Create your Purchase Request</span>
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
                <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Consilidated WFP</a>
                        <span class="text-muted">Generate Consolidated WFP</span>
                    </div>
                    <!--end::Text-->
               </button>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Per Budget Line Item</a>
                        <span class="text-muted">Generate Consolidated B.L.I</span>
                    </div>
                    <!--end::Text-->
               </button>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                    <div class="d-flex flex-column font-weight-bold text-left">
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">APP</a>
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
            <div class="col-12 col-md-4">
             <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                 <button onclick="window.location.href='{{ route('r_procurement_supplies') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                     <!--begin::Symbol-->
                     <div class="symbol symbol-40 symbol-light-primary mr-5">
                         <span class="symbol-label">
                             <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                 <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                 <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo12/dist/../src/media/svg/icons/Shopping/Box3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M20.4061385,6.73606154 C20.7672665,6.89656288 21,7.25468437 21,7.64987309 L21,16.4115967 C21,16.7747638 20.8031081,17.1093844 20.4856429,17.2857539 L12.4856429,21.7301984 C12.1836204,21.8979887 11.8163796,21.8979887 11.5143571,21.7301984 L3.51435707,17.2857539 C3.19689188,17.1093844 3,16.7747638 3,16.4115967 L3,7.64987309 C3,7.25468437 3.23273352,6.89656288 3.59386153,6.73606154 L11.5938615,3.18050598 C11.8524269,3.06558805 12.1475731,3.06558805 12.4061385,3.18050598 L20.4061385,6.73606154 Z" fill="#000000" opacity="0.3"/>
                                        <polygon fill="#000000" points="14.9671522 4.22441676 7.5999999 8.31727912 7.5999999 12.9056825 9.5999999 13.9056825 9.5999999 9.49408582 17.25507 5.24126912"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
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
                 <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                     <!--begin::Symbol-->
                     <div class="symbol symbol-40 symbol-light-primary mr-5 ">
                         <span class="symbol-label">
                             <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo12/dist/../src/media/svg/icons/Communication/Group.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                             </span>
                         </span>
                     </div>
                     <!--end::Symbol-->
                     <!--begin::Text-->
                     <div class="d-flex flex-column font-weight-bold text-left">
                         <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Users Management</a>
                         <span class="text-muted">Manage your users</span>
                     </div>
                     <!--end::Text-->
                </button>
             </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo12/dist/../src/media/svg/icons/Home/Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
                                            <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Unified Accounts Code Structure</a>
                            <span class="text-muted">Manage your UACS</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary pl-3">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo12/dist/../src/media/svg/icons/Shopping/Price1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M3.52270623,14.028695 C2.82576459,13.3275941 2.82576459,12.19529 3.52270623,11.4941891 L11.6127629,3.54050571 C11.9489429,3.20999263 12.401513,3.0247814 12.8729533,3.0247814 L19.3274172,3.0247814 C20.3201611,3.0247814 21.124939,3.82955935 21.124939,4.82230326 L21.124939,11.2583059 C21.124939,11.7406659 20.9310733,12.2027862 20.5869271,12.5407722 L12.5103155,20.4728108 C12.1731575,20.8103442 11.7156477,21 11.2385688,21 C10.7614899,21 10.3039801,20.8103442 9.9668221,20.4728108 L3.52270623,14.028695 Z M16.9307214,9.01652093 C17.9234653,9.01652093 18.7282432,8.21174298 18.7282432,7.21899907 C18.7282432,6.22625516 17.9234653,5.42147721 16.9307214,5.42147721 C15.9379775,5.42147721 15.1331995,6.22625516 15.1331995,7.21899907 C15.1331995,8.21174298 15.9379775,9.01652093 16.9307214,9.01652093 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                </span>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column font-weight-bold text-left">
                            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Pricing Standard</a>
                            <span class="text-muted">Build your standard price</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">Budget Line Item</a>
                            <span class="text-muted">Manage your Budget Line Item</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">WFP Indicator customization</a>
                            <span class="text-muted">Build your WFP Indicators</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_unit') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                            <a href="{{ route('r_unit') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Division and Units</a>
                            <span class="text-muted">Build your office units</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_unit') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                            <a href="{{ route('r_unit') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Activity Category</a>
                            <span class="text-muted">Build your activity categories</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_unit') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                            <a href="{{ route('r_unit') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Classifications</a>
                            <span class="text-muted">Manage your classifications</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_unit') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                            <a href="{{ route('r_unit') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Function Deliverables</a>
                            <span class="text-muted">Mange your function deliverables</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_unit') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                            <a href="{{ route('r_unit') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Item Unit</a>
                            <span class="text-muted">Build your item measurements</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_unit') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                            <a href="{{ route('r_unit') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Demographics</a>
                            <span class="text-muted">Manage your locations</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center mb-10 bg-gray-200 rounded-lg">
                    <button onclick="window.location.href='{{ route('r_unit') }}'" class="btn btn-light-success d-inline-flex align-items-center btn-lg w-100">
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
                            <a href="{{ route('r_unit') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Fund Source</a>
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
                            <a href="{{ route('r_year') }}" class="text-dark text-hover-primary mb-1 font-size-lg">Year</a>
                            <span class="text-muted">Build your years</span>
                        </div>
                        <!--end::Text-->
                   </button>
                </div>
            </div>
         </div>
         <!-- end::row-->



      

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