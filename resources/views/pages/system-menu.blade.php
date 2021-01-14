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



    <!--begin::Body-->
    @if(Auth::user()->role->roles =='ADMINISTRATOR')
        @include('pages.system_menu_roles.activity.administrator')
    @endif
    @if(Auth::user()->role->roles =='PROGRAM COORDINATOR')
        @include('pages.system_menu_roles.activity.program_coordinator')
    @endif
    @if(Auth::user()->role->roles =='PLANNING')
        @include('pages.system_menu_roles.activity.planning')
    @endif
    @if(Auth::user()->role->roles =='BUDGET')
        @include('pages.system_menu_roles.activity.budget')
    @endif
    @if(Auth::user()->role->roles =='PROCUREMENT')
        @include('pages.system_menu_roles.activity.procurement')
    @endif
    @if(Auth::user()->role->roles =='PHARMACY')
        @include('pages.system_menu_roles.activity.pharma')
    @endif


@if(Auth::user()->role->roles =='ADMINISTRATOR' || Auth::user()->role->roles =='PLANNING' || Auth::user()->role->roles =='BUDGET' ||
    Auth::user()->role->roles =='PROCUREMENT')
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

@endif


@if(Auth::user()->role->roles =='ADMINISTRATOR')
    @include('pages.system_menu_roles.reports.administrator')
@endif
@if(Auth::user()->role->roles =='PROGRAM COORDINATOR')
    @include('pages.system_menu_roles.reports.program_coordinator')
@endif
@if(Auth::user()->role->roles =='PLANNING')
    @include('pages.system_menu_roles.reports.planning')
@endif
@if(Auth::user()->role->roles =='BUDGET')
    @include('pages.system_menu_roles.reports.budget')
@endif
@if(Auth::user()->role->roles =='PROCUREMENT')
    @include('pages.system_menu_roles.reports.procurement')
@endif
@if(Auth::user()->role->roles =='PHARMACY')
    @include('pages.system_menu_roles.reports.pharma')
@endif
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


@if(Auth::user()->role->roles =='ADMINISTRATOR')
    @include('pages.system_menu_roles.reference.administrator')
@endif
@if(Auth::user()->role->roles =='PROGRAM COORDINATOR')
    @include('pages.system_menu_roles.reference.program_coordinator')
@endif
@if(Auth::user()->role->roles =='PLANNING')
    @include('pages.system_menu_roles.reference.planning')
@endif
@if(Auth::user()->role->roles =='BUDGET')
    @include('pages.system_menu_roles.reference.budget')
@endif
@if(Auth::user()->role->roles =='PROCUREMENT')
    @include('pages.system_menu_roles.reference.procurement')
@endif
@if(Auth::user()->role->roles =='PHARMACY')
    @include('pages.system_menu_roles.reference.pharma')
@endif
<!--end::Body-->
</div>
<!-- end::system modules-->

@endsection

@push('scripts')
    <script src="{{ asset('dist/assets/js/pages/widgets.js')}}"></script>
    <script src="{{ asset('dist/assets/js/controllers/system-menu.js')}}"></script>

@endpush
