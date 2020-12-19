
<div class="row">
    <div class="col-lg-12">
    <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon"><i class="@yield('panel-icon') text-primary"></i></span>
                    <h3 class="card-label">@yield('panel-title')</h3>
                </div>
                <div class="card-toolbar">No Year Selected</div>
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
                                        <tr>
                                            <td style="width: 20%;">Code: </td>
                                            <td style="width: 60%;">Title: </td>
                                            <td style="width: 20%;">Cost: </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%;"></td>
                                            <td style="width: 60%;">Point Person: </td>
                                            <td style="width: 20%;"></td>
                                        </tr>
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
