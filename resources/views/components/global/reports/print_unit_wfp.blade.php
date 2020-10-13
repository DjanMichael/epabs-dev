<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WFP</title>
    <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/favicon.ico') }}"/>

    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }
        .t-row{

        }
        .t-d {
            padding:10px;
            font-size: 10px;
        }
        table{
            border-collapse: collapse;
            padding:5px;
            font-family: Arial, Helvetica, sans-serif;

        }
        .t-h-d{
                padding:15px;
                color:white;
                font-size: 10px;
                position: relative;
        }
        .c{
            width:100%;
            background-color:red;
        }
    </style>
</head>
<body >
    <div class="c">


        <htmlpageheader name="page-header" >
            <div style="background-color:yellow;">
                    <img
                    src="{{ asset('dist/assets/media/logos/logo-letter-3.png') }}"
                    height="80px"
                    width="80px"
                    >
                    <span style="margin-top:-100px;">DEPARTMENT OF HEALTH</span>
                    <span style="">CHD CARAGA</span>

            </div>

        </htmlpageheader>
        {{-- {{ dd($data["wfp"]) }} --}}
        <table style="width:100%">
            <tr style="background-color:#181b2b;">
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
            </tr>
            <?php
                $instance_wfp_info = new App\Views\WfpActivityInfo;

            ?>
        @forelse ($data["wfp"] as $row)
                <tr class="t-row">
                    <td class="t-d">{{ $row["wfp_activity_id"] }}</td>
                    <td class="t-d">{{ $row["function_class"] }}</td>
                    <td class="t-d">{{ $instance_wfp_info->getOutputFunctionById($row["out_function"]) }}</td>
                    <td class="t-d">{{ $row["out_activity"] }}</td>
                    <td class="t-d">{{ $row["target_q1"] ? $row["target_q1"] : '' }}</td>
                    <td class="t-d">{{ $row["target_q2"] ? $row["target_q2"] : ''}}</td>
                    <td class="t-d">{{ $row["target_q3"] ? $row["target_q3"] : '' }}</td>
                    <td class="t-d">{{ $row["target_q4"] ? $row["target_q4"] : ''}}</td>
                    <td class="t-d">₱ {{ number_format($row["activity_cost"],2) }}</td>
                    <td class="t-d">{{ $row["sof_classification"] }}</td>
                    <td class="t-d">{{ $row["responsible_person"] }}</td>
                    <td class="t-d">{{ $row["name"] }}</td>
                </tr>
        @empty

        @endforelse
        </table>

        <htmlpagefooter name="page-footer">
         Page {PAGENO} of {nbpg}
        </htmlpagefooter>
    </div>
</body>
</html>
