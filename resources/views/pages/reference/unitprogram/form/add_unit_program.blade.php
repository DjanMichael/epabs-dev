<form class="form" onSubmit="return false;">
    <div class="card-body">

        <div class="form-group">
            <input type="hidden" class="form-control" id="program_unit_id"/>
            <label>Program<span class="text-danger">*</span></label>
            <select class="form-control" id="program">
                <option value="">Please select program</option>
                @foreach($data["program"] as $row)
                    <option value="{{ $row["id"] }}">{{ $row["program_name"] }}</option>
                @endforeach
            </select>
        </div>

        {{-- <div class="form-group">
            <label>Office Unit<span class="text-danger">*</span></label>
            <select class="form-control" id="unit">
                <option value="">Please select office unit</option>
                @foreach($data["unit"] as $row)
                    <option value="{{ $row["id"] }}">{{ $row["division"] }} - {{ $row["section"] }}</option>
                @endforeach
            </select>
        </div> --}}

        @if(Auth::user()->role->roles == 'ADMINISTRATOR')
            <div class="form-group">
                <label>Program Coordinator<span class="text-danger">*</span></label>
                <select class="form-control" id="coordinator">
                    <option value="">Please select coordinator</option>
                    @foreach($data["coordinator"] as $row)
                        <option value="{{ $row["id"] }}">{{ $row["name"] }}</option>
                    @endforeach
                </select>
            </div>
        @endif


    </div>
</form>
