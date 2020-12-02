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
            margin: 90px 30px 130px 30px;
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
<body>
 <div class="header" style="width:100%;">

    <div stlye="width:100%">
        <div style="position: absolute;top:-10px;left:510px;">
            ANNEX F.
        </div>
    </div>
    <div stlye="width:100%">
        <div style="position: absolute;top:20px;left:420px;">
            PROJECT PROCUREMENT MANAGEMENT PLAN
        </div>
    </div>
    <div style="width:100%;">
        <div style="position: absolute;top:0px;right:0;">PPMP Form 1</div>
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


 <main>
 <table style="border :1px solid black;width:100%">
        <tr>
            <td rowspan ="2" class="t-h-d txt-center" style="min-width: 120px;border:1px solid black;">Code</td>
            <td rowspan ="2" class="t-h-d txt-center" style="min-width: 160px;border:1px solid black;">General Description</td>
            <td colspan="12" class="t-h-d txt-center" style="border:1px solid black;">SCHEDULE / MILESTONE OF ACTIVITY</td>
            <td rowspan ="2" class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">Qty</td>
            <td rowspan ="2" class="t-h-d txt-center" style="min-width: 120px;border:1px solid black;">Unit Price</td>
            <td rowspan ="2" class="t-h-d txt-center" style="min-width: 120px;border:1px solid black;">Total Price</td>
        </tr>
        <tr>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">Jan</td>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">Feb</td>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">Mar</td>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">Apr</td>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">May</td>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">June</td>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">July</td>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">Aug</td>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">Sept</td>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">Oct</td>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">Nov</td>
            <td class="t-h-d txt-center" style="min-width: 50px;border:1px solid black;">Dec</td>
        </tr>
        <?php
            $g_total = 0;
        ?>
        <?php
            $supplies = collect($data["ppmp_items"])->toArray();
        ?>
                <?php
                    //  dd($supplies);
                    $arr = [];
                    $arr_keys = [];
                    foreach ($supplies as $key => $row){
                        //    $arr= $key;
                        array_push($arr_keys,$key);
                        array_push($arr,
                                    [$key => collect($supplies[$key])->groupBy('item_id','item_type') ]
                                    );
                    }


                    $item_row = [];

                    foreach ($arr as $row ){
                        foreach($row as $row1){
                            //classification
                            foreach($row1 as $row2){
                                //item distinct
                                    $a =$row2;
                                    $qty =  collect($a)->sum('jan') +  collect($a)->sum('feb') +  collect($a)->sum('mar') +
                                            collect($a)->sum('apr') +  collect($a)->sum('may') +  collect($a)->sum('june') +
                                            collect($a)->sum('july') +  collect($a)->sum('aug') +  collect($a)->sum('sept') +
                                            collect($a)->sum('oct') +  collect($a)->sum('nov') +  collect($a)->sum('dec');
                                    array_push($item_row ,[
                                        "classification" => collect($row2)->first()->classification,
                                        "uacs_id" => collect($row2)->first()->uacs_id,
                                        "item_id"=> collect($row2)->first()->item_id,
                                        "item_type"=> collect($row2)->first()->item_type,
                                        "g_desc" => collect($row2)->first()->description . ', ' . collect($row2)->first()->unit_name,
                                        "jan" => collect($a)->sum('jan'),
                                        "feb" => collect($a)->sum('feb'),
                                        "mar" => collect($a)->sum('mar'),
                                        "apr" => collect($a)->sum('apr'),
                                        "may" => collect($a)->sum('may'),
                                        "june" => collect($a)->sum('june'),
                                        "july" => collect($a)->sum('july'),
                                        "aug" => collect($a)->sum('aug'),
                                        "sept" => collect($a)->sum('sept'),
                                        "oct" => collect($a)->sum('oct'),
                                        "nov" => collect($a)->sum('nov'),
                                        "dec" => collect($a)->sum('dec'),
                                        "qty" => $qty,
                                        "unit_price" => collect($row2)->first()->price,
                                        "total_price" =>  $qty * collect($row2)->first()->price
                                    ]);
                            }
                        }
                    }
                ?>
            @foreach($arr_keys as $row)
                <tr>
                    <td colspan="17" style="border:1px solid black;padding:3px;font-weight:bold;"  class="t-d">{{ $row }}</td>
                </tr>
                @foreach($item_row as $row1)
                        @if($row == $row1["classification"])
                        <?php $g_total += $row1["total_price"]; ?>
                            <tr>
                                <td style="border:1px solid black;padding:3px;"  class="t-d txt-center">{{ $row1["uacs_id"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d">{{   $row1["g_desc"]  }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["jan"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["feb"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["mar"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["apr"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["may"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["june"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["july"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["aug"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["sept"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["oct"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["nov"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["dec"] }}</td>
                                <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row1["qty"] }}</td>
                                <td class="t-d" style="font-family: DejaVu Sans !important">&#8369;  {{ number_format($row1["unit_price"],2) }}</td>
                                <td class="t-d" style="font-family: DejaVu Sans !important">&#8369; {{ number_format($row1["total_price"],2) }}</td>
                            </tr>
                        @endif
                @endforeach
            @endforeach

        @if(count($data["ppmp_catering"]) <> 0)
            <tr>
                <td colspan="17" style="border:1px solid black;padding:3px;font-weight:bold;"  class="t-h-d">CATERING SERVICES</td>
            </tr>
            <?php $pi_ids= [] ?>
            @foreach($data["ppmp_catering"] as $key => $row)
            <?php

                array_push($pi_ids,$key);
                $t = "tbl_wfp_activity_per_indicator";
                $batch = \App\TablePiCateringBatches::join('ref_location','ref_location.id','tbl_pi_catering_batches.batch_location')
                                                    ->join($t,$t .'.id','tbl_pi_catering_batches.pi_id')
                                                    ->where('pi_id',collect($pi_ids)->flatten()->toArray())
                                                    ->select('pi_id','batch_location','uacs_id','province','city','batch_no','performance_indicator','tbl_pi_catering_batches.id as batch_id')
                                                    ->get()->toArray();
            ?>
                @foreach($batch as $row3)
                    <?php
                    $vw = "vw_procurement_drum_supplies_items";
                    $items = \DB::table('tbl_ppmp_items')
                                    ->join($vw,function($q) use ($vw)
                                    {
                                        $q->on($vw . '.item_type','=','tbl_ppmp_items.item_type');
                                        $q->on($vw . '.id','=','tbl_ppmp_items.item_id');
                                    })
                                    ->where('tbl_ppmp_items.batch_id',$row3["batch_id"])
                                    ->where('tbl_ppmp_items.wfp_act_per_indicator_id',$row3["pi_id"])
                                    ->where($vw . '.classification','=','CATERING SERVICES')
                                    ->get()->toArray();

                    ?>
                    <tr>
                        <td colspan="17" style="border:1px solid black;padding:3px;font-weight:bold;" class="t-h-d">
                            {{'BATCH #' . $row3["batch_no"] . ' ' . $row3["performance_indicator"] . ' @ '. $row3["province"] . ', ' . $row3["city"]}}
                        </td>
                    </tr>
                        <tr>
                            <?php $i1 =1; ?>
                            @foreach( $items as $row4)
                                <?php $i1++; ?>
                            @endforeach
                            @if(count($items) <> 0)
                                <td rowspan="1" class="t-d txt-center">{{ $row3["uacs_id"] }}</td>
                            @else
                                <td rowspan="1" colspan="17" class="t-d"> NO DATA. </td>
                            @endif
                            @foreach( $items as $row4)
                                    <?php
                                    $qty2 = $row4->jan + $row4->feb + $row4->mar + $row4->apr + $row4->may + $row4->june + $row4->july + $row4->aug + $row4->sept + $row4->oct + $row4->nov + $row4->dec;
                                        $g_total += $qty2 * $row4->price;
                                    ?>
                                    <td style="border:1px solid black;padding:3px;" class="t-d">{{ $row4->description . ', ' . $row4->unit_name}}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->jan }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->feb }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->mar }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->apr }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->may }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->june }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->july }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->aug }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->sept }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->oct }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->nov }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $row4->dec }}</td>
                                    <td style="border:1px solid black;padding:3px;" class="t-d txt-center">{{ $qty2 }}</td>
                                    <td class="t-d" style="font-family: DejaVu Sans !important">&#8369;  {{ number_format($row4->price,2)  }}</td>
                                    <td class="t-d" style="font-family: DejaVu Sans !important">&#8369; {{ number_format($qty2 * $row4->price,2) }}</td>
                            @endforeach
                    </tr>
                @endforeach
            @endforeach
        @endif
        <tr>
            <td colspan="16" style="border:1px solid black;padding:3px;font-weight:bold;text-align:right;" class="t-d">Total</td>
            <td colspan="1" class="t-d" style="font-family: DejaVu Sans !important">&#8369;  {{ number_format($g_total,2) }}</td>
        </tr>
</table>
<div style="font-size:12px;padding-left:5px;">Note: Technical Specifiproposecation for each item / Project being proposed shall be submitted as part of the PPMP.</div>
</main>
</body>
</html>
