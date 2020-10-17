<hr>
<table class="table mb-5 table-hover table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Year</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($year as $row)
            <tr id="{{ $row["id"] }}">
                <td>{{ $row["id"] }}</td>
                <td data-target="year">{{ $row["year"] }}</td>
                <td data-target="status">
                    <span class="label label-inline {{ $row["status"] == 'ACTIVE' ? 'label-light-success' : 'label-light-danger' }} font-weight-bold">{{ $row["status"] }}</span>
               </td>
                <td>
                    <a class="btn btn-icon btn-light-primary mr-2" title="Edit Details" data-role="edit" data-id="{{ $row["id"] }}">
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
    {{ $year->links('components.global.pagination') }}
</div>

{{-- <div class="card-body">
    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
        <thead>
            <tr>
                <th title="Field #1">Order ID</th>
                <th title="Field #2">Car Make</th>
                <th title="Field #3">Car Model</th>
                <th title="Field #4">Color</th>
                <th title="Field #5">Deposit Paid</th>
                <th title="Field #6">Order Date</th>
                <th title="Field #7">Status</th>
                <th title="Field #8">Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>0006-3629</td>
                <td>Land Rover</td>
                <td>Range Rover</td>
                <td>Orange</td>
                <td>$22672.60</td>
                <td>2016-11-28</td>
                <td class="text-right">3</td>
                <td class="text-right">3</td>
            </tr>
            <tr>
                <td>0187-0063</td>
                <td>Mercedes-Benz</td>
                <td>S-Class</td>
                <td>Goldenrod</td>
                <td>$97306.72</td>
                <td>2017-11-06</td>
                <td class="text-right">5</td>
                <td class="text-right">3</td>
            </tr>
        </tbody>
    </table>
    <!--end: Datatable-->
</div> --}}

