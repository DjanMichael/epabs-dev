
<div class="row">
    <div class="col-md-12 col-12">
    <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon"><i class="@yield('panel-icon') text-primary"></i></span>
                    <h3 class="card-label">@yield('panel-title')</h3>
                </div>
                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body" id="user_table_body">
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-8 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="query_search" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value=""></option>
                                            <option value="">asd</option>
                                            <option value="">asd</option>
                                            <option value="">asd</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-3 col-xl-4 mt-5 mt-lg-0 text-right" >
                            <button class="btn btn-light-primary px-6 font-weight-bold" id="btn_search">Search</button>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->
        </div>
    </div>
    <!--end::Card-->
    </div>
    <div class="col-md-12 col-12" id="card_budget_allocation_utilization">
    <!--begin::Advance Table Widget 1-->
    <div class="card card-custom card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Program List</span>
            </h3>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>		Export
                    </button>

                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                Choose an option:
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-print"></i></span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown-->
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">
            <!--begin::Table-->
            <div class="table-responsive" id="table_unit_budget_allocation_content">
            </div>
            <!--end::Table-->
        </div>
    <!--end::Advance Table Widget 1-->
    </div>
</div>

@push('scripts')

<script>

        function showAddBudgetModal(unit_id,year_id,user_id){
            $("#modal_budget_program").modal({
                show:true,
                backdrop:'static',
                focus: true,
                keyboard:false
            });
            // console.log(unit_id,year_id);
            $("#bli_unit_id").val(unit_id);
            $("#bli_year_id").val(year_id);
            $("#bli_user_id").val(user_id);

            //edit
            $("#edit_bli").val("");
            $("#edit_amount").val("");

            getUnitYearlyBudgetPerBLI(unit_id,year_id,user_id);
        }

        function deleteAllAllocation(unit_id1,year_id1){
            Swal.fire({
                title: "Are you sure, You want to delete all allocation?",
                text: "You won\'t be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    var _url = "{{ route('db_budget_delete_allocation_per_user') }}";
                    var _data = {
                        unit_id : unit_id1,
                        year_id : year_id1
                    };
                    $.ajax({
                        method:"GET",
                        url : _url,
                        data: _data,
                        success:function(data){
                            if(data =="success"){
                                Swal.fire(
                                    "Deleted!",
                                    "Budget line Item Allocation has been deleted.",
                                    "success"
                                )
                                fetch_budget_allocation(current_page, $("#query_search").val(),settings.year)
                            }else{
                                Swal.fire(
                                    "Opss!",
                                    "Something went wrong",
                                    "error"
                                )
                            }
                        },
                    })

                    // result.dismiss can be "cancel", "overlay",
                    // "close", and "timer"
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Nothing Changes",
                        "error"
                    )
                }
            });

        }

        function getUnitYearlyBudgetPerBLI(_unit_id,_year_id,_user_id){

            var _url ="{{ route('d_budget_allocation_per_bli_by_user') }}";
            var _data = { unit_id : _unit_id, year_id: _year_id, user_id: _user_id };

            $.ajax({
                method:"GET",
                url : _url,
                data: _data,
                success:function(data){
                    document.getElementById('unit_budget_allocated_list').innerHTML = data;
                }
            });

        }


        function deleteBLIUser(tuba_id){

            var unit_id = $("#bli_unit_id").val();
            var user_id = $("#bli_user_id").val();
            var year_id = $("#bli_year_id").val();

            Swal.fire({
                title: "Are you sure?",
                text: "You won\'t be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function(result) {
                var _url = "{{ route('db_budget_delete_allocation_per_bli') }}";
                if (result.value) {
                    $.ajax({
                        method:"GET",
                        url : _url,
                        data: { delete_id : tuba_id },
                        success:function(data){
                            if(data =="success"){
                                Swal.fire(
                                    "Deleted!",
                                    "Budget line Item Allocation has been deleted.",
                                    "success"
                                )
                                getUnitYearlyBudgetPerBLI(unit_id,year_id,user_id);
                            }else{
                                Swal.fire(
                                    "Opss!",
                                    "Something went wrong",
                                    "error"
                                )
                            }
                        },
                    })

                    // result.dismiss can be "cancel", "overlay",
                    // "close", and "timer"
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Nothing Changes",
                        "error"
                    )
                }
            });

        }

        function editBLIUser(unit_id,year_id,user_id,bli_id,bli_budget){
            console.log(unit_id,year_id,user_id,bli_id);
            $("#edit_bli").val("");
            $("#edit_amount").val("");

            $("#edit_bli_unit_id").val(unit_id);
            $("#edit_bli_user_id").val(user_id);
            $("#edit_bli_year_id").val(year_id);
            $("#edit_bli_id").val(bli_id);

            $("#btn_save_budget").attr('disabled',true);
            $("#btn_update_budget").attr('disabled',false);
            //initialize ui value
            $("#bli_name").val(bli_id);
            $("#bli_amount").val(bli_budget);

        }
</script>
@endpush
