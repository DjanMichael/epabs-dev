{{-- <div id="bg-drawer" onclick="wfp_drawer_close()"></div>
<div class="wrapper-drawer scroll scroll-pull" data-scroll="true" data-wheel-propagationtrue" style="height: 768px;" id="wfp_drawer"> --}}
    {{-- scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 768px;"  --}}

<div class="row">
    <div class="bg-dark text-light col-12 p-15"
    style="padding:10px;position:fixed;top:-10px;margin:0 auto;height:auto;width:100%;z-index:1040;
     background-position: 0 calc(30% + 0.5rem); background-size: 100% auto; background-image: url({{ asset('dist/assets/media/svg/patterns/rhone.svg') }})">
        <div class="" style="width:91.5%">
            <div class="row">
                <div class="col-10">
                    <h1>Work and Financial Plan  <small class="text-muted font-size-sm ml-2"> YEAR {{ $year != '' ? $year : ''  }}</small></h1>
                </div>
                <div class="col-2 text-right">
                    <button class="btn btn-icon btn-light btn-hover-danger btn-sm"
                        onclick="wfp_drawer_close()"
                        style="position: relative;top:0px;right:0px;"><i class="flaticon-close"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row" style="width:91%;" id="wfp_menu_drawer">
            <div class="col-12 col-md-8">
                <div class="row">
                    @if(count($data["activities"]) <> 0)
                    <div class="col-12 col-md-4">
                        <button type="button" onclick="wfpApprove('{{ $wfp_code }}')" class="btn btn-transparent-success font-weight-bold  btn-block"><i class="flaticon-like icon-md"></i>APPROVED WFP</button>
                        <button type="button" onclick="wfpSubmit('{{ $wfp_code }}')" class="btn btn-transparent-primary font-weight-bold  btn-block"><i class="flaticon2-send-1 icon-md"></i>SUBMIT WFP</button>
                        <button type="button" onclick="wfpRevise('{{ $wfp_code }}')" class="btn btn-transparent-danger font-weight-bold  btn-block" ><i class="flaticon2-refresh-1 icon-md"></i>REVISED WFP</button>
                    </div>
                    @endif

                    <div class="col-12 col-md-4">
                        @if(count($data["activities"]) <> 0)
                        <button type="button" class="btn btn-transparent-white font-weight-bold btn-block" onclick="printWfp('{{ $wfp_code }}')"><i class="flaticon2-printer"></i>Print</button>
                        <button type="button" id="btn_download_wfp" class="btn btn-transparent-white font-weight-bold btn-block" onclick="downloadPdfWfp('{{ $wfp_code }}')"><i class="flaticon-file icon-md"></i>Export PDF</button>
                        @endif
                        <button type="button" class="btn btn-transparent-white font-weight-bold btn-block" onclick="addNewActivity('{{ $wfp_code }}')"><i class="flaticon-time-3 icon-md"></i>New Acitivity</button>
                    </div>
                    <div class="col-12 col-md-4">
                    </div>
                </div>
            </div>
            {{-- <div class="col-12 col-md-4 text-center">
                <button type="button" class="btn btn-transparent-white font-weight-bold btn-block"><i class="flaticon2-printer"></i>Print</button>
                <button type="button" class="btn btn-transparent-white font-weight-bold btn-block"><i class="flaticon-file icon-md"></i>Export PDF</button>
            </div> --}}
        </div>
    </div>

        <div class="col-12 col-md-4" style="height:120px;"></div>
        <div class="col-12 col-md-4" style="height:120px;"></div>
        <div class="col-12 col-md-4 mb-md-40" style="height:120px;"></div>

        @if(count($data["activities"]) <> 0)
        <div class="col-12 " style="position: relative;">
                <div class="offcanvas-content pr-5 mr-n5" id="wfp_drawer_title">
                    <div class="table-responsive-*">
                        <table class="table table-sm table-bordered table-hover" class="wfp_table">
                            <thead style="text-align:center;" class="bg-secondary">
                                <tr>
                                    @if($cmd["EDIT"] == 1 || $cmd["DEL"] == 1 || $cmd["VIEW"] == 1 ||  $cmd["PPMP"] == 1 ||  $cmd["COMMENT"] == 1 )
                                    <th scope="col">Action</th>
                                    @endif
                                    <th scope="col">Act Code</th>
                                    <th scope="col">Function</th>
                                    <th scope="col">Output Function</th>
                                    <th scope="col">Activities for Outputs</th>
                                    <th scope="col">Q1</th>
                                    <th scope="col">Q2</th>
                                    <th scope="col">Q3</th>
                                    <th scope="col">Q4</th>
                                    <th scope="col">Cost (Php)</th>
                                    <th scope="col">Responsible Person</th>
                                    <th scope="col">Encoded by</th>
                                </tr>
                            </thead>
                        <tbody style="overflow-y: scroll;">

        @endif
                        <?php

                            $total_cost = 0.00;
                        ?>
                        @forelse ($data["activities"] as $row)
                            <tr class="wfp_table_row">
                                @if($cmd["EDIT"] == 1 || $cmd["DEL"] == 1 || $cmd["VIEW"] == 1 ||  $cmd["PPMP"] == 1 ||  $cmd["COMMENT"] == 1 )
                                <td scope="row text-center" style="width:130px;">
                                    @if($cmd["EDIT"] == 1)
                                    <button  id="wfp_edit_act" class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                            style="position: relative;right:0;bottom:0;"
                                            data-toggle="tooltip" title="Edit" data-placement="right" data-original-title="Edit"
                                            onclick="editWfp('{{ $wfp_code }}','{{ $row->twa_id }}')">
                                        <i class="flaticon-edit"></i>
                                    </button>
                                    @endif
                                    @if($cmd["DEL"] == 1)
                                    <button id="wfp_del_act" class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                            style="position: relative;right:0;bottom:0;"
                                            data-toggle="tooltip" title="Delete" data-placement="right" data-original-title="Delete"
                                            onclick="deleteWfp('{{ $row->twa_id }}')">
                                        <i class="flaticon2-trash"></i>
                                    </button>
                                    @endif
                                    @if($cmd["COMMENT"] == 1)
                                    <button  id="wfp_comment_act" type="button"
                                        class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                        style="position: relative;bottom:0px;right:0;"
                                        data-toggle="tooltip" title="Comment" data-placement="right" data-original-title="Comment"
                                onclick="showModalComment('{{ $user_id }}','{{ $wfp_code }}','{{ $row->twa_id }}')">
                                        <i class="flaticon-comment"></i>
                                    </button>
                                    @endif
                                    @if($cmd["VIEW"] == 1)
                                    <button  id="wfp_showpi_act" class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                        style="position: relative;right:0;bottom:0;"
                                        data-toggle="tooltip" title="View Details" data-placement="right" data-original-title="View Details"
                                        onclick="showWfpActivityModal('{{ $user_id }}','{{ $wfp_code }}',{{ $row->twa_id }})">
                                    <i class="flaticon-medical"></i>
                                    </button>
                                    @endif
                                    <?php
                                        $CheckIfHasPi = \App\WfpPerformanceIndicator::where('wfp_code',request()->get('wfp_code'))
                                                                                    ->where('wfp_act_id',$row->twa_id)
                                                                                    ->first();

                                    ?>
                                    @if($cmd["PPMP"] == 1 && $CheckIfHasPi)
                                    <button  id="btn_ppmp" class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                        style="position: relative;right:0;bottom:0;"
                                        data-toggle="tooltip" title="PPMP" data-placement="right" data-original-title="PPMP"
                                        onclick="gotoPPMP('{{ $wfp_code }}',{{ $row->twa_id }})">
                                    <i class="fas fa-shopping-cart"></i>
                                    </button>
                                    @endif
                                </td>
                                @endif
                                <td>{{ $row->wfp_activity_id }}</td>
                                <td>{{ $row->function_class }}</td>
                                <td>{{ $row->function_description }}</td>
                                <td>{{ $row->out_activity }}</td>
                                <td>{{ $row->target_q1 }}</td>
                                <td>{{ $row->target_q2 }}</td>
                                <td>{{ $row->target_q3 }}</td>
                                <td>{{ $row->target_q4 }}</td>
                                <td>{{ number_format($row->activity_cost, 2, '.', ',') }}</td>
                                <td>{{ $row->responsible_person }}</td>
                                <td>{{ $row->name }}</td>

                            </tr>
                            <?php
                                $total_cost = $total_cost +  (float)$row->activity_cost;
                            ?>

                        @empty
                            <div class="row"  style="height:100%;width:100%; ">
                                <div class="col-12 text-center" style="height:100%;width:100%;">
                                    <img style="position: absolute;top:100%;-ms-transform: translateY(-70%);transform: translateY(-70%);-ms-transform: translateX(-40%);transform: translateX(-40%);height:10rem;width:10rem" src="{{ asset('dist/assets/media/svg/icons/Code/Warning-2.svg') }}"/>
                                    <h1 style="position: absolute;top:120px;width:100%;">No Activity Encoded</h1>
                                    <div style="position: absolute;top:160px;;width:100%;height:100%;">

                                        {{-- <button class="btn btn-primary" onclick="editWfp('{{ $wfp_code }}','null')">Edit</button> --}}
                                        <button class="btn btn-secondary" onclick="wfp_drawer_close()">Close</button>
                                    </div>
                                </div>
                            </div>
                        @endforelse
@if(count($data["activities"]) <> 0)
                        <tr class="bg-secondary">
                            @if($cmd["EDIT"] == 1 || $cmd["DEL"] == 1 || $cmd["VIEW"] == 1 || $cmd["PPMP"] == 1 ||  $cmd["COMMENT"] == 1 ) <th scope="col"></th> @endif
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Total</th>
                            <th scope="col">{{ number_format($total_cost, 2, '.', ',') }}</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

@endif
</div>

@if(count($data["comments"]) <> 0)
<div class="row">
    <div class="col-12 p-5">
        <h3 class="display-5"><i class="flaticon-chat text-primary mr-2"></i>Comment Section</h3>
        <div class="separator separator-dashed separator-border-3"></div>
    </div>
</div>
@endif
<div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle row" id="comments">
@forelse($data["comments"] as $row)
  <!--begin::Item-->
  <div class="card border-top-0 col-12">
    <!--begin::Header-->
    <div class="card-header" >
        <div class="card-title text-dark " >
            <div class="card-label text-light pl-4 label label-primary label-inline font-weight-bolder">{{ 'ACTIVITY #' . Str::padLeft($row["wfp_act_id"],5,'0') }}</div>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div >
        <div class="card-body text-dark-50 font-size-lg pl-12 ">
            <?php
                $comments = \App\WfpComments::join('users','users.id','tbl_wfp_comments.user_id')
                                            ->select('users.name','tbl_wfp_comments.created_at','tbl_wfp_comments.comment')
                                            ->where('wfp_code',$row["wfp_code"])
                                            ->where('wfp_act_id',$row["wfp_act_id"])
                                            ->orderBy('created_at','DESC')
                                            ->get();
            ?>
                @foreach($comments as $row2)
                <div class="mb-3">
                    <!--begin::Section-->
                    <div class="d-flex align-items-center">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50 symbol-light mr-5">
                            <span class="symbol-label font-size-h1">
                                 {{ strtoupper(Str::substr(Str::words($row2["name"],2),0,1)) }}
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column flex-grow-1">
                            <div class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">{{ $row2["name"] }}</div>
                            <span class="text-muted font-weight-normal"><i class="
                                flaticon-time-1 mr-2"></i>{{ Carbon\Carbon::parse($row2["created_at"])->diffForHumans() }}</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Section-->
                    <!--begin::Desc-->
                    <p class="text-dark-50 m-0 p-5 font-weight-bold bg-gray-200 rounded-lg mt-1"> {{ $row2["comment"] }}</p>
                    <!--end::Desc-->
                </div>
                    {{-- <div class="row">
                        <div class="col-3 ">
                            <div class="symbol symbol-50 ">
                                <span class="symbol-label font-size-h1">{{ strtoupper(Str::substr(Str::words($row2["name"],2),0,1)) }}</span>
                            </div>
                            asd
                        </div>
                        <div class="col-9 ">
                                {{ $row2["comment"] }} <br><span>{{ Carbon\Carbon::parse($row2["created_at"])->diffForHumans() }}</span>
                        </div>
                    </div> --}}

                @endforeach
            </div>

    </div>
    <!--end::Body-->
</div>
<!--end::Item-->


@empty

@endforelse
</div>

