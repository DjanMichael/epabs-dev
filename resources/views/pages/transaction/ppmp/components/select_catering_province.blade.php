
<option value="" selected>SELECT PROVINCE</option>
@forelse($data as $row)
<option value="{{ $row["province"] }}">{{ $row["province"] }}</option>
@empty
<option value=""> NO PROVINCE FOUND</option>
@endforelse
