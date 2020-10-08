<hr>
<table class="table mb-5 table-hover table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Description</th>
            <th scope="col" class="text-center">Unit</th>
            <th scope="col" class="text-center">Classification</th>
            <th scope="col" class="text-center">Price</th>
            <th scope="col" class="text-center">Fix Price</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($procurement_supplies as $row)
            <tr>
                <td>{{ $row["id"] }}</td>
                <td>{{ $row["description"] }}</td>
                <td>{{ $row["unit_name"] }}</td>
                <td>{{ $row["classification"] }}</td>
                <td>{{ $row["price"] }}</td>
                <td>
                    @if($row["fix_price"] == 'Y') Yes @else <a data-role="price" data-id="{{ $row["id"] }}" class="btn btn-light-primary"><i class="flaticon-price-tag"></i></a> @endif
                </td>
                <td>
                    <span class="label label-inline {{ $row["status"] == 'ACTIVE' ? 'label-light-success' : 'label-light-danger' }}  font-weight-bold">{{ $row["status"] }}</span>
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
    {{ $procurement_supplies->links('components.global.pagination') }}
</div>
