@extends('layouts.app')
@section('content')
@include('includes.authStudentHeader')
<section class="tutor-question student_myquestion">
  <div class="container">
    <div class="row">
      <div class="col-md-8">        
        <div class="homeinner box">
          <div class="common-box">
            <div class="social_post">
              <div class="user_pic">
                <div class="profile_pic"></div>
              </div>
              <div class="post_content">
                <h2><span>Mathematics</span><span>|</span><span>MATH 1203</span><span>|</span><span>University of Alberta</span> </h2>
                <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications whether we're aware of it or not. </p>
                <div class="attechment_list">
                  <div class="post_attachment"></div>
                    <div class="post_attachment"></div>
                    <div class="post_attachment"></div>
                  </div>
                  <div class="post_status">
                    <span class="answering">
                      <i class="mdi mdi-check"></i> Answering 
                    </span>
                    <span class="viewed">
                      <i class=" mdi mdi-clock-outline"></i> 129 Views
                    </span>
                    <span class="paid">
                      Dispute
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>          
          <div class="homeinner box">
            <div class="common-box">
              <div class="social_post">
                <div class="user_pic">
                  <div class="profile_pic"></div>
                </div>
                <div class="post_content">
                  <h2>tutor’s username</h2>
                  <h4 class="posted">posted MM - DD - YYYY</h4>
                  <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications whether we're aware of it or not.
                  </p>
                  <div class="attechment_list">
                    <div class="post_attachment"></div>
                    <div class="post_attachment"></div>
                    <div class="post_attachment"></div>
                  </div>
                  <div class="clearfix"> 
                    <hr>
                  </div>
                  <div class="post_status text-right">
                  <button type="button" class="btn btn-danger btn-rounded btn-lg" data-toggle="modal" data-target="#review"> Release</button>
                </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="homeinner box">
            <div class="common-box">
              <h4>Awesome tutor <span class="tutor-pic"><img src="{{asset('/')}}/images/avatar.png"></span> <small>username is committed on this question </small></h4>
              <div class="chat-footer">
                <div class="row">                        
                  <div class="col-md-11 col-sm-10">
                    <textarea class="form-control"></textarea>
                  </div>
                  <div class="col-sm-2 col-md-1">
                    <button type="button" class="btn btn-danger btn-circle">
                      <i class="mdi mdi-send"></i> 
                    </button>
                  </div>
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

         
        <div class="new-que">  
        <h4>New Questions</h4>            
          <ul class="list-inline">
            <li>Mathematics</li>
           <li>MATH 1203</li>
          </ul>
          <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications</p>
          <a href="#"><img src="{{asset('/')}}/images/attech.png"></a>
          <a href="#" class="loadmore pull-right">View</a>
        </div>
          <hr>
        <div class="new-que">
          <h4>New Questions</h4>
          <ul class="list-inline">
            <li>Mathematics</li>
            <li>MATH 1203</li>
          </ul>
          <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications</p>
          <a href="#"><img src="{{asset('/')}}/images/attech.png"></a>
          <a href="#" class="loadmore pull-right">View</a>
        </div>
          <hr>
        <div class="new-que">
          <h4>New Questions</h4>
          <ul class="list-inline">
            <li>Mathematics</li>
            <li>MATH 1203</li>
          </ul>
          <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications</p>
          <a href="#"><img src="{{asset('/')}}/images/attech.png"></a>
          <a href="#" class="loadmore pull-right">View</a>
        </div>
          <hr>        
      </div>
    </div>
  </div>
</section>

@endsection