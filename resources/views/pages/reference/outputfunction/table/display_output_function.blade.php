<hr>
<table class="table mb-5 table-hover table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Function Class</th>
            <th scope="col" class="text-center">Description</th>
            <th scope="col" class="text-center">Program</th>
            <th scope="col" class="text-center">Coordinator</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($output_function as $row)
            <tr id="{{ $row["id"] }}">
                <td>{{ $row["id"] }}</td>
                <td data-target="function_class">{{ $row["function_class"] }}</td>
                <td data-target="description">{{ $row["description"] }}</td>
                <td data-target="program">{{ $row["program_name"] }}</td>
                <td data-target="coordinator">{{ $row["name"] }}</td>
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
    {{ $output_function->links('components.global.pagination') }}
</div>
