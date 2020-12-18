<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>APP</title>
    <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/favicon.ico') }}"/>
  <style>
           /* margin : top right bottom left */
        @page {
            margin: 30px 20px 30px 20px;
        }
        *{
            font-family: Arial, Helvetica, sans-serif;
            font-size:7px;

        }
        table{
            border-collapse: collapse;
            padding:5px;
        }

        .t-d {
            padding:10px;
            font-size: 10px;
            border:1px solid black;
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
                color:black;
                font-size: 7px;
                font-weight: bold;
                position: relative;
                /* width:10px; */
                border:1px solid black;
                background-color: limegreen;
                text-align:center;

        }

        .t-h-d2{
                padding-left:5px;
                padding-right:5px;
                padding-top:2px;
                padding-bottom:2px;
                color:black;
                font-size: 7px;
                font-weight: bold;
                position: relative;
                /* width:10px; */
                border:1px solid black;
                background-color: skyblue;
        }

        .t-h-d3{
                padding-left:5px;
                padding-right:5px;
                padding-top:2px;
                padding-bottom:2px;
                color:black;
                font-size: 10px;
                font-weight: bold;
                position: relative;
                /* width:10px; */
                border:1px solid black;
                background-color: 4cffa5;
        }


        tr td {
            border:1px solid block;
        }
        .txt-center{
            text-align:center;
        }
        .header {
            position: fixed;
                top: 0px;
                left: 0px;
                right: 0px;
                height: 120px;

                /** Extra personal styles **/
                /* background-color: #03a9f4; */
                color:black;
                text-align: center;
                line-height: 35px;
                font-size:20px;
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


    <div class="header" style="width:100%;text-align:center;line-height:10px;">
    <h1>{{ $data["static"]["type_title"] }} <br> YEAR {{ $data["static"]["year"] }}</h1>
    </div>
    <div class="footer">
        <script type="text/php">
            if (isset($pdf)) {
                $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                $size = 5;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width) / 2;
                $y = $pdf->get_height() - 20;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
    </div>
    <main>
        {{-- YEARLY REPORT --}}
        @if($data["static"]["type"] == "yearly")
            <table style="width:100%;border:1px solid black;">
                <tr>
                    <td class="t-h-d" rowspan="2" colspan="3" style="text-align:center">Item & Specifications</td>
                    <td class="t-h-d" rowspan="2">Unit ofMeasure</td>
                    <td class="t-h-d" colspan="20">Monthly Quantity Requirement</td>
                    <td class="t-h-d" rowspan="2">Total Quantity
                        for the year</td>
                    <td class="t-h-d" rowspan="2">Price
                        Catalogue</td>
                    <td class="t-h-d" rowspan="2">Total Amount
                        for the year</td>
                </tr>
                <tr>
                    <td class="t-h-d">Jan</td>
                    <td class="t-h-d">Feb</td>
                    <td class="t-h-d">Mar</td>
                    <td class="t-h-d">Q1</td>
                    <td class="t-h-d">Q1 AMOUNT</td>
                    <td class="t-h-d">Apr</td>
                    <td class="t-h-d">May</td>
                    <td class="t-h-d">June</td>
                    <td class="t-h-d">Q2</td>
                    <td class="t-h-d">Q2 AMOUNT</td>
                    <td class="t-h-d">July</td>
                    <td class="t-h-d">Aug</td>
                    <td class="t-h-d">Sept</td>
                    <td class="t-h-d">Q3</td>
                    <td class="t-h-d">Q3 AMOUNT</td>
                    <td class="t-h-d">Oct</td>
                    <td class="t-h-d">Nov</td>
                    <td class="t-h-d">Dec</td>
                    <td class="t-h-d">Q4</td>
                    <td class="t-h-d">Q4 AMOUNT</td>
                </tr>
                <tr>
                    <td class="t-h-d3" colspan="27">PART I. AVAILABLE AT PROCUREMENT SERVICE STORES</td>
                </tr>
                <?php
                    // $i =1;
                    $f_a = 0;
                ?>
                @foreach($data["app_category"] as $row)
                <?php
                    $inventory = \App\Views\ReportAppDetails::where('classification',$row["classification"])
                                                            ->where('year_id',$data["static"]["year_id"])
                                                            ->groupBy('id','item_type')
                                                            ->get()->toArray();

                    $i=1;
                ?>
                <tr>
                    <td class="t-h-d2" colspan="27">{{  $row["classification"] }}</td>
                </tr>
                    @forelse($inventory as $row2)
                        <tr>
                            <td style="width:10px;text-align:center">{{ $i }}</td>
                            <td colspan="2" style="width:230px">{{ $row2["description"] }}</td>
                            {{-- <td colspan="2" style="width:230px">{{ print_r($row2) }}</td> --}}
                            <td style="text-align:center;">{{ $row2["unit_name"] }}</td>
                            <td style="text-align:center;">{{ $row2["jan"] }}</td>
                            <td style="text-align:center;">{{ $row2["feb"] }}</td>
                            <td style="text-align:center;">{{ $row2["mar"] }}</td>
                            <td style="text-align:center;">{{ $row2["q1"] }}</td>
                            <td style="font-family: DejaVu Sans !important;">&#8369; {{ number_format($row2["price"],2) }}</td>
                            <td style="text-align:center;">{{ $row2["apr"] }}</td>
                            <td style="text-align:center;">{{ $row2["may"] }}</td>
                            <td style="text-align:center;">{{ $row2["june"] }}</td>
                            <td style="text-align:center;">{{ $row2["q2"] }}</td>
                            <td style="font-family: DejaVu Sans !important;text-align:right">&#8369; {{ number_format($row2["price"],2) }}</td>
                            <td style="text-align:center;">{{ $row2["july"] }}</td>
                            <td style="text-align:center;">{{ $row2["aug"] }}</td>
                            <td style="text-align:center;">{{ $row2["sept"] }}</td>
                            <td style="text-align:center;">{{ $row2["q3"] }}</td>
                            <td style="font-family: DejaVu Sans !important;text-align:right">&#8369; {{ number_format($row2["price"],2) }}</td>
                            <td style="text-align:center;">{{ $row2["oct"] }}</td>
                            <td style="text-align:center;">{{ $row2["nov"] }}</td>
                            <td style="text-align:center;">{{ $row2["dec"] }}</td>
                            <td style="text-align:center;">{{ $row2["q4"] }}</td>
                            <td style="font-family: DejaVu Sans !important;text-align:right">&#8369; {{ number_format($row2["price"],2) }}</td>
                            <td style="text-align:center;">{{ $row2["qty_total"] }}</td>
                            <td style="font-family: DejaVu Sans !important;text-align:right">&#8369; {{ number_format($row2["price"],2) }}</td>
                            <td style="font-family: DejaVu Sans !important;text-align:right;width:80px;">&#8369;{{ number_format($row2["qty_total"] * $row2["price"],2) }}</td>
                        </tr>
                        <?php $i++;
                        $f_a += $row2["qty_total"] * $row2["price"];

                        ?>
                    @empty
                        <tr>
                            <td style="width:10px;text-align:center">{{$i++}}</td>
                            <td colspan="2" style="width:230px"></td>
                            <td></td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="font-family: DejaVu Sans !important;text-align:right">&#8369; 0.00</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="font-family: DejaVu Sans !important;text-align:right">&#8369; 0.00</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="font-family: DejaVu Sans !important;text-align:right">&#8369; 0.00</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">0</td>
                            <td style="font-family: DejaVu Sans !important;text-align:right">&#8369; 0.00</td>
                            <td style="font-family: DejaVu Sans !important;text-align:right">&#8369; 0.00</td>
                        </tr>
                    @endforelse

                @endforeach
            </table>
        @endif


        <table style="width:100%;border:1px solid black">
            <tr>
                <td class="t-h-d2" colspan="4" style="width:250px;"> A. TOTAL</td>
                <td class="t-h-d2" colspan="7"></td>
            <td class="t-h-d2" colspan="2" style="font-family: DejaVu Sans !important;text-align:right;">&#8369; {{ number_format($f_a,2) }}</td>
            </tr>
            <tr>
                <td class="t-h-d2" colspan="4" style="width:250px;"> B. ADDITIONAL PROVISION FOR INFLATION (10% of TOTAL)</td>
                <td class="t-h-d2" colspan="7"></td>
                <td class="t-h-d2" colspan="2" style="font-family: DejaVu Sans !important;text-align:right;">&#8369; {{ number_format((10 / 100) * $f_a ,2) }}</td>
            </tr>
            <tr>
                <td class="t-h-d2" colspan="4" style="width:250px;">C. ADDITIONAL PROVISION FOR TRANSPORT AND FREIGHT COST (If Applicable)</td>
                <td class="t-h-d2" colspan="7"></td>
            <td class="t-h-d2" colspan="2"></td>
            </tr>
            <tr>
                <td class="t-h-d2" colspan="4" style="width:250px;">D. GRAND TOTAL (A + B + C)</td>
                <td class="t-h-d2" colspan="7"></td>
            <td class="t-h-d2" colspan="2" style="font-family: DejaVu Sans !important;text-align:right;">&#8369; {{ number_format($f_a + (10 / 100) * $f_a,2) }}</td>
            </tr>
            <tr>
                <td class="t-h-d2" colspan="4" style="width:250px;">E. APPROVED BUDGET BY THE AGENCY HEAD In Figures and Words:</td>
                <td class="t-h-d2" colspan="7"></td>
                <td class="t-h-d2" colspan="2"></td>
            </tr>
            <tr>
                <td class="t-h-d2" colspan="4" style="width:250px;">F. MONTHLY CASH REQUIREMENTS</td>
                <td class="t-h-d2" colspan="7"></td>
                <td class="t-h-d2" colspan="2"></td>
            </tr>
            <tr>
                <td colspan="4">G.1 Available at Procurement Service Store</td>
                <td rowspan="3"></td>
                <td></td>
                <td rowspan="3"></td>
                <td></td>
                <td rowspan="3"></td>
                <td></td>
                <td rowspan="3"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="4">G.2 Other Items not available at PS but regularly purchased from other sources</td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="4">TOTAL MONTHLY CASH REQUIREMENTS</td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2"></td>
            </tr>
        </table>
        <p style="font-size:13px;margin-left:50px;margin-right:50px;">*Agency must put the monthly requirement for air tickets both local and international.</p>
        <br>
        <br>
        <br>
        <br>
        <p style="font-size:13px;margin-left:50px;margin-right:50px;">We hereby warrant that the total amount reflected in this Annual Supplies/ Equipment Procurement Plan to procure the listed common-use, supplies materials and equipment has been included in or within our approved budget for the year.</p>
        <br>
        <br>
        <br>

        <table style="width:1000px;border:0px; font-size:15px;margin-left:50px;margin-right:50px;">
            <tr>
                <td style="border:0px; font-size:13px;">Prepared by:</td>
                <td style="border:0px; font-size:13px;">Certified Funds Available / Certified Appropriate Funds Available: </td>
                <td style="border:0px; font-size:13px;">Approved by:</td>
            </tr>
            <tr>
                <td style="border:0px;font-size:13px;">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                   <span style="text-decoration: underline;font-size:13px;font-weight: bold;"> Eleanor D. Lakag, MSBA</span><br>
                   Property/Supplier Officer
                </td>
                <td style="border:0px;font-size:13px;">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                   <span style="text-decoration: underline;font-size:13px;font-weight: bold;"> Jean Aganap-Pingal</span><br>
                   Accountant/Local Budget Officer
                </td>
                <td style="border:0px;font-size:13px;">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                   <span style="text-decoration: underline;font-size:13px;font-weight: bold;">Jose R. Llacuna Jr., MD., MPH, CESO III</span><br>
                   Head of Office/Agency
                </td>
            </tr>
            <tr>
                <td style="border:0px;font-size:13px;"> <br><br>Date Prepared: </td>
            </tr>
        </table>
    </main>
</body>
</html>
