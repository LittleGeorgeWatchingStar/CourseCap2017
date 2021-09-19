<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="box sidebar">
    <div class="user-sidebar">
      <div class="user_pic">
        <div class="profile_pic">
           <img src="{{ $userdetails['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
        </div>
      </div>
      <div class="user-name ">{{$userdetails['username']}}</div>
    </div>
    <div class="question-list"> 
      <hr>
      <h2>MY QUESTION</h2>
      <ul class="question-list list-unstyled">
        <li><a href="{{url('student/my/?req=4')}}"><img src="{{asset('/')}}/images/open-question.png"> Open Question ({{$userdetails['sidebar']['opening']}})</a></li>
        <li><a href="{{url('student/my?req=2')}}"><img src="{{asset('/')}}/images/all-questions.png"> History	 {{$userdetails['sidebar']['finished'] > 0 ? '('.$userdetails['sidebar']['finished'].')' : ''}}</a></li>
      </ul>            
    </div>
  </div>   
  <a href="{{url('student/sharelink')}}">     
    <div class="red_box">
      TELL YOUR FRIENDS<br>ABOUT US
   </div>
  </a>
</div>        