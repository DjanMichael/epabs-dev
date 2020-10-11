{{-- <div id="bg-drawer" onclick="wfp_drawer_close()"></div>
<div class="wrapper-drawer scroll scroll-pull" data-scroll="true" data-wheel-propagationtrue" style="height: 768px;" id="wfp_drawer"> --}}
    {{-- scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 768px;"  --}}
@if(count($activities) <> 0)
<div class="row">
    <div class="col-12 col-md-8"><h1>Work and Financial Plan <small class="text-muted font-size-sm ml-2"> YEAR {{ $year != '' ? $year : ''  }}</small></h1></div>
        <div class="col-12 col-md-4 text-right">

            <button class="btn btn-icon btn-light btn-hover-danger btn-sm" onclick="wfp_drawer_close()"
                style="position: relative;right:0;bottom:0;"><i class="flaticon-close"></i>
            </button>
        </div>
        <div class="col-12">
                <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5" >
                    Work and Financial Plan
                </div>
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
                        <tbody>
@endif
                        <?php

                            $total_cost = 0.00;
                        ?>
                        @forelse ($activities as $row)
                            <tr class="wfp_table_row">
                                <td scope="row text-center" style="width:130px;">
                                    <button type="button"
                                        class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                        style="position: relative;bottom:0px;right:0;"
                                        onclick="showModalComment('{{ $user_id }}','{{ $wfp_code }}')">
                                        <i class="flaticon-comment"></i>
                                    </button>
                                    <button class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                            style="position: relative;right:0;bottom:0;"
                                            onclick="editWfp('{{ $wfp_code }}')">
                                        <i class="flaticon-edit"></i>
                                    </button>
                                    <button class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                        style="position: relative;right:0;bottom:0;"
                                        onclick="showWfpActivityModal('{{ $user_id }}','{{ $wfp_code }}')">
                                    <i class="flaticon-medical"></i>
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
                            <div class="row"  style="height:100%;width:100%;">
                                <div class="col-12 text-center" style="height:100%;width:100%;">
                                    <img style="position: absolute;top:20%;-ms-transform: translateY(-50%);transform: translateY(-50%);-ms-transform: translateX(-50%);transform: translateX(-40%);height:10rem;width:10rem" src="{{ asset('dist/assets/media/svg/icons/Code/Warning-2.svg') }}"/>
                                    <h1 style="position: absolute;top:40%;width:100%;">No Activity Encoded</h1>
                                    <div style="position: absolute;top:50%;width:100%;">
                                        <button class="btn btn-secondary" onclick="wfp_drawer_close()">Close</button>
                                    </div>
                                </div>
                            </div>
                        @endforelse
@if(count($activities) <> 0)
                        <tr>
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

