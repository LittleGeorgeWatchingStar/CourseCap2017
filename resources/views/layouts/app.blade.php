<!DOCTYPE html>
	<html dir="ltr" lang="en">
    	<head>
        <title>@yield('title','CourseCap - Free Homework Help')</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Tell the browser to be responsive to screen width -->		
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Favicon icon -->
		<link rel="icon" type="image/png" sizes="16x16" href="{{asset('images')}}/favicon.png">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('images')}}/favicon.ico">
		<!-- Favicon icon close -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link type="text/css" href="{{asset('css')}}/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.3.92/css/materialdesignicons.css" rel="stylesheet">		
		<link type="text/css" href="{{asset('css')}}/style.css" rel="stylesheet">
		<link type="text/css" href="{{asset('css')}}/custom.css" rel="stylesheet">
		<link type="text/css" href="{{asset('css')}}/responsive.css" rel="stylesheet">
		<link type="text/css" href="{{asset('css')}}/toastr.min.css" rel="stylesheet">
	    @yield('styles')
		<script src="{{asset('js/jquery.min.js')}}"></script> 
		<script src="{{asset('js/toastr.min.js')}}"></script> 
		<script src="{{asset('js/bootstrap.min.js')}}"></script>

		<script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});	
		</script>
		<!-- Global site tag (gtag.js) - Google Ads: 799535121 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-799535121"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-799535121'); </script>
		<!-- Event snippet for coursecap website conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-799535121/ElojCIWwspYBEJHgn_0C', 'event_callback': callback }); return false; } </script>
    </head>
    <body>
      @yield('content')
      @include('includes.footer')
      @yield('scripts')
      <script>
			  // Initialize Firebase
			  var config ={
				  apiKey: "{{config('firebase.apiKey')}}",
				  authDomain: "{{config('firebase.authDomain')}}",
				  databaseURL: "{{config('firebase.databaseURL')}}",
				  projectId: "{{config('firebase.projectId')}}",
				  storageBucket: "{{config('firebase.storageBucket')}}",
				  messagingSenderId: "{{config('firebase.messagingSenderId')}}"
			  };
			  firebase.initializeApp(config);
			 
			 var provider = new firebase.auth.FacebookAuthProvider();

			function facebookSignin() {
			   firebase.auth().signInWithPopup(provider)
			   
			   .then(function(result) {
			      var token = result.credential.accessToken;

			      var user = result.user;
			      console.log(token);
			      console.log(result.additionalUserInfo.profile.id);
			      console.log(user.uid);
			      $("#full_loader").show();
			      $.ajax({
			        url: '{{url("/fb_login")}}',
			        type: 'POST',
			        dataType: "json",
			        data: {
			                fb_id:result.additionalUserInfo.profile.id,
			                fb_token:token,
			                uid:user.uid
			              },
			      })
			    .done(function(response) {
			        if(response.status=="0"){
			          toastr.success(response.message);
			          window.location.href="{{url('student/dashboard')}}";

			        }else{
			          toastr.error(response.message);
			          $("#full_loader").hide();
			        }
			    })
			    .fail(function() {
			      toastr.error("Server not Respond");
			      $("#full_loader").hide();
			    })
			   }).catch(function(error) {
			      console.log(error.code);
			      console.log(error.message);
			      $("#full_loader").hide();
			   });
			}
			function facebookSignup() {
			   firebase.auth().signInWithPopup(provider)
			   
			   .then(function(result) {
			      var token = result.credential.accessToken;

			      var user = result.user;
			      console.log(token);
			      console.log(result.additionalUserInfo.profile.id);
			      console.log(user.uid);
			      console.log(result);
			      if(user.email==null  && user.emailVerified==false){
			          toastr.error("your facebook email is not varified");
			          $("#full_loader").hide();
			          return false;
			      }
			      var username = result.additionalUserInfo.profile.name.replace(" ", "");
			      $("#full_loader").show();
			      $.ajax({
			        url: '{{url("/fb_register")}}',
			        type: 'POST',
			        dataType: "json",
			        data: {
			                fb_id:result.additionalUserInfo.profile.id,
			                fb_token:token,
			                uid:user.uid,
			                username:username,
			                email:'user.email'
			              },
			      })
			    .done(function(response) {
			        if(response.status=="0"){
			          toastr.success(response.message);
			                $.ajax({
			                        url: '{{url("/fb_login")}}',
			                        type: 'POST',
			                        dataType: "json",
			                        data: {
			                                fb_id:result.additionalUserInfo.profile.id,
			                                fb_token:token,
			                                uid:user.uid
			                              },
			                      })
			                    .done(function(response) {
			                        if(response.status=="0"){
			                          toastr.success(response.message);
			                          window.location.href="{{url('student/dashboard')}}";

			                        }else{
			                          toastr.error(response.message);
			                          $("#full_loader").hide();
			                        }
			                    })
			                    .fail(function() {
			                      toastr.error("Server not Respond");
			                      $("#full_loader").hide();
			                    })
			                   .catch(function(error) {
			                      console.log(error.code);
			                      console.log(error.message);
			                      $("#full_loader").hide();
			                   });


			        }else{
			          toastr.error(response.message);
			          $("#full_loader").hide();
			        }
			    })
			    .fail(function() {
			      toastr.error("Server not Respond");
			      $("#full_loader").hide();
			    })
			   }).catch(function(error) {
			      console.log(error.code);
			      console.log(error.message);
			      $("#full_loader").hide();
			   });
			}
			
			const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
               
                console.log("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                
            })
            .catch(function (err) {
                console.log("Unable to get permission to notify.", err);
            });

        messaging.onMessage(function(payload) {
            console.log("Message received. ", payload);
            //NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload) 
        });
			</script>

      {!! Toastr::message() !!} 
    </body>
</html>

