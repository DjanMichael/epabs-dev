/*
|--------------------------------------------------------------------------
| REUSABLE FUNCTIONS
|--------------------------------------------------------------------------
*/

function switchChangeValue(ob,type = null){
    var el = document.getElementById(ob);
    if (type == 'default'){
        el.value = 'N';
    }else{
        el.value = (el.value == 'Y') ? 'N' : 'Y';
    }
}

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

function populateTablePerPage(url, page){
    var _url= url;
    $.ajax({
        method:"GET",
        url: _url,
        data : { page: page},
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
                populateTablePerPage(url, $(this).attr('href').split('page=')[1])
            });
        }
    })
}

function populateTableBySearch(url, query){
    var datastr = "query=" + query;
    var _url = url;

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
        error:function(err){
            if(err.status == 500){
                populateTableBySearch(url, $("#output_function_search").val());
            }
        }
    });
}