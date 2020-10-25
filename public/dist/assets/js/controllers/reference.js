/*
|--------------------------------------------------------------------------
| REUSABLE FUNCTIONS
|--------------------------------------------------------------------------
*/

// Only take numbers and dot.
// $(document).on('keypress', '.number', function(event){
//     if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
//         event.preventDefault();
//     }
// });

// Switch Checkbox Value
function switchChangeValue(ob, firstValue, secondValue){
    var el = document.getElementById(ob);
    el.value = ($('#'+el.id).prop('checked') == true) ? firstValue : secondValue;
}

function create_table_row (item) {
    var row = $('<tr><td>' + item.id + '</td><td>' + item.date + '</td></tr>');
    return row;
}

// Populate Table
function populateTable(populate_url, per_page_url, table, content, pagination){
    var _url = populate_url;
    $.ajax({
        method:"GET",
        url: _url,
        beforeSend:function(){
            KTApp.block('#'+table, {
                overlayColor: '#000000',
                state: 'primary',
                message: 'Loading. . .'
            });
        },
        success:function(data){
            KTApp.unblock('#'+table);
            document.getElementById(content).innerHTML= data;
        },
        complete:function(){
            $("#" + pagination + " .pagination a").on('click',function(e){
                e.preventDefault();
                populateTablePerPage(per_page_url, $(this).attr('href').split('page=')[1], $("#query_search").val(), table, content, pagination)
            });
        }
    });
}


// Populate Table with Pagination
function populateTablePerPage(url, page, q1, table, content, pagination){
    var _url = url;
    var _q = q1 == '' ? '' : q1;
    $.ajax({
        method:"GET",
        url: _url,
        data : { page: page, q : _q },
        beforeSend:function(){
            KTApp.block('#'+table, {
                overlayColor: '#000000',
                state: 'primary',
                message: 'Loading. . .'
            });
        },
        success:function(data){
            KTApp.unblock('#'+table);
            document.getElementById(content).innerHTML= data;
        },
        complete:function(){
            $("#" + pagination + " .pagination a").on('click',function(e){
                e.preventDefault();
                populateTablePerPage(url, $(this).attr('href').split('page=')[1], $("#query_search").val(), table, content, pagination)
            });
        }
    })
}

// Populate Table thru search
function populateTableBySearch(url, query, table, content, pagination){
    var _url = url;
    var _q = query == '' ? '' : query;
    var datastr = "q=" + _q;

    $.ajax({
        method: "GET",
        url: _url,
        data: datastr,
        beforeSend:function(){
            KTApp.block('#'+table, {
                overlayColor: '#000000',
                state: 'primary',
                message: 'Loading. . .'
            });
        },
        success:function(data){
            KTApp.unblock('#'+table);
            document.getElementById(content).innerHTML= data;
        },
        complete:function(){
            $("#" + pagination + " .pagination a").on('click',function(e){
                e.preventDefault();
                populateTablePerPage(url, $(this).attr('href').split('page=')[1], $("#query_search").val(), table, content, pagination)
            });
        }
    });
}


/*
|--------------------------------------------------------------------------
| CONDITION FUNCTIONS
|--------------------------------------------------------------------------
*/

// Populate Table thru condition
function populateTableWithCondition(url, condition, table, content, pagination){
    $.ajax({
        method: "GET",
        url: url,
        data: { 'id' : condition},
        beforeSend:function(){
            KTApp.block('#'+table, {
                overlayColor: '#000000',
                state: 'primary',
                message: 'Loading. . .'
            });
        },
        success:function(data){
            KTApp.unblock('#'+table);
            document.getElementById(content).innerHTML= data;
        },
        complete:function(){
            $("#" + pagination + " .pagination a").on('click',function(e){
                e.preventDefault();
                populateTableWithConditionPerPage(url, $(this).attr('href').split('page=')[1], condition, table, content, pagination)
            });
        }
    });
}

// Populate Table thru condition per page
function populateTableWithConditionPerPage(url, page, condition, table, content, pagination){
    var _url = url;
    $.ajax({
        method:"GET",
        url: _url,
        data : { page: page, id : condition },
        beforeSend:function(){
            KTApp.block('#'+table, {
                overlayColor: '#000000',
                state: 'primary',
                message: 'Loading. . .'
            });
        },
        success:function(data){
            KTApp.unblock('#'+table);
            document.getElementById(content).innerHTML= data;
        },
        complete:function(){
            $("#" + pagination + " .pagination a").on('click',function(e){
                e.preventDefault();
                populateTableWithConditionPerPage(url, $(this).attr('href').split('page=')[1], condition, table, content, pagination)
            });
        }
    })
}
