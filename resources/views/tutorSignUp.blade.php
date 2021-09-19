@extends('layouts.app')
@include('includes.tutorHeader')
@section('content')
<section class="tutor-banner">
  <div class="overlay"></div>
  <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-5 banner-caption">
        <h1>  Join CourseCap, <br> Reap benefits </h1>
        <p>we streamline the Q&A proces. Most of our users are constantly looking to get involved, and so can you! Our job is to make your knowledge worth its money. </p>

        </div>
        <div class="col-sm-6 col-md-5 col-md-offset-2">
          <div class="box p-50 radius50">
             <h4 class="text-center">Tutor Sign up</h4>
                <form id="signupfrm" method="post" action="{{url('/tut_register')}}">
          @if($errors->tutorsignup->has('custom_error') )
              <label id="emailsignup-error" class="error" for="emailsignup">{{ $errors->tutorsignup->first('custom_error') }}</label>
          @endif
          {!! csrf_field() !!}
          <div class="form-group">
            <label>Email <span class="req">*</span></label>
            <input type="email" class="form-control" name="email" id="emailsignup" placeholder="Enter your email " value="{{old('email')}}">
             @if($errors->tutorsignup->has('email') )
              <label id="emailsignup-error" class="error" for="emailsignup">{{ $errors->tutorsignup->first('email') }}</label>
            @endif            
          </div>
          <div class="form-group">
            <label>Username  <span class="req">*</span></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Create a username" value="{{old('username')}}">
             @if($errors->tutorsignup->has('username') )
              <label id="emailsignup-error" class="error" for="emailsignup">{{ $errors->tutorsignup->first('username') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label class="password-label">Password  <span class="req">*</span> 
              <span class="show-password"><a href="javascript:void(0)" id="showpass">Show password</a><a href="javascript:void(0)" id="hidepass" style="display:none;">Hide password</a></span></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Pick a password">
            @if($errors->tutorsignup->has('password') )
              <label id="emailsignup-error" class="error" for="emailsignup">{{ $errors->tutorsignup->first('pasword') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label class="checkbox-inline">
              <input type="checkbox" name="pp" id="pp">
              Agree <a href="#" style="text-decoration: underline !important;">Terms of Service</a> and<a href="#" style="text-decoration: underline;"> Privacy Policy</a>
              <span id="taq" >@if($errors->tutorsignup->has('pp') ){{ $errors->tutorsignup->first('pp') }} @endif</span>
            </label>             
          </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info btn-lg btn-block btn-rounded">SIGN UP</button>
        </div>
          <div class="join-link text-center">
          Already have an account?. <a href="#" id="loginNow"> Log in here</a>
        </div>
        </form>
          </div>
      </div>
      </div>

  </div>
</section>


@endsection
@section('scripts')
<script type="text/javascript">
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
</script>
@endsection