<option value=""></option>
@forelse ($data["title"] as $row)
    <option value="{{ $row["title"] }}">{{ $row["title"] }}</option>
@empty
    <option value="">NO TITLE</option>
@endforelse