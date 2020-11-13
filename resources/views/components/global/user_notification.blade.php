@forelse ($data["notif"] as $row)
<div class="d-flex align-items-center mb-6" >
    <!--begin::Symbol-->
    <div class="symbol symbol-40 symbol-light-primary mr-5">
        <div class="symbol-label"><i class="{{ $row["icon"] }} text-{{ $row["icon_level"] }} icon-lg"></i></div>
    </div>
    <!--end::Symbol-->
    <!--begin::Text-->
    <div class="d-flex flex-column font-weight-bold">
        <span  class="text-dark text-hover-primary mb-1 font-size-lg">{{ $row["event_title"] }}</span>
        <span class="text-muted">{{ $row["event_description"] }}</span>
    </div>
</div>
@empty
    <div> NO NOTIFICATION </div>
@endforelse

