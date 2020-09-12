

<div class="table-responsive">
    <div class="input-icon">
        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query">
        <span>
            <i class="flaticon2-search-1 text-muted"></i>
        </span>
    </div>
    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Output Functions</th>
            </tr>
        </thead>
        <tbody>
        @if(!empty($output_functions))
          @foreach ($output_functions as $row)
            <tr>
                <td>
                    <button class="btn btn-block btn-primary" onClick="select_output_functions('{{$row->function_description}}')" >SELECT</button>
                </td>
                <td>{{ $row->function_description }}</td>
            </tr>
          
          @endforeach
        @else
        <tr>
            <td colspan="2"> NO DATA</td> 
         </tr>
        @endif
        </tbody>
    </table>
</div>


