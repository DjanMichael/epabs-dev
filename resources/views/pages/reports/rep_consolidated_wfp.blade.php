@extends('layouts.app')
@section('title','WFP CONSOLIDATED')
@section('content')
<div class="container" style="height:580px">
    <div class="card card-custom gutter-b">
        <div class="card-header">
         <div class="card-title">
          <h3 class="card-label">
          REPORTS
           <small>WFP Consolidated</small>
          </h3>
         </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Report:</label>
                <select class="form-control form-control-solid" id="report_wfp_select">
                    <option value=""></option>
                    <option value="category">WFP Cosolidated Per Category</option>
                    <option value="bli">WFP Cosolidated Per Budget Line Item</option>
                </select>
            </div>
            <div class="form-group d-none" id="categ_fg">
                <label for="">Category:</label>
                <select class="form-control form-control-solid" id="report_wfp_sub_category">
                        <option value=""></option>
                    @forelse($data["category"] as $row)

                        <option value="{{ $row["category"] }}">{{ $row["category"] }}</option>
                    @empty
                        <option value="">NO DATA</option>
                    @endforelse
                        <option value="ALL">ALL</option>
                </select>
            </div>
            <div class="form-group d-none" id="bli_fg">
                <label for="">Budget Line Item:</label>
                <select class="form-control form-control-solid" id="report_wfp_sub_bli">
                    <option value=""></option>
                    @forelse($data["bli"] as $row)
                        <option value="{{ $row["id"] }}">{{ $row["budget_item"] }}</option>
                    @empty
                        <option value="">NO DATA</option>
                    @endforelse
                        <option value="ALL">ALL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Year:</label>
                <select class="form-control form-control-solid" id="report_wfp_year_select">
                    <option value=""></option>
                   @forelse($data["years"] as $row)
                        <option value="{{ $row->id }}">{{ $row->year }}</option>
                   @empty
                        <option value="">NO YEAR FOUND</option>
                   @endforelse
                </select>
            </div>
            <button type="button" class="btn btn-sm btn-primary" id="btn_wfp_report">GENERATE REPORT</button>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        function generateReport(){
            var rep = $("#report_wfp_select option:selected").val();
            var rep_sub;
            if(rep == "category"){
                 rep_sub = $("#report_wfp_sub_category option:selected").val();
            }else{
                 rep_sub = $("#report_wfp_sub_bli option:selected").val();
            }
            var year_id = $("#report_wfp_year_select option:selected").val();
            var year = $("#report_wfp_year_select option:selected").text();

            if(rep !='' && rep_sub != ''){
                var _url = "{{ route('generate_wfp_report') }}?rep=" + rep + '&rep_sub=' + rep_sub + '&year_id=' + year_id + '&year=' + year;
                window.open(_url,'_blank','menubar=0,titlebar=0');
            }


        }

        $(document).ready(function(){
            $("#report_wfp_select").on('change',function(){
                var _rep = $(this).val();
                console.log(_rep);
                if(_rep == "category"){
                    $("#bli_fg").addClass('d-none');
                    $("#categ_fg").removeClass('d-none');
                }else if(_rep =="bli"){
                    $("#categ_fg").addClass('d-none');
                    $("#bli_fg").removeClass('d-none');
                }
g
            });
            $("#btn_wfp_report").on('click',function(){
                generateReport();
            });
        });
    </script>
@endpush
