
@if($data["wfp_act_item_supplies"] == null && $data["wfp_act_item_drum"] == null)
<tr>
    <td colspan="4">NO DATA FOUND</td>
</tr>
@endif

@forelse($data["wfp_act_item_supplies"] as $row)
<?php
$qty = $row["jan"] + $row["feb"] + $row["mar"] +
        $row["apr"] + $row["may"] + $row["june"] +
        $row["july"] + $row["aug"] + $row["sept"] +
        $row["oct"] + $row["nov"] + $row["dec"];
?>
   <tr>
        <td>{{ $row["description"] }}</td>
        <td>{{  $qty }}</td>
        <td>{{ $row["unit_name"] }}</td>
        <td>{{ $row["price"] }}</td>
        <td>{{  number_format($qty * $row["price"],2) }}</td>
        <td>
        <button type="button" onclick="addItemToPr('{{ $data['wfp_code'] }}','{{ $data['wfp_act_id'] }}','{{  $data['pr_code'] }}','{{ $row['item_type'] }}','{{ $row['item_id'] }}','{{ $qty }}','{{ $row['price'] }}')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
            <span class="svg-icon svg-icon-md svg-icon-primary">
                <i class="fas fa-plus text-primary"></i>
            </span>
        </button>
        </td>
    </tr>
@empty

@endforelse

@forelse($data["wfp_act_item_drum"] as $row)
<?php
$price = $row["jan"] + $row["feb"] + $row["mar"] +
        $row["apr"] + $row["may"] + $row["june"] +
        $row["july"] + $row["aug"] + $row["sept"] +
        $row["oct"] + $row["nov"] + $row["dec"];

?>
    <tr>
        <td>{{ $row["description"] }}</td>
        <td>{{  $qty }}</td>
        <td>{{ $row["unit_name"] }}</td>
        <td>{{ $row["price"] }}</td>
        <td>{{  number_format($qty * $row["price"],2) }}</td>
        <td>
        <button type="button" onclick="addItemToPr('{{ $data['wfp_code'] }}','{{ $data['wfp_act_id'] }}','{{  $data['pr_code'] }}','{{ $row['item_type'] }}','{{ $row['item_id'] }}','{{ $qty }}','{{ $row['price'] }}')" class="btn btn-icon btn-light btn-hover-primary btn-sm">
            <span class="svg-icon svg-icon-md svg-icon-primary">
                <i class="fas fa-history text-primary"></i>
            </span>
        </button>
        </td>
    </tr>
@empty

@endforelse
