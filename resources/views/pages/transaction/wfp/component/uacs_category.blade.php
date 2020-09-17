    <option value=""></option>
@forelse ($data["category"] as $row)
    <option value="{{ $row["category"] }}">{{ $row["category"] }}</option>
@empty
    <option value="">NO CATEGORY</option>
@endforelse