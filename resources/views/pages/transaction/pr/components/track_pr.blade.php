@forelse($data["pr_track"] as $row)
  <!--begin::Item-->
  <div class="timeline-item align-items-start" >
    <!--begin::Label-->
    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{ Carbon\Carbon::parse($row["created_at"])->diffForHumans() }}</div>
    <!--end::Label-->
    <!--begin::Badge-->
    <div class="timeline-badge">
        <i class="fa fa-genderless text-primary icon-xl"></i>
    </div>
    <!--end::Badge-->

    <!--begin::Text-->
    <?php
        $user = \App\User::where('id',$row["entry_by"])->first();
    ?>
    <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
       Status change to <b>{{ $row["status"] }}</b> Update by <b>{{ $user->name }}</b>
    </div>
    <!--end::Text-->
</div>
<!--end::Item-->


@empty

@endforelse
