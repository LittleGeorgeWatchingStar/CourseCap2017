@extends('layouts.app')
@section('content')
@include('includes.authTutorHeader')

<main class="theme-blue"> 
<section class="tutore-commitquestion">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8">
        <div class="homeinner box">
          <div class="common-box no-border">
            <div class="social_post">
              <div class="user_pic">
                 <div class="profile_pic"></div>
              </div>
              <div class="post_content"> 
               <h2>
                <span>Mathematics</span><span>|</span><span>Math</span><span>|</span><span>University of Alberta</span>
              </h2>
              <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications whether we're aware of it or not.

              </p>
              <div class="attechment_list">
                <img src="{{asset('/')}}/images/default.png" class="img-responsive center-block">
              </div>
              <div class="post_status">
                <span class="time">
                  <i class="mdi mdi-timer"></i> Aug 12, 2018
                </span>
                
                <span class="earned pull-right">
                  YOUR EARN: <span>$15.54</span>
                </span>
              </div>
              </div>
             </div>
            </div>
          </div>

          <div class="box radius30 p-30">
           <form>          
            <h3>Submit Answer </h3>
            <div class="form-group">              
              <textarea class="form-control" rows="8" placeholder="Explain Your explanation"></textarea>
            </div>

            <div class="pull-left submit-links">
              <a href="#"><img  src="{{asset('/')}}/images/bitmap.png" alt="image"></a>
              <a href="#"><img  src="{{asset('/')}}/images/pi_icon.png" alt="image"></a>
              <a href="#"><img  src="{{asset('/')}}/images/attecment.png" alt="image"></a>
            </div>
            <button type="button" class="btn btn-info btn-lg btn-rounded pull-right">Post</button>
          </form>
          <div class="clearfix"></div>  
        </div>

        <div class="box radius30 p-30">
          <h3>Talk to Student</h3>

          <ul class="chat">
            <li class="left clearfix">
              <span class="chat-img pull-left">
                <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
              </span>
              <div class="chat-body clearfix">
                 <p>
                   Hello
                 </p>
              </div>
            </li>
            <li class="right clearfix">
              <span class="chat-img pull-right">
                 <img src="http://placehold.it/50/FA6F57/fff&amp;text=ME" alt="User Avatar" class="img-circle">
              </span>
              <div class="chat-body clearfix">
                   <p>Hello </p>
               </div>
               </li>    
            </ul>

            <div class="chat-footer">
              <div class="row">
                
                <div class="col-md-11 col-sm-10">
                  <textarea class="form-control"></textarea>
                </div>
                <div class="col-sm-2 col-md-1">
                  <button type="button" class="btn btn-primary btn-cilcle">
                    <i class="mdi mdi-send"></i> 
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>       
      

      <div class="col-md-4">       
        <div class="box sidebar submit-time"> 
          <h3>You need to Submit  answer before:</h3>
           <h2 class="text-center"> Aug 25/2018 </h2>
           <h2 class="text-center"> 19:30</h2>
        </div>
        <div class="box sidebar">
            <h2>MY TASKS</h2>
            <ul class="question-list list-unstyled">
             <li><a href="{{url('tutor/committtedtasks')}}"><img src="{{asset('/')}}/images/commit-b.png"> Committed Tasks (2)</a></li>
              <li><a href="{{url('tutor/completed')}}"><img src="{{asset('/')}}/images/allque-b.png"> History</a></li>
               <li><a href="{{url('tutor/disputes')}}"><img src="{{asset('/')}}/images/disputes-b.png"> Disputes </a></li>
            </ul>         
        </div>

         <div class="new-que sidebar">
          <h4>New Questions</h4>
           <ul class="list-inline">
            <li>Mathematics</li>
            <li>MATH 1203</li>
          </ul>
          <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications </p>

          <img src="{{asset('/')}}/images/attech.png">
          <a href="#" class="loadmore pull-right">View</a>
         </div>
        
      </div>
    </div>
  </div>
</section>
</main>


@endsection