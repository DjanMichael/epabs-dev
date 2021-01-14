<hr>
<table class="table mb-5 table-hover table-bordered">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="text-center">Username</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Contact</th>
            <th scope="col" class="text-center">Role</th>
            <th scope="col" class="text-center">Designation</th>
            <th scope="col" class="text-center">Office</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($user as $row)
            <tr id="{{ $row["id"] }}">
                <td>{{ $row["id"] }}</td>
                <td data-target="name">{{ $row["name"] }}</td>
                <td data-target="username">{{ $row["username"] }}</td>
                <td data-target="email">{{ $row["email"] }}</td>
                <td data-target="contact">{{ $row["contact"] }}</td>
                <td data-target="role">{{ $row["roles"] }}</td>
                <td data-target="designation">{{ $row["designation"] }}</td>
                <td data-target="office">{{ $row["division"] }} - {{ $row["section"] }}</td>
                <td data-target="status">
                    @if($row["roles"] != 'ADMINISTRATOR')
                        <span class="switch switch-icon">
                            <label>
                                <input type="checkbox" name="select" data-id="{{ $row["id"] }}" id="chk_status_{{ $row["id"] }}" value="{{ $row["status"] }}" {{ $row["status"] == 'ACTIVE' ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </span>
                    @endif
               </td>
                <td>
                    @if($row["roles"] != 'ADMINISTRATOR')
                        <a class="btn btn-icon btn-light-primary mr-2" data-toggle="tooltip" title="Reset user password" data-role="reset" data-id="{{ $row["id"] }}">
                            <i class="flaticon2-refresh"></i>
                        </a>
                    @endif
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
    {{ $user->links('components.global.pagination') }}
</div>
