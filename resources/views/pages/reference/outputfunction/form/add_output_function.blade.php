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
                <input type="text" class="form-control" id="description"/>
            </div>
        </div>

        <div class="form-group">
            <label>Program<span class="text-danger">*</span></label>
            <select class="form-control" id="program">
                <option value="">Please select program</option>
                @foreach($data["program"] as $row)
                    <option value="{{ $row["id"] }}">{{ $row["program_name"] }}</option>
                @endforeach
            </select>
        </div>

    </div>
</form>
