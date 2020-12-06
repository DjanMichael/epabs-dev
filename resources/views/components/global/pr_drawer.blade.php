<div class="row">
    <div class="bg-dark text-light col-12 p-15"
    style="padding:10px;position:fixed;top:-10px;margin:0 auto;height:auto;width:100%;z-index:1000;
     background-position: 0 calc(30% + 0.5rem); background-size: 100% auto; background-image: url({{ asset('dist/assets/media/svg/patterns/rhone.svg') }})">
        <div class="" style="width:91.5%">
            <div class="row">
                <div class="col-10">
                    <h1> <i class="flaticon-file-2 icon-xl text-light"></i> Purchase Request </h1>
                </div>
                <div class="col-2 text-left">
                    <button class="btn btn-icon btn-light btn-hover-danger btn-sm"
                        onclick="pr_drawer_close()"
                        style="position: relative;top:0px;right:0px;"><i class="flaticon-close"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
        <div class="col-12 col-md-4" style="height:120px;"></div>


        <div class="card card-custom col-12">
            <!--begin::Header-->
            {{-- <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">New Arrivals</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                </h3>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-primary font-weight-bolder font-size-sm">New Report</a>
                </div>
            </div> --}}
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                <!--begin::Table-->
                <table style="width:100%;">
                    <tr>
                        <td colspan="7"style="text-align:center;border:1px solid black;">
                            <span><b>PURCHASE REQUEST</b></span><br>
                            <span>DOH REGIONAL OFFICE XIII</span><br>
                            <span>Agency</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" style="border-left:1px solid black;padding-left:5px;">Division:</td>
                        <td colspan="4" style="border-top:1px solid black;font-weight:bold;">MSD/KMICT</td>
                        <td colspan="1" style="border-top:1px solid black;">PR No.</td>
                        <td colspan="1" style="border-top:1px solid black;border-right:1px solid black;">Date</td>
                    </tr>
                    <tr>
                        <td colspan="1" style="border-left:1px solid black;border-bottom:1px solid black;padding-left:5px;">Office:</td>
                        <td colspan="4" style="border-bottom:1px solid black;font-weight:bold;">DOHROXIII</td>
                        <td colspan="1" style="border-bottom:1px solid black;">SAI No.</td>
                        <td colspan="1" style="border-bottom:1px solid black;border-right:1px solid black;">Date</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid black;width:50px;text-align:center;font-weight:bold;">Action</td>
                        <td style="border:1px solid black;width:50px;text-align:center;font-weight:bold;">Stock No.</td>
                        <td style="border:1px solid black;width:50px;text-align:center;font-weight:bold;">Unit</td>
                        <td style="border:1px solid black;width:350px;text-align:center;font-weight:bold;">Item Description</td>
                        <td style="border:1px solid black;width:50px;text-align:center;font-weight:bold;">Qty</td>
                        <td style="border:1px solid black;width:150px;text-align:center;font-weight:bold;">Unit Cost</td>
                        <td style="border:1px solid black;width:150px;text-align:center;font-weight:bold;">Total Cost</td>
                    </tr>
                    <?php
                    $total=0;
                    ?>
                    {{-- {{ dd($data["item_list"]) }} --}}
                    @forelse ($data["item_list"] as $row)
                    <?php
                    $total += $row["item_qty"] * $row["item_price"];
                    ?>
                    <tr>
                    <td style="height:18px;border:1px solid black;"><button type="button" onclick="delPrItem('{{ $row['id'] }}')" }}">DELETE</button></td>
                        <td style="height:18px;border:1px solid black;"></td>
                        <td style="height:18px;border:1px solid black;text-align:center;">{{ $row["item_unit"] }}</td>
                        <td style="height:18px;border:1px solid black;padding-left:4px;">{{ $row["item_description"] }}</td>
                        <td style="height:18px;border:1px solid black;text-align:center;">{{ $row["item_qty"] }}</td>
                        <td style="height:18px;border:1px solid black;text-align:center;">{{ number_format($row["item_price"],2) }}</td>
                        <td style="height:18px;border:1px solid black;text-align:center;">{{ number_format($row["item_qty"] * $row["item_price"],2) }}</td>
                    </tr>
                    @empty

                    @endforelse
                    <tr>
                        <td colspan="6" style="height:18px;border:1px solid black;padding-left:5px;">Total</td>
                    <td  style="height:18px;border:1px solid black;text-align:center;">{{ number_format(  $total ,2) }}</td>
                    </tr>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Body-->
        </div>
</div>





