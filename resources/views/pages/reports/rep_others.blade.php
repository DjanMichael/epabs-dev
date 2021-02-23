@extends('layouts.app')
@section('title','Other Reports')
@section('content')
<div class="container" style="height:580px">
    <div class="card card-custom gutter-b">
        <div class="card-header">
         <div class="card-title">
          <h3 class="card-label">
          REPORTS
          </h3>
         </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Report:</label>
                <select class="form-control form-control-solid" id="report_wfp_select">
                    <option value=""></option>
                    <option value="category">Budget Distribution Report</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Year:</label>
                <select class="form-control form-control-solid" id="report_year_select">
                    <option value="none"></option>
                   @forelse($data["years"] as $row)
                        <option value="{{ $row->id }}">{{ $row->year }}</option>
                   @empty
                        <option value="">NO YEAR FOUND</option>
                   @endforelse
                </select>
            </div>
            <button type="button" class="btn btn-sm btn-primary" id="btn_others_report">GENERATE REPORT</button>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script type="text/javascript">
            $(document).ready(function(){
                $("#btn_others_report").on('click',function(){
                    var _url = "{{ route('generate_budget_stats_report') }}";
                    var _data = $("#report_year_select").val();
                    if(_data !='none'){

                        var _url = "{{ route('generate_budget_stats_report') }}?year_id=" + _data;
                        window.open(_url,'_blank','menubar=0,titlebar=0');

                    }else{
                        alert('please year');
                    }

                });
            });
    </script>
@endpush
