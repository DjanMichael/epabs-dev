<option value=""></option>
@forelse ($data as $row)
<option value="{{ $row->id }}">{{ $row->budget_item }}</option>
@empty
<option value="">NO DATA</option>
@endforelse
