<hr>
<table class="table mb-5 table-hover table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Class Sequence</th>
            <th scope="col" class="text-center">Function Class</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($deliverables as $row)
            <tr id="{{ $row["id"] }}">
                <td>{{ $row["id"] }}</td>
                <td data-target="sequence">{{ $row["class_sequence"] }}</td>
                <td data-target="function_class">{{ $row["function_class"] }}</td>
                <td data-target="status">
                    <span class="label label-inline {{ $row["status"] == 'ACTIVE' ? 'label-light-success' : 'label-light-danger' }} font-weight-bold">{{ $row["status"] }}</span>
                </td>
                <td>
                    <a class="btn btn-icon btn-light-primary mr-2" title="Edit Details" data-toggle="tooltip" data-placement="bottom" data-role="edit" data-id="{{ $row["id"] }}">
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
    {{ $deliverables->links('components.global.pagination') }}
</div>
