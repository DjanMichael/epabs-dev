<!-- Modal-->
<div class="modal fade" id="modal_budget_program" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                                    <input type="number" class="form-control" id="bli_amount" placeholder="99.9">
                                    <input type="hidden" id="bli_unit_id" value="">
                                    <input type="hidden" id="bli_year_id" value="">
                                    <input type="hidden" id="bli_user_id" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        {{-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> --}}
                        <button type="button" class="btn btn-primary font-weight-bold" id="btn_save_budget">Save Budget </button>
                    </div>
                    <div class="col-12">
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    </div>
                    <div class="col-12 mt-6">
                        <h3>List of Budget Allocated</h3>
                        <div id ="unit_budget_allocated_list"></div>

                    </div>
                </div>
            </div>
            <div class="modal-footer" style="float:left">


            </div>
        </div>
    </div>
</div>
