@extends('layouts.app')
@section('title','Product List')
@section('content')
<div class="row"  style="min-height:390px;">
    <div class="col-12 col-md-3">
        <div class="flex-column  col-md-12" id="kt_profile_aside">
            <!--begin::Forms Widget 15-->
            <div class="card card-custom gutter-b">
                <!--begin::Body-->
                <div class="card-body">

                    <!--begin::Form-->
                    <form id="side_isppmp">
                        <!--begin::Categories-->
                        <div class="form-group mb-11">
                            <label class="font-size-h3 font-weight-bolder text-dark mb-7">Categories</label>
                            <!--begin::Checkbox list-->
                            <div class="checkbox-list">
                                @foreach($data["ppmp_item_category"] as $row)
                                    <label class="checkbox checkbox-lg mb-7" >
                                    <input type="checkbox" value="false" id="sort_list_{{ str_replace(' ','_',$row['classification']) }}" onclick="ppmpItemSortedCategory('{{ $row['classification'] }}')" >
                                        <span></span>
                                        <div class="font-size-lg text-dark-75 font-weight-bold">{{ $row["classification"] }}</div>
                                        <div class="ml-auto text-muted font-weight-bold">{{ $row["item_count"] }}</div>
                                    </label>
                                @endforeach
                            </div>
                            <!--end::Checkbox list-->
                        </div>
                        <!--end::Categories-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Forms Widget 15-->
        </div>
    </div>
    <div class="col-12 col-md-9">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-4">

                    </div>
                </div>
            </div>
            <div class="col-12">
            <div class="card card-custom " id="table_ppmp">
                <!--begin::Header-->
                <div class="card-header border-0 py-5 bg-dark">
                    <div class="row w-100">
                        <div class="col-12 col-md-6">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-light">Item List</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">You may select Item here.</span>
                            </h3>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <div class="row mt-3">
                                <input type="text" class="form-control form-control-solid col-12 col-md-8 mb-3 mb-md-0" placeholder="Search Item" id="search_txt"/>
                                <button class="btn btn-light-primary font-weight-bold col-12 col-md-3 ml-md-2" type="button" id="btnSearchItem">Search</button>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card-toolbar">
                    </div> --}}
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-vertical-center">
                            <thead>
                                <tr class="text-left">
                                    {{-- <th class="pl-0" style="width: 30px">
                                        <label class="checkbox checkbox-lg checkbox-inline mr-2">
                                            <input type="checkbox" value="1">
                                            <span></span>
                                        </label>
                                    </th> --}}
                                    {{-- <th class="pl-0" style="min-width: 120px">ID</th> --}}
                                    <th style="min-width: 110px">ITEM DESCRIPTION</th>
                                    <th style="min-width: 120px">UNIT</th>
                                    <th style="min-width: 110px">
                                        <span>PRICE</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="ppmp_med_supplies_items">
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Body-->
            </div>
            </div>
        </div>
        <!-- end row-->
    </div>
    <!--end col-10 -->
</div>
<!--end row -->
@endsection

@push('scripts')
<script>
    var sortedBy = [];

    /*
        INITIALIZE
    */
        setTimeout(function(){
            getAllPPMPItemsList();
        },1000);


     function ppmpItemSortedCategory(classification){
        classification = classification.split(' ').join('_');
        // alert(classification);
        $("#sort_list_" + classification).val(!Boolean($("#sort_list_" + classification).val()));

        var i =0;
        var found =0;
        var index_found =0;

        for(i=0; i < sortedBy.length; i++){
            if(sortedBy[i] == classification){
                found = 1;
                index_found = i;
            }
        }

        if(Boolean($("#sort_list_" + classification).val()) == true && found == 0){
            sortedBy.push(classification);
        }else{
            sortedBy.splice(index_found,1);
        }
        // alert(sortedBy);
        // alert(sortedBy);

        getAllPPMPItemsList();
    }

    $("#btnSearchItem").on('click',function(){
        getAllPPMPItemsList();
    });


    /*
        FUNCTIONS
    */

    function getAllPPMPItemsList(_page,_q){
        var _url = "{{ route('get_all_ppmp_items_list') }}";
        var _data = {
            page :_page,
            sorted : sortedBy,
            q : $("#search_txt").val(),
            action:false
        }
        $.ajax({
            method:"GET",
            url:_url,
            data: _data,
            beforeSend:function(){
                KTApp.block('#table_ppmp', {
                    overlayColor: '#000000',
                    state: 'primary',
                    message: 'Loading. . .'
                });
            },
            success:function(data){
                document.getElementById('ppmp_med_supplies_items').innerHTML = data;
            },complete:function(){
                KTApp.unblock('#table_ppmp');
                $("#med_supplies_pagination .pagination a").on('click',function(e){
                    e.preventDefault();
                    page = $(this).attr('href').split('page=')[1];
                    getAllPPMPItemsList(page,'');
                    // alert(page);
                });
            }
        });
    }

</script>
@endpush
