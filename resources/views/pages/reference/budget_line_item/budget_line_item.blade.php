@extends('layouts.app')
@section('title','Budget Line Item')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">System Reference</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Budget Line Item</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'Budget Line Item')
    @section('panel-icon', 'fas fa-piggy-bank')
    @include('pages.reference.component.panel')
@endsection

@push('scripts')
    <script src="{{ asset('dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('dist/assets/js/form_validate.js') }}"></script>
    <script src="{{ asset('dist/assets/js/controllers/reference.js') }}"></script>

    <script>
        $(document).ready(function() {
            
            /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */
            var section_id = "", program_id = "", id = "";

            populateTable("{{ route('d_budget_line_item') }}", "{{ route('d_get_budget_line_item_by_page') }}",
                                'table_populate', 'table_content', 'table_pagination');

            $("#alert").delay(0).hide(0);

            let data = { fund_source :'', budget_item :'', program:'', division:'', saa_number:'',
                            purpose:'', year :'', amount :'' };

            let rules = { fund_source :'required', budget_item :'required', program:'required', division:'required',
                            purpose:'required', year :'required', amount :'required' };

            var btn = KTUtil.getById("kt_btn_1");
            var btn_search = KTUtil.getById("btn_search");

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */
            $(document).on('click', '#chk_status', function(){ switchChangeValue('chk_status', 'ACTIVE', 'INACTIVE') });

            $(document).on('keypress', '.number', function(event){
                if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });

            $(document).on('change', '#division', function(event){
                var optionSelected = $(this).find("option:selected");
                var valueSelected  = optionSelected.val();
                var textSelected   = optionSelected.text();
                if (textSelected != 'Please select division'){
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    $.ajax({
                        url: "{{ route('d_get_budget_section') }}",
                        method: "GET",
                        data: {select:select, value:textSelected, dependent:dependent},
                        success:function(result){
                            $('#'+dependent).html(result);
                            if (id) {
                                $("#section option:contains(" + section_id +")").attr("selected", true);
                                $("#section").trigger("change");
                            }
                        }
                    });
                }
            });

            $(document).on('change', '#section', function(event){
                var optionSelected = $(this).find("option:selected");
                var valueSelected  = optionSelected.val();
                var textSelected   = optionSelected.text();
                if (textSelected != 'Please select section'){
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    $.ajax({
                        url: "{{ route('d_get_unit_program') }}",
                        method: "GET",
                        data: {select:select, value:valueSelected, dependent:dependent},
                        success:function(result){
                            $('#'+dependent).html(result);
                            if(id){
                                $("#program option:contains(" + program_id +")").attr("selected", true);
                            }
                        }
                    });
                }
            });

            $(document).on('change', '#sort_by_fund_source', function(event){
                var optionSelected = $(this).find("option:selected");
                var valueSelected  = optionSelected.val();
                KTUtil.btnWait(btn_search, "spinner spinner-right spinner-white pr-15", "Sorting...");
                populateTableBySearch("{{ route('d_get_budget_line_item_search') }}", valueSelected, 'table_populate', 'table_content', 'table_pagination');
                setTimeout(function() { KTUtil.btnRelease(btn_search); }, 700);
            });

            $(document).on('change', '#fund_source', function(event){
                var optionSelected = $(this).find("option:selected");
                var valueSelected  = optionSelected.val();
                var textSelected   = optionSelected.text();
                if (textSelected == 'SAA') {
                    $(".form_budget_item").show();
                    $(".form_division").show();
                    $(".form_section").show();
                    $(".form_program").show();
                    $(".form_year").show();
                    $(".form_saa_number").hide();
                    $(".form_purpose").show();
                    $(".form_amount").show();
                }
                else if (valueSelected != '') {
                    $(".form_budget_item").show();
                    $(".form_year").show();
                    $(".form_amount").show();
                    $(".form_division").hide();
                    $(".form_section").hide();
                    $(".form_program").hide();
                    $(".form_saa_number").hide();
                    $(".form_purpose").show();
                }
                else {
                    hideComponents();
                }
            });

            // Search button event
            $("#btn_search").on('click',function(){
                var str = $("#query_search").val();
                KTUtil.btnWait(btn_search, "spinner spinner-right spinner-white pr-15", "Searching...");
                populateTableBySearch("{{ route('d_get_budget_line_item_search') }}", str, 'table_populate', 'table_content', 'table_pagination');
                setTimeout(function() { KTUtil.btnRelease(btn_search); }, 700);
            });

            // Add / Edit button event
            $(document).on('click', '#btn_add, a[data-role=edit]', function(){
                id = $(this).data('id');
                var fund_source = $('#'+id).children('td[data-target=fund_source]').text();
                var budget_item = $('#'+id).children('td[data-target=budget_item]').text();
                var division = $('#'+id).children('td[data-target=division]').text();
                var section = $('#'+id).children('td[data-target=section]').text();
                var program = $('#'+id).children('td[data-target=program]').text();
                var year = $('#'+id).children('td[data-target=year]').text();
                var amount = $('#'+id).children('td[data-target=amount]').text();
                var saa_number = $('#'+id).children('td[data-target=saa_ctrl_number]').text();
                var purpose = $('#'+id).children('td[data-target=purpose]').text();
                var status = $('#'+id).children('td[data-target=status]').find('span').text();
                $.ajax({
                    url: "{{ route('d_add_budget_line_item') }}",
                    method: 'GET'
                }).done(function(data) {
                    document.getElementById('dynamic_content').innerHTML= data;
                    hideComponents();
                    if (id) {
                        $('#budget_item_id').val(id);
                        $("#fund_source").find("option:contains(" + fund_source +")").each(function(){
                            if( $(this).text() == fund_source ) {
                                $(this).attr("selected","selected");
                            }
                        });
                        section_id = section;
                        program_id = program;
                        $("#fund_source").trigger("change");
                        $("#budget_item option:contains(" + budget_item +")").attr("selected", true);
                        $("#division option:contains(" + division +")").attr("selected", true);
                        $("#division").trigger("change");
                        $("#year option:contains(" + year +")").attr("selected", true);
                        $('#amount').val(amount.replace(/,/g,''));
                        $('#saa_control_number').val(saa_number);
                        $('#purpose').val(purpose);
                        $('#chk_status').prop('checked', status == 'ACTIVE' ? false : true).trigger('click');
                    }
                    
                    $('.div_status').css("display", (id == null) ? 'none' : '');
                    $('#modal_reference').modal('toggle');
                });
            });

            // Close alert event
            $("#btn_alert_close").on('click',function(){
                $("#alert").delay(0).fadeOut(600);
            });

            // Insert data event
            $("#kt_btn_1").on('click', function(e){
                if ($("#fund_source")[0].selectedIndex != 0) {
                    id = $("#budget_item_id").val();
                    var status = (id == "") ? 'ACTIVE' : $("#chk_status").val();
                    var fund_source = $("#fund_source option:selected").text();
                    var program = $("#program option:selected").text();
                    var year = $("#year option:selected").text();
                    
                    data.fund_source = $("#fund_source").val();
                    data.division = ($("#section").val() == "" && fund_source != 'SAA') 
                                        ? 0 : $("#section").val();
                    data.program = ($("#program").val() == "" && fund_source != 'SAA') 
                                        ? 0 : $("#program").val();            
                    data.budget_item = $("#budget_item").val();
                    // data.budget_item = ($("#budget_item").val() == "") ? $("#saa_control_number").val() : $("#budget_item").val();
                    data.year = $("#year").val();
                    data.saa_number = "";
                    // data.saa_number = ($("#saa_control_number").val() == "" && fund_source != 'SAA') 
                                        // ? "None" : $("#saa_control_number").val();
                    data.amount = $("#amount").val();
                    data.purpose = $("#purpose").val();
                    
                    let validation = new Validator(data, rules);
                    if (validation.passes()) {
                        e.preventDefault();
                        $("#alert").delay(300).fadeOut(600);
                        $.ajax({
                            url: "{{ route('a_budget_line_item') }}",
                            method: 'POST',
                            data: {
                                id                  : id,
                                fund_source_id      : data.fund_source,
                                fund_source         : fund_source,
                                unit_id             : data.division,
                                budget_item         : data.budget_item,
                                year_id             : data.year,
                                year                : year,
                                program             : data.program,
                                saa_number          : data.saa_number,
                                purpose             : data.purpose,
                                amount              : data.amount,
                                status              : status
                            },
                            beforeSend:function(){
                                KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Processing...");
                            },
                            success: function(result) {
                            setTimeout(function() {
                                    KTUtil.btnRelease(btn);
                                }, 1000);
                                if (result['type'] == 'insert') {
                                    $('#modal_reference').modal('toggle');
                                    populateTable("{{ route('d_budget_line_item') }}", "{{ route('d_get_budget_line_item_by_page') }}",
                                                        'table_populate', 'table_content', 'table_pagination');
                                    toastr.success(result['message']);
                                }
                                else if (result['type'] == 'update') {
                                    $('#modal_reference').modal('toggle');
                                    $('#'+id).children('td[data-target=fund_source]').html(fund_source);
                                    $('#'+id).children('td[data-target=budget_item]').html(data.budget_item);
                                    $('#'+id).children('td[data-target=program_name]').html(program);
                                    $('#'+id).children('td[data-target=year]').html(year);
                                    $('#'+id).children('td[data-target=saa_ctrl_number]').html(data.saa_number == 'None' ? '' : data.saa_number);
                                    $('#'+id).children('td[data-target=purpose]').html(data.purpose);
                                    $('#'+id).children('td[data-target=amount]').html(ReplaceNumberWithCommas(data.amount));
                                    $('#'+id).children('td[data-target=status]').html('<span class="label label-inline label-light-'+ (status == "ACTIVE" ? "success" : "danger") +' font-weight-bold">'+status+'</span>');
                                    toastr.success(result['message']);
                                }
                                else {
                                    Swal.fire("System Message", result['message'], "error");
                                }
                            },
                            error: function(result) {
                                setTimeout(function() {
                                    KTUtil.btnRelease(btn);
                                }, 1000);
                                Swal.fire("System Message", result['message'], "error");
                            }
                        });

                    } else {

                        var msg = "";
                        $.each(validation.errors.all(),function(key,value){
                            msg += '<li>' + value + '</li>';
                        });
                        $("#alert").delay(400).fadeIn(600);
                        $("#modal_reference").animate({ scrollTop:0 },700);
                        $("#alert").addClass('fade show');
                        $("#alert_text").html(msg);

                    }
                }
                else {
                    Swal.fire("System Message", 'Please select a fund source!', "error");
                }
            });

        /*
        |--------------------------------------------------------------------------
        | FUNCTIONS
        |--------------------------------------------------------------------------
        */

        function hideComponents(){
            $(".form_budget_item").hide();
            $(".form_division").hide();
            $(".form_section").hide();
            $(".form_program").hide();
            $(".form_year").hide();
            $(".form_saa_number").hide();
            $(".form_amount").hide();
            $(".form_purpose").hide();
        }

        });

    </script>
@endpush
