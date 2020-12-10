<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WFP CONSOLIDATED</title>
    <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/favicon.ico') }}"/>
  <style>
           /* margin : top right bottom left */
        @page {
            margin: 10px 30px 120px 30px;
        }
        *{
            font-family: Arial, Helvetica, sans-serif;

        }
        table{
            border-collapse: collapse;
            padding:5px;

        }

        .t-d {
            padding:10px;
            font-size: 10px;
            border:1px solid #181b2b;
            padding-left:5px;
            padding-right:5px;
            padding-top:2px;
            padding-bottom:2px;
            /* width:10px; */
            word-break:break-all;
        }

        .t-h-d{
                padding-left:5px;
                padding-right:5px;
                padding-top:2px;
                padding-bottom:2px;
                color:#181b2b;
                font-size: 10px;
                font-weight: bold;
                position: relative;
                /* width:10px; */
                border:1px solid #181b2b;
        }
        .c{
            width:100%;
        }

        .txt-center{
            text-align:center;
        }
        .header {
            position: fixed;
                top: -20px;
                left: 0px;
                right: 0px;
                height: 120px;

                /** Extra personal styles **/
                /* background-color: #03a9f4; */
                color:black;
                text-align: center;
                line-height: 35px;
                font-size:10px;
                font-weight:bold;

        }
        .footer {
            position: fixed;
                bottom: 0px;
                left: 0px;
                right: 0px;
                height: 180px;
                font-size:10px;
                font-weight:bold;
                /** Extra personal styles **/
                /* background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px; */
        }
        main{
            position: relative;
            top:65px;

        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <?php
        $bli_count =0;
        $category_count =0;
    ?>
    @if($data["static"]["rep"] == "bli")
        {{-- BLI START --}}
        @forelse ($data["bli"] as $row)
        <?php  $bli_count++; ?>
        <main>
            <table style="width:100%;font-size:10px;font-weight:bold;">
                <tr>
                    <td style="width:40%"></td>
                    <td style="text-align:left;width:60%;">WFP Form 1. WORK AND FINANCIAL PLAN MATRIX</td>
                </tr>
                <tr>
                    <td style="height:0px;line-height:10px;margin-top:3px;">
                        NAME OF DOH UNIT: CENTER OF HEALTH DEVELOPMENT - CARAGA <br>
                        BUDGET LINE ITEM : {{ $row["budget_item"] }} <br>
                        CALENDAR YEAR : {{ $row["year"] }}
                    </td>
                </tr>
            </table>

            <table style="width:100%;">
                <tr>
                    <td class="t-h-d" style="text-align:center;">(1)</td>
                    <td class="t-h-d" style="text-align:center;">(2)</td>
                    <td class="t-h-d" style="text-align:center;">(3)</td>
                    <td class="t-h-d" style="text-align:center;" colspan="4">(4)TARGETS</td>
                    <td class="t-h-d" style="text-align:center;" colspan="2">(5)</td>
                    <td class="t-h-d" style="text-align:center;">(6)</td>
                </tr>
                <tr>
                    <td class="t-h-d" style="text-align:center;">OUTPUT FUNCTIONS / DELIVERABLES</td>
                    <td class="t-h-d" style="text-align:center;">ACTIVITIES FOR OUTPUTS</td>
                    <td class="t-h-d" style="text-align:center;">TIMEFRAME</td>
                    <td class="t-h-d" style="text-align:center;">Q1</td>
                    <td class="t-h-d" style="text-align:center;">Q2</td>
                    <td class="t-h-d" style="text-align:center;">Q3</td>
                    <td class="t-h-d" style="text-align:center;">Q4</td>
                    <td class="t-h-d" style="text-align:center;">COST</td>
                    <td class="t-h-d" style="text-align:center;">SOURCE OF FUND</td>
                    <td class="t-h-d" style="text-align:center;">RESPONSIBLE PERSON</td>
                </tr>
                <tr>
                    <td colspan="10" class="t-h-d">A. STRATEGIC FUNCTION</td>
                </tr>
                <?php
                    $a = new \App\Http\Controllers\ReportsController;
                    $wfp_details = \App\Wfp::join('tbl_wfp_activity','tbl_wfp_activity.wfp_code','tbl_wfp.code')
                                            ->join('ref_function_deliverables','ref_function_deliverables.id','tbl_wfp_activity.out_function')
                                            ->join('tbl_activity_output_function','tbl_activity_output_function.id','tbl_wfp_activity.out_function')
                                            ->join('tbl_wfp_activity_per_indicator',function($q){
                                                $q->on('tbl_wfp_activity_per_indicator.wfp_code','=','tbl_wfp_activity.wfp_code');
                                                $q->on('tbl_wfp_activity_per_indicator.wfp_act_id','=','tbl_wfp_activity.id');
                                            })
                                            ->join('ref_budget_line_item','ref_budget_line_item.id','tbl_wfp_activity_per_indicator.bli_id')
                                            ->groupBy('tbl_wfp_activity_per_indicator.wfp_act_id')
                                            ->where('tbl_wfp.year_id',$row["year_id"])
                                            ->where('ref_budget_line_item.budget_item',$row["budget_item"])
                                            ->where('ref_function_deliverables.function_class','STRATEGIC FUNCTION')->get()->toArray();

                    // dd($wfp_details);
                ?>
                @forelse($wfp_details as $row2)
                <tr>
                    <td class="t-d">{{ $row2["description"] }}</td>
                    <td class="t-d">{{ $row2["out_activity"] }}</td>
                    <td class="t-d">{{ $a->activityTimeFrameConvertToMonths($row2["activity_timeframe"]) }}</td>
                    <td class="t-d">{{ $row2["target_q1"] ?: 0 }}</td>
                    <td class="t-d">{{ $row2["target_q2"] ?: 0}}</td>
                    <td class="t-d">{{ $row2["target_q3"] ?: 0}}</td>
                    <td class="t-d">{{ $row2["target_q4"] ?: 0}}</td>
                    <td class="t-d">{{ $row2["activity_cost"] }}</td>
                    <td class="t-d">{{ $a->getSourceOfFundNameById($row2["activity_source_of_fund"]) }}</td>
                    <td class="t-d">{{ $row2["responsible_person"] }}</td>
                </tr>
                @empty
                <tr>
                    <td class="t-d" colspan="10">NO DATA</td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="10" class="t-h-d">B. CORE FUNCTION</td>
                </tr>
                <?php

                    $wfp_details = \App\Wfp::join('tbl_wfp_activity','tbl_wfp_activity.wfp_code','tbl_wfp.code')
                                            ->join('ref_function_deliverables','ref_function_deliverables.id','tbl_wfp_activity.out_function')
                                            ->join('tbl_activity_output_function','tbl_activity_output_function.id','tbl_wfp_activity.out_function')
                                            ->join('tbl_wfp_activity_per_indicator',function($q){
                                                $q->on('tbl_wfp_activity_per_indicator.wfp_code','=','tbl_wfp_activity.wfp_code');
                                                $q->on('tbl_wfp_activity_per_indicator.wfp_act_id','=','tbl_wfp_activity.id');
                                            })
                                            ->join('ref_budget_line_item','ref_budget_line_item.id','tbl_wfp_activity_per_indicator.bli_id')
                                            ->groupBy('tbl_wfp_activity_per_indicator.wfp_act_id')
                                            ->where('tbl_wfp.year_id',$row["year_id"])
                                            ->where('ref_budget_line_item.budget_item',$row["budget_item"])
                                            ->where('ref_function_deliverables.function_class','CORE FUNCTION')->get()->toArray();

                    // dd($wfp_details);
                ?>
                @forelse($wfp_details as $row2)
                <tr>
                    <td class="t-d">{{ $row2["description"] }}</td>
                    <td class="t-d">{{ $row2["out_activity"] }}</td>
                    <td class="t-d">{{ $a->activityTimeFrameConvertToMonths($row2["activity_timeframe"]) }}</td>
                    <td class="t-d">{{ $row2["target_q1"] ?: 0 }}</td>
                    <td class="t-d">{{ $row2["target_q2"] ?: 0}}</td>
                    <td class="t-d">{{ $row2["target_q3"] ?: 0}}</td>
                    <td class="t-d">{{ $row2["target_q4"] ?: 0}}</td>
                    <td class="t-d">{{ $row2["activity_cost"] }}</td>
                    <td class="t-d">{{ $a->getSourceOfFundNameById($row2["activity_source_of_fund"]) }}</td>
                    <td class="t-d">{{ $row2["responsible_person"] }}</td>
                </tr>
                @empty
                <tr>
                    <td class="t-d" colspan="10">NO DATA</td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="10" class="t-h-d">C. SUPPORT FUNCTION</td>
                </tr>
                <?php
                    $a = new \App\Http\Controllers\ReportsController;
                    $wfp_details = \App\Wfp::join('tbl_wfp_activity','tbl_wfp_activity.wfp_code','tbl_wfp.code')
                                            ->join('ref_function_deliverables','ref_function_deliverables.id','tbl_wfp_activity.out_function')
                                            ->join('tbl_activity_output_function','tbl_activity_output_function.id','tbl_wfp_activity.out_function')
                                            ->join('tbl_wfp_activity_per_indicator',function($q){
                                                $q->on('tbl_wfp_activity_per_indicator.wfp_code','=','tbl_wfp_activity.wfp_code');
                                                $q->on('tbl_wfp_activity_per_indicator.wfp_act_id','=','tbl_wfp_activity.id');
                                            })
                                            ->join('ref_budget_line_item','ref_budget_line_item.id','tbl_wfp_activity_per_indicator.bli_id')
                                            ->groupBy('tbl_wfp_activity_per_indicator.wfp_act_id')
                                            ->where('tbl_wfp.year_id',$row["year_id"])
                                            ->where('ref_budget_line_item.budget_item',$row["budget_item"])
                                            ->where('ref_function_deliverables.function_class','SUPPORT FUNCTION')->get()->toArray();

                    // dd($wfp_details);
                ?>
                @forelse($wfp_details as $row2)
                <tr>
                    <td class="t-d">{{ $row2["description"] }}</td>
                    <td class="t-d">{{ $row2["out_activity"] }}</td>
                    <td class="t-d">{{ $a->activityTimeFrameConvertToMonths($row2["activity_timeframe"]) }}</td>
                    <td class="t-d">{{ $row2["target_q1"] ?: 0 }}</td>
                    <td class="t-d">{{ $row2["target_q2"] ?: 0}}</td>
                    <td class="t-d">{{ $row2["target_q3"] ?: 0}}</td>
                    <td class="t-d">{{ $row2["target_q4"] ?: 0}}</td>
                    <td class="t-d">{{ $row2["activity_cost"] }}</td>
                    <td class="t-d">{{ $a->getSourceOfFundNameById($row2["activity_source_of_fund"]) }}</td>
                    <td class="t-d">{{ $row2["responsible_person"] }}</td>
                </tr>
                @empty
                <tr>
                    <td class="t-d" colspan="10">NO DATA</td>
                </tr>
                @endforelse

            </table>
            <script type="text/php">
                if (isset($pdf)) {
                    $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                    $size = 5;
                    $font = $fontMetrics->getFont("Verdana");
                    $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                    $x = ($pdf->get_width() - $width) / 2;
                    $y = $pdf->get_height() - 30;
                    $pdf->page_text($x, $y, $text, $font, $size);
                }
        </script>
            @if(count($data["bli"]) != $bli_count)
            <div class="page-break"></div>
            @endif
        </main>
        @empty
        @endforelse
    @endif

    @if($data["static"]["rep"] == "category")
        {{-- CATEGORY START --}}
        @forelse ($data["app_category"] as $row)
        <?php $category_count++; ?>
        @if($data["static"]["rep_sub"] == "ALL")
            <table style="width:100%;font-size:10px;font-weight:bold;">
                <tr>
                    <td style="width:40%"></td>
                    <td style="text-align:left;width:60%;">WFP Form 1. WORK AND FINANCIAL PLAN MATRIX</td>
                </tr>
                <tr>
                    <td style="height:0px;line-height:13px;margin-top:3px;">
                        NAME OF DOH UNIT: CENTER OF HEALTH DEVELOPMENT - CARAGA <br>
                        ACTIVITY CATEGORY : {{ $row["category"] }} <br>
                        CALENDAR YEAR : {{ $data["static"]["year"] }}
                    </td>
                </tr>
            </table>

            <table style="width:100%;">
                <tr>
                    <td class="t-h-d" style="text-align:center;">(1)</td>
                    <td class="t-h-d" style="text-align:center;">(2)</td>
                    <td class="t-h-d" style="text-align:center;">(3)</td>
                    <td class="t-h-d" style="text-align:center;" colspan="4">(4)TARGETS</td>
                    <td class="t-h-d" style="text-align:center;" colspan="2">(5)</td>
                    <td class="t-h-d" style="text-align:center;">(6)</td>
                </tr>
                <tr>
                    <td class="t-h-d" style="text-align:center;">OUTPUT FUNCTIONS / DELIVERABLES</td>
                    <td class="t-h-d" style="text-align:center;">ACTIVITIES FOR OUTPUTS</td>
                    <td class="t-h-d" style="text-align:center;">TIMEFRAME</td>
                    <td class="t-h-d" style="text-align:center;">Q1</td>
                    <td class="t-h-d" style="text-align:center;">Q2</td>
                    <td class="t-h-d" style="text-align:center;">Q3</td>
                    <td class="t-h-d" style="text-align:center;">Q4</td>
                    <td class="t-h-d" style="text-align:center;">COST</td>
                    <td class="t-h-d" style="text-align:center;">SOURCE OF FUND</td>
                    <td class="t-h-d" style="text-align:center;">RESPONSIBLE PERSON</td>
                </tr>



                <tr>
                    <td class="t-h-d" colspan="10">A. STRATEGIC FUNCTION</td>
                </tr>
                <?php
                    $a = new \App\Http\Controllers\ReportsController;
                    $twa =  \App\Views\WfpActivityInfo::where('activity_category_id',$row["id"])->where('class_sequence','A')->get()->toArray();
                ?>
                @forelse($twa as $row2)
                <tr>
                    <td class="t-d">{{ $row2["function_description"] }}</td>
                    <td class="t-d">{{ $row2["out_activity"] }}</td>
                    <td class="t-d txt-center">{{ $a->activityTimeFrameConvertToMonths($row2["activity_timeframe"]) }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q1"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q2"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q3"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q4"] ?? 0 }}</td>
                     <td class="t-d" style="font-family: DejaVu Sans !important;text-align:right">&#8369;  {{ number_format($row2["activity_cost"],2) }}</td>
                    <td class="t-d txt-center">{{ $row2["sof_classification"] }}</td>
                    <td class="t-d txt-center">{{ $row2["responsible_person"] }}</td>
                </tr>
                @empty
                <tr>
                    <td class="t-d" colspan="10">NO DATA.</td>
                </tr>
                @endforelse
                <tr>
                    <td class="t-h-d" colspan="10">B. CORE FUNCTION</td>
                </tr>
                <?php
                    $a = new \App\Http\Controllers\ReportsController;
                    $twa =  \App\Views\WfpActivityInfo::where('activity_category_id',$row["id"])->where('class_sequence','B')->get()->toArray();
                ?>
                @forelse($twa as $row2)
                <tr>
                    <td class="t-d">{{ $row2["function_description"] }}</td>
                    <td class="t-d">{{ $row2["out_activity"] }}</td>
                    <td class="t-d txt-center">{{ $a->activityTimeFrameConvertToMonths($row2["activity_timeframe"]) }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q1"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q2"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q3"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q4"] ?? 0 }}</td>
                    <td class="t-d" style="font-family: DejaVu Sans !important;text-align:right">&#8369;  {{ number_format($row2["activity_cost"],2) }}</td>
                    <td class="t-d txt-center">{{ $row2["sof_classification"] }}</td>
                    <td class="t-d txt-center">{{ $row2["responsible_person"] }}</td>
                </tr>
                @empty
                <tr>
                    <td class="t-d" colspan="10">NO DATA.</td>
                </tr>
                @endforelse

                <tr>
                    <td class="t-h-d" colspan="10">C. SUPPORT FUNCTION</td>
                </tr>
                <?php
                    $a = new \App\Http\Controllers\ReportsController;
                    $twa =  \App\Views\WfpActivityInfo::where('activity_category_id',$row["id"])->where('class_sequence','C')->get()->toArray();
                ?>
                @forelse($twa as $row2)
                <tr>
                    <td class="t-d">{{ $row2["function_description"] }}</td>
                    <td class="t-d">{{ $row2["out_activity"] }}</td>
                    <td class="t-d txt-center">{{ $a->activityTimeFrameConvertToMonths($row2["activity_timeframe"]) }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q1"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q2"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q3"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q4"] ?? 0 }}</td>
                    <td class="t-d" style="font-family: DejaVu Sans !important;text-align:right">&#8369;  {{ number_format($row2["activity_cost"],2) }}</td>
                    <td class="t-d txt-center">{{ $row2["sof_classification"] }}</td>
                    <td class="t-d txt-center">{{ $row2["responsible_person"] }}</td>
                </tr>
                @empty
                <tr>
                    <td class="t-d" colspan="10">NO DATA.</td>
                </tr>
                @endforelse
                @if(count($data["app_category"]) != $category_count)
                    <div class="page-break"></div>
                @endif
            </table>
        @else

            <table style="width:100%;font-size:10px;font-weight:bold;">
                <tr>
                    <td style="width:40%"></td>
                    <td style="text-align:left;width:60%;">WFP Form 1. WORK AND FINANCIAL PLAN MATRIX</td>
                </tr>
                <tr>
                    <td style="height:0px;line-height:13px;margin-top:3px;">
                        NAME OF DOH UNIT: CENTER OF HEALTH DEVELOPMENT - CARAGA <br>
                        ACTIVITY CATEGORY : {{ $row }} <br>
                        CALENDAR YEAR : {{ $data["static"]["year"] }}
                    </td>
                </tr>
            </table>

            <table style="width:100%;">
                <tr>
                    <td class="t-h-d" style="text-align:center;">(1)</td>
                    <td class="t-h-d" style="text-align:center;">(2)</td>
                    <td class="t-h-d" style="text-align:center;">(3)</td>
                    <td class="t-h-d" style="text-align:center;" colspan="4">(4)TARGETS</td>
                    <td class="t-h-d" style="text-align:center;" colspan="2">(5)</td>
                    <td class="t-h-d" style="text-align:center;">(6)</td>
                </tr>
                <tr>
                    <td class="t-h-d" style="text-align:center;">OUTPUT FUNCTIONS / DELIVERABLES</td>
                    <td class="t-h-d" style="text-align:center;">ACTIVITIES FOR OUTPUTS</td>
                    <td class="t-h-d" style="text-align:center;">TIMEFRAME</td>
                    <td class="t-h-d" style="text-align:center;">Q1</td>
                    <td class="t-h-d" style="text-align:center;">Q2</td>
                    <td class="t-h-d" style="text-align:center;">Q3</td>
                    <td class="t-h-d" style="text-align:center;">Q4</td>
                    <td class="t-h-d" style="text-align:center;">COST</td>
                    <td class="t-h-d" style="text-align:center;">SOURCE OF FUND</td>
                    <td class="t-h-d" style="text-align:center;">RESPONSIBLE PERSON</td>
                </tr>


                <tr>
                    <td class="t-h-d" colspan="10">A. STRATEGIC FUNCTION</td>
                </tr>
                <?php
                    $a = new \App\Http\Controllers\ReportsController;
                    $twa =  \App\Views\WfpActivityInfo::where('activity_category_id',$a->getActCategoryNameToId($row))->where('class_sequence','A')->get()->toArray();
                ?>
                @forelse($twa as $row2)
                <tr>
                    <td class="t-d">{{ $row2["function_description"] }}</td>
                    <td class="t-d">{{ $row2["out_activity"] }}</td>
                    <td class="t-d txt-center">{{ $a->activityTimeFrameConvertToMonths($row2["activity_timeframe"]) }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q1"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q2"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q3"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q4"] ?? 0 }}</td>
                    <td class="t-d" style="font-family: DejaVu Sans !important;text-align:right">&#8369;  {{ number_format($row2["activity_cost"],2) }}</td>
                    <td class="t-d txt-center">{{ $row2["sof_classification"] }}</td>
                    <td class="t-d txt-center">{{ $row2["responsible_person"] }}</td>
                </tr>
                @empty
                <tr>
                    <td class="t-d" colspan="10">NO DATA.</td>
                </tr>
                @endforelse


                <tr>
                    <td class="t-h-d" colspan="10">B. CORE FUNCTION</td>
                </tr>
                <?php
                    $a = new \App\Http\Controllers\ReportsController;
                    $twa =  \App\Views\WfpActivityInfo::where('activity_category_id',$a->getActCategoryNameToId($row))->where('class_sequence','B')->get()->toArray();
                ?>
                @forelse($twa as $row2)
                <tr>
                    <td class="t-d">{{ $row2["function_description"] }}</td>
                    <td class="t-d">{{ $row2["out_activity"] }}</td>
                    <td class="t-d txt-center">{{ $a->activityTimeFrameConvertToMonths($row2["activity_timeframe"]) }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q1"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q2"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q3"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q4"] ?? 0 }}</td>
                    <td class="t-d" style="font-family: DejaVu Sans !important;text-align:right">&#8369;  {{ number_format($row2["activity_cost"],2) }}</td>
                    <td class="t-d txt-center">{{ $row2["sof_classification"] }}</td>
                    <td class="t-d txt-center">{{ $row2["responsible_person"] }}</td>
                </tr>
                @empty
                <tr>
                    <td class="t-d" colspan="10">NO DATA.</td>
                </tr>
                @endforelse


                <tr>
                    <td class="t-h-d" colspan="10">C. SUPPORT FUNCTION</td>
                </tr>
                <?php
                    $a = new \App\Http\Controllers\ReportsController;
                    $twa =  \App\Views\WfpActivityInfo::where('activity_category_id',$a->getActCategoryNameToId($row))->where('class_sequence','C')->get()->toArray();
                ?>
                @forelse($twa as $row2)
                <tr>
                    <td class="t-d">{{ $row2["function_description"] }}</td>
                    <td class="t-d">{{ $row2["out_activity"] }}</td>
                    <td class="t-d txt-center">{{ $a->activityTimeFrameConvertToMonths($row2["activity_timeframe"]) }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q1"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q2"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q3"] ?? 0 }}</td>
                    <td class="t-d txt-center">{{ $row2["target_q4"] ?? 0 }}</td>
                    <td class="t-d" style="font-family: DejaVu Sans !important;text-align:right">&#8369;  {{ number_format($row2["activity_cost"],2) }}</td>
                    <td class="t-d txt-center">{{ $row2["sof_classification"] }}</td>
                    <td class="t-d txt-center">{{ $row2["responsible_person"] }}</td>
                </tr>
                @empty
                <tr>
                    <td class="t-d" colspan="10">NO DATA.</td>
                </tr>
                @endforelse

                @if(count($data["app_category"]) != $category_count)
                    <div class="page-break"></div>
                @endif
            </table>
        @endif
        @empty
        @endforelse
    @endif
</body>
</html>
