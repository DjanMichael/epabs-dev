<div class="table-responsive">
<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
    <thead>
        <tr class="text-left">
            <th scope="col">Action</th>
                <th scope="col">PI</th>
                <th scope="col">UACS Code</th>
                <th scope="col">Performance Indicator</th>
                <th scope="col">Cost</th>
                <th scope="col">PPMP</th>
                <th scope="col">Catering</th>
                <th scope="col">Batch</th>
                <th scope="col">Budget Line Item #</th>
        </tr>
    </thead>
    <tbody>
        <?php

            $total = 0;
            ?>
        @forelse($data["pi_data"] as $row)
        <?php  $total+= $row["cost"]; ?>
        <tr>
            <td class="pr-0 text-center">
                <button class="btn btn-icon btn-light btn-hover-primary btn-sm d-inline col-12" onClick="">
                    <i class="flaticon-edit"></i>
                </button>
                <button class="btn btn-icon btn-light btn-hover-primary btn-sm mt-1 d-inline col-12" onClick="">
                    <i class="flaticon2-trash"></i>
                </button>
            </td>
            <td>
            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$row["id"]}}</span>
                {{-- <span class="text-muted font-weight-bold">asdasd</span> --}}
            </td>
            <td>
            <span class="text-dark-75 font-weight-bolder d-block font-size-lg"> {{$row["uacs_id"]}}</span>
            </td>
            <td>
                <span class="text-dark-75 font-weight-bolder d-block font-size-lg"> {{$row["performance_indicator"]}}</span>
            </td>
            <td>
                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">₱ {{ number_format($row["cost"],2)}}</span>
            </td>
            <td>
                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$row["is_ppmp"]}}</span>
            </td>
            <td>
                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$row["is_catering"]}}</span>
            </td>
            <td>
                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$row["batch"]}}</span>
            </td>
            <td>
                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$row["bli_id"]}}</span>
            </td>

        </tr>
        @empty
        <tr>
            <td colspan="9">
                <div class="p-20 w-100" id="peformance_indicator_table_content" style="height:150px; text-align:center;border:1px solid grey;">
                        <i class="flaticon2-start-up icon-2x"></i>
                        <p>No Indicator</p>
                    </div>
            </td>
        </tr>
        @endforelse
        @isset($data["pi_data"])
            <tr>
                <td colspan="4">TOTAL</td>
                <td>
                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">₱ {{number_format($total,2)}}</span>
                </td>
            </tr>
        @endisset
    </tbody>
</table>
</div>
