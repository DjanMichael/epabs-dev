
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
    <!--begin::Head-->
    <head><base href="../../../../">
                <meta charset="utf-8"/>
        <title>Metronic | Login Page 4</title>
        <meta name="description" content="Login page example"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->


		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ asset('dist/assets/css/pages/login/classic/login-4.css')}}" rel="stylesheet" type="text/css"/>
		<!--end::Page Custom Styles-->

        <!--begin::Global Theme Styles(used by all pages)-->
			<link href="{{ asset('dist/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
			<link href="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
			<link href="{{ asset('dist/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
		<!--end::Global Theme Styles-->

        <!--begin::Layout Themes(used by all pages)-->
                <!--end::Layout Themes-->

        <link rel="shortcut icon" href="{{ asset('dist/assets/media/logos/favicon.ico')}}"/>

		</head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled page-loading"  >

    	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('{{ asset('dist/assets/media/bg/bg-3.jpg') }}');">
		<div class="login-form text-center p-7 position-relative overflow-hidden">
			<!--begin::Login Header-->
			<div class="d-flex flex-center mb-15">
				<a href="#">
				<img src="{{ asset('dist/assets/media/logos/logo-letter-13.png') }}" class="max-h-75px" alt=""/>
				</a>
			</div>
			<!--end::Login Header-->

			<!--begin::Login Sign in form-->
			<div class="login-signin">
				<div class="mb-20">
					<h3>Sign In To Admin</h3>
					<div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
				</div>
				<form class="form" id="kt_login_signin_form">
					@csrf
					<div class="form-group mb-5">
						<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Username" name="username" id="username" autocomplete="off" />
					</div>
					<div class="form-group mb-5">
						<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" id="password"  />
					</div>
					<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
						<div class="checkbox-inline">
							<label class="checkbox m-0 text-muted">
								<input type="checkbox" name="remember" id="remember_me" />
								<span></span>
								Remember me
							</label>
						</div>
						<a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">Forget Password ?</a>
					</div>
					<button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
				</form>
				<div class="mt-10">
					<span class="opacity-70 mr-4">
						Don't have an account yet?
					</span>
					<a href="javascript:;" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Sign Up!</a>
				</div>
			</div>
			<!--end::Login Sign in form-->

			<!--begin::Login Sign up form-->
			<div class="login-signup">
				<div class="mb-20">
					<h3>Sign Up</h3>
					<div class="text-muted font-weight-bold">Enter your details to create your account</div>
				</div>
				<form class="form" id="kt_login_signup_form">
					<div class="form-group mb-5">
						<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Fullname" name="fullname" id="fullname"/>
					</div>
					<div class="form-group mb-5">
						<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" id="email" autocomplete="off" />
					</div>
					<div class="form-group mb-5">
						<select name="select_division" id="select_division" class="form-control h-auto form-control-solid py-4 px-8">
							<option value=""></option>
							@forelse ($data["division"] as $row)
								<option value="{{ $row["division"] }}">{{ $row["division"] }}</option>
							@empty
								<option value="">NO DATA</option>
							@endforelse
						</select>
					</div>
					<div class="form-group mb-5" id="loadiing_section">
						<select name="select_section" id="select_section" class="form-control h-auto form-control-solid py-4 px-8">
							<option value=""></option>
							@forelse ($data["section"] as $row)
							<option value="{{ $row["section"] }}">{{ $row["section"] }}</option>
							@empty
								<option value="">NO DATA</option>
							@endforelse
						</select>
						<input type="hidden" value="" id="unit_id"/>
					</div>
					<div class="form-group mb-5">
						<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Username" name="username" id="reg_username" autocomplete="off" />
					</div>
					<div class="form-group mb-5">
						<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" id="reg_password"/>
					</div>
					<div class="form-group mb-5">
						<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" />
					</div>

					{{-- <div class="form-group mb-5 text-left">
						<div class="checkbox-inline">
							<label class="checkbox m-0">
								<input type="checkbox" name="agree" />
								<span></span>
								I Agree the <a href="#" class="font-weight-bold ml-1">terms and conditions</a>.
							</label>
						</div>
						<div class="form-text text-muted text-center"></div>
					</div> --}}
					<div class="form-group d-flex flex-wrap flex-center mt-10">
						<button id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up</button>
						<button id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
					</div>
				</form>
			</div>
			<!--end::Login Sign up form-->

			<!--begin::Login forgot password form-->
			<div class="login-forgot">
				<div class="mb-20">
					<h3>Forgotten Password ?</h3>
					<div class="text-muted font-weight-bold">Enter your email to reset your password</div>
				</div>
				<form class="form" id="kt_login_forgot_form">
					<div class="form-group mb-10">
						<input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off"/>
					</div>
					<div class="form-group d-flex flex-wrap flex-center mt-10">
						<button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request</button>
						<button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
					</div>
				</form>
			</div>
			<!--end::Login forgot password form-->
		</div>
	</div>
</div>
<!--end::Login-->
	</div>
<!--end::Main-->


        <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1200
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#0BB783",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#F3F6F9",
                "dark": "#212121"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#D7F9EF",
                "secondary": "#ECF0F3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#212121",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#ECF0F3",
            "gray-300": "#E5EAEE",
            "gray-400": "#D6D6E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#80808F",
            "gray-700": "#464E5F",
            "gray-800": "#1B283F",
            "gray-900": "#212121"
        }
    },
    "font-family": "Poppins"
};
        </script>
        <!--end::Global Config-->

    	<!--begin::Global Theme Bundle(used by all pages)-->
    	    	   <script src="{{ asset('dist/assets/plugins/global/plugins.bundle.js')}}"></script>
		    	   <script src="{{ asset('dist/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		    	   <script src="{{ asset('dist/assets/js/scripts.bundle.js')}}"></script>
				<!--end::Global Theme Bundle-->


                    <!--begin::Page Scripts(used by this page)-->
                            <script src="{{ asset('dist/assets/js/pages/custom/login/login-general.js')}}"></script>
					<!--end::Page Scripts-->


			<script>
				$.ajaxSetup({
					beforeSend: function (xhr) {
						xhr.setRequestHeader('Authorization', sessionStorage.getItem('token'));
					},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
						'Content-Type': 'application/x-www-form-urlencoded'
					}
				});
		</script>
		<script>
		$("#select_division").on('change',function(){
				if($(this).val() != ''){
					var _url = "{{ route('d_get_section') }}";
					var _data = {
						division : $(this).val()
					};

					$.ajax({
						method:"GET",
						url:_url,
						data:_data,
						beforeSend:function(){
							$("#loadiing_section").addClass('spinner spinner-primary spinner-left');
						},
						success:function(data){
							document.getElementById('select_section').innerHTML = data;
							$("#loadiing_section").removeClass('spinner spinner-primary spinner-left');
						}
					});
				}
		});


		$("#select_section").on('change',function(){
			if($(this).val() != '' && 	$("#select_division").val() != ''){
				var _url = "{{ route('d_auth_get_unit_id') }}";
				var _data = {
					division: $("#select_division").val(),
					section: $(this).val()
				}
					$.ajax({
						method:"GET",
						url:_url,
						data:_data,
						success:function(data){
							$("#unit_id").val(data);
							// document.getElementById('unit_id').innerHTML = data;
							// alert($("#unit_id").val());
							
						}
					});
			}
		});
		$('#kt_login_signin_submit').on('click', function (e) {
				e.preventDefault();
				KTApp.block('#kt_body', {
					overlayColor: '#000000',
					state: 'primary',
					message: 'Authenticating. . .'
				});

				var _url = "{{ route('send_login') }}";
				var remember_me = document.getElementById('remember_me');
				var _data = "username=" + $('#username').val() + '&password=' + $("#password").val() + '&remember_me=' + remember_me.checked;

				$.ajax({
					method:"POST",
					url: _url,
					timeout: 10000,
					data: _data,
					success:function(data){
						if(data.access_token != null)
						{
							sessionStorage.setItem('token',`Bearer ` + data.access_token);
						
							KTApp.unblock('#kt_body');
							
							window.location.href="{{ route('dashboard') }}";
						}else if(data.message =='Unauthorized'){
							swal.fire({
								text: "Sorry, Invalid Credentials",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function() {
								KTUtil.scrollTop();
							});
							KTApp.unblock('#kt_body');
						}else{
							swal.fire({
								text: "Sorry, looks like there are some errors detected, please try again.",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function() {
								KTUtil.scrollTop();
							});
							KTApp.unblock('#kt_body');
						}
					},
					error:function(err,t,m){

						if (t==="timeout")
						{
							KTApp.unblock('#kt_body');
							swal.fire({
								title: "Network Failed",
								text: "looks like your network is slow",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							})
						}else if(err.responseJSON.message != ''){
							var str = err.responseJSON.message || '';
							var res = str.search("HY000");
							if(res != -1)
							{
								swal.fire({
									title:"Can\'t Connect to Server",
									text: "Make sure the server is UP",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								})
							}
							var res2 = str.search("CSRF");
							if(res2 != -1)
							{
								swal.fire({
									title:"Something went wrong, Reloading Page",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								})
								window.location.reload(1);
							}

							KTApp.unblock('#kt_body');
						}
					}
				});
			});
			
			$("#kt_login_signup_submit").on('click',function(){
				
				var a = localStorage.getItem('signup_validate');
				a = a ? JSON.parse(a) : {};
				if(a['data'] == true){
					KTApp.block('#kt_body', {
						overlayColor: '#000000',
						state: 'primary',
						message: 'Creating Account. . .'
					});

					var _url ="{{ route('send_signup') }}";
					var _data = "name=" + $("#fullname").val() + "&username=" + $("#reg_username").val() + "&email=" + $("#email").val() + "&password=" + $("#reg_password").val() +"&unit_id="+ $("#unit_id").val();
					// alert($("#unit_id").val());
				
					$.ajax({
						method:"POST",
						url: _url,
						timeout: 15000,
						data: _data,
						success:function(data){
							if(data.access_token != null)
							{
								sessionStorage.setItem('token',`Bearer ` + data.access_token);
							
								KTApp.unblock('#kt_body');
								localStorage.removeItem('signup_validate');
								window.location.href="{{ route('dashboard') }}";
							}else if(data.message != null){
								swal.fire({
									text: "Sorry, " +data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function() {
									KTUtil.scrollTop();
								});
								KTApp.unblock('#kt_body');
							}else{
								swal.fire({
									text: "Sorry, looks like there are some errors detected, please try again.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function() {
									KTUtil.scrollTop();
								});
								KTApp.unblock('#kt_body');
							}
						},
						error:function(x,t,m){
							if(t==="timeout"){
								swal.fire({
									text: "Network Failed, Please Connect to a faster Internet Connection ",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								});
							}else{
								console.log(t);
							}
						}
					});
				}
			
			});

			window.addEventListener('load', function() {


			//checker network online offline
			toastr.options = {
				"debug": false,
				"newestOnTop": false,
				"progressBar": false,
				"positionClass": "toast-top-center",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "3000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};


				function updateOnlineStatus(event) {
					var condition = navigator.onLine ? "online" : "offline";


					if (condition == "online")
					{
						toastr.success("Successfully reconnected", "Good Job");
					}else{
						toastr.error("No Internet Connection", "Error");
					}

				
				}

				window.addEventListener('online',  updateOnlineStatus);
				window.addEventListener('offline', updateOnlineStatus);
			});


			</script>
								
			<script src="{{ asset('dist/assets/js/pages/features/miscellaneous/blockui.js') }}"></script>

            </body>
    <!--end::Body-->
</html>