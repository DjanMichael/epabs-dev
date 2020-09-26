

<script>
    $("#output_function_pagination .pagination a").on('click',function(e){
         e.preventDefault();
         alert('click');
         // console.log($(this).attr('href').split('page=')[1]);
         fetch_output_function($(this).attr('href').split('page=')[1])
 });
</script>
<table class="table table-sm table-hover table-bordered mt-3" >
    <thead class="bg-dark text-light" >
        <tr >
            <th scope="col"></th>
            <th scope="col" class="text-center">Output Functions</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($output_functions as $row)
    <tr>
        <td>
        <button class="btn btn-block btn-primary" onClick="select_output_functions('{{ $row->id }}','{{$row->function_description}}')" >SELECT</button>
        </td>
        <td>{{ $row->function_description }}</td>
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
        {{ $output_functions->links() }}
</div>

