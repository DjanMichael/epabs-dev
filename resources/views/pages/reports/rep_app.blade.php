@extends('layouts.app')
@section('title','APP')
@section('content')
<div class="container" style="height:380px">
    <div class="card card-custom gutter-b">
        <div class="card-header">
         <div class="card-title">
          <h3 class="card-label">
          REPORTS
           <small>APP</small>
          </h3>
         </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Report:</label>
                <select class="form-control form-control-solid" id="report_app_select">
                    <option value=""></option>
                    <option value="yearly">ANNUAL PROCUREMENT PLAN-COMMON SUPPLIES AND EQUIPMENT (APP-CSE) 2021 FORM </option>
                    {{-- <option value="first_sem">ANNUAL PROCUREMENT PLAN-COMMON SUPPLIES AND EQUIPMENT (APP-CSE) 2021 FORM - 1st SEMISTER</option>
                    <option value="secondd_sem">ANNUAL PROCUREMENT PLAN-COMMON SUPPLIES AND EQUIPMENT (APP-CSE) 2021 FORM - 2nd SEMISTER</option> --}}
                </select>
            </div>

                <div class="form-group">
                <label for="">Year:</label>
                <select class="form-control form-control-solid" id="report_app_year_select">
                    <option value=""></option>
                   @forelse($data["years"] as $row)
                        <option value="{{ $row->id }}">{{ $row->year }}</option>
                   @empty
                        <option value="">NO YEAR FOUND</option>
                   @endforelse
                </select>
            </div>
            <button type="button" class="btn btn-sm btn-primary" id="btn_app_report">GENERATE REPORT</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $("#btn_app_report").on('click',function(){
                if($("#report_app_select option:selected").val() != ''){
                    var type = $("#report_app_select option:selected").val();
                    var type_title = $("#report_app_select option:selected").text();
                    var year_id = $("#report_app_year_select option:selected").val();
                    var year = $("#report_app_year_select option:selected").text();
                    var _url = "{{ route('generate_app_report') }}?type=" + type + '&type_title=' + type_title + '&year_id=' + year_id + '&year=' + year;
                     window.open(_url,'_blank','menubar=0,titlebar=0');
                }
            })
        });
    </script>
@endpush
