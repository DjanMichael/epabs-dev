@if($data["settings"] == null)
    <option value="" selected></option>
    @forelse ($data["program"] as $row)
        <option value="{{ $row["id"] }}"> {{ $row["program_name"] }}</option>
    @empty
        <option value="">NO PROGRAM ASSIGNED</option>
    @endforelse
@else
    <option value=""></option>
    @forelse ($data["program"] as $row)
        <option value="{{ $row["id"] }}" {{ $data["settings"]->select_program_id == $row["id"] ? 'selected' : '' }}> {{ $row["program_name"] }}</option>
    @empty
        <option value="">NO PROGRAM ASSIGNED</option>
    @endforelse
@endif

