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
                                <input type="text" class="form-control" placeholder="Select Output Function/Deliverables" readonly="true">
                            </div>
                            <div class="col-2 col-md-1 text-right">
                                <a href="" data-toggle="modal" data-target="#modal_functions_delivery_search" class="btn btn-md btn-outline-primary">
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
                                <option>NEP</option>
                                <option>GAA</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputPassword1">Activity Category
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="activity_category">
                                <option>NEP</option>
                                <option>GAA</option>
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
                            <input type="text" class="form-control" placeholder="">
                            <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                        </div>
                        <div class="col-12 col-md-3">
                            <label>2nd Quarter
                            </label>
                            <input type="text" class="form-control" placeholder="">
                            <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                        </div>
                        <div class="col-12 col-md-3">
                            <label>3rd Quarter
                            </label>
                            <input type="text" class="form-control" placeholder="">
                            <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                        </div>
                        <div class="col-12 col-md-3">
                            <label>4th Quarter
                            </label>
                            <input type="text" class="form-control" placeholder="">
                            <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                        </div>
                    </div>
                    <div class="col-12 bg-secondary p-3">Timeframe</div>
                    <div class="form-group row p-5">
                        <label class="col-6 col-md-1 col-form-label">January</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_jan">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">Febuary</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_feb">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">March</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_mar">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">April</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_apr">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">May</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_may">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">June</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_june">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">July</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_july">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">August</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_aug">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">September</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_sept">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">October</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_oct">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">November</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_nov">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-6 col-md-1 col-form-label">December</label>
                        <div class="col-6 col-md-2">
                            <span class="switch switch-primary">
                                <label>
                                    <input type="checkbox" name="select" id="t_dec">
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




<div class="modal fade" id="modal_functions_delivery_search" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_functions_delivery_search" aria-hidden="true" style="z-index: 99999;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal modal_functions_delivery_search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @include('pages.transaction.wfp.table.output_functions')
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
                    <label for="exampleSelectd">Budget Line Item</label>
                    <select class="form-control" id="buget_line_item">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="alert alert-light" role="alert">
                    <div class="row">
                        <div class="col-12 col-md-4">TOTAL BUDGET : <b>1,400,000.00</b></div>
                        <div class="col-12 col-md-4">UTILIZED BUDGET : <b>1,200,000.00</b></div>
                        <div class="col-12 col-md-4">REMAINING BUDGET : <b>200,000.00</b></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleSelectd">Select UACS</label>
                    <select class="form-control" id="uacs">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
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
                    <label>Performance Indicator</label>
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
                <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection