
<div class="row">
    <div class="col-lg-12">
    <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon"><i class="flaticon-event-calendar-symbol text-primary"></i></span>
                    <h3 class="card-label">Calendar List View</h3>
                </div>
                <div class="card-toolbar"><b>{{ $data['year'] }}</b></div>
            </div>
            <div class="card-body">
                <div class="accordion" id="accordionExample1">
                    @forelse ($data['months'] as $key => $value)
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title" style="color: black;" data-toggle="" data-target="#collapse{{ $key }}">
                                    {{ $value }}
                                </div>
                            </div>
                            <div id="collapse{{ $key }}" class="collapse show" data-parent="#accordionExample1">
                                <div class="card-body">
                                    <table style="width:100%">
                                        @forelse ($data['activity_list'] as $row)
                                            @if ($row['activity_timeframe'] == $value)
                                                <tr>
                                                    <td style="width: 20%;">Code: <b>{{ $row["code"] }}<b></td>
                                                    <td style="width: 5%;"><span class="fas fa-dot-circle text-success mr-5"></span></td>
                                                    <td style="width: 55%;">Title: <b>{{ $row["out_activity"] }}</b></td>
                                                    <td style="width: 20%;">Cost: <b>{{ $row["activity_cost"] }}<b></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;"></td>
                                                    <td style="width: 5%;"></td>
                                                    <td style="width: 55%;">Point Person: <b>{{ $row["responsible_person"] }}</b></td>
                                                    <td style="width: 20%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20%;"><hr></td>
                                                    <td style="width: 5%;"><hr></td>
                                                    <td style="width: 55%;"><hr></td>
                                                    <td style="width: 20%;"><hr></td>
                                                </tr>
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center"> NO DATA AVAILABLE IN TABLE</td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="12" class="text-center"> NO DATA AVAILABLE IN TABLE</td>
                        </tr>
                    @endforelse
                </div>
            </div>

        </div>
    <!--end::Card-->
    </div>
</div>


@push('scripts')

@endpush
