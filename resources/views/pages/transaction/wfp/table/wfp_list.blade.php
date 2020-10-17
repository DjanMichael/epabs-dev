<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            @isset($data["wfp_list"])
            @forelse ($data["wfp_list"] as $row)
            <div class="col-xl-4 col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b card-stretch  ribbon ribbon-clip ribbon-right m-5" style="height:250px;cursor:pointer;"
                    onclick="wfp_drawer_open('{{ $row['wfp_code'] }}')"
                    style="cursor:pointer;"
                    id="wfp_card">
                    <div class="ribbon-target" style="top: 12px;">
                        <span class="ribbon-inner bg-warning"></span>
                        <?php

                        $stat = App\ZWfpLogs::where('wfp_code',$row['wfp_code'])->orderBy('created_at','DESC')->first();

                        echo $stat->remarks;
                        ?>

                       </div>
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Section-->
                        <div class="row">
                            <div class="col-12 d-flex align-items-center">
                                <div class="symbol-list d-flex flex-wrap">
                                    <div class="symbol symbol-60 mr-3">
                                        <span class="symbol-label font-size-h6">{{ strtoupper(Str::substr(Str::words($row["name"],2),0,1)) }}</span>
                                    </div>
                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column mr-auto">
                                    <!--begin: Title-->
                                <span class="card-title text-hover-primary fnt-weight-bolder font-size-h5 text-dark mb-1">{{ $row["name"] }}</span>
                                    <span class="text-muted font-weight-bold">{{ $row["designation"] != '' ? $row["designation"] : 'NO DESIGNATION' }}</span>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed separator-border-2 separator-secondary mb-3 mt-6"></div>
                        <!--end::Section-->
                        <!--begin::Blog-->
                        <div class="d-flex flex-wrap ">
                            <!--begin: Item-->
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-1 mt-5">Utilized</span>
                                <span class="font-weight-bolder font-size-h6 pt-1">
                                    <span class="font-weight-bold text-dark-50">₱</span>
                                    {{ $row["yearly_utilized"] != null ? number_format($row["yearly_utilized"],2) : '0.00' }}
                                </span>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-1 mt-5">Balance</span>
                                <span class="font-weight-bolder font-size-h6 pt-1">
                                    <span class="font-weight-bold text-dark-50">₱</span>
                                    {{ number_format($row["yearly_budget"] - $row["yearly_utilized"],2) }}
                                </span>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Blog-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer row pt-3 pb-3 bg-dark m-0" style="height: 40px;wdith:100%">
                        <div class="col-10">
                            <span class="label label-inline font-weight-bolder mr-2" >{{ $row["division"] . ' - ' .  $row["section"]  }}</span>
                        </div>
                        <div class="col-2 text-right">
                            <span class="label label-primary label-inline font-weight-bolder mr-2" >{{ $row["wfp_activity_count"] != null ? $row["wfp_activity_count"] : '0' }}</span>
                        </div>
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
            @endforeach
            @else
            <div class="col-xl-12 text-center p-10">
                <div style="height: 300px;width:100%;">
                    NO DATA
                </div>
            </div>
            @endisset

        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@isset($data["wfp_list"])
@if(count($data["wfp_list"]) != 0)
<div id="pagination_wfp_list">
    {{ $data["wfp_list"]->links('components.global.pagination') }}
</div>
@endif
@endisset
