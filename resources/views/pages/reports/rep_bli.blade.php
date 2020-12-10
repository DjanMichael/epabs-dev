@extends('layouts.app')
@section('title','BLI')
@section('content')
<div class="container" style="height:380px">
    <div class="card card-custom gutter-b">
        <div class="card-header">
         <div class="card-title">
          <h3 class="card-label">
          REPORTS
           <small>Budget Line Item</small>
          </h3>
         </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <select class="form-control form-control-solid" id="report_bli_select">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control form-control-solid" id="report_bli_year_select">
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
