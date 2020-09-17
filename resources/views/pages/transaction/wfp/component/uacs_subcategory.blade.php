<option value=""></option>
@forelse ($data["subcategory"] as $row)
    <option value="{{ $row["subcategory"] }}">{{ $row["subcategory"] }}</option>
@empty
    <option value="">NO SUBCATEGORY</option>
@endforelse