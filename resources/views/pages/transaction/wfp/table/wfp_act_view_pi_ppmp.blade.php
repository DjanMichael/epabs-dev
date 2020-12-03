<div class="table-responsive">
    <table class="table table-sm table-hover table-bordered mt-3" >
        <tbody>
        <tr>
            <td colspan="8" class="bg-dark text-light">PERFORMANCE INDICATOR</td>
        </tr>
        <tr class="bg-gray-400">
            <td scope="col">#</td>
            <td scope="col">UACS Code</td>
            <td scope="col">Performance Indicator</td>
            <td scope="col">Cost</td>
            <td scope="col">PPMP</td>
            <td scope="col">Catering</td>
            <td scope="col">Batch</td>
            <td scope="col">Budget Line Item #</td>
        </tr>
        <?php $i=1; $total=0; ?>
        @forelse ($data["pi"] as $row)
        <?php $total += $row["cost"]; ?>
            <tr>
                <td class="p-2">{{ $i++ }}</td>
                <td class="p-2">{{ $row["uacs_id"] }}</td>
                <td class="p-2">{{ $row["performance_indicator"] }}</td>
                <td class="p-2">₱ {{ number_format($row["cost"],2) }}</td>
                <td class="p-2">{{ $row["is_ppmp"] }}</td>
                <td class="p-2">{{ $row["is_catering"] }}</td>
                <td class="p-2">{{ $row["batch"] != '' ? $row["batch"] : '-' }}</td>
                <td class="p-2">{{ $row["budget_item"] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8">NO DATA</td>
            </tr>
        @endforelse
        @if(count($data["pi"]) != 0)
            <tr class="bg-gray-400">
                <td class="p-2 text-right" colspan="3">Total</td>
                <td class="p-2 font-weight-bold" colspan="5">₱ {{ number_format($total,2) }}</td>
            </tr>
        @endif
        {{-- <tr>
            <td colspan="8" class="bg-gray-900 text-light">PPMP</td>
        </tr>
        <tr class="bg-gray-400">
            <td colspan="2">ITEM DESCRIPTION</td>
            <td colspan="2">QTY</td>
            <td colspan="2">COST</td>
            <td colspan="2">TOTAL</td>
        </tr>
        <tr>
            <td colspan="2">TEST</td>
            <td colspan="2">TEST</td>
            <td colspan="2">TEST</td>
            <td colspan="2">TEST</td>
        </tr> --}}
        </tbody>
    </table>


</div>
