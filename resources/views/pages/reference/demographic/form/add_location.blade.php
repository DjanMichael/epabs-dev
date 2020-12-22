<form class="form" onSubmit="return false;">
    <div class="card-body">

        <div class="form-group">
            <label>Region<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon-placeholder-3"></i></span></div>
                <input type="hidden" class="form-control" id="location_id"/>
                <input type="text" class="form-control" id="region" autocomplete="off"/>
            </div>
        </div>

        <div class="form-group">
            <label>Province<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon2-map"></i></span></div>
                <input type="text" class="form-control" id="province" autocomplete="off"/>
            </div>
        </div>

        <div class="form-group">
            <label>City/Municipality<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon2-location"></i></span></div>
               <input type="text" class="form-control" id="city" autocomplete="off"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label">Outside of Region?<span class="text-danger">*</span></label>
            <div class="col-12 col-md-3">
                <span class="switch switch-icon">
                    <label>
                        <input type="checkbox" name="select" id="chk_outside">
                        <span></span>
                    </label>
                </span>
            </div>
            <label class="col-12 col-md-2 col-form-label div_status">Status<span class="text-danger">*</span></label>
            <div class="col-12 col-md-3 div_status">
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
