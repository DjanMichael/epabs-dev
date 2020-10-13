<!-- Modal-->
<div class="modal fade" id="inner_modal_reference" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog @yield('modal-inner-size') modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@yield('title') Price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="alert_inner" class="alert alert-custom alert-notice alert-light-danger" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        <ul id="alert_text_inner"></ul>
                    </div>
                    <div class="alert-close">
                        <button type="button" class="close" id="btn_alert_inner_close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>

                <div id="inner_modal_content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="kt_btn_2">Save changes</button>
            </div>
        </div>
    </div>
</div>
