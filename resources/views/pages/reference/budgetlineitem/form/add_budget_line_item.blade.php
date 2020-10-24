<form class="form" onSubmit="return false;">
    <div class="card-body">

        <div class="form-group">
            <label>Budget Item<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon-list-1"></i></span></div>
                <input type="hidden" class="form-control" id="budget_item_id"/>
                <input type="text" class="form-control" id="budget_item"/>
            </div>
        </div>

        <div class="form-group">
            <label>Year<span class="text-danger">*</span></label>
            <select class="form-control" id="year">
                <option value="">Please select year</option>
                @foreach($data["year"] as $row)
                    <option value="{{ $row["id"] }}">{{ $row["year"] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Allocation Amount<span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" >₱</span></div>
                    <input type="text" class="form-control number" id="amount" placeholder="99.9"/>
                </div>
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
