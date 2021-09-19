@extends('layouts.app')
@section('content')
@include('includes.authStudentHeader')

<section class="tutore-commitquestion">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="box p-30 radius30">
          <h1>Need a Hand With homework?</h1>
          <p class="leave-problem">Leave Problems behind, Enjoy Your day!</p>
          <button type="button" class="btn btn-danger btn-lg btn-rounded">Ask Your Homework</button>
        </div>
        <div class="common-box box radius30 p-30">
          <div class="social_post">
            <div class="user_pic">
              <div class="profile_pic"></div>
            </div>
            <div class="post_content">
              <h2> <span>Mathematics</span><span>|</span><span>Math</span><span>|</span><span>University of Alberta</span> </h2>
              <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications whether we're aware of it or not.  </p>
              <div class="attechment_list">
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
              </div>
              <div class="post_status">
                <span class="completed"> <i class="mdi mdi-check"></i>Completed </span>
                <span class="time"> <i class="mdi mdi-timer"></i> Aug 12, 2018 </span>
                <span class="earned"> Paid </span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="common-box box radius30 p-30">
          <div class="social_post">
            <div class="user_pic">
              <div class="profile_pic"></div>
            </div>
            <div class="post_content">
              <h2> <span>Mathematics</span><span>|</span><span>Math</span><span>|</span><span>University of Alberta</span></h2>
              <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications whether we're aware of it or not.  </p>
              <div class="attechment_list">
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
              </div>
              <div class="post_status">
                <span class="completed"><i class="mdi mdi-check"></i> Completed </span>
                <span class="time"> <i class="mdi mdi-timer"></i> Aug 12, 2018</span>
                <span class="earned">  Paid </span>
              </div>
            </div>
          </div>
        </div>       
      </div>

      <div class="col-md-4">
        <div class="box sidebar">
          <div class="user-sidebar">
            <div class="user_pic">
              <div class="profile_pic">
              </div>
            </div>
            <div class="user-name ">
              UserName
            </div>
          </div>
          <div class="question-list"> 
            <hr>
            <h2>MY QUESTION</h2>
            <ul class="question-list list-unstyled">
              <li><img src="{{asset('/')}}/images/open-question.png"> Open Question (2)</li>
              <li><img src="{{asset('/')}}/images/all-questions.png"> History</li>
            </ul>            
          </div>
        </div>        
        <div class="red_box">
          TELL YOUR FRIENDS<BR>ABOUT US
        </div>        
      </div>
    </div>
  </div>
</section>

@endsection