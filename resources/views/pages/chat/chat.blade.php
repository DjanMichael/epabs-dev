@extends('layouts.app')
@section('title','CHAT')
@section('breadcrumb')
<li class="breadcrumb-item">
    <span href="" class="text-muted">Conversation</span>
</li>
@endsection

@push('styles')
<style>

.active_chat_convo{
    background-color:white !important;
    border-right:6px solid rgb(163, 104, 230);
}

#chat_user_list_card{
    background-color: #dbfff9;
}
/* Style the active class (and buttons on mouse-over) */
.active_chat_convo, #chat_user_list_card:hover {
  background-color: white;

}
</style>
@endpush
@section('content')

<div class=" container  bgi-size-cover bgi-position-top bgi-no-repeat ml-0 p-0" style="background-image: url('{{ asset('dist/assets/media/bg/bg-3.jpg') }}');">
    <!--begin::Chat-->
    <div class="d-flex flex-row">
        <!--begin::Aside-->
        <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px bg-gray-100" id="kt_chat_aside">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Body-->
                <div class="card-body h-100 m-0 p-0" >
                    <div class="row mb-2 mt-2 p-3">
                        <div class="col-6 font-size-h4 pt-2">User List</div>
                        <div class="col-6 text-right">
                            {{-- <button class="btn btn-primary"><i class="far fa-handshake mr-2"></i>Connect</button> --}}
                        </div>
                    </div>
                    <!--begin:Search-->
                    <div class="p-5">
                    <div class="input-group input-group-solid ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/General/Search.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                        <input type="text" class="form-control py-4 h-auto" placeholder="Search User" id="searchUser">
                    </div>
                    </div>
                    <!--end:Search-->
                    <!--begin:Users-->
                    <div class="mt-7 scroll scroll-pull bg-gray-100 h-100 w-100 p-0 " style="height: auto; overflow: hidden;" id ="chat_users_list">
                    </div>
                    <!--end:Users-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Aside-->
        <!--begin::Content-->
        <div class="flex-row-fluid ml-lg-8 " id="kt_chat_content">
            <!--begin::Card-->
            <div class="card card-custom bg-transparent">
                <!--begin::Header-->
                <div class="card-header align-items-center px-4 py-3">
                    <div class="text-left flex-grow-1">
                        <!--begin::Aside Mobile Toggle-->
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none" id="kt_app_chat_toggle">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Communication/Adress-book2.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3"></path>
                                        <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </button>
                        <!--end::Aside Mobile Toggle-->

                    </div>
                    <div class="text-center text-center font-weight-bold font-size-md" id="chat_convo_selected">
                        MESSAGES
                    </div>
                    <div class="text-right flex-grow-1">
                        <!--begin::Dropdown Menu-->
                        {{-- <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo12/dist/assets/media/svg/icons/Communication/Add-user.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </button>
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover py-5">
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-drop"></i>
                                            </span>
                                            <span class="navi-text">New Group</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-list-3"></i>
                                            </span>
                                            <span class="navi-text">Contacts</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-rocket-1"></i>
                                            </span>
                                            <span class="navi-text">Groups</span>
                                            <span class="navi-link-badge">
                                                <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-bell-2"></i>
                                            </span>
                                            <span class="navi-text">Calls</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-gear"></i>
                                            </span>
                                            <span class="navi-text">Settings</span>
                                        </a>
                                    </li>
                                    <li class="navi-separator my-3"></li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-magnifier-tool"></i>
                                            </span>
                                            <span class="navi-text">Help</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-bell-2"></i>
                                            </span>
                                            <span class="navi-text">Privacy</span>
                                            <span class="navi-link-badge">
                                                <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div> --}}
                        <!--end::Dropdown Menu-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body" >
                    <!--begin::Scroll-->
                    <div class="scroll scroll-pull" data-mobile-height="450" style="height: 450px; overflow: hidden;" id="content_chat">
                    </div>
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                {{-- <textarea id="txtMessage"
                        onkeyup="textAreaAdjust(this)"
                        style="overflow:hidden"
                        class="d-none form-control border-0 p-0"
                        rows="3"
                        placeholder="Type a message"
                       ></textarea> --}}
                <textarea id="txtMessage2" class="form-control border-0 p-0 c"></textarea>

                <div class="card-footer align-items-center">
                    <!--begin::Compose-->
                    <div class="d-flex align-items-center justify-content-between mt-5">
                        <div class="mr-3">
                            {{-- <a href="#" class="btn btn-clean btn-icon btn-md mr-1">
                                <i class="flaticon2-photograph icon-lg"></i>
                            </a>
                            <a href="#" class="btn btn-clean btn-icon btn-md">
                                <i class="flaticon2-photo-camera icon-lg"></i>
                            </a> --}}
                        </div>
                        <div>
                            <button type="button" id="btnSendMessage" class=" d-none btn btn-primary  text-uppercase font-weight-bold py-2 px-6">Send</button>
                        </div>
                    </div>
                    <!--begin::Compose-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Chat-->
</div>

@endsection
@push('scripts')

    <script>

        //https://github.com/mervick/emojionearea emoji reference
        window.emojioneVersion = "3.1.2";
        var _el_emoji;
        var _selected_convo_user_id;


        $(".offcanvas-mobile-overlay").on('click',function(){
            $("#kt_chat_aside").removeClass('offcanvas-mobile-on');
            $(this).remove();
        });

        function fetchMessagesByUsers(){
            var _url = "{{ route('g_user_messages_byuser') }}";
            var _data = { q: $("#searchUser").val() };
            $.ajax({
                method:"GET",
                data: _data,
                url:_url ,
                beforeSend:function(){
                    KTApp.block('#chat_users_list', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Fetching Users'
                    });
                },
                success:function(data){
                    document.getElementById('chat_users_list').innerHTML = data;
                    KTApp.unblock('#chat_users_list');
                },
                error:function(xhr, textStatus, errorThrown){
                    if (xhr.status == 401) {
                        $.ajaxSetup().tryCount++;
                        if($.ajaxSetup().tryCount != $.ajaxSetup().retryLimit)
                        {
                            setTimeout(function(){
                                fetchMessagesByUsers();
                            }, $.ajaxSetup().retryAfter);
                        }
                    }
                }
            });
        }

        $("#kt_app_chat_toggle").on('click',function(){
            fetchMessagesByUsers();
        });


        function fetchInitContent(){
            var _url = "{{ route('d_init_display_message_content') }}";
            $.ajax({
                method:"GET",
                url:_url ,
                beforeSend:function(){
                    KTApp.block('#content_chat', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Loading'
                    });
                },
                success:function(data){
                    document.getElementById('content_chat').innerHTML = data;
                    KTApp.unblock('#content_chat');
                }
            });
        }

        function readStatusUpdate(){
            var _url = "{{ route('db_update_message_read') }}";
            $.ajax({
                method:"GET",
                url: _url,
                data: {from_id : _selected_convo_user_id},
                success:function(data){
                    $("#badge_unread_message_" + _selected_convo_user_id).addClass('d-none');
                }
            });
        }

        function UserShowConvo(_id,_name,el){
            // Get the container element
            $("#btnSendMessage").removeClass('d-none');
            $("#txtMessage2").removeClass('d-none');
            $(".emojionearea-editor").removeClass('d-none');

            // alert(_el_emoji.data("emojioneArea").getText());
            $("#chat_convo_selected").html(_name);
            _selected_convo_user_id = _id;
            var mob_el = $("#offcanvas-mobile-overlay");

            if(mob_el != undefined || mob_el != null) {
                mob_el.trigger('click');
            }

            var _url = "{{ route('g_users_convo_by_id') }}";
            $.ajax({
                method:"GET",
                url: _url,
                data: { id : _id},
                success:function(data){
                    document.getElementById('content_chat').innerHTML = data;
                    $(".offcanvas-mobile-overlay").trigger('click');
                    $("#content_chat").animate({
                        scrollTop: $(
                        '#content_chat').get(0).scrollHeight
                    }, 100);
                    readStatusUpdate();
                },
                complete:function(){
                        var btnContainer = document.getElementById("chat_users_list");
                        // Get all buttons with class="btn" inside the container
                        // var btns = btnContainer.getElementById("chat_user_list_card");
                        var btns = $("#chat_users_list #chat_user_list_card");
                        // Loop through the buttons and add the active class to the current/clicked button
                        for (var i = 0; i < btns.length; i++) {
                            btns[i].addEventListener("click", function() {
                                var current = document.getElementsByClassName("active_chat_convo");
                                current[0].className = current[0].className.replace(" active_chat_convo", "");
                                // var current = document.getElementsByClassName("active_chat_convo");
                                // current[0].className = current[0].className.replace(" active_chat_convo", "");
                                // this.className += " active_chat_convo";
                            });
                        }
                        $(el).addClass('active_chat_convo');
                    }
            })
            $("#kt_chat_content").removeClass('d-none');
        }

        function textAreaAdjust(element) {

            element.style.height = "1px";
            element.style.height = (25+element.scrollHeight)+"px";
        }

        $(document).ready(function(){

            _el_emoji = $("#txtMessage2").emojioneArea({
                search: false,
                tones: false,
                hideSource: true,
                hidePickerOnBlur: false,
                placeholder: "Type something here",
                events: {
                    keydown: function (ob, e){

                        var _url = "{{ route('db_send_chat_message_to_user') }}";
                        var expression =/https:/;
                        // var expression_remove_links = /(?:(?:(?:[A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)(?:(?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/;
                        var _msg =  $("#txtMessage2")[0].emojioneArea.getText();

                        var gif_src = _msg.match(expression);
                        // _msg = _msg.replace(expression_remove_links,"");

                        if(gif_src != null){
                            $.ajax({
                                method:"GET",
                                url: _url,
                                data : { send_to : _selected_convo_user_id, msg:_msg , msg_type :'GIF'},
                                success:function(data){
                                    var template =`
                                    <div class="d-flex flex-column mb-5 align-items-end">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <div class="col-12">
                                                    <embed type="image/gif" src="`+ _msg +`" class="w-100"/><br/>
                                                </div>
                                                <span class="text-muted font-size-sm" style="position:relative;top:0px;right:0px;">{{ Carbon\Carbon::parse(`+ Date.now() +`)->diffForHumans() }}</span>
                                            </div>
                                            <div class="symbol symbol-circle symbol-45 ml-3 d-flex flex-column mb-5 align-items-end">
                                                <span class="symbol-label font-size-h5">YOU</span>
                                            </div>

                                        </div>
                                    </div>
                                    `;

                                    $(".messages").append(template);

                                    $("#content_chat").animate({
                                        scrollTop: $(
                                        '#content_chat').get(0).scrollHeight
                                    }, 2000);
                                    $("#txtMessage2").val("");
                                    _el_emoji.data("emojioneArea").setText("");
                                    _el_emoji.data("emojioneArea").hidePicker();
                                },
                                complete:function(){
                                    $("#btnSendMessage").attr('disabled',false);
                                    $("#btnSendMessage").removeClass('pr-15 spinner spinner-white spinner-right');
                                },
                                error:function(e){
                                    console.log(e.responseJSON.message);
                                }
                            });
                        }

                        if(e.ctrlKey && e.keyCode == 13){
                            $("#btnSendMessage").trigger('click');
                        }
                    }
                }
            });

            fetchMessagesByUsers();
            setTimeout(function(){
                fetchInitContent();
                $(".emojionearea-editor").addClass('d-none');
            },1500);



            // $("#txtMessage2").on('keyup',function(e){
            //     e.preventDefault();
            //     return true;
            // });
            $("#searchUser").on('keyup',function(){
                fetchMessagesByUsers();
            });

            $("#btnSendMessage").on('click',function(e){
                e.preventDefault();
                // var _msg = $("#txtMessage2").val();

                var expression =/(?:(?:(?:[A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)(?:(?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)(?:jpg|gif|png)/;
                // var expression_remove_links = /(?:(?:(?:[A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)(?:(?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/;
                var _msg = $("#txtMessage2")[0].emojioneArea.getText();
                // var _ext =  _msg.match(/.gif/gm);
                // var gif_src = _msg.match(expression);
                 _msg = _msg.replace(expression,"");
                // _msg = _msg.replace(expression_remove_links,"");
                // _msg =  _msg.replace(/\n/gm, "<br>");

                $(this).attr('disabled',true);
                $(this).addClass('pr-15 spinner spinner-white spinner-right');

                var _url = "{{ route('db_send_chat_message_to_user') }}";
                if(_msg !='') {
                    $.ajax({
                        method:"GET",
                        url: _url,
                        data : { send_to : _selected_convo_user_id, msg:_msg  , msg_type :'TEXT'},
                        success:function(data){
                            var template =`
                            <div class="d-flex flex-column mb-5 align-items-end">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="mt-2 rounded p-5 bg-primary text-light  font-weight-bold font-size-lg text-right max-w-400px">`+ _msg.replace(expression,"") +`</div>
                                        <span class="text-muted font-size-sm" style="position:relative;top:0px;right:0px;">{{ Carbon\Carbon::parse(`+ Date.now() +`)->diffForHumans() }}</span>
                                    </div>
                                    <div class="symbol symbol-circle symbol-45 ml-3 d-flex flex-column mb-5 align-items-end">
                                        <span class="symbol-label font-size-h5">YOU</span>
                                    </div>
                                </div>
                            </div>
                            `;

                            $(".messages").append(template);

                            $("#content_chat").animate({
                                scrollTop: $(
                                '#content_chat').get(0).scrollHeight
                            }, 2000);
                            $("#txtMessage2").val("");
                            _el_emoji.data("emojioneArea").setText("");
                            _el_emoji.data("emojioneArea").hidePicker();
                        },
                        complete:function(){
                            $("#btnSendMessage").attr('disabled',false);
                            $("#btnSendMessage").removeClass('pr-15 spinner spinner-white spinner-right');
                        },
                        error:function(e){
                            console.log(e.responseJSON.message);
                        }
                    });
                }else{
                    alert('type something');
                }

            });

        });
        //end $(document)
    </script>
    <script src="{{ asset('dist/assets/js/pages/custom/chat/chat.js') }}"></script>
@endpush
