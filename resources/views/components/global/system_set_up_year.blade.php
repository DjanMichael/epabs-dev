@if($data["settings"] == null)
    <option value="" selected></option>
    @forelse ($data["year"] as $row)
    <option value="{{ $row->id }}"> {{ $row->year }}</option>
    @empty
        <option value="">NO YEAR FOUND</option>
    @endforelse
@else
    @forelse ($data["year"] as $row)
        <option value="{{ $row->id }}" {{ $data["settings"]->select_year == $row->id ? 'selected' : ''}}> {{ $row->year }}</option>
    @empty
        <option value="">NO YEAR FOUND</option>
    @endforelse
@endif
