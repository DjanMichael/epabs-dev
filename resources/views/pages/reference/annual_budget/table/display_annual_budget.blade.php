<hr>
<table class="table mb-5 table-hover table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Year</th>
            <th scope="col" class="text-center">Available Budget</th>
            <th scope="col" class="text-center">If Conap</th>
            <th scope="col" class="text-center">Conap Year</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($annualbudget as $row)
            <tr id="{{ $row["id"] }}">
                <td>{{ $row["id"] }}</td>
                <td data-target="year">{{ $row["year"] }}</td>
                <td data-target="amount">{{ $row["available_budget"] }}</td>
                <td data-target="if_conap">{{ $row["if_conap"] }}</td>
                <td data-target="conap_year">{{ $row["conap_year"] }}</td>
                {{-- <td data-target="status">
                    <span class="label label-inline {{ $row["status"] == 'ACTIVE' ? 'label-light-success' : 'label-light-danger' }} font-weight-bold">{{ $row["status"] }}</span>
               </td> --}}
                <td>
                    <a class="btn btn-icon btn-light-primary mr-2" data-toggle="tooltip" data-placement="bottom" title="Edit Details" data-role="edit" data-id="{{ $row["id"] }}">
                        <i class="flaticon-edit-1"></i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="12" class="text-center"> NO DATA AVAILABLE IN TABLE</td>
            </tr>
        @endforelse
    </tbody>
</table>
<hr>


<div id="table_pagination">
    {{ $annualbudget->links('components.global.pagination') }}
</div>
