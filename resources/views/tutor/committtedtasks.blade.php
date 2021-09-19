@extends('layouts.app')
@section('content')
@include('includes.authTutorHeader')

<main class="theme-blue"> 
<section class="tutore-commitquestion">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8">       
          <div class="common-box box radius30 p-30">
            <div class="social_post">
              <div class="user_pic">
                 <div class="profile_pic"></div>
              </div>
              <div class="post_content">
               <h2><a href="{{url('tutor/answerquestions')}}"><span>Mathematics</span><span>|</span><span>Math</span><span>|</span><span>University of Alberta</span></a></h2>
              <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications whether we're aware of it or not.  </p>
              <div class="attechment_list">
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
              </div>
                <div class="post_status">
                <span class="inprogress">
                 <i class="mdi mdi-check"></i> In progress
                </span>                
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

          <div class="common-box box radius30 p-30">
            <div class="social_post">
              <div class="user_pic">
                 <div class="profile_pic"></div>
              </div>
              <div class="post_content">
               <h2><a href="{{url('tutor/answerquestions')}}"><span>Mathematics</span><span>|</span><span>Math</span><span>|</span><span>University of Alberta</span></a></h2>
              <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications whether we're aware of it or not.  </p>
              <div class="attechment_list">
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
              </div>
              <div class="post_status">
                <span class="inprogress">
                 <i class="mdi mdi-check"></i> In progress
                </span> 
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

          <div class="profile-progess">
            <div><label>Level 1:</label> <span class="pull-right">5/25</span></div>
            <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
              <span class="sr-only">60% Complete</span>
            </div>
          </div>
          </div>

          <div class="question-list">
            <ul class="list-unstyled">
              <li><img src="{{asset('/')}}/images/pending-b.png">
             Pending: $100.00</li>
              <li><img src="{{asset('/')}}/images/balance-b.png">
             Balance $100.00</li>
            </ul>            
          </div>          
            <button type="button" data-toggle="modal" data-target="#withdrawl" class="btn btn-block btn-lg btn-outline-info">Withdrawal</button>
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
          <a href="#"><img src="{{asset('/')}}/images/attech.png"></a>
          <a href="#" class="loadmore pull-right">View</a>
        </div>        
      </div>
    </div>
  </div>
</section>
</main>

@endsection