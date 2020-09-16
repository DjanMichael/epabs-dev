
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
