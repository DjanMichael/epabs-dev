

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
