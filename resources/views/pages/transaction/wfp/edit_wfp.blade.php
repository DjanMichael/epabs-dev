@extends('layouts.app')
@section('title','CREATE WFP')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('r_wfp') }}" class="text-muted">WFP</a>
</li>
<li class="breadcrumb-item">
<span  class="text-muted">Edit WFP {{ $data["wfp"]->code }}</span>
</li>
@endsection
@section('content')
{{-- {{ dd($data) }} --}}
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title">Edit Work and Financial Plan</h3>
    </div>
    <!--begin::Form-->
    <form>
        <div class="card-body">
            {{-- <div class="form-group mb-8">
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon">
                        <span class="svg-icon svg-icon-primary svg-icon-xl">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Tools/Compass.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <div class="alert-text">The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.</div>
                </div>
            </div> --}}
           <div class="row">
               <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label>Select Output Function/Deliverables
                            <span class="text-danger">*</span>
                        </label>
                        <div class="row">
                            <div class="col-9 col-md-11">
                                <input type="text" id="selected_output_function" value="" class="form-control" placeholder="Select Output Function/Deliverables" readonly="true">
                                <input type="hidden" id="selected_output_function_id" value="" >
                            </div>
                            <div class="col-3 col-md-1 text-right">
                                <a href="" id="search_output_function" data-toggle="modal" data-target="#modal_functions_delivery_search" class="btn btn-md btn-outline-primary">
                                    <i class="flaticon-search ml-2 icon-md"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Activities for Outputs
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" placeholder="Activities for Outputs" id="txt_activities_output">
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label>Source of Fund
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="source_of_fund">
                                <option value=""></option>
                                @foreach($data["sof"] as $row)
                                    <option value="{{ $row["id"] }}">{{ $row["sof_classification"] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputPassword1">Activity Category
                                <span class="text-danger">*</span>
                           </label>   {{-- {{ dd($data["activity_category"]["id"]) }} --}}
                            <select class="form-control" id="activity_category">
                                <option value=""></option>
                                @foreach($data["activity_category"] as $row)
                                    <option value="{{ $row["id"] }}">{{ $row["category"] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Responsible Person
                        <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Responsible Person">
                    </div>
                    <div class="col-12 bg-secondary p-3">
                        <span>Target</span>
                    </div>
                    <div class="form-group row mt-6 p-5">
                        <div class="col-12 col-md-3">
                            <label>1st Quarter
                            </label>
                            <input type="text" class="form-control" placeholder="" id="qtr_1">
                        </div>
                        <div class="col-12 col-md-3">
                            <label>2nd Quarter
                            </label>
                            <input type="text" class="form-control" placeholder="" id="qtr_2" >
                        </div>
                        <div class="col-12 col-md-3">
                            <label>3rd Quarter
                            </label>
                            <input type="text" class="form-control" placeholder="" id="qtr_3" >
                        </div>
                        <div class="col-12 col-md-3">
                            <label>4th Quarter
                            </label>
                            <input type="text" class="form-control" placeholder="" id="qtr_4" >
                        </div>
                    </div>
                    <div class="col-12 bg-secondary p-3">Timeframe</div>
                    <div class="form-group row p-5">
                        <label class="col-6 col-md-1 col-form-label">January</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_jan" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">Febuary</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_feb" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">March</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_mar" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">April</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_apr" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">May</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_may" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">June</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_june" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">July</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_july" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">August</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_aug" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">September</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_sept" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">October</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_oct" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">November</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_nov" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">December</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_dec" value="false" disabled>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                <div class="col-12 bg-secondary p-3">Performance Indicator</div>
                <div class="col-12 mt-2 mb-2">
                    <button  type="button" class="btn btn-success"  id="btn_pi_add_new">
                        <i class="flaticon2-add-1"></i> Add Performance Indicator
                    </button>
                </div>
                  @include('pages.transaction.wfp.table.pi_table')
               </div>
           </div>

        </div>
        <div class="card-footer">
            <button type="reset" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </form>
    <!--end::Form-->
</div>

<!-- Modal-->
<div class="modal fade" id="modal_functions_delivery_search" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_functions_delivery_search" aria-hidden="true" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Users Output Functions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Search..." id="output_function_search" >
                            <span>
                                <i class="flaticon2-search-1 text-muted"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" id="output_function_table">
                    <div id="modal_content_output_functions" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="wfp_performance_indicator"  tabindex="-1" role="dialog" aria-labelledby="wfp_performance_indicator" aria-hidden="true" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Performance Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="pi_alert" class="alert alert-custom alert-notice alert-light-danger" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text" >
                        <ul id="pi_alert_text">
                        </ul>
                    </div>
                    <div class="alert-close">
                        <button type="button" class="close" id="btn_alert_close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleSelectd">Budget Line Item   <span class="text-danger">*</span></label>
                    <select class="form-control" id="buget_line_item" >
                    </select>
                </div>
                <div class="alert alert-light" role="alert">
                    <div class="row">
                        <div class="col-12 col-md-4">TOTAL BUDGET : <b id="total_allocation">-------------</b></div>
                        <div class="col-12 col-md-4">UTILIZED BUDGET : <b id="total_utilized">-------------</b></div>
                        <div class="col-12 col-md-4">REMAINING BUDGET : <b id="total_remaining">-------------</b></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleSelectd">Select UACS Category   <span class="text-danger">*</span></label>
                    <select class="form-control" id="uacs_category" >
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelectd">Select UACS Sub Category  <span class="text-danger">*</span></label>
                        <div class="" id="uacs_subcategory_loading">
                            <select class="form-control" id="uacs_subcategory" disabled></select>
                        </div>
                </div>
                <div class="form-group">
                    <label for="exampleSelectd">Select UACS Title  <span class="text-danger">*</span></label>
                        <div class="" id="uacs_title_loading">
                            <select class="form-control" id="uacs_title" disabled></select>
                        </div>
                </div>

                <div class="alert alert-light" role="alert">
                    <div class="row">
                        <div class="col-12 col-md-4">CATEGORY : <b id="label_uacs_category">--------</b></div>
                        <div class="col-12 col-md-4">SUB-CATEGORY : <b id="label_uacs_subcategory">--------</b></div>
                        <div class="col-12 col-md-4">TITLE : <b id="label_uacs_title">--------</b></div>
                        <div class="col-12 col-md-4">UACS CODE : <b id="label_uacs_code">--------</b></div>
                        <input type="hidden" id="uacs_code">
                    </div>
                </div>
                <div class="form-group">
                    <label>Performance Indicator   <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Performance Indicator" id="peformance_indicator">
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-2 col-form-label">INCLUDED PPMP</label>
                    <div class="col-12 col-md-4">
                        <span class="switch switch-primary">
                            <label>
                                <input type="checkbox" name="select" id="c_ppmp" value="false">
                                <span></span>
                            </label>
                        </span>
                    </div>
                    <label class="col-12 col-md-2 col-form-label">CATERING SERVICES</label>
                    <div class="col-12 col-md-4">
                        <span class="switch switch-primary">
                            <label>
                                <input type="checkbox" name="select" id="c_catering" value="false">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label>Cost</label>
                    <input type="text" class="form-control" placeholder="Cost" id="pi_cost">
                </div> --}}
                <div class="form-group">
                    <label>Cost<span class="text-danger">*</span></label>
                    <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">₱</span></div>
                        <input type="text" class="form-control" id="pi_cost" placeholder="99.9">
                    </div>
                </div>
                <div class="form-group">
                    <label>No. of Batch/s</label>
                    <input type="text" class="form-control" placeholder="No. of Batch/s" id="no_batchs" disabled="true">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary font-weight-bold" id="btn_save_pi">Save</button>
                <button type="button" class="btn btn-light-primary font-weight-bold" id="btn_pi_close">Close</button>
            </div>
        </div>
    </div>
</div>


<input type="hidden" id="wfp_code" value="">
@endsection

@push('scripts')
    <script src="{{ asset('dist/assets/js/pages/features/miscellaneous/blockui.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('dist/assets/js/form_validate.js') }}"></script>
    <script>
        $(document).ready(function(){
            var this_url = window.location.href;
            $("#wfp_code").val(this_url.split('wfp_code=')[1]);

            /************************************************
             *
             *              INITIALIZATION
             *
             *************************************************/




            getUserBudgetLineAllocation();
            getUacsCategory();
            populateOutputFunctionsAll();
            $("#pi_alert").delay(0).hide(0);

             let pi_data = {
                budget_line_item_id :'',
                uacs_title_id:'',
                performance_indicator: '',
                ppmp_include:'',
                catering_include:'',
                cost:'',
                wfp_code:''
            };


            let pi_rules = {
                budget_line_item_id :'required',
                uacs_title_id:'required',
                performance_indicator: 'required',
                ppmp_include:'required',
                catering_include:'required',
                cost:'required',
            }
            let options = {
                'required.budget_line_item_id' : ':attribute is Required',
                'required.uacs_title_id' : ':attribute is Required',
                'required.performance_indicator' : ':attribute is Required',
                'required.ppmp_include' : ':attribute is Required',
                'required.catering_include' : ':attribute is Required',
                'required.cost' : ':attribute is Required',
                'required.batches' : ':attribute is Required'
            }



           /*************************************************
                        EVENT LISTENERS
            *************************************************/
            // $("#search_output_function").on('click',function(){
            //     populateOutputFunctionsAll();
            // });

            $("#qtr_1").bind('keyup click',function(e){
                e.preventDefault();
                firstQuarterHasValue();
            });

            $("#qtr_2").bind('keyup click',function(){
                secondQuarterHasValue();
            });

            $("#qtr_3").bind('keyup click',function(){
                thirdQuarterHasValue();
            });

            $("#qtr_4").bind('keyup click',function(){
                fourthQuarterHasValue();
            });

            $("#output_function_search").on('keyup',function(){
                var str = $("#output_function_search").val();
                populateOutputFunctionsSearch(str);
            });

            $("#t_jan").on('click',function(){ switchChangeValue('t_jan') });
            $("#t_feb").on('click',function(){ switchChangeValue('t_feb') });
            $("#t_mar").on('click',function(){ switchChangeValue('t_mar') });
            $("#t_apr").on('click',function(){ switchChangeValue('t_apr') });
            $("#t_may").on('click',function(){ switchChangeValue('t_may') });
            $("#t_june").on('click',function(){ switchChangeValue('t_june') });
            $("#t_july").on('click',function(){ switchChangeValue('t_july') });
            $("#t_aug").on('click',function(){ switchChangeValue('t_aug') });
            $("#t_sept").on('click',function(){ switchChangeValue('t_sept') });
            $("#t_oct").on('click',function(){ switchChangeValue('t_oct') });
            $("#t_nov").on('click',function(){ switchChangeValue('t_nov') });
            $("#t_dec").on('click',function(){ switchChangeValue('t_dec') });
            $("#c_ppmp").on('click',function(){ switchChangeValue('c_ppmp') });
            $("#c_catering").on('click',function(){
                Promise.resolve(4)
                    .then(()=>{
                        switchChangeValue('c_catering');
                    })
                    .then(()=>{
                        if($("#c_catering").val() == 'false'){
                            $("#no_batchs").val('');
                            $("#no_batchs").attr('disabled',true);
                        }else{
                            $("#no_batchs").attr('disabled',false);
                        }
                        console.log($("#c_catering").val());
                    })
                    .then((err)=>{
                        return Promise.reject(err);
                });

            });


            $("#uacs_category").change(function(){
               var a = $("#uacs_category").val();
               if(a != null || a != undefined){
                    getUacsSubCategory($( "#uacs_category option:selected" ).text());
               }else{
                    $("#uacs_subcategory").attr('disabled');
               }
            });

            $("#uacs_subcategory").change(function(){
               var a = $("#uacs_subcategory").val();
               if(a != null || a != undefined){
                    getUacsTitle($( "#uacs_subcategory option:selected" ).text());
               }else{
                    $("#uacs_title").attr('disabled');
               }
            });

            $("#uacs_title").change(function(){
               var a = $("#uacs_title").val();
               if(a != null || a != undefined){
                    getUacsCode($("#uacs_title option:selected").val());
               }
            });

            $("#uacs_category").bind("change", function() {
                $("#label_uacs_category").html($("#uacs_category option:selected").text());
            });
            $("#uacs_subcategory" ).bind("change", function() {
                $("#label_uacs_subcategory").html( $("#uacs_subcategory option:selected").text());
            });
            $("#uacs_title" ).bind( "change", function() {
                $("#label_uacs_title").html( $("#uacs_title option:selected").text());
            });

            $("#buget_line_item").change(function(){
                getBudgetAllocation($(this).val());
            });

            $("#btn_save_pi").on('click',function(){
            //  console.log( $("#buget_line_item option:selected").val());

            $(this).addClass('spinner spinner-white spinner-right');
            $(this).attr('disabled',true);
            $(this).html('Processing . .');
            pi_data.budget_line_item_id = $("#buget_line_item option:selected").val();
            pi_data.uacs_title_id = $("#uacs_code").val();
            pi_data.performance_indicator = $("#peformance_indicator").val();
            pi_data.ppmp_include = $("#c_ppmp").val();
            pi_data.catering_include = $("#c_catering").val() ;
            pi_data.cost = $("#pi_cost").val();
            pi_data.wfp_code =  $("#wfp_code").val();


            if (pi_data.catering_include == 'true'){
                pi_rules.batches='required';
                pi_data.batches = $("#no_batchs").val();
            }else{
                delete pi_data.batches;
            }


            let pi_validation = new Validator(pi_data, pi_rules, options);

            pi_validation.setAttributeNames({
                budget_line_item_id:'Budget Line Item',
                uacs_title_id:'UACS Title',
                performance_indicator: 'Performance Indicator',
                ppmp_include:'IsPPMP',
                catering_include:'IsCatering',
                cost:'Cost',
                batches:'Batch',
                wfp_code :'WFP Code'
            })


            if (pi_validation.passes()) {
                console.log('passed');
                var _url = "{{ route('db_pi_save') }}";

                $.ajax({
                    method:"GET",
                    url: _url,
                    data: pi_data,
                    success:function(data){
                        if(data == 'success'){
                            toastr.success("Performance Indicator Sucessfully Save", "Good Job");
                        }else{
                            toastr.error("Something went wrong", "Opss!");
                        }
                    }
                })
                $("#btn_save_pi").removeClass('spinner spinner-white spinner-right');
                $("#btn_save_pi").html('Save');
                $("#btn_save_pi").attr('disabled',false);

            }else{
                var msg = "";
            // console.log(pi_validation.errors.all());
                $.each(pi_validation.errors.all(),function(key,value){
                    // console.log('key:' + key , 'value:' + value);
                    msg += '<li>' + value + '</li>';
                });
                $("#pi_alert").delay(400).fadeIn(600);
                $("#wfp_performance_indicator").animate({ scrollTop:0 },700);
                $("#pi_alert").addClass('fade show');
                $("#pi_alert_text").html(msg);

                // msg += (pi_validation.errors.has('Budget Line Item')) ? 'Budget Item is Required</br>' : '';
                // msg += (pi_validation.errors.has('UACS Category')) ? 'Budget Item is Required</br>' : '';
                // msg += (pi_validation.errors.has('Budget Line Item')) ? 'Budget Item is Required</br>' : '';
                // msg += (pi_validation.errors.has('Budget Line Item')) ? 'Budget Item is Required</br>' : '';
                // msg += (pi_validation.errors.has('Budget Line Item')) ? 'Budget Item is Required</br>' : '';
                // msg += (pi_validation.errors.has('Budget Line Item')) ? 'Budget Item is Required</br>' : '';
                $("#btn_save_pi").removeClass('spinner spinner-white spinner-right');
                $("#btn_save_pi").html('Save');
                $("#btn_save_pi").attr('disabled',false);

            }

            localStorage.setItem('pi_data',JSON.stringify(pi_data));

            });

            $("#btn_pi_add_new").on('click',function(e){
                $("#wfp_performance_indicator").modal({
                    show:true,
                    backdrop:'static',
                    focus: true,
                    keyboard:false
                });
            });


            $("#btn_pi_close").on('click',function(e){
                $("#wfp_performance_indicator").modal('hide');
            });

            $("#btn_alert_close").on('click',function(){
                $("#pi_alert").delay(0).fadeOut(600);
            });




            // end for $(document).ready()
        });


        /*************************************************
                        REUSABLE FUNCTIONS
        *************************************************/


        function populateOutputFunctionsAll(){
            var _url = "{{ route('d_get_output_functions') }}";
            $.ajax({
                method:"GET",
                url: _url,
                beforeSend:function(){
                    KTApp.block('#output_function_table', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Loading. . .'
                    });
                },
                success:function(data){
                    KTApp.unblock('#output_function_table');
                    document.getElementById('modal_content_output_functions').innerHTML= data;

                }
                ,
                complete:function(){
                    $("#output_function_pagination .pagination a").on('click',function(e){
                        e.preventDefault();
                        // console.log($(this).attr('href').split('page=')[1]);
                        fetch_output_function($(this).attr('href').split('page=')[1], $("#output_function_search").val())
                    });
                }
            });
        }



        var page ;
        function fetch_output_function(page1,q1){
            page =page1;
            // alert(typeof(q1));
            var _url= "{{ route('d_output_function_by_page') }}";
            var _q = q1 == '' ? '' : q1;
            $.ajax({
                method:"GET",
                url: _url,
                data : { page: page1, q : _q },
                beforeSend:function(){
                    KTApp.block('#output_function_table', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Loading. . .'
                    });
                },
                success:function(data){
                    KTApp.unblock('#output_function_table');
                    document.getElementById('modal_content_output_functions').innerHTML= data;
                },
                complete:function(){
                    $("#output_function_pagination .pagination a").on('click',function(e){
                        e.preventDefault();
                        // console.log($(this).attr('href').split('page=')[1]);
                        fetch_output_function($(this).attr('href').split('page=')[1], $("#output_function_search").val())
                    });
                }
            })
        }






        // function populateOutputFunctionsAll(){
        //     console.log('1');
        //     var _url = "{{ route('d_get_output_functions') }}";
        //     $.ajax({
        //         method:"GET",
        //         url: _url,
        //         beforeSend:function(){
        //             KTApp.block('#output_function_table', {
        //                 overlayColor: '#000000',
        //                 state: 'primary',
        //                 message: 'Loading. . .'
        //             });
        //         },
        //         success:function(data){
        //             KTApp.unblock('#output_function_table');
        //             document.getElementById('modal_content_output_functions').innerHTML= data;

        //         }
        //     });
        // }

        function populateOutputFunctionsSearch(q){
            var _url = "{{ route('d_get_search_output_functions') }}";
            var _q = q == '' ? '' : q;
            var datastr = "q=" + _q;

            $.ajax({
                method: "GET",
                url: _url,
                data: datastr,
                beforeSend:function(){
                    KTApp.block('#output_function_table', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Loading. . .'
                    });
                },
                success:function(data){
                    KTApp.unblock('#output_function_table');
                    document.getElementById('modal_content_output_functions').innerHTML= data;
                },
                complete:function(){
                    $("#output_function_pagination .pagination a").on('click',function(e){
                        e.preventDefault();
                        // console.log($(this).attr('href').split('page=')[1]);
                        fetch_output_function($(this).attr('href').split('page=')[1], $("#output_function_search").val())
                    });
                },
                error:function(err){
                    if(err.status == 500){
                        populateOutputFunctionsSearch($("#output_function_search").val());
                    }
                }
            });
        }

        function firstQuarterHasValue(){
            var val =($("#qtr_1").val());
            if ( val !=''){
                $("#t_jan").removeAttr('disabled');
                $("#t_feb").removeAttr('disabled');
                $("#t_mar").removeAttr('disabled');
            }else {
                Promise.resolve(6)
                    .then(()=>{
                        switchDisabledValueSetFalse('t_jan');
                    })
                    .then(()=>{
                        switchDisabledValueSetFalse('t_feb');
                    })
                    .then(()=>{
                        switchDisabledValueSetFalse('t_mar');
                    })
                    .then(()=>{
                        $("#t_jan").attr('disabled','');
                        $("#t_feb").attr('disabled','');
                        $("#t_mar").attr('disabled','');
                    })
                    .then((err)=>{
                        return Promise.reject(err);
                });
            }
        }
        function secondQuarterHasValue(){
            var val =($("#qtr_2").val());
            if (val !=''){
                $("#t_apr").removeAttr('disabled');
                $("#t_may").removeAttr('disabled');
                $("#t_june").removeAttr('disabled');
            }else{
                Promise.resolve(6)
                    .then(()=>{
                        switchDisabledValueSetFalse('t_apr');
                    })
                    .then(()=>{
                        switchDisabledValueSetFalse('t_may');
                    })
                    .then(()=>{
                        switchDisabledValueSetFalse('t_june');
                    })
                    .then(()=>{
                        $("#t_apr").attr('disabled','');
                        $("#t_may").attr('disabled','');
                        $("#t_june").attr('disabled','');
                    })
                    .then((err)=>{
                        return Promise.reject(err);
                });
            }
        }
        function thirdQuarterHasValue(){
            var val =($("#qtr_3").val());
            if (val != ''){
                $("#t_july").removeAttr('disabled');
                $("#t_aug").removeAttr('disabled');
                $("#t_sept").removeAttr('disabled');
            }else{
                Promise.resolve(6)
                    .then(()=>{
                        switchDisabledValueSetFalse('t_july');
                    })
                    .then(()=>{
                        switchDisabledValueSetFalse('t_aug');
                    })
                    .then(()=>{
                        switchDisabledValueSetFalse('t_sept');
                    })
                    .then(()=>{
                        $("#t_july").attr('disabled','');
                        $("#t_aug").attr('disabled','');
                        $("#t_sept").attr('disabled','');
                    })
                    .then((err)=>{
                        return Promise.reject(err);
                });
            }
        }
        function fourthQuarterHasValue(){
            var val =($("#qtr_4").val());
            if (val != ''){
                $("#t_oct").removeAttr('disabled');
                $("#t_nov").removeAttr('disabled');
                $("#t_dec").removeAttr('disabled');
            }else{
                Promise.resolve(6)
                    .then(()=>{
                        switchDisabledValueSetFalse('t_oct');
                    })
                    .then(()=>{
                        switchDisabledValueSetFalse('t_nov');
                    })
                    .then(()=>{
                        switchDisabledValueSetFalse('t_dec');
                    })
                    .then(()=>{
                        $("#t_oct").attr('disabled','');
                        $("#t_nov").attr('disabled','');
                        $("#t_dec").attr('disabled','');
                    })
                    .then((err)=>{
                        return Promise.reject(err);
                });
            }
        }

        function switchChangeValue(ob,type = null){
            var el = document.getElementById(ob);
            if (type == 'default'){
                el.value = 'false';
            }else{
                el.value = (el.value == 'true') ? 'false' : 'true';
            }
            // console.log($("#t_jan").val());
            // console.log($("#t_feb").val());
            // console.log($("#t_mar").val());
            // console.log($("#t_apr").val());
            // console.log($("#t_may").val());
            // console.log($("#t_june").val());
            // console.log($("#t_july").val());
            // console.log($("#t_aug").val());
            // console.log($("#t_sept").val());
            // console.log($("#t_oct").val());
            // console.log($("#t_nov").val());
            // console.log($("#t_dec").val());
        }

        function switchDisabledValueSetFalse(ob){
            var el = document.getElementById(ob);

            if (el.value == 'true') {
                    el.click();
                    el.value = 'false';
                }else{
                    el.value = 'false';
            }
        }

        function getUserBudgetLineAllocation(){
            var _url ="{{ route('d_get_budget_line_item') }}";
            var a = localStorage.getItem('GLOBAL_SETTINGS');
            a = a ?  JSON.parse(a) : {} ;
            $.ajax({
                method:"GET",
                url: _url,
                data: {year_id : a["year"] },
                success:function(data){
                    document.getElementById('buget_line_item').innerHTML = data;
                },
                error:function(err){
                    console.log(err);
                }
            });
        }

        function getCalculateBudgetLineItem(){
            var _url ="{{ route('d_get_calculate_budget_alloc') }}";
            $.ajax({
                method:"GET",
                url: _url,
                success:function(data){
                    document.getElementById('total_allocation').innerHTML = data["total_allocation"];
                    document.getElementById('total_utilized').innerHTML = data["total_utilized"];
                    document.getElementById('total_remaining').innerHTML = data["total_remaining"];
                },
                error:function(err){
                    console.log(err);
                }
            });
        }

        function getUacsCategory(){
            if($("#uacs_category").val() != ''){
                var _url ="{{ route('d_get_uacs_category') }}";
                $.ajax({
                    method:"GET",
                    url: _url,
                    success: function (data1) {
                        document.getElementById('uacs_category').innerHTML = data1;
                    }
                });
            }else{
                $("#uacs_subcategory").attr('disabled',true);
            }

        }

        function getUacsSubCategory(categ1){
            if($("#uacs_subcategory").val() != '' || $("#uacs_subcategory").val() != 'NO SUBCATEGORY'){
                var _url = "{{ route('d_get_uacs_subcategory') }}";
                $.ajax({
                    method:"GET",
                    url : _url,
                    data: ({ categ: categ1 }),
                    beforeSend:function(){
                        $("#uacs_subcategory_loading").addClass('spinner spinner-primary spinner-left');
                    },
                    success:function(data){
                        document.getElementById('uacs_subcategory').innerHTML =data;
                        $("#uacs_subcategory_loading").removeClass('spinner spinner-primary spinner-left');
                        $("#uacs_subcategory").removeAttr('disabled');
                    },
                    error:function(err){
                        console.log(err);
                    }
                });
            }else{
                $("#uacs_title").attr('disabled',true);
            }

        }
        function getUacsTitle(subcateg1){
            var _url ="{{ route('d_get_uacs_title') }}"

            $.ajax({
                method:"GET",
                url : _url,
                data: ({ subcateg: subcateg1 }),
                beforeSend:function(){
                    $("#uacs_title_loading").addClass('spinner spinner-primary spinner-left');
                },
                success:function(data){
                    document.getElementById('uacs_title').innerHTML =data;
                    $("#uacs_title_loading").removeClass('spinner spinner-primary spinner-left');
                    $("#uacs_title").removeAttr('disabled');

                },
                error:function(err){
                    console.log(err);
                }
            });
        }

        function getUacsCode(title1){
            var _url = "{{ route('d_get_uacs_code') }}";
            if (title1 !=''){
                $.ajax({
                    method:"GET",
                    url:_url,
                    data: ({ title : title1 }),
                    success:function(data){
                        document.getElementById('label_uacs_code').innerHTML = data;
                        $("#uacs_code").val(data);
                    }
                });
            }else{
                document.getElementById('label_uacs_code').innerHTML = "";
            }

        }

        function getBudgetAllocation(bli_id1){
            var _url = "{{ route('d_get_calculate_budget_alloc') }}";
            var unit_id1 = "{{ Auth::user()->getUnitId() }}";
            var a = localStorage.getItem('GLOBAL_SETTINGS');
            a = a ? JSON.parse(a) : {};
            var year_id1 = a["year"];
            if(a["year"] != null){
                $.ajax({
                    method:"GET",
                    url:_url,
                    data: ({ unit_id : unit_id1 , year_id : year_id1, bli_id : bli_id1}),
                    success:function(data){
                        // console.log(data.length);
                        if(data.length != 0){
                            document.getElementById('total_allocation').innerHTML =data[0].program_budget;
                        }
                    }
                });
            }

        }

        $(document).ready(function(){
            $("#output_function_pagination .pagination a").on('click',function(e){
                e.preventDefault();
                console.log($(this).attr('href'));
            });
        });
    </script>
@endpush