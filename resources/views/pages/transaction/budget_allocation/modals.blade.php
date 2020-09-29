<!-- Modal-->
<div class="modal fade" id="modal_budget_program" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Allocate Budget </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="alert" class="alert alert-custom alert-notice alert-light-danger" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        <ul id="alert_text"></ul>
                    </div>
                    <div class="alert-close">
                        <button type="button" class="close" id="btn_alert_close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form">
                            <div class="form-group">
                                <label>Budget Line Item <span class="text-danger">*</span></label>
                                <select class="form-control form-control-solid" id="bli_name">
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Amount<span class="text-danger">*</span></label>
                                <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">₱</span></div>
                                    <input type="text" class="form-control" id="bli_amount" placeholder="99.9">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        {{-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> --}}
                        <button type="button" class="btn btn-primary font-weight-bold" id="kt_btn_1">Save Budget </button>
                    </div>
                    <div class="col-12 mt-4">
                        <h3>List of Budget Allocated</h3>
                        <div class="d-flex align-items-center mb-2 bg-light-secondary rounded p-5">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                                        <thead>
                                            <tr class="text-left">
                                                <th style="min-width: 200px">Budget Line Item</th>
                                                <th style="min-width: 150px">Amount</th>
                                                <th class="pr-0 text-right" style="min-width: 150px">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Management Support Division</span>
                                                    <span class="text-muted font-weight-bold">Finance</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">1,222,333.00</span>
                                                </td>

                                                <td class="pr-0 text-right">
                                                    <button class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                        <i class="flaticon-edit"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                        <i class="flaticon2-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <div class="separator separator-dashed separator-border-2 separator-secondary mb-3 mt-6"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Management Support Division</span>
                                                    <span class="text-muted font-weight-bold">Finance</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">1,222,333.00</span>
                                                </td>

                                                <td class="pr-0 text-right">
                                                    <button class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                        <i class="flaticon-edit"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                        <i class="flaticon2-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->

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
                                <span class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">BUDGET LINE ITEM</span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Lable-->
                            <span class="font-weight-bolder text-secondary py-1 font-size-lg">1,990,000.00</span>
                            <!--end::Lable-->
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer" style="float:left">


            </div>
        </div>
    </div>
</div>
