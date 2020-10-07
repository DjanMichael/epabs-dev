<hr>
<table class="table mb-5 table-hover table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Activity Category</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($category as $row)
            <tr id="{{ $row["id"] }}">
                <td>{{ $row["id"] }}</td>
                <td data-target="category">{{ $row["category"] }}</td>
                <td>
                    <span data-target="status" class="label label-inline {{ $row["status"] == 'ACTIVE' ? 'label-light-success' : 'label-light-danger' }}  font-weight-bold">{{ $row["status"] }}</span>
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
    {{ $category->links('components.global.pagination') }}
</div>
