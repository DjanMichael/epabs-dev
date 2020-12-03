
@forelse($data as $row)
<tr>
    {{-- <td class="pl-0 py-6">
        <label class="checkbox checkbox-lg checkbox-inline">
            <input type="checkbox" value="1">
            <span></span>
        </label>
    </td> --}}
    {{-- <td class="pl-0">
    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $row["item_type"] . str_pad($row["id"],10,"0",STR_PAD_LEFT ) }}</a>
    </td> --}}
    
    <td>
    <span style = "text-transform:capitalize;" class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row["description"] }}</span>
        <span class="text-muted font-weight-bold">{{ $row["classification"] }}</span>
    </td>
    <td>
        <span class="font-weight-bolder d-block font-size-lg">{{ $row["unit_name"] }}</span>
    </td>
    <td>
        <span class="text-primary font-weight-bolder d-block font-size-lg">₱ {{ number_format($row["price"]) }}</span>
    </td>

    @if($action == "true")
        <td class="pr-0 text-right">
        <button type="button" onclick="addPiCart('{{ $row['item_type'] }}','{{ $row['id'] }}','{{ $row['price'] }}')" class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" >
                <i class="   fas fa-plus text-primary"></i>
            </button>
        </td>
    @endif
</tr>
@empty
<tr>
    <td>NO DATA</td>
</tr>
@endforelse
<div id="med_supplies_pagination">
    {{ $data->links('components.global.pagination') }}
</div>

