 @forelse($data["chat_user_list"] as $row)
 <!--begin:User-->
<div id="chat_user_list_card" class=" d-flex align-items-center justify-content-between mb-0  pl-5 pr-5" style="cursor:pointer;" onclick="UserShowConvo('{{ $row->id }}','{{ $row->name }}',this)">
    <div class="d-flex align-items-center ">
        <div class="symbol symbol-circle symbol-50 mr-3 ">
            {{-- <img alt="Pic" src="{{ asset('dist/assets/media/users/300_11.jpg') }}"> --}}
            <div class="symbol mt-4">
                <span class="symbol-label font-size-h5 bg-gray-400">{{ Str::substr(Str::words($row->name,2),0,1) }}</span>
                <span class="label label-sm label-danger" style="position:relative;top:-15px;">4</span>
            </div>
        </div>
        <div class="d-flex flex-column">
            <span class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">{{ $row->name }}</span>
            <span class="text-muted font-weight-bold font-size-sm">{{ $row->email }}</span>
        </div>
    </div>
    <div class="d-flex flex-column align-items-end">
        <span><span class="label label-dot label-danger text-dark-75 font-weight-bold font-size-md"></span> Active</span>
        <span class="text-muted font-weight-bold font-size-sm">35 mins</span>
    </div>
</div>
<!--end:User-->
@empty

<div class="d-flex align-items-center justify-content-center bg-dark-30" style="  width:100%;height:100%;" >
    <div class="row">
        <div class="col-12 text-center">
                <i class="fas fa-users text-dark-50" style="font-size:40px;"></i>
                <p class="text-dark-50 font-weight-bold">NO USER CONVERSATION AVAILABLE</p>
                <!--begin::Aside Mobile Toggle-->
                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none" id="kt_app_chat_toggle">
                    <span class="svg-icon svg-icon-lg">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Communication/Adress-book2.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3"></path>
                                <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </button>
            <!--end::Aside Mobile Toggle-->
        </div>
    </div>
</div>
@endforelse
