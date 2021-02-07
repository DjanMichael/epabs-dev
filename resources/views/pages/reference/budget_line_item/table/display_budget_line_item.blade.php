<hr>
<table class="table mb-5 table-hover table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Source of Fund</th>
            <th scope="col" class="text-center">Budget Item</th>
            <th scope="col" class="text-center">Year</th>
            <th scope="col" class="text-center">Allocation Amount</th>
            <th scope="col" class="text-center">Control Number</th>
            <th scope="col" class="text-center">Purpose</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($budgetlineitem as $row)
            <tr id="{{ $row["id"] }}">
                <td>{{ $row["id"] }}</td>
                <td data-target="fund_source">{{ $row["sof_classification"] }}</td>
                <td data-target="budget_item">{{ $row["budget_item"] }}</td>
                <td data-target="year">{{ $row["year"] }}</td>
                <td data-target="amount">{{ number_format($row["allocation_amount"]) }}</td>
                <td data-target="saa_ctrl_number">{{ $row["saa_ctrl_number"] }}</td>
                <td data-target="purpose">{{ $row["purpose"] }}</td>
                <td data-target="status">
                    <span class="label label-inline {{ $row["status"] == 'ACTIVE' ? 'label-light-success' : 'label-light-danger' }} font-weight-bold">{{ $row["status"] }}</span>
               </td>
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
