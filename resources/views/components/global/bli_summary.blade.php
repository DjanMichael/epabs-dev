

<table class="table table-head-custom table-vertical-center">
    <thead class="py-5">
        <tr>
            <th class="p-0 min-w-200px">BUDGET LINE ITEM</th>
            <th class="p-0 min-w-110px text-center ">Cost</th>
        </tr>
    </thead>
    <tbody>
        @php
        $total =0;
        @endphp
        @forelse($data["bli_summary"] as $row)
            <tr>
                <td>{{ $row["budget_item"] }}</td>
                <td class="text-right">₱ {{ number_format($row["cost"],2) }}</td>
            </tr>
            <?php  $total += $row["cost"]; ?>
            @empty

            @endforelse
        <tr>
            <td>Total</td>
            <td class="text-right"  style="font-weight: bold;">₱ {{ number_format($total) }}</td>
        </tr>
    </tbody>
</table>
<table>


</table>
