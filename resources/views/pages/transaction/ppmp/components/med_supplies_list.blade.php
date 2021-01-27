
@forelse($data as $row)
<tr>
    @if($action == "true")
        <td class="pr-0 text-center">
        <button type="button" onclick="addPiCart('{{ $row['item_type'] }}','{{ $row['id'] }}','{{ $row['price'] }}')" class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" >
                <i class="   fas fa-plus text-primary"></i>
            </button>
        </td>
    @endif
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
</tr>
@empty
<tr>
    <td>NO DATA</td>
</tr>
@endforelse
<tr>
    <td colspan="4">
        <div id="med_supplies_pagination">
            {{ $data->links('components.global.pagination') }}
        </div>
    </td>
</tr>


