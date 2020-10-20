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
        <div class="row" style="width:91%;">
            <div class="col-12 col-md-8">
                <div class="row">

                    @if(count($activities) <> 0)
                    <div class="col-12 col-md-4">
                        <button type="button" onclick="wfpApprove('{{ $wfp_code }}')" class="btn btn-transparent-success font-weight-bold  btn-block"><i class="flaticon-like icon-md"></i>APPROVED WFP</button>
                        <button type="button" onclick="wfpSubmit('{{ $wfp_code }}')" class="btn btn-transparent-primary font-weight-bold  btn-block"><i class="flaticon2-send-1 icon-md"></i>SUBMIT WFP</button>
                        <button type="button" onclick="wfpRevise('{{ $wfp_code }}')" class="btn btn-transparent-danger font-weight-bold  btn-block" ><i class="flaticon2-refresh-1 icon-md"></i>REVISED WFP</button>
                    </div>
                    @endif

                    <div class="col-12 col-md-4">
                        @if(count($activities) <> 0)
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

        @if(count($activities) <> 0)
        <div class="col-12 " style="position: relative;">
                <div class="offcanvas-content pr-5 mr-n5" id="wfp_drawer_title">
                    <div class="table-responsive-*">
                        <table class="table table-sm table-bordered table-hover" class="wfp_table">
                            <thead style="text-align:center;" class="bg-secondary">
                                <tr>
                                    <th scope="col">Action</th>
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
                        @forelse ($activities as $row)
                            <tr class="wfp_table_row">
                                <td scope="row text-center" style="width:130px;">

                                    <button  id="wfp_edit_act" class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                            style="position: relative;right:0;bottom:0;"
                                            data-toggle="tooltip" title="Edit" data-placement="right" data-original-title="Edit"
                                            onclick="editWfp('{{ $wfp_code }}','{{ $row->twa_id }}')">
                                        <i class="flaticon-edit"></i>
                                    </button>
                                    <button id="wfp_del_act" class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                            style="position: relative;right:0;bottom:0;"
                                            data-toggle="tooltip" title="Delete" data-placement="right" data-original-title="Delete"
                                            onclick="deleteWfp('{{ $row->twa_id }}')">
                                        <i class="flaticon2-trash"></i>
                                    </button>
                                    <button  id="wfp_comment_act" type="button"
                                        class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                        style="position: relative;bottom:0px;right:0;"
                                        data-toggle="tooltip" title="Comment" data-placement="right" data-original-title="Comment"
                                        onclick="showModalComment('{{ $user_id }}','{{ $wfp_code }}')">
                                        <i class="flaticon-comment"></i>
                                    </button>
                                    <button  id="wfp_showpi_act" class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                        style="position: relative;right:0;bottom:0;"
                                        data-toggle="tooltip" title="View Details" data-placement="right" data-original-title="View Details"
                                        onclick="showWfpActivityModal('{{ $user_id }}','{{ $wfp_code }}',{{ $row->twa_id }})">
                                    <i class="flaticon-medical"></i>
                                    </button>

                                    <button  id="btn_ppmp" class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                        style="position: relative;right:0;bottom:0;"
                                        data-toggle="tooltip" title="PPMP" data-placement="right" data-original-title="PPMP"
                                        onclick="gotoPPMP('{{ $wfp_code }}',{{ $row->twa_id }})">
                                    <i class="fas fa-shopping-cart"></i>
                                    </button>

                                </td>
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
@if(count($activities) <> 0)
                        <tr class="bg-secondary">
                            <th scope="col"></th>
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
    {{-- </div>
</div> --}}

