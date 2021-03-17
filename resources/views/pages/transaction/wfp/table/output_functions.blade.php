
<table class="table table-sm table-hover table-bordered mt-3" >
    <thead class="bg-dark text-light" >
        <tr >
            <th scope="col"></th>
            <th scope="col" class="text-center">Output Functions</th>
            <th scope="col" class="text-center">Classification</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($output_functions as $row)
    <tr>
        <td>
        <button class="btn btn-block btn-primary" onClick="select_output_functions('{{ $row->id }}',`{{$row->description}}`)" >SELECT</button>
        </td>
        <td>{{ $row->description }}</td>
        <td style="min-width:80px;">{{ $row->function_class }}</td>

    </tr>
    @empty
        <tr>
        <td colspan="2"> NO DATA</td>
        </tr>
    @endforelse
    </tbody>
</table>
<hr>
<div id="output_function_pagination">
        {{ $output_functions->links('components.global.pagination') }}
</div>
