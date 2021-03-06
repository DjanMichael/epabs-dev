<form class="form" onSubmit="return false;">
    <div class="card-body">

        <div class="form-group">
            <label>Source of Fund<span class="text-danger">*</span></label>
            <input type="hidden" class="form-control" id="fund_source_id"/>
            <select class="form-control" id="fund_source">
                <option value="">Please select source of fund</option>
                @foreach($data["fund_source"] as $row)
                    <option value="{{ $row["id"] }}">{{ $row["sof_classification"] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group form_budget_item">
            <input type="hidden" class="form-control" id="budget_item_id"/>
            <label>Budget Item<span class="text-danger">*</span></label>
            <select class="form-control" id="budget_item">
                <option value="">Please select budget item</option>
                @foreach($data["budget_item"] as $row)
                    <option value="{{ $row["budget_item"] }}">{{ $row["budget_item"] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group form_division">
            <input type="hidden" class="form-control" id="division_id"/>
            <label>Division<span class="text-danger">*</span></label>
            <select class="form-control" id="division" data-dependent="section">
                <option value="">Please select division</option>
                @foreach($data["units"] as $row)
                    <option value="{{ $row["division"] }}">{{ $row["division"] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group form_section">
            <input type="hidden" class="form-control" id="section_id"/>
            <label>Section<span class="text-danger">*</span></label>
            <select class="form-control" id="section" data-dependent="program">
                <option value="">Please select section</option>
            </select>
        </div>

        <div class="form-group form_program">
            <input type="hidden" class="form-control" id="program_id"/>
            <label>Program<span class="text-danger">*</span></label>
            <select class="form-control" id="program">
                <option value="">Please select program</option>
            </select>
        </div>

        <div class="form-group form_year">
            <label>Year<span class="text-danger">*</span></label>
            <select class="form-control" id="year">
                <option value="">Please select year</option>
                @foreach($data["year"] as $row)
                    <option value="{{ $row["id"] }}">{{ $row["year"] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group form_saa_number">
            <label>SAA Control Number<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon2-sheet"></i></span></div>
                <input type="text" class="form-control" id="saa_control_number" autocomplete="off"/>
            </div>
        </div>

        <div class="form-group form_amount">
            <label>Allocation Amount<span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" >₱</span></div>
                    <input type="text" class="form-control number" id="amount" placeholder="99.9"/>
                </div>
            </div>
        </div>

        <div class="form-group form_purpose">
            <label>Purpose<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon2-rectangular"></i></span></div>
                <input type="text" class="form-control" id="purpose" autocomplete="off"/>
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
