<option value=""></option>
@forelse ($data as $row)
    <option value="{{ $row["id"] }}"> {{ $row["program_name"] }}</option>
@empty
    <option value="">NO PROGRAM ASSIGNED</option>
@endforelse
