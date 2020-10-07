<form class="form" onSubmit="return false;">
    <div class="card-body">

        <div class="form-group">
            <label>Classification<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon2-checking"></i></span></div>
                <input type="hidden" class="form-control" id="classification_id"/>
                <input type="text" class="form-control" id="classification"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-12 col-md-2 col-form-label">Status<span class="text-danger">*</span></label>
            <div class="col-12 col-md-3">
                <span class="switch switch-icon">
                    <label>
                        <input type="checkbox" name="select" id="chk_status" value="INACTIVE">
                        <span></span>
                    </label>
                </span>
            </div>
        </div>

    </div>
</form>
