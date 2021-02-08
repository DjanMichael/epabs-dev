<form class="form" onSubmit="return false;">
    <div class="card-body">

        <div class="form-group">
            <label>Year<span class="text-danger">*</span></label>
            <input type="hidden" class="form-control" id="annual_budget_id"/>
            <select class="form-control" id="year">
                <option value="">Please select year</option>
                @foreach($data["year"] as $row)
                    <option value="{{ $row["id"] }}">{{ $row["year"] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group form_amount">
            <label>Available Budget<span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" >₱</span></div>
                    <input type="text" class="form-control number" id="amount" placeholder="99.9"/>
                </div>
            </div>
        </div>

    </div>
</form>
