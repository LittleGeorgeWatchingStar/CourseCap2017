@extends('layouts.app')
@section('content')
@include('includes.authTutorHeader')


<section class="submit-application">
  <div class="container">    
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="box radius30 text-center">
            <a href="{{url('/tutor/dashboard')}}"  class="close-button"><i class="mdi mdi-close"></i></a>
             <img class="thkyoulogo" src="{{asset('/')}}/images/logosm.png">
            <h3 class="text-center">Your application has been received. We will reach out to you via e-mail after assessment process. </h3>
          <div class="app-area">
            <h4>Earn money on the go</h4>
            <a href="#"><img src="{{asset('/')}}/images/appstore.png"> </a>
            <a href="#"><img src="{{asset('/')}}/images/playstore.png"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- <section class="submit-application">
  <div class="container">    
      <div class="row">
        <div class="col-md-8 col-md-offset-2">


          <div class="box radius30 text-center">
             <a href="{{url('/tutor/dashboard')}}" class="pull-right"> <i class="mdi mdi-close-circle"></i></a>

            <img class="thkyoulogo" src="{{asset('/')}}/{{asset('/')}}/images/logosm.png">

          <h3 class="text-center">Your application has been received. We will reach out to you via e-mail after assessment process. </h3>

          <div class="app-area">
          <h3>Earn money on the go</h3>

          <a href="#"><img src="{{asset('/')}}/{{asset('/')}}/images/appstore.png"> </a>
          <a href="#"><img src="{{asset('/')}}/{{asset('/')}}/images/playstore.png"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
@endsection