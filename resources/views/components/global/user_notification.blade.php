@forelse ($data["notif"] as $row)
    @if($row["event_name"] == "WFP Update")
        <div class="d-flex align-items-center w-100 _bg-hover-gray p-5" style="cursor: pointer;" onclick="show_wfp_drawer_from_notification('{{ $row['id'] }}','{{ json_decode($row['payload'])->wfp_code }}')">
            <div class="row">
                <div class="col-2 col-md-2">
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                    <div class="symbol-label"><i class="{{ $row["icon"] }} text-{{ $row["icon_level"] }} icon-lg"></i></div>
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="d-flex flex-column font-weight-bold">
                        <span  class="text-dark text-hover-primary mb-0 font-size-lg">{{ $row["event_title"] }}</span>
                        <span class="text-muted font-size-xs">{{ $row["event_description"] }}</span>
                        <span class="text-muted font-size-xs">{{ Carbon\Carbon::parse($row["created_at"])->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="col-3 col-md-2 mt-3">
                   @if($row["isRead"] == "N")
                        <span class="label label-danger label-pill label-inline ml-0">New</span>
                   @endif
                </div>
            </div>
        </div>
    @endif

    @if($row["event_name"] == "WFP Comment")
        <div class="d-flex align-items-center w-100 _bg-hover-gray p-5" style="cursor: pointer;" onclick="show_wfp_drawer_from_comment('{{ $row['id'] }}','{{ json_decode($row['payload'])->wfp_code }}')">
            <div class="row">
                <div class="col-2 col-md-2">
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                    <div class="symbol-label"><i class="{{ $row["icon"] }} text-{{ $row["icon_level"] }} icon-lg"></i></div>
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="d-flex flex-column font-weight-bold">
                        <span  class="text-dark text-hover-primary mb-0 font-size-lg">{{ $row["event_title"] }}</span>
                        <span class="text-muted font-size-xs">{!! $row["event_description"] !!}</span>
                        <span class="text-muted font-size-xs">{{ Carbon\Carbon::parse($row["created_at"])->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="col-3 col-md-2 mt-3">
                @if($row["isRead"] == "N")
                        <span class="label label-danger label-pill label-inline ml-0">New</span>
                @endif
                </div>
            </div>
        </div>
    @endif
@empty
    <div style="width:100%;height:300px;text-align:center;"> NO NOTIFICATION </div>
@endforelse
<!--end::Item-->
