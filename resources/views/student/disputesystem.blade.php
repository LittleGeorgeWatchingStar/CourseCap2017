@extends('layouts.app')
@section('content')
@include('includes.authStudentHeader')

<section class="tutor-question student_myquestion">
  <div class="container">
    <div class="row">
      <div class="col-md-8">          
         <div class="common-box box radius30 p-30">
          <div class="social_post">
            <div class="user_pic">
              <div class="profile_pic"></div>
            </div>
            <div class="post_content">
              <h2>Dispute Details:</h2>
              <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications whether we're aware of it or not.</p>
              <div class="attechment_list">
                 <h4>Files:</h4>
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
              </div>
              <div class="post_status">
                <span class="report-name">
                  <i class="report-img">
                    <img src="{{asset('/')}}/images/avatar.png">
                  </i>
                  Jenna Mckenzie
                </span>

                <span class="time pull-right">
                  Report time:  13 : 13: 59 Aug 12, 2018
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
               <h2>Tutor’s Appeal:</h2>

              <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications whether we're aware of it or not.</p>
              <div class="attechment_list">
                <h4>Files:</h4>
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
                <div class="post_attachment"></div>
              </div>
              <div class="post_status">
                <span class="report-name">
                  <i class="report-img">
                    <img src="{{asset('/')}}/images/avatar.png">
                  </i>
                  Jenna Mckenzie
                </span>

                <span class="time pull-right">
                  Report time:  13 : 13: 59 Aug 12, 2018
                </span>
              </div>
             </div>
            </div>
          </div>
 
        <div class="common-box box radius30 p-30">
          <h4>System Message:</h4>
            <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications whether we're aware of it or not.</p>
            <h4>Student Refund: $5</h4>

             <hr>
          
                <span class="pull-right">
                  Report time:  13 : 13: 59 Aug 12, 2018
                </span>
            
              <div class="clearfix"></div>
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
  </div>
</section>

@endsection