<option value="" selected>SELECT CITY</option>
@forelse($data as $row)
<option value="{{ $row["city"] }}">{{ $row["city"] }}</option>
@empty
<option value=""> NO CITY FOUND</option>
@endforelse
