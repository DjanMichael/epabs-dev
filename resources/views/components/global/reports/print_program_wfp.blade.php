<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WFP</title>
    <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/favicon.ico') }}"/>

    <style>
           /* margin : top right bottom left */
        @page {
            margin: 80px 30px 120px 30px;
        }
        *{
            font-family: Arial, Helvetica, sans-serif;

        }
        .t-row{

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
                top: -60px;
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
                bottom: -60px;
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

        .col-1{
            display:inline-block;
            width:33%;
            font-size:12px;
            font-weight:bold;
            background-color:red;
        }
    </style>
</head>
<body >
    <div class="header" style="width:100%;">

    <div stlye="width:100%">
        <div style="position: absolute;top:-10px;left:50%;">
            ANNEX F.
        </div>
    </div>
    <div stlye="width:100%">
        <div style="position: absolute;top:20px;left:44%;">
            WORK AND FINANCIAL PLAN MATRIX
        </div>
    </div>
    <div style="width:100%;">
        <div style="position: absolute;top:0px;right:0;">Wfp Form 1</div>
    </div>

    <div style="width:100%;">
        <div style="position: absolute;top:50px;left:5;">DEPARTMENT OF HEALTH</div>
        <div style="position: absolute;top:60px;left:5;">CENTER FOR HEALTH DEVELOPMENT - CARAGA</div>
        <div style="position: absolute;top:80px;left:5;">PROGRAM: {{ $data["wfp_program"]->program_name }}  LOCATION: {{ $data["wfp_unit"]->division .' / '. $data["wfp_unit"]->section }}</div>
    <div style="position: absolute;top:90px;left:5;">CALENDAR YEAR: {{ $data["wfp_year"]->year }}</div>
    </div>
            {{-- <img
            src="{{ asset('dist/assets/media/logos/logo-letter-3.png') }}"
            height="80px"
            width="80px"
            style="position:absolute;top:0;left:0;"
            > --}}
    </div>
    <div class="footer">
        <table style="width:100%">
            <tr>
                <td style="width:40%">
                    Prepared By:
                    <br><br><br><br>
                    {{  $data["wfp_manager"]->name }}
                    <br>
                    {{  $data["wfp_manager"]->designation ?: 'NO DESIGNATION' }}
                    <br>
                    Date: _____________
                </td>
                <td style="width:20%">
                    Reviewed By:
                    <br><br><br><br>
                    ENGR. ARLENE D. SANTUA
                    <br>
                    PLANNING OFFICER III
                    <br>
                    Date: _____________
                </td>
                <td style="width:20%">
                    Recommending Approval:
                    <br><br><br><br>
                    DR. GERNA T. MANATAD
                    <br>
                    PLANNING OFFICER III
                    <br>
                    Date: _____________
                </td>
                <td style="width:20%">
                    Approved By:
                    <br><br><br><br>
                    JOSE R. LLACUNA JR., MD, MPH, CESO III
                    <br>
                    DIRECTOR
                    <br>
                    Date: _____________
                </td>
            </tr>
            <tr>
                <td style="width:40%">
                    <br><br>
                    Noted By:
                    <br><br><br><br>
                    <?php
                        $division = $data["wfp_unit"]->division;
                        $unit = $data["wfp_unit"]->section;
                    ?>
                    @if($division =="RD/ARD")
                        @if($unit == "ARD")
                            DR. GERNA
                            <br>
                            MEDICAL OFFICER V
                        @endif
                        @if($unit == "RD")
                            DR. JOSE LLACUNA
                            <br>
                            MEDICAL OFFICER V
                        @endif
                    @endif

                    @if($division =="RLED" || $division =="MSD" || $division =="HRDU" || $division =="PDOHO")
                        AILEEN SACOL
                        <br>
                        ADMINISTRATIVE OFFICER V
                    @endif

                    @if($division == "LHS")
                        DR. ERNESTO PAREJA
                        <br>
                        MEDICAL OFFICER V
                    @endif
                    <br>
                    Date: _____________
                </td>
            </tr>
        </table>
    </div>

    <?php
        $instance_wfp_info = new App\Views\WfpActivityInfo;
        $a = new App\Http\Controllers\PDFController;
    ?>

    <main>
        <table style="width:100%">
            <tr>
                <td class="t-h-d txt-center">(1)</td>
                <td class="t-h-d txt-center">(2)</td>
                <td class="t-h-d txt-center">(3)</td>
                <td class="t-h-d txt-center" colspan="4">(4) TARGETS</td>
                <td class="t-h-d txt-center" colspan="2">(5) RESOURCE REQUIREMENTS</td>
                <td class="t-h-d txt-center">(6)</td>
            </tr>
            <tr>
                <td class="t-h-d txt-center">OUTPUT FUNCTIONS / DELIVERABLES</td>
                <td class="t-h-d txt-center">ACTIVITIES FOR OUTPUTS</td>
                <td class="t-h-d txt-center">TIMEFRAME</td>
                <td class="t-h-d txt-center">Q1</td>
                <td class="t-h-d txt-center">Q2</td>
                <td class="t-h-d txt-center">Q3</td>
                <td class="t-h-d txt-center">Q4</td>
                <td class="t-h-d txt-center">COST</td>
                <td class="t-h-d txt-center">SOURCE OF FUND</td>
                <td class="t-h-d txt-center">RESPONSIBLE PERSON</td>
            </tr>
            <tr>
                <td class="t-h-d" colspan="10">A. STRATEGIC FUNCTION</td>
            </tr>
            <?php
                $curr = 0;
                $i =0;
                $rowspan =1;
                $skip_td = 0;
                $sub_total_a = 0;
            ?>
            @forelse ($data["wfp_a"] as $row)
                <?php
                    $sub_total_a += $row["activity_cost"];
                    $skip_td = 0;
                    // dd(count($data["wfp_a"]) );
                    if(count($data["wfp_a"]) > 1){
                        if( $i < count($data["wfp_a"])){
                            if($i == 1){
                                // dd($instance_wfp_info->getOutputFunctionById($row["out_function"]));
                                $curr = $instance_wfp_info->getOutputFunctionById($row["out_function"]);
                                $rowspan = 1;
                            }else{
                                // dd("2");
                                $curr = $instance_wfp_info->getOutputFunctionById($row["out_function"]);
                                if($curr == $instance_wfp_info->getOutputFunctionById($data["wfp_a"][$i+1]["out_function"])){
                                    $rowspan++;
                                    $skip_td = 1;
                                }else{
                                    $rowspan = 1;
                                    $skip_td = 0;
                                }
                            }
                        }
                    }else{
                        $curr = $instance_wfp_info->getOutputFunctionById($row["out_function"]);
                        $rowspan = 1;
                        $skip_td = 1;
                    }

                    // dd([$curr == $instance_wfp_info->getOutputFunctionById($data["wfp_a"][$i+1]["out_function"])]);
                    $i++;
                ?>
                    <tr class="t-row">
                        @if($skip_td == 1)
                            <td class="t-d txt-center" rowspan="{{ $rowspan }}">{{ $instance_wfp_info->getOutputFunctionById($row["out_function"]) }}</td>
                        @endif
                        <td class="t-d" >{{ $row["out_activity"] }}</td>
                        <td class="t-d txt-center">{{ $a->activityTimeFrameConvertToMonths($row["activity_timeframe"]) }}</td>
                        <td class="t-d txt-center">{{ $row["target_q1"] ? $row["target_q1"] : '' }}</td>
                        <td class="t-d txt-center">{{ $row["target_q2"] ? $row["target_q2"] : ''}}</td>
                        <td class="t-d txt-center">{{ $row["target_q3"] ? $row["target_q3"] : '' }}</td>
                        <td class="t-d txt-center">{{ $row["target_q4"] ? $row["target_q4"] : ''}}</td>
                        <td class="t-d"><span style="font-family: DejaVu Sans !important">&#8369;</span> {{ number_format($row["activity_cost"],2) }}</td>
                        <td class="t-d txt-center">{{ $row["sof_classification"] }}</td>
                        <td class="t-d txt-center">{{ $row["responsible_person"] }}</td>
                    </tr>
            @empty
                    <tr>
                        <td class="t-h-d" colspan="10">NO DATA FOUND.</td>
                    </tr>
            @endforelse
            <tr class="t-row">
                <td class="t-d" colspan="7" style="text-align:right;">Sub Total</td>
                <td class="t-d" style="font-family: DejaVu Sans !important" colspan="3">&#8369; {{ number_format($sub_total_a,2) }}</td>
            </tr>

            <tr>
                <td class="t-h-d" colspan="10">B. CORE FUNCTION</td>
            </tr>
            <?php
            $curr = 0;
            $i =0;
            $rowspan =1;
            $skip_td = 0;
            $sub_total_b = 0;
        ?>
        @forelse ($data["wfp_b"] as $row)
            <?php
                $sub_total_b += $row["activity_cost"];
                $skip_td = 0;
                // dd(count($data["wfp_b"]) );
                if(count($data["wfp_b"]) > 1){
                    if( $i < count($data["wfp_b"])){
                        if($i == 1){
                            // dd($instance_wfp_info->getOutputFunctionById($row["out_function"]));
                            $curr = $instance_wfp_info->getOutputFunctionById($row["out_function"]);
                            $rowspan = 1;
                        }else{
                            // dd("2");
                            $curr = $instance_wfp_info->getOutputFunctionById($row["out_function"]);
                            if($curr == $instance_wfp_info->getOutputFunctionById($data["wfp_b"][$i+1]["out_function"])){
                                $rowspan++;
                                $skip_td = 1;
                            }else{
                                $rowspan = 1;
                                $skip_td = 0;
                            }
                        }
                    }
                }else{
                    $curr = $instance_wfp_info->getOutputFunctionById($row["out_function"]);
                    $rowspan = 1;
                    $skip_td = 1;
                }

                // dd([$curr == $instance_wfp_info->getOutputFunctionById($data["wfp_b"][$i+1]["out_function"])]);
                $i++;
            ?>

                <tr class="t-row">
                    @if($skip_td == 1)
                        <td class="t-d txt-center" rowspan="{{ $rowspan }}">{{ $instance_wfp_info->getOutputFunctionById($row["out_function"]) }}</td>
                    @endif
                    <td class="t-d" >{{ $row["out_activity"] }}</td>
                    <td class="t-d txt-center">{{ $a->activityTimeFrameConvertToMonths($row["activity_timeframe"]) }}</td>
                    <td class="t-d txt-center">{{ $row["target_q1"] ? $row["target_q1"] : '' }}</td>
                    <td class="t-d txt-center">{{ $row["target_q2"] ? $row["target_q2"] : ''}}</td>
                    <td class="t-d txt-center">{{ $row["target_q3"] ? $row["target_q3"] : '' }}</td>
                    <td class="t-d txt-center">{{ $row["target_q4"] ? $row["target_q4"] : ''}}</td>
                    <td class="t-d"><span style="font-family: DejaVu Sans !important">&#8369;</span> {{ number_format($row["activity_cost"],2) }}</td>
                    <td class="t-d txt-center">{{ $row["sof_classification"] }}</td>
                    <td class="t-d txt-center">{{ $row["responsible_person"] }}</td>
                </tr>
        @empty
                <tr>
                    <td class="t-h-d" colspan="10">NO DATA FOUND.</td>
                </tr>
        @endforelse
        <tr class="t-row">
            <td class="t-d" colspan="7" style="text-align:right;">Sub Total</td>
            <td class="t-d" style="font-family: DejaVu Sans !important" colspan="3">&#8369; {{ number_format($sub_total_b,2) }}</td>
        </tr>


        <tr>
            <td class="t-h-d" colspan="10">C. SUPPORT FUNCTION</td>
        </tr>
            <?php
                $curr = 0;
                $i =0;
                $rowspan =1;
                $skip_td = 0;
                $sub_total_c = 0;
            ?>
            @forelse ($data["wfp_c"] as $row)
                <?php
                    $sub_total_c += $row["activity_cost"];
                    $skip_td = 0;
                    // dd(count($data["wfp_a"]) );
                    if(count($data["wfp_c"]) > 1){
                        if( $i < count($data["wfp_c"])){
                            if($i == 1){
                                // dd($instance_wfp_info->getOutputFunctionById($row["out_function"]));
                                $curr = $instance_wfp_info->getOutputFunctionById($row["out_function"]);
                                $rowspan = 1;
                            }else{
                                // dd("2");
                                $curr = $instance_wfp_info->getOutputFunctionById($row["out_function"]);
                                if($curr == $instance_wfp_info->getOutputFunctionById($data["wfp_c"][$i+1]["out_function"])){
                                    $rowspan++;
                                    $skip_td = 1;
                                }else{
                                    $rowspan = 1;
                                    $skip_td = 0;
                                }
                            }
                        }
                    }else{
                        $curr = $instance_wfp_info->getOutputFunctionById($row["out_function"]);
                        $rowspan = 1;
                        $skip_td = 1;
                    }

                    // dd([$curr == $instance_wfp_info->getOutputFunctionById($data["wfp_c"][$i+1]["out_function"])]);
                    $i++;
                ?>

                    <tr class="t-row">
                        @if($skip_td == 1)
                            <td class="t-d txt-center" rowspan="{{ $rowspan }}">{{ $instance_wfp_info->getOutputFunctionById($row["out_function"]) }}</td>
                        @endif
                        <td class="t-d" >{{ $row["out_activity"] }}</td>
                        <td class="t-d txt-center">{{ $a->activityTimeFrameConvertToMonths($row["activity_timeframe"]) }}</td>
                        <td class="t-d txt-center">{{ $row["target_q1"] ? $row["target_q1"] : '' }}</td>
                        <td class="t-d txt-center">{{ $row["target_q2"] ? $row["target_q2"] : ''}}</td>
                        <td class="t-d txt-center">{{ $row["target_q3"] ? $row["target_q3"] : '' }}</td>
                        <td class="t-d txt-center">{{ $row["target_q4"] ? $row["target_q4"] : ''}}</td>
                        <td class="t-d"><span style="font-family: DejaVu Sans !important">&#8369;</span> {{ number_format($row["activity_cost"],2) }}</td>
                        <td class="t-d txt-center">{{ $row["sof_classification"] }}</td>
                        <td class="t-d txt-center">{{ $row["responsible_person"] }}</td>
                    </tr>
            @empty
                    <tr>
                        <td class="t-h-d" colspan="10">NO DATA FOUND.</td>
                    </tr>
            @endforelse
            <tr class="t-row">
                <td class="t-d" colspan="7" style="text-align:right;">Sub Total</td>
                <td class="t-d" style="font-family: DejaVu Sans !important" colspan="3">&#8369; {{ number_format($sub_total_c,2) }}</td>
            </tr>
            <tr class="t-row">
                <td class="t-d" colspan="7" style="text-align:right;">Grand Total</td>
                <td class="t-d" style="font-family: DejaVu Sans !important" colspan="3">&#8369; {{ number_format($sub_total_a + $sub_total_b + $sub_total_c,2) }}</td>
            </tr>
        </table>
    </main>
</body>
</html>
