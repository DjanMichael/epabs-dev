

<input type="hidden" id="edit_bli_unit_id" value="" />
<input type="hidden" id="edit_bli_user_id" value="" />
<input type="hidden" id="edit_bli_year_id" value="" />
<input type="hidden" id="edit_bli_id" value="" />
<input type="hidden" id="edit_program_id" value="" />


<input type="hidden" id="edit_bli" value="" />
<input type="hidden" id="edit_amount" value="" />

<div class="d-flex align-items-center mb-2 bg-light-secondary rounded p-5" >
   <!--begin::Table-->
   <div class="table-responsive">
    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
        <thead>
            <tr class="text-left">
                <th class="pr-0 text-left" style="min-width: 150px">action</th>
                <th style="min-width: 250px">Budget Line Item</th>
                <th class="pr-0 text-right" style="min-width: 150px">Amount</th>
            </tr>
        </thead>
        <tbody id="unit_bli_allocation_row">
            <?php
            // dd($data["unit_per_user_budget"]);
            $total =0;
            ?>
            @forelse ($data["unit_per_user_budget"] as $row)

            <?php

            $total += $row["program_budget"] ;
            ?>
            <tr>
                <td class="pr-0 text-left">
                    <button class="btn btn-icon btn-light btn-hover-primary btn-sm" onClick="editBLIUser({{ $row["unit_id"] }},{{ $row["year_id"] }},{{ $row["user_id"] }},{{ $row["budget_line_item_id"] }},{{ $row["program_budget"] }},{{ $row["program_id"] }})">
                        <i class="flaticon-edit"></i>
                    </button>
                    <button class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3" onClick="deleteBLIUser({{ $row["tuba_id"] }})">
                        <i class="flaticon2-trash"></i>
                    </button>
                </td>
                <td>
                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row["budget_item"] }}</span>
                </td>
                <td class="pr-0 text-right">
                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg" id="">₱ {{ number_format($row["program_budget"],2) }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="separator separator-dashed separator-border-2 separator-dark mb-3 mt-6"></div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">NO DATA</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

</div>
<div class="d-flex align-items-center mb-2 bg-light-secondary rounded p-5">
    <!--begin::Icon-->
    <span class="svg-icon svg-icon-secondary mr-5">
        <span class="svg-icon svg-icon-lg">
            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Home/Library.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"></rect>
                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                    <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </span>
    <!--end::Icon-->

    <!--begin::Title-->
    <div class="d-flex flex-column flex-grow-1 mr-2">
        <span class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">TOTAL BUDGET</span>
    </div>
    <!--end::Title-->
    <!--begin::Lable-->
<span class="font-weight-bolder text-secondary py-1 font-size-lg">₱ {{ number_format($total,2) }}</span>
    <!--end::Lable-->
</div>
<!--end::Table-->
