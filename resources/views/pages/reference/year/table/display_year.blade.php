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
            <tr>
                <td>{{ $row["id"] }}</td>
                <td>{{ $row["year"] }}</td>
                <td>
                    <span class="label label-inline {{ $row["status"] == 'ACTIVE' ? 'label-light-success' : 'label-light-danger' }}  font-weight-bold">{{ $row["status"] }}</span>
               </td>
                <td>
                    <a href="javacript;;" class="btn btn-sm btn-clean btn-icon" title="Edit Details"><i class="la la-edit"></i></a>
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