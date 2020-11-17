<option value="" selected>SELECT BATCHES</option>
@forelse($data as $row)
<option value="{{ $row["id"] }}">{{ $row["batch_no"] }}</option>
@empty
<option value=""> NO BATCH FOUND</option>
@endforelse
