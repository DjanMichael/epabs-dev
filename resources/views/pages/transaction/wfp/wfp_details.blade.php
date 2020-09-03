@extends('layouts.app')
@section('title','WFP DETAILS')
@section('content')    

<div class="card card-custom gutter-b">
    <div class="card-header">
     <div class="card-title">
            <h3 class="card-label">
                Basic Card
            <small>sub title</small>
            </h3>
     </div>
     <div class="card-toolbar">
        <!--begin::Dropdown-->
        <div class="dropdown dropdown-inline mr-2">
            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="la la-download"></i>Export</button>
            <!--begin::Dropdown Menu-->
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                <ul class="nav flex-column nav-hover">
                    <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon la la-print"></i>
                            <span class="nav-text">Print</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon la la-copy"></i>
                            <span class="nav-text">Copy</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon la la-file-excel-o"></i>
                            <span class="nav-text">Excel</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon la la-file-text-o"></i>
                            <span class="nav-text">CSV</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon la la-file-pdf-o"></i>
                            <span class="nav-text">PDF</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!--end::Dropdown Menu-->
        </div>
        <!--end::Dropdown-->
        <!--begin::Button-->
        <a href="#" class="btn btn-primary font-weight-bolder">
        <i class="la la-plus"></i>New Record</a>
        <!--end::Button-->

        <!-- Button trigger modal-->
        <a href="#" class="btn btn-primary font-weight-bolder ml-1"  data-toggle="modal" data-target="#comment_rdrawer">
            <i class="la la-plus"></i>Comment <span class="label label-md label-danger ml-2">5</span></a>
    </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" style="overflow-x: auto">
            <table class="table table-sm table-bordered" class="wfp_table">
                <thead style="text-align:center;" class="bg-secondary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Act Code</th>
                        <th scope="col">Function</th>
                        <th scope="col">Output Function</th>
                        <th scope="col">Activities for Outputs</th>
                        <th scope="col">Q1</th>
                        <th scope="col">Q2</th>
                        <th scope="col">Q3</th>
                        <th scope="col">Q4</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Responsible Person</th>
                        <th scope="col">Encoded by</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="wfp_table_row">
                        <td scope="row">1</td>
                        <td>00041292</td>
                        <td>STRATEGIC FUNCTION</td>
                        <td>asdas das dasdasdasdasdasdasdasdasd asd asd a ad asda as eeg ge ge sgsdgdsdsf sf dsfdsfdsf dsf sfsdfdss sdf sfssd sd s sdfsdf </td>
                        <td>sdsdfdsf sd dsf dsfsfds sfs sfs sds sdf dsf asdas dasdasdasdasdas as dasdad   asd asdad asdasd a asd adad asdada  asdqw</td>
                        <td>12</td>
                        <td>123</td>
                        <td>412</td>
                        <td>412</td>
                        <td>1,300,200.00</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                    </tr>
                    <tr class="wfp_table_row">
                        <td scope="row">1</td>
                        <td>00041292</td>
                        <td>STRATEGIC FUNCTION</td>
                        <td>asdas das dasdasdasdasdasdasdasdasd asd asd a ad asda as eeg ge ge sgsdgdsdsf sf dsfdsfdsf dsf sfsdfdss sdf sfssd sd s sdfsdf </td>
                        <td>sdsdfdsf sd dsf dsfsfds sfs sfs sds sdf dsf asdas dasdasdasdasdas as dasdad   asd asdad asdasd a asd adad asdada  asdqw</td>
                        <td>12</td>
                        <td>123</td>
                        <td>412</td>
                        <td>412</td>
                        <td>1,300,200.00</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                    </tr>
                    <tr class="wfp_table_row">
                        <td scope="row">1</td>
                        <td>00041292</td>
                        <td>STRATEGIC FUNCTION</td>
                        <td>asdas das dasdasdasdasdasdasdasdasd asd asd a ad asda as eeg ge ge sgsdgdsdsf sf dsfdsfdsf dsf sfsdfdss sdf sfssd sd s sdfsdf </td>
                        <td>sdsdfdsf sd dsf dsfsfds sfs sfs sds sdf dsf asdas dasdasdasdasdas as dasdad   asd asdad asdasd a asd adad asdada  asdqw</td>
                        <td>12</td>
                        <td>123</td>
                        <td>412</td>
                        <td>412</td>
                        <td>1,300,200.00</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                    </tr>
                    <tr class="wfp_table_row">
                        <td scope="row">1</td>
                        <td>00041292</td>
                        <td>STRATEGIC FUNCTION</td>
                        <td>asdas das dasdasdasdasdasdasdasdasd asd asd a ad asda as eeg ge ge sgsdgdsdsf sf dsfdsfdsf dsf sfsdfdss sdf sfssd sd s sdfsdf </td>
                        <td>sdsdfdsf sd dsf dsfsfds sfs sfs sds sdf dsf asdas dasdasdasdasdas as dasdad   asd asdad asdasd a asd adad asdada  asdqw</td>
                        <td>12</td>
                        <td>123</td>
                        <td>412</td>
                        <td>412</td>
                        <td>1,300,200.00</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                    </tr>
                    <tr class="wfp_table_row">
                        <td scope="row">1</td>
                        <td>00041292</td>
                        <td>STRATEGIC FUNCTION</td>
                        <td>asdas das dasdasdasdasdasdasdasdasd asd asd a ad asda as eeg ge ge sgsdgdsdsf sf dsfdsfdsf dsf sfsdfdss sdf sfssd sd s sdfsdf </td>
                        <td>sdsdfdsf sd dsf dsfsfds sfs sfs sds sdf dsf asdas dasdasdasdasdas as dasdad   asd asdad asdasd a asd adad asdada  asdqw</td>
                        <td>12</td>
                        <td>123</td>
                        <td>412</td>
                        <td>412</td>
                        <td>1,300,200.00</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                    </tr>
                    <tr class="wfp_table_row">
                        <td scope="row">1</td>
                        <td>00041292</td>
                        <td>STRATEGIC FUNCTION</td>
                        <td>asdas das dasdasdasdasdasdasdasdasd asd asd a ad asda as eeg ge ge sgsdgdsdsf sf dsfdsfdsf dsf sfsdfdss sdf sfssd sd s sdfsdf </td>
                        <td>sdsdfdsf sd dsf dsfsfds sfs sfs sds sdf dsf asdas dasdasdasdasdas as dasdad   asd asdad asdasd a asd adad asdada  asdqw</td>
                        <td>12</td>
                        <td>123</td>
                        <td>412</td>
                        <td>412</td>
                        <td>1,300,200.00</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                    </tr>
                    <tr class="wfp_table_row">
                        <td scope="row">1</td>
                        <td>00041292</td>
                        <td>STRATEGIC FUNCTION</td>
                        <td>asdas das dasdasdasdasdasdasdasdasd asd asd a ad asda as eeg ge ge sgsdgdsdsf sf dsfdsfdsf dsf sfsdfdss sdf sfssd sd s sdfsdf </td>
                        <td>sdsdfdsf sd dsf dsfsfds sfs sfs sds sdf dsf asdas dasdasdasdasdas as dasdad   asd asdad asdasd a asd adad asdada  asdqw</td>
                        <td>12</td>
                        <td>123</td>
                        <td>412</td>
                        <td>412</td>
                        <td>1,300,200.00</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                        <td>DJAN MICAHEL ANTHONY A PENGSON</td>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Total</th>
                        <th scope="col">42,200,200.00</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="comment_rdrawer" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="comment_rdrawer" aria-hidden="true" style="z-index: 99999;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection