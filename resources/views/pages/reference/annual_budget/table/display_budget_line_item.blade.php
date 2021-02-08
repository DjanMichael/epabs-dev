<hr>
<table class="table mb-5 table-hover table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Fund Type</th>
            <th scope="col" class="text-right">Amount</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($budgetlineitem as $row)
                <td>{{ $row["id"] }}</td>
                <td data-target="source_fund"></td>
                <td data-target="budget_amount"></td>
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
    {{ $budgetlineitem->links('components.global.pagination') }}
</div>
