@extends('layouts.app')
@section('title','CREATE WFP')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('r_wfp') }}" class="text-muted">WFP</a>
</li>
<li class="breadcrumb-item">
    <a href="{{ route('r_create_wfp') }}" class="text-muted">Create</a>
</li>
@endsection
@section('content')
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <h3 class="card-title">Create Work and Financial Plan</h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form>
        <div class="card-body">
            <div class="form-group mb-8">
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
            </div>
           <div class="row">
               <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label>Select Output Function/Deliverables
                            <span class="text-danger">*</span>
                        </label>
                        <div class="row">
                            <div class="col-10 col-md-11">
                                <input type="text" id="selected_output_function" value="" class="form-control" placeholder="Select Output Function/Deliverables" readonly="true">
                                <input type="hidden" id="selected_output_function_id" value="" >
                            </div>
                            <div class="col-2 col-md-1 text-right">
                                <a href="" id="search_output_function" data-toggle="modal" data-target="#modal_functions_delivery_search" class="btn btn-md btn-outline-primary">
                                    <i class="flaticon-search ml-2 icon-md"></i>
                                </a>
                            </div>
                        </div>
                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Activities for Outputs
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" placeholder="Activities for Outputs">
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
                            <input type="number" class="form-control" placeholder="" id="qtr_1" value="0">
                            <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                        </div>
                        <div class="col-12 col-md-3">
                            <label>2nd Quarter
                            </label>
                            <input type="number" class="form-control" placeholder="" id="qtr_2" value="0">
                            <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                        </div>
                        <div class="col-12 col-md-3">
                            <label>3rd Quarter
                            </label>
                            <input type="number" class="form-control" placeholder="" id="qtr_3" value="0">
                            <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                        </div>
                        <div class="col-12 col-md-3">
                            <label>4th Quarter
                            </label>
                            <input type="number" class="form-control" placeholder="" id="qtr_4" value="0">
                            <span class="form-text text-muted">We'll never share your email with anyone else.</span>
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
                  <div class="row">
                    <div class="col-12 mt-2 mb-2">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#wfp_performance_indicator">
                            <i class="flaticon2-add-1"></i> Add Performance Indicator
                        </a>      
                    </div>
                    <div class="col-12" id="peformance_indicator_table_content">
                        <div class="col-12 p-20 w-100" style="height:150px; text-align:center;border:1px solid grey;">
                            <i class="flaticon2-start-up icon-2x"></i>
                            <p>No Indicator</p>
                        </div>
                      </div>
                  </div>
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
                    <table class="table table-sm table-hover" >
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Output Functions</th>
                            </tr>
                        </thead>
                        <tbody id="modal_content_output_functions">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="wfp_performance_indicator" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="wfp_performance_indicator" aria-hidden="true" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Performance Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleSelectd">Budget Line Item   <span class="text-danger">*</span></label>
                    <select class="form-control" id="buget_line_item">
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
                    <label for="exampleSelectd">Select UACS   <span class="text-danger">*</span></label>
                    <select class="js-example-basic-single" id="uacs_category" >
                    </select>
                </div>
               
            
                <div class="alert alert-light" role="alert">
                    <div class="row">
                        <div class="col-12 col-md-4">UACS CODE : <b>5001271912</b></div>
                        <div class="col-12 col-md-4">CATEGORY : <b>PERSONEL SERVICES</b></div>
                        <div class="col-12 col-md-4">SUB-CATEGORY : <b>OTHER PERSONNEL BENEFITS</b></div>
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
                                <input type="checkbox" name="select" id="t_dec">
                                <span></span>
                            </label>
                        </span>
                    </div>
                    <label class="col-12 col-md-2 col-form-label">CATERING SERVICES</label>
                    <div class="col-12 col-md-4">
                        <span class="switch switch-primary">
                            <label>
                                <input type="checkbox" name="select" id="t_dec">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Cost</label>
                    <input type="text" class="form-control" placeholder="Cost" id="pi_cost">
                </div>
                <div class="form-group">
                    <label>No. of Batch/s</label>
                    <input type="text" class="form-control" placeholder="No. of Batch/s" id="no_batchs">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection


@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
    <script src="{{ asset('dist/assets/js/pages/features/miscellaneous/blockui.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>

    <script>
        $(document).ready(function(){
    
            /************************************************
             * 
             *              INITIALIZATION 
             * 
             *************************************************/
             getUserBudgetLineAllocation();
             getUacsCategory();

            $("#uacs_category").select2({ width: 'resolve' });
            $('.js-example-basic-single').select2({ width: 'resolve' });

           
           /*************************************************
                        EVENT LISTENERS
            *************************************************/
            $("#search_output_function").on('click',function(){
                populateOutputFunctionsAll();
            });

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
            });
        }

        function populateOutputFunctionsSearch(q){
            var datastr = "q=" + q;
            var _url = "{{ route('d_get_search_output_functions') }}"
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
                error:function(err){
                    console.log(err);
                }
            });
        }

        function firstQuarterHasValue(){
            var val =Number($("#qtr_1").val());
        
            if (val >= 1){
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
            var val =Number($("#qtr_2").val());
            if (val >= 1){
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
            var val =Number($("#qtr_3").val());
            if (val >= 1){
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
            var val =Number($("#qtr_4").val());
            if (val >= 1){
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
            $.ajax({
                method:"GET",
                url: _url,
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
            var _url ="{{ route('d_get_uacs_category') }}";
            var _datalist;
          
            $.ajax({
                method:"GET",
                url: _url,
                success: function (data1) {
                    document.getElementById('uacs_category').innerHTML = data1;                    
                }
            });
        }
    </script>
@endpush