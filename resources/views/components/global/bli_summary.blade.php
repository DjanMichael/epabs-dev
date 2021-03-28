

<table class="table table-head-custom table-vertical-center">
    <thead class="py-5">
        <tr>
            <th class="p-0 min-w-200px">BUDGET LINE ITEM</th>
            <th class="p-0 min-w-110px text-center ">Budget Allocation</th>
            <th class="p-0 min-w-110px text-center ">System Encoded</th>
            <th class="p-0 min-w-110px text-center ">Remaining Balance</th>
        </tr>
    </thead>
    <tbody>
        @php
        $total_allocation =0;
        $total_utilized =0;
        @endphp
        @forelse($data["bli_summary"] as $row)
            <tr>
                <td>{{ $row["budget_item"] }}</td>
                <td class="text-right">₱ {{ number_format($row["allocation"],2) }}</td>
                <td class="text-right">₱ {{ number_format($row["utilized_ppmp_actual"],2) }}</td>
                <td class="text-right">₱ {{ number_format($row["remaining_budget"],2) }}</td>
            </tr>
            <?php
                $total_allocation += $row["allocation"];
                $total_utilized += $row["utilized_ppmp_actual"];
            ?>
            @empty

            @endforelse
        <tr>
            <td>Total</td>
            <td class="text-right"  style="font-weight: bold;">₱ {{ number_format($total_allocation,2) }}</td>
            <td class="text-right"  style="font-weight: bold;">₱ {{ number_format($total_utilized,2) }}</td>
            <td class="text-right"  style="font-weight: bold;">₱ {{ number_format($total_allocation - $total_utilized,2) }}</td>
        </tr>
    </tbody>
</table>
<table>


</table>
