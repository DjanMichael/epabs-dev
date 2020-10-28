<hr>
<table class="table mb-5 table-hover table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Program</th>
            <th scope="col" class="text-center">Division - Section</th>
            <th scope="col" class="text-center">Coordinator</th>
            @if(Auth::user()->role->roles == 'ADMINISTRATOR')
            <th scope="col" class="text-center">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($unit_program as $row)
            <tr id="{{ $row["id"] }}">
                <td>{{ $row["id"] }}</td>
                <td data-target="program">{{ $row["program_name"] }}</td>
                <td data-target="unit">{{ $row["division"] }} - {{ $row["section"] }}</td>
                <td data-target="coordinator">{{ $row["name"] }}</td>
                @if(Auth::user()->role->roles == 'ADMINISTRATOR')
                    <td>
                        <a class="btn btn-icon btn-light-danger mr-2" data-toggle="tooltip" data-placement="bottom" title="Dismiss Assignment" data-role="dismiss" data-id="{{ $row["id"] }}">
                            <i class="far fa-times-circle"></i>
                        </a>
                    </td>
                @endif
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
    {{ $unit_program->links('components.global.pagination') }}
</div>
