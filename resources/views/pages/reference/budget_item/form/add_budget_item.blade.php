<form class="form" onSubmit="return false;">
    <div class="card-body">

        <div class="form-group">
            <input type="hidden" class="form-control" id="budget_item_id"/>
            <label>Budget Item<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon2-rectangular"></i></span></div>
                <input type="text" class="form-control" id="budget_item" autocomplete="off"/>
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
