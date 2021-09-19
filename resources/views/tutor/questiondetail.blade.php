@extends('layouts.app')
@section('content')
@include('includes.authStudentHeader')

<section class="padding_content">
  <div id="full_loader" style="display:none" class="full-loader">
    <div class="lds-css ng-scope">
      <div style="width:100%;height:100%" class="lds-wedges">
        <div><div><div></div> </div><div><div></div></div><div><div></div></div><div><div></div> </div>
        </div>
      </div>
    </div>
</div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8">
        <div class="homeinner box question_detail_box">
          <div class="common-box">
            <div class="social_post">
              <div class="user_pic">
                <div class="profile_pic">
                  <img src="{{ $question['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
                </div>
              </div>
              <div class="post_content">
                <h2> <span>{{$question['subject']}}</span><span>|</span><span>{{$question['course']}}</span><span>|</span><span>{{$question['school']}}</span> </h2>
                <p>{{$question['content']}}</p>
                @if($question['images'])
                  @foreach ($question['images'] as $image)
                          <div class="attechment_list">
                            <div class="post_attachment">
                              <img class="img-responsive" src="{{$image}}">
                            </div>
                           
                          </div>
                        @endforeach
                @endif
                <div class="post_status">
                  <span class="solve">
                    <i class="mdi mdi-check"></i> {{$status[$question['status']]}}
                  </span>
                  <span class="viewed">
                    <i class="mdi mdi-eye-outline"></i> {{$question['view']}} Views
                  </span>
                  <span class="payat">
                    <i class="mdi mdi-wallet"></i> ${{$question['earn']/100}}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @if($answered_user)
        <div class="homeinner box question_detail_box answer_box">
          <div class="common-box">
            <h2 class="answer_title">Answers</h2>
            <div class="social_post">
              <div class="user_pic">
                <div class="profile_pic">
                  <img src="{{ $answered_user['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
                </div>
              </div>
              <div class="post_content">
              <h2 class="ans_posted_user_title">{{$answered_user['profile']['first_name']}} {{$answered_user['profile']['last_name']}}</h2>
              <p class="answer_posted_date">posted {{date('m-d-Y',$question['answer']['answered_at'])}}</p>
              <div class="lock_ans_box">
                @if($unlock)
              <p>{{$question['answer']['content']}}</p>
                  @if($question['answer']['images'])
                      @foreach ($question['answer']['images'] as $image)
                              <div class="attechment_list">
                                <div class="post_attachment">
                                  <img class="img-responsive" src="{{$image}}">
                                </div>
                               
                              </div>
                            @endforeach
                    @endif
                @else
               <div class="lock_box"><button class="btn btn-danger btn-rounded btn-lg"><img src="{{asset('/')}}/images/unlock_icon.png" class="img-responsive pull-left">Unlock this answer</button></div>
               @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif  
              @if($answered_user && $unlock)
                <div class="homeinner box">
                  <div class="common-box">
                    <h4>Awesome tutor <span class="tutor-pic"><img src="{{ $answered_user['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}"></span> <small>{{$answered_user['profile']['first_name']}} {{$answered_user['profile']['last_name']}} is committed on this question </small></h4>
                    <div class="chat-footer">
                      <div class="row">                        
                        <div class="col-md-11 col-sm-10">
                          <textarea id="message" class="form-control"></textarea>
                        </div>
                        <div class="col-sm-2 col-md-1">
                          <button id="send_message" type="button" class="btn btn-danger btn-circle">
                            <i class="mdi mdi-send"></i> 
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
          </div>
          


          <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                    </ul> 
                 @endif    
    </div>

    <div class="col-sm-4">          
      <div class="box sidebar">
        <h4>Need a hand with homework?</h4>
       <a href="{{url('student/postquestion')}}" class="btn btn-danger btn-lg btn-rounded">Ask Your Homework</a>
      </div>
      
      <h4 class="heading-question">Question in your school</h4>
        <div class="new-que ">
          <ul class="list-inline">
            <li>Mathematics</li>
            <li>MATH 1203</li>
          </ul>
          <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications </p>

          <a href="#"><img src="{{asset('/')}}/images/attech.png"></a>
          <a href="#" class="loadmore pull-right">View</a>
        </div>
        <hr>
        <div class="new-que ">              
          <ul class="list-inline">
            <li>Mathematics</li>
            <li>MATH 1203</li>
          </ul>
          <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications </p>
          <a href="#"><img src="{{asset('/')}}/images/attech.png"></a>
          <a href="#" class="loadmore pull-right">View</a>
        </div>
        <hr>
        <div class="new-que ">
          <ul class="list-inline">
            <li>Mathematics</li>
            <li>MATH 1203</li>
          </ul>
          <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications </p>

          <a href="#"><img src="{{asset('/')}}/images/attech.png"></a>
          <a href="#" class="loadmore pull-right">View</a>
        </div>
        <hr>
        <div class="new-que ">
          <ul class="list-inline">
            <li>Mathematics</li>
            <li>MATH 1203</li>
          </ul>
          <p>If you look hard enough, you'll see math emerge from some of the most unlikely places. The fact is, we all use math in everyday applications </p>

          <a href="#"><img src="{{asset('/')}}/images/attech.png"></a>
          <a href="#" class="loadmore pull-right">View</a>
          </div>
          <hr>
      </div>
    </div>
  </div>
</section>

@endsection
