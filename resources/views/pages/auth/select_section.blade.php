<option value=""></option>
@forelse ($data as $row)
    <option value="{{ $row["section"] }}">{{ $row["section"] }}</option>
@empty
    <option value="">NO DATA</option>
@endforelse