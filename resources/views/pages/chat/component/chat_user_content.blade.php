
<!--begin::Messages-->
<div class="messages h-100" >
    @forelse ($data["chat_user_content"] as $row)
        @if($row->user_from == Auth::user()->id)
            <!--begin::Message Out-->

            <div class="d-flex flex-column mb-5 align-items-end">
                <div class="d-flex align-items-center">
                    <div>
                        @if($row->msg_type == "TEXT")
                            <div class="mt-2 rounded p-5 bg-primary text-light  font-weight-bold font-size-lg text-right max-w-400px">{!! htmlentities($row->message, ENT_QUOTES, "UTF-8") !!}</div>
                        @else
                        <div class="col-12">
                            <embed type="image/gif" src="{{ $row->message }}" class="w-100"/><br/>
                        </div>
                        @endif
                        <span class="text-muted font-size-sm" style="position:relative;top:0px;right:0px;">{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                    </div>

                    <div class="symbol symbol-circle symbol-45 ml-3 d-flex flex-column mb-5 align-items-end">
                        <span class="symbol-label font-size-h5">YOU</span>
                    </div>
                </div>
            </div>
            <!--end::Message Out-->
        @else
            <!--begin::Message In-->
            <div class="d-flex flex-column mb-5 align-items-start">
                <div class="d-flex align-items-center">

                    <div class="symbol symbol-circle symbol-45 mr-3">

                        <span class="symbol-label font-size-h5">{{ Str::Title(Str::substr(Str::words($row->username,2),0,1)) }}</span>
                    </div>
                    <div>
                        <span class="text-muted mb-0" >{{ $row->username }}</span>
                        @if($row->msg_type == "TEXT")
                            <div class="mt-0 rounded p-5 bg-light  font-weight-bold font-size-lg text-left max-w-400px">{!! htmlentities($row->message, ENT_QUOTES, "UTF-8") !!}</div>
                        @else
                            <div class="col-12 mt-0">
                                <embed type="image/gif" src="{{ $row->message }}" class="w-100"/><br/>
                            </div>
                        @endif
                        <span class="text-muted font-size-sm" style="position:relative;top:0px;right:0px;">{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            <!--end::Message In-->
        @endif
    @empty
    <div class="d-flex align-items-center justify-content-center bg-dark-30 h-100" style="  width:100%;height:100%;" >
        <div class="row">
            <div class="col-12 text-center">
                <i class="fas fa-users text-dark-50" style="font-size:40px;"></i>
                <p class="text-dark-50 font-weight-bold">NO USER CONVERSATION AVAILABLE</p>
            </div>
        </div>
    </div>
    @endforelse
</div>
<!--end::Messages-->
<div id="scroll_down_chat"></div>
