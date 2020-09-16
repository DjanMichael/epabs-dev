    <option value=""></option>
@forelse ($data["budget_allocation"] as $row)
    <option value="{{ $row["budget_line_item_id"] }}">{{ $row["budget_item"] }}</option>
@empty
    <option value="">NO BUDGET ALLOCATION</option>
@endforelse