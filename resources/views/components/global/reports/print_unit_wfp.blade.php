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
            margin: 80px 30px 130px 30px;
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
                height: 50px;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
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
        <div style="position: absolute;top:-10px;left:510px;">
            ANNEX F.
        </div>
    </div>
    <div stlye="width:100%">
        <div style="position: absolute;top:20px;left:450px;">
            WORK AND FINANCIAL PLAN MATRIX
        </div>
    </div>
    <div style="width:100%;">
        <div style="position: absolute;top:0px;right:0;">Wfp Form 1</div>
    </div>

    <div style="width:100%;">
        <div style="position: absolute;top:50px;left:5;">DEPARTMENT OF HEALTH</div>
        <div style="position: absolute;top:60px;left:5;">CENTER FOR HEALTH DEVELOPMENT - CARAGA</div>
        <div style="position: absolute;top:80px;left:5;">PROGRAM: TEST  LOCATION: {{ $data["wfp_unit"]->division .' / '. $data["wfp_unit"]->section }}</div>
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
        FOOTER
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
            @forelse ($data["wfp_a"] as $row)
                    <tr class="t-row">
                        {{-- <td class="t-d txt-center">{{ $row["wfp_activity_id"] }}</td> --}}
                        {{-- <td class="t-d txt-center">{{ $row["function_class"] }}</td> --}}
                        <td class="t-d txt-center" >{{ $instance_wfp_info->getOutputFunctionById($row["out_function"]) }}</td>
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

            @endforelse
            <tr>
                <td class="t-h-d" colspan="10">B. CORE FUNCTION</td>
            </tr>
            @forelse ($data["wfp_b"] as $row)
                    <tr class="t-row">
                        {{-- <td class="t-d txt-center">{{ $row["wfp_activity_id"] }}</td> --}}
                        {{-- <td class="t-d txt-center">{{ $row["function_class"] }}</td> --}}
                        <td class="t-d txt-center">{{ $instance_wfp_info->getOutputFunctionById($row["out_function"]) }}</td>
                        <td class="t-d">{{ $row["out_activity"] }}</td>
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

            @endforelse
            <tr>
                <td class="t-h-d" colspan="10">C. SUPPORT FUNCTION</td>
            </tr>
            @forelse ($data["wfp_c"] as $row)
                    <tr class="t-row">
                        {{-- <td class="t-d txt-center">{{ $row["wfp_activity_id"] }}</td> --}}
                        {{-- <td class="t-d txt-center">{{ $row["function_class"] }}</td> --}}
                        <td class="t-d txt-center">{{ $instance_wfp_info->getOutputFunctionById($row["out_function"]) }}</td>
                        <td class="t-d">{{ $row["out_activity"] }}</td>
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

            @endforelse
            {{-- <tr>
                <th class="t-h-d">Act Code</th>
                <th class="t-h-d">Function</th>
                <th class="t-h-d">Output Function</th>
                <th class="t-h-d">Activities for Outputs</th>
                <th class="t-h-d">Q1</th>
                <th class="t-h-d">Q2</th>
                <th class="t-h-d">Q3</th>
                <th class="t-h-d">Q4</th>
                <th class="t-h-d">Cost (Php)</th>
                <th class="t-h-d">SOF</th>
                <th class="t-h-d">Responsible Person</th>
                <th class="t-h-d">Encoded by</th>
            </tr> --}}


        </table>
    </main>
</body>
</html>
