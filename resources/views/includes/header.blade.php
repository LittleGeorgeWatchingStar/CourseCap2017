<header>
  <nav class="navbar navbar-default home-navbar nav-transparent @if(isset($userdetails)) nav-red-transperant @endif">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="images/logo.png"></a>
      </div>
<!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  @if(isset($userdetails))
		  <ul class="nav navbar-nav navbar-right">          
          <li class="dropdown notis"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-bell"></i></a>
            <div class="dropdown-menu">
              <h6>Notification</h6>
              <ul>
                @if($message)
                @foreach($message as $mess)
                @if(isset($mess['type']))
                <li>
                  <a href="@if(!isset($mess['dispute_id'])){{url('/student/questiondetail/'.($mess['qid']))}} @else {{url('/student/disputedisplay/'.base64_encode($mess['dispute_id']))}} @endif">
                    <div class="drop-content">
                      <b>{{$mess['username']}}</b> {{$usermessageflag[$mess['type']]}} <b>{{$mess['subject_name']}} </b></div>
                    <div class="datetime">
                      <i class="mdi mdi-format-float-right"></i>
                      <span class="date">{{date('m/d/Y',$mess['time'])}}</span>
                      <span class="time"> {{date('h:i',$mess['time'])}}  </span>
                    </div>  
                  </a>
                </li>
                @endif
                @endforeach
                @endif
                
            </ul>
          </div>
          </li>
          <li class="dropdown user-drop"><a href="#" class="userdrop dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="drop-pic">
            @if(!empty($userdetails['avatar']))
              <img src="{{$userdetails['avatar']}}"> </span></a>
            @else
             <img src="{{asset('/')}}/images/avatar.png"> </span></a>
             @endif
           <ul class="dropdown-menu">
		   <li><a href="{{url('/student/my?req=4')}}">My Dashboard</a></li>
            <li><a href="{{url('student/myprofile')}}"> Profile</a></li>
           <!--  <li><a href="{{url('student/myprofile')}}">Edit Profile</a></li> -->
            <li><a href="{{url('/logout')}}">Log Out</a></li>            
          </ul>
          </li>
         </ul>
	  @else
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" data-toggle="modal" data-target="#loginmodal">LOG IN</a></li>
          <li data-toggle="modal" data-target="#signupmodal"><a href="#">SIGN UP</a></li>
          <li><a href="{{route('becomeTutor')}}" class="tutor-link">BECOME A TUTOR</a></li>
         </ul>
		@endif
      </div>
    </div><!-- /.container-fluid -->
  </nav>
</header>