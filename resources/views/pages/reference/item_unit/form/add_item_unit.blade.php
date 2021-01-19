<form class="form" onSubmit="return false;">
    <div class="card-body">

        <div class="form-group">
            <label>Unit Name<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon2-crisp-icons"></i></span></div>
                <input type="text" class="form-control" id="name" autocomplete="off"/>
            </div>
        </div>

        <div class="form-group">
            <label>Unit of Measurement<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon2-paper"></i></span></div>
                <input type="hidden" class="form-control" id="item_unit_id"/>
                <input type="text" class="form-control" id="measure" autocomplete="off"/>
            </div>
        </div>

        <div class="form-group row div_status">
            <label class="col-12 col-md-2 col-form-label">Status<span class="text-danger">*</span></label>
            <div class="col-12 col-md-3">
                <span class="switch switch-icon">
                    <label>
                        <input type="checkbox" name="select" id="chk_status">
                        <span></span>
                    </label>
                </span>
            </div>
        </div>

    </div>
</form>
