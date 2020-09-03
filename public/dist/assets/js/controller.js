


  function HttpNotify(messages)
{
    KTApp.blockPage({
        overlayColor: '#000000',
        state: 'primary',
        message: messages
    });
    //
    $.ajax({
        method:"GET",
        url:'https://jsonplaceholder.typicode.com/comments',
        success:function(data){
            console.log(data);
            setTimeout(function(){
                    KTApp.unblockPage();
                    toastr.success(messages);
            },1000);
        }
    });
}