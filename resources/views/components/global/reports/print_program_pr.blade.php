<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PPMP</title>
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
            padding:0px;
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
                height:12.53px;
        }
        .c{
            width:100%;
        }
        .txt-center{
            text-align:center;
        }
        .header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 80px;
            /** Extra personal styles **/
            /* background-color: #03a9f4; */
            color:black;
            text-align: center;
            line-height: 35px;
            font-size:10px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            /* bottom: -247.5px; */
            left: 0px;
            right: 0px;
            height: 280px;
            font-size:10px;
            /** Extra personal styles **/
            /* background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px; */
        }
        main{
            position: relative;
            top:82.4px;
            padding:0px;
            width:100%;
        }
        .col-1{
            display:inline-block;
            width:33%;
            font-size:12px;
            font-weight:bold;
            background-color:red;
        }
        div.page_break + div.page_break{
            page-break-before: always;
        }
    </style>
</head>
<body>

@if($data["pr_template"] == "SUPPLIES_TEMPLATE")

    <div class="header" style="line-height:15px;margin:0px;padding:0px;" >
    <table style="border :1px solid black;width:100%;margin:0px;padding-left:0px;">
            <tr>
                <td style="height:10px;text-align:center;" colspan="5">
                        <span style="font-weight:bold;margin-top:2px">PURCHASE REQUEST  #{{ $data["pr"]->pr_code }}</span><br>
                        <span>DOH-REGIONAL OFFICE XIII</span><br>
                        <span><i>AGENCY</i></span>
                </td>
            </tr>
            <tr style="">
                <td style="border-top:1px solid black;padding-left:5px;">Dvision:</td>
                <td style="border-top:1px solid black;padding-left:5px;font-weight:bold;">{{ $data["pr"]->division }}</td>
                <td style="border-top:1px solid black;padding-left:5px;"></td>
                <td style="border-top:1px solid black;padding-left:5px;">PR. No.</td>
                <td style="border-top:1px solid black;padding-left:5px;">Date : {{ (Carbon\Carbon::parse($data["pr"]->created_at))->format('F d,Y') }}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Office:</td>
                <td style="padding-left:5px;font-weight:bold;">{{$data["pr"]->agency  ? 'DEPARTMENT OF HEALTH REGIONAL OFFICE CARAGA' : 'PDOHO'}}</td>
                <td style="padding-left:5px;"></td>
                <td style="padding-left:5px;">SAI. No.</td>
                <td style="padding-left:5px;">Date</td>
            </tr>
    </table>
    </div>
    <div class="footer" style="margin-top:0px;padding-top:0px;">

    </div>
        <?php
            //limit row
            $row_limit = 40;
            $total =0;
            $row_count = 0;
            //skip adding rows
            $skip=0;
        ?>
    <main>
    <div class="page_break"></div>
    <table style="border :1px solid black;width:100%;margin:0px;padding:0px;">
        <tr>
            <td class="t-h-d txt-center" style="width: 50px;border:1px solid black;">Stock No.</td>
            <td class="t-h-d txt-center" style="width: 50px;border:1px solid black;">Unit</td>
            <td class="t-h-d txt-center" style="width: 350px;border:1px solid black;">Item Description</td>
            <td class="t-h-d txt-center" style="width: 50px;border:1px solid black;">Qty</td>
            <td class="t-h-d txt-center" style="width: 50px;border:1px solid black;">Unit Cost</td>
            <td class="t-h-d txt-center" style="width: 60px;border:1px solid black;margin-right:0px;">Total Cost</td>
        </tr>
    @foreach($data["pr_details"] as $key => $value)
        <?php

            $total=0;
            $row_limit -= 1;
            // $row = $data["pr_details"][$i-1];
            // dd(collect($value)->groupBy('item_id','item_type'));
            $value = collect($value)->groupBy('item_id','item_type');
        ?>

        <tr>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d" >{{ $key }}</td>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d txt-center"></td>
        </tr>


        @foreach($value as $key2 => $val)


            <?php
                // dd(collect($row)->sum('item_qty'));
                $row = $val;
                $row_limit -= 1;
                $row_count++;
                $total +=collect($row)->sum('item_qty') * collect($row)->sum('item_price');

                // dd((collect($row)->first())["item_description"]);
            ?>
            <tr>
                <td class="t-h-d txt-center" style="font-weight:normal;"></td>
                <td class="t-h-d txt-center" style="font-weight:normal;">{{ (collect($row)->first())["item_unit"] }}</td>
                <td class="t-h-d" style="font-weight:normal;">{{ (collect($row)->first())["item_description"]}}</td>
                <td class="t-h-d txt-center" style="font-weight:normal;">{{ number_format(collect($row)->sum('item_qty')) }}</td>
                <td class="t-h-d " style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format(collect($row)->sum('item_price'),2) }}</td>
                <td class="t-h-d " style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format(collect($row)->sum('item_qty') * collect($row)->sum('item_price'),2) }}</td>
            </tr>

    @endforeach
    @endforeach


    @if($skip == 0)
    <tr>
    <td class="t-h-d" colspan="5">Total</td>
    <td class="t-h-d" style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format($total ,2) }}</td>
    </tr>
    @for($i=0;$i<=$row_limit;$i++){
        @if(($i + $row_count + count($data["pr_details"])) == 40){
            {{-- <tr>
                <td class="t-h-d" colspan="5">Total</td>
                <td class="t-h-d" style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format($total ,2) }}</td>
            </tr> --}}
        @else
            <tr>
            <td class="t-h-d txt-center"></td>
                    <td class="t-h-d txt-center"></td>
                    <td class="t-h-d"></td>
                    <td class="t-h-d txt-center"></td>
                    <td class="t-h-d txt-center"></td>
                    <td class="t-h-d txt-center"></td>
                </tr>
        @endif
    @endfor
    @else
    <tr>
        <td class="t-h-d" colspan="5">Total</td>
        <td class="t-h-d" style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format($total ,2) }}</td>
    </tr>
    @endif

    <table style="border :1px solid black;width:100%;padding-top:-5px;margin-top:-2.3px;padding:0px;">
        <tr class="t-row">
            <td class="t-d" style="width:72.8px;"></td>
            <td class="t-d" style="width:100px padding:10px;">
                Purpose: {{ $data["pr"]->pr_purpose }}
                <br><br>
                Prepared by:
                <br><br><br><br>
                <span style="font-weight:bold;">
                {{ $data["pr"]->prepared_user_name }}
                </span><br>
                <?php
                    $user = \App\UserProfile::where('user_id',$data["pr"]->prepared_user_id)->first();
                ?>
                {{ $user->designation }}
            </td>
        </tr>
        <tr class="t-row">
            <td  class="t-d" style="width:72.8px;">
                <br>
                <br>
                <br>
                Signature:<br>
                Printed Name:<br>
                Designation:<br>
                Date:<br>
            </td>
            <td  class="t-d" style="height:80px;width:100px;" >
                <div style="position:absolute;top:0px;">
                    Requested by:<br><br><br><br>
                    <?php
                        $division = $data["pr"]->division;
                        $unit = $data["pr"]->office;
                    ?>
                    @if($division =="RD/ARD")
                        @if($unit == "ARD" || $unit == "PLANNING")
                            SADAILA K. RAKI-IN, MD, MCHM, MDM, CESE
                            <br>
                            DIRECTOR III
                        @endif
                        @if($unit == "RD")
                            CESAR C. CASSION, MD, MPH, CESO IV
                            <br>
                            DIRECTOR IV
                        @endif
                    @endif

                    @if($division =="RLED" || $division =="MSD" || $division =="HRDU" || $division =="PDOHO")
                        AILEEN A. SACOL, CPA, MMPSM
                        <br>
                        OIC - CHIEF ADMINISTRATIVE OFFICER
                    @endif

                    @if($division == "LHS")
                        ERNESTO E. PAREJA, MPD, MPH
                        <br>
                        MEDICAL OFFICER V
                    @endif
                    <br>
                    Date: _____________
                </div>
                <div style="position:absolute;top:0px;margin-left:300px;">
                    Approved By:
                    <br><br><br><br>
                    CESAR C. CASSION, MD, MPH, CESO IV
                    <br>
                    DIRECTOR IV
                    <br>
                    Date: _____________
                </div>
            </td>
        </tr>
    </table>
    </main>

@endif


@if($data["pr_template"] == "DRUM_TEMPLATE")

<div class="header" style="line-height:15px;margin:0px;padding:0px;" >
    <table style="border :1px solid black;width:100%;margin:0px;padding-left:0px;">
            <tr>
                <td style="height:10px;text-align:center;" colspan="5">
                        <span style="font-weight:bold;margin-top:2px">PURCHASE REQUEST  #{{ $data["pr"]->pr_code }}</span><br>
                        <span>DOH-REGIONAL OFFICE XIII</span><br>
                        <span><i>AGENCY</i></span>
                </td>
            </tr>
            <tr style="">
                <td style="border-top:1px solid black;padding-left:5px;">Dvision:</td>
                <td style="border-top:1px solid black;padding-left:5px;font-weight:bold;">{{ $data["pr"]->division }}</td>
                <td style="border-top:1px solid black;padding-left:5px;"></td>
                <td style="border-top:1px solid black;padding-left:5px;">PR. No.</td>
                <td style="border-top:1px solid black;padding-left:5px;">Date : {{ (Carbon\Carbon::parse($data["pr"]->created_at))->format('F d,Y') }}</td>
            </tr>
            <tr>
                <td style="padding-left:5px;">Office:</td>
                <td style="padding-left:5px;font-weight:bold;">{{$data["pr"]->agency  ? 'DEPARTMENT OF HEALTH REGIONAL OFFICE CARAGA' : 'PDOHO'}}</td>
                <td style="padding-left:5px;"></td>
                <td style="padding-left:5px;">SAI. No.</td>
                <td style="padding-left:5px;">Date</td>
            </tr>
    </table>
    </div>
    <div class="footer" style="margin-top:0px;padding-top:0px;">

    </div>
        <?php
            //limit row
            $row_limit = 40;
            $total =0;
            $row_count = 0;
            //skip adding rows
            $skip=0;
        ?>
    <main>
    <div class="page_break"></div>
    <table style="border :1px solid black;width:100%;margin:0px;padding:0px;">
        <tr>
            <td class="t-h-d txt-center" style="width: 50px;border:1px solid black;">Stock No.</td>
            <td class="t-h-d txt-center" style="width: 50px;border:1px solid black;">Unit</td>
            <td class="t-h-d txt-center" style="width: 350px;border:1px solid black;">Item Description</td>
            <td class="t-h-d txt-center" style="width: 50px;border:1px solid black;">Qty</td>
            <td class="t-h-d txt-center" style="width: 50px;border:1px solid black;">Unit Cost</td>
            <td class="t-h-d txt-center" style="width: 60px;border:1px solid black;margin-right:0px;">Total Cost</td>
        </tr>


    @php
        $total=0;
        $row_limit -= 1;
    @endphp
    @foreach($data["pr_drum"] as $key => $value)
        @php
            $value = collect($value)->groupBy('item_id','item_type');
        @endphp
        <tr>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d" >{{ $key }}</td>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d txt-center"></td>
        </tr>
        @foreach($value as $key2 => $val)

        <?php
            $row = $val;
            $row_limit -= 1;
            $row_count++;
            $total += collect($row)->sum('item_qty') * collect($row)->sum('item_price');

        ?>
        <tr>
            <td class="t-h-d txt-center" style="font-weight:normal;"></td>
            <td class="t-h-d txt-center" style="font-weight:normal;">{{ (collect($row)->first())["item_unit"] }}</td>
            <td class="t-h-d" style="font-weight:normal;">{{ (collect($row)->first())["item_description"]}}</td>
            <td class="t-h-d txt-center" style="font-weight:normal;">{{ number_format(collect($row)->sum('item_qty')) }}</td>
            <td class="t-h-d " style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format(collect($row)->sum('item_price'),2) }}</td>
            <td class="t-h-d " style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format(collect($row)->sum('item_qty') * collect($row)->sum('item_price'),2) }}</td>
        </tr>

        @endforeach

    @endforeach





    @foreach($data["pr_details"] as $key => $value)
        <?php

            // $row = $data["pr_details"][$i-1];
            // dd(collect($value)->groupBy('item_id','item_type'));
            $value = collect($value)->groupBy('item_id','item_type');
        ?>

        <tr>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d" >{{ $key }}</td>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d txt-center"></td>
            <td class="t-h-d txt-center"></td>
        </tr>


        @foreach($value as $key2 => $val)


            <?php
                // dd(collect($row)->sum('item_qty'));
                $row = $val;
                $row_limit -= 1;
                $row_count++;
                $total +=collect($row)->sum('item_qty') * collect($row)->sum('item_price');

                // dd((collect($row)->first())["item_description"]);
            ?>
            <tr>
                <td class="t-h-d txt-center" style="font-weight:normal;"></td>
                <td class="t-h-d txt-center" style="font-weight:normal;">{{ (collect($row)->first())["item_unit"] }}</td>
                <td class="t-h-d" style="font-weight:normal;">{{ (collect($row)->first())["item_description"]}}</td>
                <td class="t-h-d txt-center" style="font-weight:normal;">{{ number_format(collect($row)->sum('item_qty')) }}</td>
                <td class="t-h-d " style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format(collect($row)->sum('item_price'),2) }}</td>
                <td class="t-h-d " style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format(collect($row)->sum('item_qty') * collect($row)->sum('item_price'),2) }}</td>
            </tr>

        @endforeach
    @endforeach


    @if($skip == 0)
    <tr>
    <td class="t-h-d" colspan="5">Total</td>
    <td class="t-h-d" style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format($total ,2) }}</td>
    </tr>
    @for($i=0;$i<=$row_limit;$i++){
        @if(($i + $row_count + count($data["pr_details"])) == 40){
            {{-- <tr>
                <td class="t-h-d" colspan="5">Total</td>
                <td class="t-h-d" style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format($total ,2) }}</td>
            </tr> --}}
        @else
            <tr>
            <td class="t-h-d txt-center"></td>
                    <td class="t-h-d txt-center"></td>
                    <td class="t-h-d"></td>
                    <td class="t-h-d txt-center"></td>
                    <td class="t-h-d txt-center"></td>
                    <td class="t-h-d txt-center"></td>
                </tr>
        @endif
    @endfor
    @else
    <tr>
        <td class="t-h-d" colspan="5">Total</td>
        <td class="t-h-d" style="font-weight:normal;font-size:8.2px;text-align:right;font-family: DejaVu Sans !important">&#8369; {{ number_format($total ,2) }}</td>
    </tr>
    @endif
    </table>

    <table style="border :1px solid black;width:100%;padding-top:-5px;margin-top:-2.3px;padding:0px;border-spacing: 0;border-collapse: collapse;"
    cellspacing="0" cellpadding="0">
        <tr class="t-row">
            <td class="t-d txt-center" rowspan="2">
                AO 2019-0041 Implementin Guidelines in Assuring the Efficacy, Quality and Safety of Pharmaceutical Products in the Public Health Facilities<br><br><br>
            </td>
            <td class="t-d" colspan="11" style="padding:2px;">
                Documents to be ssubmitted during delivery: (1) Certificate of Product Registration (CPR) / Certificate of Notification-valid and current  issued by Phil. FDA; (2) Valid License to Operate (LTO) issued by the FDA for Suppliers, Distributors & Traders Phil. FDA;
                <br>
                <b>ALL PRODUCTS to be delivered shall be of fresh commercial stocks as reflected in the CPR</b>
                <br>
            </td>
        </tr>
        <tr>
            <td colspan="11" >
               <table style="width: 100%;"  cellspacing="0"  cellpadding="0" >
                <tr>
                    <td class="t-d txt-center" rowspan="4">Table 1. Acceptable Remaining Shelf Life</td>
                    <td class="t-d txt-center">Claimed Shelf Life (based on CPR)</td>
                    <td class="t-d txt-center">Minimum Remaining Shelf Life</td>
                    <td class="t-d txt-center">Claim Shelf Life (based on CPR)</td>
                    <td class="t-d txt-center">Minimum Remaining Shelf Life</td>
                </tr>
                <tr>
                    <td class="t-d  txt-center">60 months</td>
                    <td class="t-d  txt-center">42-60 months</td>
                    <td class="t-d  txt-center">24 months</td>
                    <td class="t-d  txt-center">18-24 months</td>
                </tr>
                <tr>
                    <td class="t-d  txt-center">48 months</td>
                    <td class="t-d  txt-center">34-48 months</td>
                    <td class="t-d  txt-center">18 months</td>
                    <td class="t-d  txt-center">12-18 months</td>
                </tr>
                <tr>
                    <td class="t-d  txt-center">36 months</td>
                    <td class="t-d  txt-center">30-36 months</td>
                    <td class="t-d  txt-center">12 months</td>
                    <td class="t-d  txt-center">12 months</td>
                </tr>
            </table>

            </td>
        </tr>
        <tr class="t-row">

            <td class="t-d" style="width:100px padding:10px;" colspan="1">
                Purpose:
                <br><br>
                {{-- Prepared by:
                <br><br><br><br>
                <span style="font-weight:bold;">
                {{ $data["pr"]->prepared_user_name }}
                </span><br>
                <?php
                   // $user = \App\UserProfile::where('user_id',$data["pr"]->prepared_user_id)->first();
                ?>
                {{ $user->designation }} --}}
            </td>
            <td class="t-d" style="width:72.8px;" colspan="11"> {{ $data["pr"]->pr_purpose }}</td>
        </tr>
        <tr class="t-row">
            <td  class="t-d" style="width:72.8px;" >
                <br>
                <br>
                <br>
                Signature:<br>
                Printed Name:<br>
                Designation:<br>
                Date:<br>
            </td>
            <td  class="t-d" style="height:80px;width:100px;" colspan="11">
                <div style="position:absolute;top:0px;">
                    Requested by:<br><br><br><br>
                    <?php
                        $division = $data["pr"]->division;
                        $unit = $data["pr"]->office;
                    ?>
                    @if($division =="RD/ARD")
                        @if($unit == "ARD" || $unit == "PLANNING")
                            SADAILA K. RAKI-IN, MD, MCHM, MDM, CESE
                            <br>
                            DIRECTOR III
                        @endif
                        @if($unit == "RD")
                            CESAR C. CASSION, MD, MPH, CESO IV
                            <br>
                            DIRECTOR IV
                        @endif
                    @endif

                    @if($division =="RLED" || $division =="MSD" || $division =="HRDU" || $division =="PDOHO")
                        AILEEN A. SACOL, CPA, MMPSM
                        <br>
                        OIC - CHIEF ADMINISTRATIVE OFFICER
                    @endif

                    @if($division == "LHS")
                        ERNESTO E. PAREJA, MPD, MPH
                        <br>
                        MEDICAL OFFICER V
                    @endif
                    <br>
                    Date: _____________
                </div>
                <div style="position:absolute;top:0px;margin-left:300px;" >
                    Approved By:
                    <br><br><br><br>
                    CESAR C. CASSION, MD, MPH, CESO IV
                    <br>
                    DIRECTOR IV
                    <br>
                    Date: _____________
                </div>
            </td>
        </tr>
    </main>
@endif

</body>
</html>
