<option value="" selected>SELECT REGION</option>
@forelse($data as $row)
<option value="{{ $row["region"] }}">{{ $row["region"] }}</option>
@empty
<option value=""> NO REGION FOUND</option>
@endforelse
