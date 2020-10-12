<hr>
<table class="table mb-5 table-hover table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Price</th>
            <th scope="col" class="text-center">Effective Date</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($procurement_supplies_price as $row)
            <tr id="{{ $row["id"] }}">
                <td>{{ $row["id"] }}</td>
                <td data-target="price">{{ number_format($row["price"], 2) }}</td>
                <td data-target="effective_date">{{ $row["effective_date"] }}</td>
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
    {{ $procurement_supplies_price->links('components.global.pagination') }}
</div>
