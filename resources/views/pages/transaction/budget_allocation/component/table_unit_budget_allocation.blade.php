<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
    <thead>
        <tr class="text-left">
            <th style="min-width: 200px">Program Coordinator</th>
            <th style="min-width: 150px">Office</th>
            <th style="min-width: 150px">Program</th>
            <th style="min-width: 150px">Allocation</th>
            <th style="min-width: 160px">Utilized</th>
            <th style="min-width: 160px">Balance</th>
            <th class="pr-0 text-right" style="min-width: 150px">action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data["unit_budget_allocation"] as $row)

        <?php
        $hasBudget = $row["hasBudget"] != 0;
        // $row["hasBudget"] != 0 ;

        $total = $row["yearly_budget"] ;
        $used  = $row["yearly_utilized"];

        if (($hasBudget && $used != null) || ( $total != 0 && $used != null )){
            $bal  = number_format((($total - $used) / $total) * 100,2);
            $used = number_format(($used / $total) * 100,2);
        }else{
            $total =0;
            $used =0;
            $bal =0;
        }
        ?>
        <tr>
            <td class="pl-0" style="float:left;width:100%">
                <div class="row">
                    <div class="col-3">
                        <div class="symbol-list d-flex flex-wrap">
                            <div class="symbol symbol-50  mr-3">
                                <span class="symbol-label font-size-h1">{{ strtoupper(Str::substr(Str::words($row["t1_name"],2),0,1)) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 pt-2 pl-6">
                        <span class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" style= "text-transform: capitalize;">{{  $row["t1_name"]  }} </span>
                        <span class="text-muted font-weight-bold text-muted d-block">{{  $hasBudget ? ($row["designation"] == ""  ? "NO DESIGNATION" : $row["designation"]) : ($row["t1_designation"] == ""  ? "NO DESIGNATION" : $row["t1_designation"]) }}</span>
                    </div>
                </div>
            </td>
            <td>
            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{  $row["t1_division"]   }}</span>
                <span class="text-muted font-weight-bold">{{  $row["t1_section"] }}</span>
            </td>
            <td>
                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{  $row["t1_program_name"]   }}</span>
            </td>
            <td>
            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">₱ {{ number_format($row["yearly_budget"],2) }}</span>
            </td>
            <td>
                <div class="d-flex flex-column w-100 mr-2">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted mr-2 font-size-sm font-weight-bold">{{ $used }}%</span>
                        <span class="text-muted font-size-sm font-weight-bold">₱ {{ number_format($row["yearly_utilized"],2) }}</span>
                    </div>
                    <div class="progress progress-xs w-100">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $used }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column w-100 mr-2">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted mr-2 font-size-sm font-weight-bold">{{ $bal }}%</span>
                        <span class="text-muted font-size-sm font-weight-bold">₱ {{ number_format(($row["yearly_budget"] - $row["yearly_utilized"]),2) }}</span>
                    </div>
                    <div class="progress progress-xs w-100">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{$bal}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </td>
            <td class="pr-0 text-right">
                <button type="button" onClick="showAddBudgetModal({{  $row["t1_unit_id"] }},{{  $row["t1_year_id"] }},{{ $row["t1_user_id"] }},{{ $row["t1_program_id"] }})" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                    <span class="svg-icon svg-icon-md svg-icon-primary">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/General/Settings-1.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                                <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </button>
                @if($hasBudget)
                    <button type="button" onClick="deleteAllAllocation({{  $row["t1_unit_id"] }},{{ $row["t1_year_id"] }},{{ $row["t1_program_id"] }})" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                        <span class="svg-icon svg-icon-md svg-icon-primary">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/General/Trash.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </button>
                @endif
            </td>
        </tr>
        @empty
      <tr>
          <td colspan="6">  NO DATA</td>
      </tr>
        @endforelse
    </tbody>
</table>

@if(count($data["unit_budget_allocation"]) != 0)
<div id="pagination_budget_allocation">
{{-- {{ $data["unit_budget_allocation"]->links('components.global.pagination') }} --}}
</div>
@endif

<script>

</script>
