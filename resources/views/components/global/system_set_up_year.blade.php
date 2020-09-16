    <option value=""></option>
@forelse ($data as $row)
    <option value="{{ $row->id }}"> {{ $row->year }}</option>
@empty
    <option value="">NO YEAR FOUND</option>
@endforelse