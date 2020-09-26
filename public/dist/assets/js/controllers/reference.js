/*
|--------------------------------------------------------------------------
| REUSABLE FUNCTIONS
|--------------------------------------------------------------------------
*/

// Switch Checkbox Value
function switchChangeValue(ob,type = null){
    var el = document.getElementById(ob);
    if (type == 'default'){
        el.value = 'N';
    }else{
        el.value = (el.value == 'Y') ? 'N' : 'Y';
    }
}

// Populate Table
function populateTable(populate_url, per_page_url){
    var _url = populate_url;
    $.ajax({
        method:"GET",
        url: _url,
        beforeSend:function(){
            KTApp.block('#table_populate', {
                overlayColor: '#000000',
                state: 'primary',
                message: 'Loading. . .'
            });
        },
        success:function(data){
            KTApp.unblock('#table_populate');
            document.getElementById('table_content').innerHTML= data;
            
        },
        complete:function(){
            $("#table_pagination .pagination a").on('click',function(e){
                e.preventDefault();
                populateTablePerPage(per_page_url, $(this).attr('href').split('page=')[1])
            });
        }
    });
}

// Populate Table with Pagination
function populateTablePerPage(url, page, q1){
    var _url = url;
    var _q = q1 == '' ? '' : q1;
    $.ajax({
        method:"GET",
        url: _url,
        data : { page: page, q : _q },
        beforeSend:function(){
            KTApp.block('#table_populate', {
                overlayColor: '#000000',
                state: 'primary',
                message: 'Loading. . .'
            });
        },
        success:function(data){
            KTApp.unblock('#table_populate');
            document.getElementById('table_content').innerHTML= data;
        },
        complete:function(){
            $("#table_pagination .pagination a").on('click',function(e){
                e.preventDefault();
                populateTablePerPage(url, $(this).attr('href').split('page=')[1], $("#query_search").val())
            });
        }
    })
}

// Populate Table thru search
function populateTableBySearch(url, query){
    var _url = url;
    var _q = query == '' ? '' : query;
    var datastr = "q=" + _q;

    $.ajax({
        method: "GET",
        url: _url,
        data: datastr,
        beforeSend:function(){
            KTApp.block('#populate_table', {
                overlayColor: '#000000',
                state: 'primary',
                message: 'Loading. . .'
            });
        },
        success:function(data){
            KTApp.unblock('#populate_table');
            document.getElementById('table_content').innerHTML= data;
        },
        complete:function(){
            $("#table_pagination .pagination a").on('click',function(e){
                e.preventDefault();
                populateTablePerPage(url, $(this).attr('href').split('page=')[1], $("#query_search").val())
            });
        }
    });
}