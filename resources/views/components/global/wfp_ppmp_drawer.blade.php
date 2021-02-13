<?php

$log = \App\ZWfplogs::where('wfp_code',Crypt::decryptString($data['wfp_code']))
                ->where('status','PPMP')
                ->orderBy('id','DESC')
                ->first();
?>

<div class="row">
    <div class="bg-dark text-light col-12 p-15"
    style="padding:10px;position:fixed;top:-10px;margin:0 auto;height:auto;width:100%;z-index:1000;
     background-position: 0 calc(30% + 0.5rem); background-size: 100% auto; background-image: url({{ asset('dist/assets/media/svg/patterns/rhone.svg') }})">
        <div class="" style="width:91.5%">
            <div class="row">
                <div class="col-10">
                    <h1> <i class="fas fa-boxes icon-xl text-light"></i> PPMP  </h1>
                    <h5>{{ $log != null ? $log->remarks : "NOT YET SUBMITTED" }}</h5>
                </div>
                <div class="col-2 text-right">
                    <button class="btn btn-icon btn-light btn-hover-danger btn-sm"
                        onclick="wfp_ppmp_viewer_drawer_close()"
                        style="position: relative;top:0px;right:0px;"><i class="flaticon-close"></i>
                    </button>
                </div>
                <div class="col-12 col-md-8">
                    <div class="row">
                            @if($log)
                                @if(Auth::user()->role->roles != "PROGRAM COORDINATOR")
                                    @if($log->remarks =="SUBMITTED")
                                        <button type="button" onclick="approvePPMP('{{ $data['wfp_code'] }}')" class="btn btn-transparent-success font-weight-bold  btn-block col-12 col-md-4 m-1"><i class="flaticon-like icon-md"></i>APPROVED PPMP</button>
                                        <button type="button" onclick="revisePPMP('{{ $data['wfp_code'] }}')"   class="btn btn-transparent-danger font-weight-bold  btn-block col-12 col-md-4 m-1" ><i class="flaticon2-refresh-1 icon-md"></i>REVISED PPMP</button>
                                        <button type="button" onclick="commentPPMP('{{ $data['wfp_code'] }}')"   class="btn btn-transparent-primary font-weight-bold  btn-block col-12 col-md-4 m-1" ><i class="fa fa-comment-alt icon-md"></i>Commment PPMP</button>
                                    @endif

                                    @if($log->remarks =="APPROVED")
                                        <button type="button" onclick="revisePPMP('{{ $data['wfp_code'] }}')"   class="btn btn-transparent-danger font-weight-bold  btn-block col-12 col-md-4 m-1" ><i class="flaticon2-refresh-1 icon-md"></i>REVISED PPMP</button>
                                        <button type="button" class="btn btn-transparent-white font-weight-bold btn-block col-12 col-md-4 m-1" onclick="printPpmp('{{  $data['wfp_code'] }}')"><i class="flaticon2-printer"></i>Print</button>
                                    @endif
                                @else
                                    @if($log->remarks =="SUBMITTED")
                                        <button type="button" onclick="commentPPMP('{{ $data['wfp_code'] }}')"   class="btn btn-transparent-primary font-weight-bold  btn-block col-12 col-md-4 m-1" ><i class="fa fa-comment-alt icon-md"></i>Commment PPMP</button>
                                    @endif
                                    @if($log->remarks =="FOR REVISION")
                                        <button type="button" onclick="submitPPMP('{{ $data['wfp_code'] }}')"   class="btn btn-transparent-primary font-weight-bold  btn-block col-12 col-md-4 m-1" ><i class="flaticon2-send-1 icon-md"></i>Submit PPMP</button>
                                        <button type="button" onclick="commentPPMP('{{ $data['wfp_code'] }}')"   class="btn btn-transparent-primary font-weight-bold  btn-block col-12 col-md-4 m-1" ><i class="fa fa-comment-alt icon-md"></i>Commment PPMP</button>
                                    @endif
                                    @if($log->remarks =="APPROVED")
                                        <button type="button" class="btn btn-transparent-white font-weight-bold btn-block col-12 col-md-4 m-1" onclick="printPpmp('{{  $data['wfp_code'] }}')"><i class="flaticon2-printer"></i>Print</button>
                                    @endif
                                @endif
                            @else
                                <button type="button" onclick="submitPPMP('{{ $data['wfp_code'] }}')"   class="btn btn-transparent-primary font-weight-bold  btn-block col-12 col-md-4 m-1" ><i class="flaticon2-send-1 icon-md"></i>Submit PPMP</button>
                            @endif

                        <div class="col-12 col-md-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-12 col-md-4" style="height:120px;"></div>
        <div class="col-12 col-md-4" style="height:120px;"></div>
        <div class="col-12 col-md-4 mb-md-40" style="height:120px;"></div>

        <div class="card card-custom col-12">
            <!--begin::Header-->
            {{-- <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">New Arrivals</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                </h3>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-primary font-weight-bolder font-size-sm">New Report</a>
                </div>
            </div> --}}
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                <!--begin::Table-->
                <div>
                    <table style="border :1px solid black;">
                        <thead style="font-weight:bold;">
                            <tr>
                                        <td rowspan ="2" class="pl-0 text-center" style="min-width: 120px;border:1px solid black;">Code</td>
                                        <td rowspan ="2" class="pl-0 text-center" style="min-width: 160px;border:1px solid black;">General Description</td>
                                        <td colspan="12" class="text-center" style="border:1px solid black;">SCHEDULE / MILESTONE OF ACTIVITY</td>
                                        <td rowspan ="2" class="text-center" style="min-width: 50px;border:1px solid black;">Qty</td>
                                        <td rowspan ="2" class="text-center" style="min-width: 120px;border:1px solid black;">Unit Price</td>
                                        <td rowspan ="2" class="text-center" style="min-width: 120px;border:1px solid black;">Total Price</td>
                                    </tr>
                                     <tr>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">Jan</td>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">Feb</td>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">Mar</td>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">Apr</td>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">May</td>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">June</td>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">July</td>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">Aug</td>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">Sept</td>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">Oct</td>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">Nov</td>
                                        <td class="text-center" style="min-width: 50px;border:1px solid black;">Dec</td>
                                    </tr>
                        </thead>
                        <tbody style="font-size:12px;">
                            <?php
                                $g_total = 0;
                            ?>
                            <br>
                            <br>
                            <br>
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
                                        <td colspan="18" style="border:1px solid black;padding:3px;font-weight:bold;"  class="text-left">{{ $row }}</td>
                                    </tr>
                                    @foreach($item_row as $row1)
                                    <tr>
                                        @if($row == $row1["classification"])
                                        <?php $g_total += $row1["total_price"]; ?>
                                            <tr>
                                                <td style="border:1px solid black;padding:3px;"  class="text-center">{{ $row1["uacs_id"] }}</td>
                                                <td style="border:1px solid black;padding:3px;">{{   $row1["g_desc"]  }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["jan"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["feb"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["mar"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["apr"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["may"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["june"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["july"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["aug"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["sept"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["oct"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["nov"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["dec"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row1["qty"] }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-left">₱ {{ number_format($row1["unit_price"],2) }}</td>
                                                <td style="border:1px solid black;padding:3px;" class="text-left">₱ {{ number_format($row1["total_price"],2) }}</td>
                                            </tr>
                                        @endif
                                    </tr>
                                    @endforeach
                                @endforeach
                            <?php
                                $wfp = \App\Wfp::where('code',Crypt::decryptString($data["wfp_code"]))->first();
                            ?>
                            @if(count($data["ppmp_catering"]) <> 0)
                                <tr>
                                    <td colspan="18" style="border:1px solid black;padding:3px;font-weight:bold;"  class="text-left">CATERING SERVICES </td>
                                </tr>
                                @foreach($data["ppmp_catering"] as $key => $row)

                                <?php

                                    $t = "tbl_wfp_activity_per_indicator";
                                    $batch = \App\TablePiCateringBatches::join('ref_location','ref_location.id','tbl_pi_catering_batches.batch_location')
                                                    ->join($t,$t .'.id','tbl_pi_catering_batches.pi_id')
                                                    ->join('tbl_wfp_activity','tbl_wfp_activity.id','tbl_wfp_activity_per_indicator.wfp_act_id')
                                                    ->where('tbl_pi_catering_batches.pi_id',$key)
                                                    ->select('wfp_act_id','out_activity','pi_id','batch_location','uacs_id','province','city','batch_no','performance_indicator','tbl_pi_catering_batches.id as batch_id')
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
                                                        ->where('year_id', $wfp->year_id)
                                                        ->where('tbl_ppmp_items.batch_id',$row3["batch_id"])
                                                        ->where('tbl_ppmp_items.wfp_act_per_indicator_id',$row3["pi_id"])
                                                        ->where($vw . '.classification','=','CATERING SERVICES')
                                                        ->get()->toArray();

                                        ?>
                                        <tr>
                                            <td colspan="17" style="border:1px solid black;padding:3px;font-weight:bold;"  class="text-left pl-4">
                                                {{'BATCH #' . $row3["batch_no"] . ' ' . $row3["out_activity"] . ' @ '. $row3["province"] . ', ' . $row3["city"]}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <?php $i1 =1; ?>
                                            @foreach( $items as $row4)
                                                <?php $i1++; ?>
                                            @endforeach

                                            @if(count($items) <> 0)
                                                <td rowspan="{{ $i1 }}"  class="text-center">{{ $row3["uacs_id"] }}</td>
                                            @endif
                                            @foreach( $items as $row4)
                                                <tr>
                                                    <?php
                                                    $qty2 = $row4->jan + $row4->feb + $row4->mar + $row4->apr + $row4->may + $row4->june + $row4->july + $row4->aug + $row4->sept + $row4->oct + $row4->nov + $row4->dec;
                                                        $g_total += $qty2 * $row4->price;
                                                    ?>
                                                    <td style="border:1px solid black;padding:3px;">{{ $row4->description . ', ' . $row4->unit_name}}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->jan }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->feb }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->mar }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->apr }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->may }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->june }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->july }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->aug }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->sept }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->oct }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->nov }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $row4->dec }}</td>
                                                    <td style="border:1px solid black;padding:3px;" class="text-center">{{ $qty2 }}</td>
                                                    <td style="border:1px solid black;padding:3px;">₱ {{ number_format($row4->price,2)  }}</td>
                                                    <td style="border:1px solid black;padding:3px;">₱ {{ number_format($qty2 * $row4->price,2) }}</td>
                                                </tr>
                                            @endforeach

                                        </tr>
                                    @endforeach
                                @endforeach
                            @endif
                            <tr>
                                <td colspan="16" style="border:1px solid black;padding:3px;font-weight:bold;" class="text-right">Total</td>
                                <td  colspan="1"style="border:1px solid black;padding:3px;font-weight:bold;">₱ {{ number_format($g_total,2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-2">Note: Technical Specifiproposecation for each item / Project being proposed shall be submitted as part of the PPMP.</div>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Body-->
        </div>
</div>

@if(count($data["ppmp_comments"]) <> 0)
<div class="row">
    <div class="col-12 p-5">
        <h3 class="display-5"><i class="flaticon-chat text-primary mr-2"></i>Comment Section</h3>
        <div class="separator separator-dashed separator-border-3"></div>
    </div>
</div>
@endif
<div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle row" id="comments">

@forelse($data["ppmp_comments"] as $row2)
  <!--begin::Item-->
  <div class="card border-top-0 col-12">
    <!--begin::Body-->
    <div >
        <div class="card-body text-dark-50 font-size-lg pl-12 ">
                <div class="mb-3">
                    <!--begin::Section-->
                    <div class="d-flex align-items-center">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50 symbol-light mr-5">
                            <span class="symbol-label font-size-h1">
                                 {{ strtoupper(Str::substr(Str::words($row2["name"],2),0,1)) }}
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column flex-grow-1">
                            <div class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">{{ $row2["name"] }}</div>
                            <span class="text-muted font-weight-normal"><i class="
                                flaticon-time-1 mr-2"></i>{{ Carbon\Carbon::parse($row2["created_at"])->diffForHumans() }}</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Section-->
                    <!--begin::Desc-->
                    <p class="text-dark-50 m-0 p-5 font-weight-bold bg-gray-200 rounded-lg mt-1"> {{ $row2["comment"] }}</p>
                    <!--end::Desc-->
                </div>
            </div>
    </div>
    <!--end::Body-->
</div>
<!--end::Item-->
@empty

@endforelse
</div>





