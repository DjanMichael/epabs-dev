<option value=""></option>
@forelse ($data as $row)
<option value="{{ $row["id"] }}">{{ $row["budget_item"] }}</option>
@empty
<option value="">NO BUDGET LINE ITEM THIS YEAR</option>
@endforelse
