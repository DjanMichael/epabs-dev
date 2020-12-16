<option value=""></option>
@forelse($data["wfp_activity"] as  $row)
<option value="{{ $row["id"] }}">{{ $row["out_activity"] }}</option>
@empty
<option value="">NO WFP ACTIVITY FOUND</option>
@endforelse
