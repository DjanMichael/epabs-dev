<form class="form">
    <div class="card-body">
        <div class="form-group">
            <label>Description<span class="text-danger">*</span></label>
            <input type="hidden" class="form-control" id="procurement_id"/>
            <input type="text" class="form-control" id="item_description" placeholder="Enter item description"/>
        </div>

        <div class="form-group">
            <label>Unit<span class="text-danger">*</span></label>
            <select class="form-control" id="item_unit">
                <option value="">Please select item unit</option>
                @foreach($data["unit"] as $row)
                    <option value="{{ $row["id"] }}">{{ $row["unit_name"] }} - {{ $row["unit_of_measure"] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Classification<span class="text-danger">*</span></label>
            <select class="form-control" id="item_classification">
                <option value="">Please select item classification</option>
                @foreach($data["classification"] as $row)
                    <option value="{{ $row["id"] }}">{{ $row["classification"] }}</option>
                @endforeach
            </select>
        </div>

        @isset ($data["category"])
            <div class="form-group">
                <label>Category<span class="text-danger">*</span></label>
                <select class="form-control" id="item_category">
                    <option value="">Please select category</option>
                    @foreach($data["category"] as $row)
                        <option value="{{ $row["id"] }}">{{ $row["category"] }}</option>
                    @endforeach
                </select>
            </div>
        @endisset

        <div class="form-group row">
            <div class="col-12 col-md-6">
                <label>Price<span class="text-danger">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" >₱</span></div>
                    <input type="text" class="form-control" id="item_price" placeholder="99.9"/>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label>Effective Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="effective_date"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-12 col-md-2 col-form-label">Fix Price<span class="text-danger">*</span></label>
            <div class="col-12 col-md-3">
                <span class="switch switch-icon">
                    <label>
                        <input type="checkbox" name="select" id="chk_fix_price">
                        <span></span>
                    </label>
                </span>
            </div>

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
