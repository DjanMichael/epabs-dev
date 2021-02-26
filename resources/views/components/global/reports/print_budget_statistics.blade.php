<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BUDGET DISTRIBUTION REPORT</title>
    <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/favicon.ico') }}"/>
  <style>
           /* margin : top right bottom left */
        @page {
            margin: 90px 30px 120px 30px;
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
<body>
    <div class="header" style="width:100%;">
    </div>
    <div class="footer">
    </div>
    <main>
        @php
        // dd($data);
            $total_expense_class = $data["budget"]["expense_class"]["mooe"]["amount"] +  $data["budget"]["expense_class"]["co"]["amount"];
            $total_function_class = (isset($data["budget"]["function_class"]["core"]["total"]) ? $data["budget"]["function_class"]["core"]["total"] : 0) +
                                    (isset($data["budget"]["function_class"]["strategic"]["total"]) ? $data["budget"]["function_class"]["strategic"]["total"] : 0) +
                                    (isset($data["budget"]["function_class"]["support"]["total"]) ? $data["budget"]["function_class"]["support"]["total"] : 0) ;
            $total_gad = (isset($data["budget"]["GAD"]["YES"]["total"]) ? $data["budget"]["GAD"]["YES"]["total"] : 0) +
                          (isset($data["budget"]["GAD"]["NO"]["total"]) ? $data["budget"]["GAD"]["NO"]["total"] : 0);
        @endphp
            <center> <h3>{{ $data["year"] }} BUDGET DISTRIBUTION REPORT</h3></center>
            <div style="margin-left:250px;" >

                <table style="width:50%">
                    <tr>
                        <td class="t-h-d txt-center">Expense Class</td>
                        <td class="t-h-d txt-center">No. of activity</td>
                        <td class="t-h-d txt-center">Amount</td>
                    </tr>
                    <tr>
                        <td  class="t-h-d">MOOE</td>
                        <td  class="t-h-d" style="text-align:center;">{{ $data["budget"]["expense_class"]["mooe"]["act_no"] }}</td>
                        <td  class="t-h-d" style="text-align:right;">{{ number_format($data["budget"]["expense_class"]["mooe"]["amount"],2) }}</td>
                    </tr>
                    <tr>
                        <td  class="t-h-d">CO</td>
                        <td  class="t-h-d" style="text-align:center;">{{ $data["budget"]["expense_class"]["co"]["act_no"] }}</td>
                        <td  class="t-h-d" style="text-align:right;">{{ number_format($data["budget"]["expense_class"]["co"]["amount"],2) }}</td>
                    </tr>
                    <tr>
                        <td  class="t-h-d" colspan="2">Total</td>
                        <td  class="t-h-d" style="text-align:right;">{{ number_format($total_expense_class,2) }}</td>
                    </tr>
                </table>
                <br><br>

                <table style="width:50%">
                    <tr>
                        <td class="t-h-d txt-center">Function Class</td>
                        <td class="t-h-d txt-center">No. of activity</td>
                        <td class="t-h-d txt-center">Amount</td>
                    </tr>
                    <tr>
                        <td  class="t-h-d">STRATEGIC</td>
                        <td  class="t-h-d" style="text-align:center;">{{ isset($data["budget"]["function_class"]["strategic"]["no_act"]) ? $data["budget"]["function_class"]["strategic"]["no_act"] : 0 }}</td>
                        <td  class="t-h-d" style="text-align:right;">{{ number_format(isset($data["budget"]["function_class"]["strategic"]["total"]) ? $data["budget"]["function_class"]["strategic"]["total"] : 0,2) }}</td>
                    </tr>
                    <tr>
                        <td  class="t-h-d">CORE</td>
                        <td  class="t-h-d" style="text-align:center;">{{ isset($data["budget"]["function_class"]["core"]["no_act"]) ? $data["budget"]["function_class"]["core"]["no_act"] : 0 }}</td>
                        <td  class="t-h-d" style="text-align:right;">{{ number_format(isset($data["budget"]["function_class"]["core"]["total"]) ? $data["budget"]["function_class"]["core"]["total"] : 0,2) }}</td>
                    </tr>
                    <tr>
                        <td  class="t-h-d">SUPPORT</td>
                        <td  class="t-h-d" style="text-align:center;">{{ isset($data["budget"]["function_class"]["support"]["no_act"]) ? $data["budget"]["function_class"]["support"]["no_act"] : 0 }}</td>
                        <td  class="t-h-d" style="text-align:right;">{{ number_format(isset($data["budget"]["function_class"]["support"]["total"]) ? $data["budget"]["function_class"]["support"]["total"] : 0,2) }}</td>
                    </tr>
                    <tr>
                        <td  class="t-h-d" colspan="2">Total</td>
                        <td  class="t-h-d" style="text-align:right;">{{ number_format($total_function_class,2) }}</td>
                    </tr>
                </table>
                <br><br>
                <table style="width:50%">
                    <tr>
                        <td class="t-h-d txt-center">GAD RELATED ACTIVITY</td>
                        <td class="t-h-d txt-center">No. of activity</td>
                        <td class="t-h-d txt-center">Amount</td>
                    </tr>
                    <tr>
                        <td  class="t-h-d">YES</td>
                        <td  class="t-h-d" style="text-align:center;">{{ isset($data["budget"]["GAD"]["YES"]["act_no"]) ? $data["budget"]["GAD"]["YES"]["act_no"] : 0  }}</td>
                        <td  class="t-h-d" style="text-align:right;">{{ number_format(isset($data["budget"]["GAD"]["YES"]["total"]) ? $data["budget"]["GAD"]["YES"]["total"] : 0,2) }}</td>
                    </tr>
                    <tr>
                        <td  class="t-h-d">NO</td>
                        <td  class="t-h-d" style="text-align:center;">{{ isset($data["budget"]["GAD"]["NO"]["act_no"]) ? $data["budget"]["GAD"]["NO"]["act_no"] : 0  }}</td>
                        <td  class="t-h-d" style="text-align:right;">{{ number_format(isset($data["budget"]["GAD"]["NO"]["total"]) ? $data["budget"]["GAD"]["NO"]["total"] : 0,2) }}</td>
                    </tr>
                    <tr>
                        <td  class="t-h-d" colspan="2">Total</td>
                        <td  class="t-h-d" style="text-align:right;">{{ number_format($total_gad,2) }}</td>
                    </tr>
                </table>
            </div>
    </main>
</body>
</html>
