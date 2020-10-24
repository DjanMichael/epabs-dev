<form class="form" onSubmit="return false;">
    <div class="card-body">

        <div class="form-group">
            <label>Year<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon2-calendar-9"></i></span></div>
                <input type="hidden" class="form-control" id="year_id"/>
                <input type="number" class="form-control" id="year" min="2016" maxlength="4" placeholder="0000"/>
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
