<option value=""></option>
@forelse ($data["wfp_approved"] as $row)
    <option value="{{ $row["code"] }}">{{ $row["code"] }}</option>
@empty
    <option value="">NO APPROVED WFP FOUND</option>
@endforelse
