<!-- Modal-->
<div class="modal fade" id="secondary_modal_reference" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered @yield('modal-secondary-size')" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@yield('title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- {{-- <div id="alert" class="alert alert-custom alert-notice alert-light-danger" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        <ul id="alert_text"></ul>
                    </div>
                    <div class="alert-close">
                        <button type="button" class="close" id="btn_alert_close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div> --}} -->

                <div id="second_modal_content"></div>
                <div class="table-responsive" id="inner_table_populate">
                    <div id="inner_table_content"></div>
                </div>
            </div>
        </div>
    </div>
</div>
