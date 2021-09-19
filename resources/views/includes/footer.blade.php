<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="row">
          <div class="col-sm-3">
            <h4>Contact us</h4>
            <ul class="footer-link">
              <li><strong>Genernal Info</strong></li>
              <li><a href="mailto:info@coursecap.com">E-mail: info@coursecap.com</a></li>
              <li><strong>Marketing</strong></li>
              <li><a href="mailto:marketing@coursecap.com">E-mail: marketing@coursecap.com</a></li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h4>FAQ</h4>
            <ul class="footer-link">
              <li><a target="_blank" href="{{url('faq')}}">FAQ</a></li>
              <li><a target="_blank" href="{{url('terms-and-conditions')}}">Term of Use</a></li>
              <li><a target="_blank" href="{{url('privacy-policy')}}">Privacy Policy</a></li>
              <li><a target="_blank" href="https://angel.co/craton-software">Career</a></li>
            </ul>
          </div>
          <div class="col-sm-6">
            <h5>Get homework help in your palm </h5>
            <a target="_blank" href="https://itunes.apple.com/us/app/coursecap/id1249529901?mt=8"> <img src="{{asset('/')}}/images/app-store.png"></a>
            <!--<a href="#"> <img src="{{asset('/')}}/images/play-store.png"></a>-->

            <h6>Follow us: </h6>
            <ul class="footer-social">
              <li><a target="_blank" href="https://www.instagram.com/coursecap_com/"><img src="{{asset('/')}}/images/instagram.png"> </a></li>
              <li><a target="_blank" href="https://www.facebook.com/coursecap/"><img src="{{asset('/')}}/images/fb.png"> </a></li>
              <li><a target="_blank" href="https://twitter.com/coursecap_com"><img src="{{asset('/')}}/images/twitter.png"> </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<section class="footer_btm {{ (Route::currentRouteName() == 'becomeTutor' || session('role') == 1) ? 'tutor_btm' : 'student_btm' }}">
		<div class="container" align="center">© 2017 Craton Software Inc.</div>
</section>
<!--login Modal -->
<div class="modal fade login_modal" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
      </div>
      <div class="modal-body">
        <h4 class="text-center">Log in</h4>
        <div class="form-group text-center">
          <button href="#" onclick = "facebookSignin()" class="btn btn-fb btn-block"><i class="mdi mdi-facebook"></i> Sign in with Facebook </button>
        </div>
       <div class="or text-center"> OR</div>
        
       <form id="loginfrm" method="post" action="{{url('/login')}}">
         @if($errors->loginErrors->has('custom_error') )
              <label id="emailsignup-error" class="error" for="emailsignup">{{ $errors->loginErrors->first('custom_error') }}</label>
          @endif
          {!! csrf_field() !!}
          <div class="form-group">
            <input type="text" class="form-control" id="loginemail" name="loginemail" placeholder="Email" value="{{old('loginemail')}}">
            @if($errors->loginErrors->has('loginemail') )
              <label id="emailsignup-error" class="error" for="emailsignup">{{ $errors->loginErrors->first('loginemail') }}</label>
            @endif
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password">
          </div>
          <div class="form-group">
            <label class="checkbox-inline">
              <input type="checkbox" name="">
              Keep me logged in
            </label>
            <a href="#" data-toggle="modal" data-target="#forgotmodal"  class="pull-right forgot-link" data-dismiss="modal">Forgot password?</a>
          </div>
        <div class="form-group">
          <button type="submit" class="btn btn-danger btn-lg btn-block btn-rounded">LOGIN</button>
        </div>
          <div class="join-link text-center">
          I don’t have an account.<a href="#" id="joinNow"> Join Now.</a>
        </div>
				<input type="hidden" name="cr" value="{{Route::currentRouteName()}}">
				<input type="hidden" name="cu" value="{{Request::url()}}">
        </form>
      </div>      
    </div>
  </div>
</div>
<!-- Modal -->


<!--forget password Modal -->
<div class="modal fade login_modal" id="forgotmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
      </div>
      <div class="modal-body">
        <h4 class="text-center">Forgot Password</h4> 
       <form id="resetfrm" method="post" action="{{url('/reset_password')}}">
         @if($errors->forgetPasswordErrors->has('custom_error') )
              <label id="emailsignup-error" class="error" for="emailsignup">{{ $errors->forgetPasswordErrors->first('custom_error') }}</label>
          @endif
          {!! csrf_field() !!}
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" id="emailForgetPassword" name="email" placeholder="Email" >
            @if($errors->forgetPasswordErrors->has('email') )
              <label id="emailForgetPassword-error" class="error" for="email">{{ $errors->forgetPasswordErrors->first('email') }}</label>
            @endif
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-danger btn-lg btn-block btn-rounded">Submit</button>
          </div>
        </form>
      </div>      
    </div>
  </div>
</div>
<!-- Modal -->

<!-- sign up Modal -->
<div class="modal fade login_modal" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
      </div>
      <div class="modal-body">        
        <h4 class="text-center">Sign up</h4>
                <div class="form-group text-center">
          <button href="#" onclick = "facebookSignup()" class="btn btn-fb btn-block"><i class="mdi mdi-facebook"></i> Sign up with Facebook </button>
        </div>
        <form id="signupfrm" method="post" action="{{url('/register')}}">
          @if($errors->signupErrors->has('custom_error') )
              <label id="emailsignup-error" class="error" for="emailsignup">{{ $errors->signupErrors->first('custom_error') }}</label>
          @endif
          {!! csrf_field() !!}
          <div class="form-group">
            <label>Email <span class="req">*</span></label>
            <input type="email" class="form-control" name="email" id="emailsignup" placeholder="Enter your email " value="{{old('email')}}">
             @if($errors->signupErrors->has('email') )
              <label id="emailsignup-error" class="error" for="emailsignup">{{ $errors->signupErrors->first('email') }}</label>
            @endif            
          </div>
          <div class="form-group">
            <label>Username  <span class="req">*</span></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Create a username" value="{{old('username')}}">
             @if($errors->signupErrors->has('username') )
              <label id="emailsignup-error" class="error" for="emailsignup">{{ $errors->signupErrors->first('username') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label class="password-label">Password  <span class="req">*</span> 
              <span class="show-password"><a href="javascript:void(0)" id="showpass">Show password</a><a href="javascript:void(0)" id="hidepass" style="display:none;">Hide password</a></span></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Pick a password">
            @if($errors->signupErrors->has('password') )
              <label id="emailsignup-error" class="error" for="emailsignup">{{ $errors->signupErrors->first('pasword') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label class="checkbox-inline">
              <input type="checkbox" name="pp" id="pp">
              Agree <a target="_blank" href="{{url('/terms-and-conditions')}}" style="text-decoration: underline !important;">Terms of Service</a> and<a target="_blank" href="{{url('/privacy-policy')}}" style="text-decoration: underline !important;"> Privacy Policy</a>
              <span id="taq" >@if($errors->signupErrors->has('pp') ){{ $errors->signupErrors->first('pp') }} @endif</span>
            </label>             
          </div>
        <div class="form-group">
          <input type="hidden" name="refId" value="{{app('request')->input('refId')}}">
          <button type="submit" class="btn btn-danger btn-lg btn-block btn-rounded">SIGN UP</button>
        </div>
          <div class="join-link text-center">
          Already have an account?. <a href="#" id="loginNow"> Log in here</a>
        </div>
				<input type="hidden" name="cr" value="{{Route::currentRouteName()}}">
				<input type="hidden" name="cu" value="{{Request::url()}}">
        </form>
      </div>      
    </div>
  </div>
</div>
<!-- Modal -->

<script src="https://www.gstatic.com/firebasejs/5.5.5/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.5/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.5/firebase-messaging.js"></script>
<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
<script>
  $(document).ready(function(){
    @if(app('request')->input('refId'))
    $('#signupmodal').modal('show');
    @endif
    @if($errors->signupErrors->any() )
      $('#signupmodal').modal('show');
    @endif
    @if($errors->loginErrors->any() )
      $('#loginmodal').modal('show');
    @endif
    @if($errors->forgetPasswordErrors->any() )
      $('#forgotmodal').modal('show');
    @endif
    $('#joinNow').click(function(){
      $('#loginmodal').modal('hide');
      $('#signupmodal').modal('show');
    });
    $('#showpass').click(function(){
      $(this).hide();
      $('#hidepass').show();
      $('#password').attr('type','text');
    });
    $('#hidepass').click(function(){
      $(this).hide();
      $('#showpass').show();
      $('#password').attr('type','password');
    });

    $('#loginNow').click(function(){
      $('#loginmodal').modal('show');
      $('#signupmodal').modal('hide');
    });
    $.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9_]+$/i.test(value);
    }, "Username must contain only letters, numbers, or underscore.");
    $.validator.addMethod("laxEmail", function(value, element) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return this.optional( element ) || regex.test(value);
    }, 'Please enter a valid email address.');
    $("#signupfrm").validate({
      errorPlacement: function(error, element) {
        if(element.attr("name") == "pp"){
          error.appendTo('#taq');
          return;
        }else {
          error.insertAfter(element);
        }
        },
      rules: {
         email: {
             required: true,
             email: true,
             laxEmail: true,
             remote: {
                type: 'post',
                url: '{{url('/')}}/checkavailability',
                data: {
                  email: $( "#email" ).val(),
                  type:1
                },
                dataFilter: function(data) {
                    if(data == 'true'){
                      return true;
                    }else{
                      return false;
                    }
                }
            }
         },
         username:{
            required: true,
            rangelength: [5, 20],
            loginRegex:true,
            remote: {
                type: 'post',
                url: '{{url('/')}}/checkavailability',
                data: {
                  username: function() {
                    return $( "#username" ).val();
                  },
                  type:2
                },
                dataFilter: function(data) {
                    if(data == 'true'){
                      return true;
                    }else{
                      return false;
                    }
                }
            }
         },
         password:{
            required: true,
            minlength:6,
         },
         pp:{
            required: true,
            
         }
       },
       messages: {
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter valid email address",
                        remote: "This email is already exists"
                   },
                   username:{
                    remote: "This username is already exists"
                   }
                },


      submitHandler: function(form) {
          if ($("#signupfrm").valid()) {
              form.submit();
          }
      }
  });
  $("#loginfrm").validate({
      
      rules: {
         email: {
             required: true,
             email: true,
             laxEmail: true,             
        },
        password:{
          required: true,
          minlength:6,
        },        
      },
      messages: {
            email: {
                required: "Please enter your email address",
                email: "Please enter valid email address",
          },           
        },
      submitHandler: function(form) {
        if ($("#loginfrm").valid()) {
            form.submit();
        }
      }
    });    
  });


</script>

    <script type="text/javascript">
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {myFunction()};
        // Get the header
        var header = document.getElementById("myHeader");
        // Get the offset position of the navbar
        var sticky = header.offsetTop; 
        // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
            if (window.pageYOffset > sticky) {
              header.classList.add("sticky");
            } else {
              header.classList.remove("sticky");
          }
        } 
    </script>

