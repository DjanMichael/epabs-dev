<div class="row">
    <div class="bg-dark text-light col-12 p-15"
    style="padding:10px;position:fixed;top:-10px;margin:0 auto;height:auto;width:100%;z-index:1000;
     background-position: 0 calc(30% + 0.5rem); background-size: 100% auto; background-image: url({{ asset('dist/assets/media/svg/patterns/rhone.svg') }})">
        <div class="" style="width:91.5%">
            <div class="row">
                <div class="col-10">
                    <h1> <i class="fas fa-boxes icon-xl text-light"></i> PPMP </h1>
                </div>
                <div class="col-2 text-right">
                    <button class="btn btn-icon btn-light btn-hover-danger btn-sm"
                        onclick="wfp_ppmp_viewer_drawer_close()"
                        style="position: relative;top:0px;right:0px;"><i class="flaticon-close"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

        <div class="col-12 col-md-4" style="height:35px;"></div>
        <div class="col-12 col-md-4" style="height:35px;"></div>
        <div class="col-12 col-md-4 mb-md-40" style="height:35px;"></div>

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
                <div class="table-responsive">
                    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                        <thead>
                            <tr>
                                <th class="pl-0" style="min-width: 120px">Classification</th>
                                <th class="pl-0" style="min-width: 120px">Item Description</th>
                                <th  class="text-left" style="min-width: 50px">Unit</th>
                                <th class="text-center" style="min-width: 50px">Jan</th>
                                <th class="text-center" style="min-width: 50px">Feb</th>
                                <th class="text-center" style="min-width: 50px">Mar</th>
                                <th class="text-center" style="min-width: 50px">Apr</th>
                                <th class="text-center" style="min-width: 50px">May</th>
                                <th class="text-center" style="min-width: 50px">June</th>
                                <th class="text-center" style="min-width: 50px">July</th>
                                <th class="text-center" style="min-width: 50px">Aug</th>
                                <th class="text-center" style="min-width: 50px">Sept</th>
                                <th class="text-center" style="min-width: 50px">Oct</th>
                                <th class="text-center" style="min-width: 50px">Nov</th>
                                <th class="text-center" style="min-width: 50px">Dec</th>
                                <th  class="text-left" style="min-width: 50px">Total Qty</th>
                                <th  class="text-left" style="min-width: 120px">Unit Price</th>
                                <th  class="text-left" style="min-width: 120px">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ dd($data["ppmp_items"]) }} --}}
                            <?php
                                $g_total = 0;
                            ?>
                            @foreach($data["ppmp_items"] as $row)
                                <?php
                                $qty = $row->jan + $row->feb + $row->mar + $row->apr + $row->may + $row->june + $row->july + $row->aug + $row->sept + $row->oct + $row->nov + $row->dec;
                                $g_total += $qty * $row->price;
                                ?>
                                <tr>
                                    <td>{{ $row->classification }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>{{ $row->unit_name }}</td>
                                    <td>{{ $row->jan }}</td>
                                    <td>{{ $row->feb }}</td>
                                    <td>{{ $row->mar }}</td>
                                    <td>{{ $row->apr }}</td>
                                    <td>{{ $row->may }}</td>
                                    <td>{{ $row->june }}</td>
                                    <td>{{ $row->july }}</td>
                                    <td>{{ $row->aug }}</td>
                                    <td>{{ $row->sept }}</td>
                                    <td>{{ $row->oct }}</td>
                                    <td>{{ $row->nov }}</td>
                                    <td>{{ $row->dec }}</td>
                                    <td>{{ $qty }}</td>
                                    <td>{{ number_format($row->price,2) }}</td>
                                    <td>{{ number_format($qty * $row->price,2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="17" class="text-right">Total</td>
                                <td style="font-weight:bold;">{{ number_format($g_total,2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Body-->
        </div>
</div>






