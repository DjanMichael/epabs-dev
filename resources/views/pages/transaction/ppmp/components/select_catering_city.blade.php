<option value="" selected>SELECT CITY</option>
@forelse($data as $row)
<option value="{{ $row["id"] }}">{{ $row["city"] }}</option>
@empty
<option value=""> NO CITY FOUND</option>
@endforelse
