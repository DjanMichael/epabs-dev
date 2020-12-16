@forelse($data["aop_list"] as $row)
    <tr>
        <td>{{ $row["program_name"] }}</td>
    </tr>
@empty
    <tr>
        <td colspan="6">NO DATA</td>
    </tr>
@endforelse
