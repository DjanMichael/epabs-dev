@forelse($data["wfp_user_list"] as $row)
    <tr >
        <td class="pt-3 pb-0">
            <div class="symbol symbol-circle symbol-45 ml-3 d-flex flex-column mb-5 align-items-center">
                <span class="symbol-label font-size-h5">{{ Str::Title(Str::substr(Str::words($row->name,2),0,1)) }}</span>
            </div>
        </td>
        <td class="pl-0">
        <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ Str::Title($row->name) }}</a>
            <span class="text-muted font-weight-bold d-block">{{ $row->designation != '' ? Str::Title($row->designation)  : 'NO DESIGNATION' }}</span>
        </td>
        <td class="text-left">
            <span class="text-dark font-weight-bold">{{ strtoupper($row->program) }}</span>
        </td>
        <td class="text-right">
            <span class="label label-lg label-light-primary label-inline">{{ $row->wfp_status != '' ? strtoupper($row->wfp_status) : 'NOT FOUND' }}</span>
        </td>
    </tr>
@empty
<tr>
    <td colspan="4" class="text-center"> NO WFP FOUND</td>
</tr>
@endforelse

@if(count($data["wfp_user_list"]) > 0)
<tr id="pagination_user_list">
    <td colspan="3">
        {{ $data["wfp_user_list"]->links('components.global.pagination') }}
    </td>
</tr>
@endif
