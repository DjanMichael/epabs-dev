@forelse($data["pr_list"] as $row)
<tr>
    <td>
        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row["pr_code"] }}</span>
    </td>
    <td class="pl-0" style="float:left;width:100%">
        <div class="row">

            <div class="col-12 pt-2 pl-6">
                <span class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg" style= "text-transform: capitalize;">{{ $row["name"] }}</span>
                <span class="text-muted font-weight-bold text-muted d-block">{{ $row["designation"]  }}</span>
            </div>
        </div>
    </td>
    <td>
    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row["division"] }}</span>
        <span class="text-muted font-weight-bold">{{ $row["section"] }}</span>
    </td>
    <td>
        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row["program_name"] }}</span>
    </td>
    <td>
    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">₱ {{ number_format($row["pr_cost"],2) }}</span>
    </td>
    <td>
    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row["pr_status"] != null ? $row["pr_status"] : 'QUEUE'  }}</span>
    </td>
    <td class="pr-0 text-right">
        @if(Auth::user()->role->roles == "ADMINISTRATOR" || Auth::user()->role->roles == "PROCUREMENT" )
        <button type="button"
            data-toggle="tooltip" title="PR STATUS" data-placement="bottom" data-original-title="PR STATUS"
            onclick="showStatusChangeModal('{{ $row['pr_code'] }}')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
            <span class="svg-icon svg-icon-md svg-icon-primary">
                <i class="fas fa-truck-loading text-primary"></i>
            </span>
        </button>
        @endif
        <button type="button"
            data-toggle="tooltip" title="PR PRINT" data-placement="bottom" data-original-title="PR PRINT"
            onclick="printPR('{{ $row['pr_code'] }}')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
            <span class="svg-icon svg-icon-md svg-icon-primary">
                <i class="fas fa-print text-primary"></i>
            </span>
        </button>
        <button type="button"
            data-toggle="tooltip" title="EDIT PR" data-placement="bottom" data-original-title="EDIT PR"
            onclick="editPR('{{ $row['pr_code'] }}')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
            <span class="svg-icon svg-icon-md svg-icon-primary">
               <i class="far fa-edit text-primary"></i>
            </span>
        </button>
        <button type="button"
            data-toggle="tooltip" title="DELETE PR" data-placement="bottom" data-original-title="DELETE PR"
            onclick="deletePR('{{ $row['pr_code'] }}')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
            <span class="svg-icon svg-icon-md svg-icon-primary">
               <i class="fas fa-trash-alt text-primary"></i>
            </span>
        </button>
        <button type="button"
            data-toggle="tooltip" title="TRACK PR" data-placement="bottom" data-original-title="TRACK PR"
            onclick="openModalPRTrack('{{ $row['pr_code'] }}')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
            <span class="svg-icon svg-icon-md svg-icon-primary">
               <i class="fas fa-history text-primary"></i>
            </span>
        </button>
    </td>
</tr>
@empty
<tr>
    <td colspan="6">NO DATA</td>
</tr>
@endforelse
<tr>
    <td colspan="6">
        <div class="card card-custom gutter-b col-12 col-md-12">
            <div class="card-body" id="pagination_pr_list">
                {{ $data["pr_list"]->links('components.global.pagination') }}
            </div>
        </div>

    </td>
</tr>
