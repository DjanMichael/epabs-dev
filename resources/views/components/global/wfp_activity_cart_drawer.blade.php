    <div class="row">
        <div class="bg-dark text-light col-12 p-15"
        style="padding:10px;position:fixed;top:-10px;margin:0 auto;height:auto;width:100%;z-index:1000;
         background-position: 0 calc(30% + 0.5rem); background-size: 100% auto; background-image: url({{ asset('dist/assets/media/svg/patterns/rhone.svg') }})">
            <div class="" style="width:91.5%">
                <div class="row">
                    <div class="col-10">
                        <h1> <i class="fas fa-shopping-cart icon-xl text-light"></i> Activity Cart </h1>
                    </div>
                    <div class="col-2 text-right">
                        <button class="btn btn-icon btn-light btn-hover-danger btn-sm"
                            onclick="wfp_act_cart_drawer_close()"
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
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">New Arrivals</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-primary font-weight-bolder font-size-sm">New Report</a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                            <thead>
                                <tr>
                                    <th class="pl-0" style="min-width: 120px">Item Description</th>
                                    <th  class="text-left" style="min-width: 120px">Price</th>
                                    <th class="text-center" style="min-width: 120px">Qty</th>
                                    <th  class="text-left" style="min-width: 120px">Total</th>
                                    <th class="pr-0 text-right" style="min-width: 160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data["ppmp_items"] as $row)
                                <tr>
                                    <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg"></span>
                                        <span class="text-muted font-weight-bold">Code: BR</span>
                                    </td>
                                    <td class="text-left">
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">1,000.00</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                            <span id="qty_">0</span>
                                            <input type="hidden" id="qty">
                                            <button onclick="showCartQtyModal('1')" class="btn btn-icon bg-primary btn-xs ml-2">
                                                <i class="far fa-calendar-plus text-light"></i>
                                            </button>
                                        </span>
                                        {{-- <span class="text-muted font-weight-bold">Web, UI/UX Design</span> --}}
                                    </td>
                                    <td class="text-left">
                                        <span class="label label-lg label-light-primary label-inline">Approved</span>
                                    </td>
                                    <td class="pr-0 text-right">
                                        <button type="button" onclick="deletePPMPItem(1)" class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary">
                                            <i class="fas fa-trash-alt text-primary"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>NO RECORD</td>
                                </tr>
                                @endforelse
                            </tbody>
                                <tr class="text-left">
                                    <th class="pl-0" style="min-width: 120px"></th>
                                    <th style="min-width: 120px"></th>
                                    <th class="text-right" style="min-width: 120px">Total</th>
                                    <th class="text-left" style="min-width: 120px">1,0000.00</th>
                                    <th class="pr-0 text-right" style="min-width: 160px"></th>
                                </tr>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Body-->
            </div>
</div>






