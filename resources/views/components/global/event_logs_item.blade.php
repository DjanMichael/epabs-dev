@forelse($data["logs"] as $row)
 <!--begin::Item-->
 <div class="timeline-item" id="logs_item">
    <!--begin::Icon-->
    <div class="timeline-media bg-light-primary">
        <span class="svg-icon svg-icon-primary">
        <i class ="{{ $row["icon"] }} {{ $row["icon_level"] }}"></i>
        </span>
    </div>
    <!--end::Icon-->

    <!--begin::Info-->
    <div class="timeline-info h-100">
        <span class="text-muted mr-2"><i class="{{ json_decode($row["payload"])->device }}"></i></span><span class="font-weight-bold text-primary">{{ Carbon\Carbon::parse($row["created_at"])->diffForHumans() }}</span>
        <p class="font-weight-normal text-dark-50 pb-2">
          {!! $row["event_description"] !!}
        </p>
    </div>
    <!--end::Info-->
</div>
<!--end::Item-->

@empty
<span>NO LOGS</span>

@endforelse
