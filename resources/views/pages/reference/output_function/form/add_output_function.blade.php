<form class="form" onSubmit="return false;">
    <div class="card-body">

        <div class="form-group">
            <input type="hidden" class="form-control" id="output_function_id"/>
            <label>Output Function<span class="text-danger">*</span></label>
            <select class="form-control" id="function_deliverables">
                <option value="">Please select function deliverables</option>
                @foreach($data["function_deliverables"] as $row)
                    <option value="{{ $row["id"] }}">{{ $row["function_class"] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Description<span class="text-danger">*</span></label>
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text" ><i class="flaticon2-crisp-icons"></i></span></div>
                <input type="text" class="form-control" id="description" autocomplete="off"/>
            </div>
        </div>

        <div class="form-group">
            <label>Program<span class="text-danger">*</span></label>
            <select class="form-control" id="program">
                <option value="">Please select program</option>
                @foreach($data["program"] as $row)
                    <option value="{{ $row["program_id"] }}">{{ $row["program_name"] }}</option>
                @endforeach
            </select>
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
