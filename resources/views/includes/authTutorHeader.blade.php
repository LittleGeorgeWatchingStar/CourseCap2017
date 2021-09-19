<header>
  <nav class="navbar navbar-default nav-blue-transperant custom-nav" id="myHeader">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
       <!--  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> -->
        <a class="navbar-brand" href="{{url('/tutor/dashboard')}}"><img src="{{asset('/')}}/images/logo-white.png"></a>
      </div>
      <div class=" navbar-collapse" id="bs-example-navbar-collapse-1">
         <form method="get" action="{{url('/tutor/search')}}" class="navbar-form navbar-left hidden-xs">
          <div class="form-group">
            <button type="submit" class="btn-search"><i class="mdi mdi-magnify"></i></button>
             <input type="text" class="form-control" name="key" placeholder="Search">
          </div>
          
        </form>

        <ul class="nav navbar-nav navbar-right">          
          <li class="dropdown notis"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-bell"></i></a>
            <div class="dropdown-menu">
              <h6>Notification</h6>
              <ul>
              @if($message)
                @foreach($message as $mess)
                @if(isset($mess['type']))
                <li>
                  <a href="@if(!isset($mess['dispute_id'])){{url('/tutor/questiondetail/'.($mess['qid']))}} @else {{url('/tutor/disputedisplay/'.base64_encode($mess['dispute_id']))}} @endif">
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
           </span></a>
           <ul class="dropdown-menu">
            <li><a href="{{url('tutor/dashboard')}}">Dashboard</a></li>
            <li><a href="{{url('tutor/tutorprofile')}}">Profile</a></li>
            <li><a href="{{url('/logout')}}">Log Out</a></li>            
          </ul>
          </li>
         </ul>
      </div>
    </div><!-- /.container-fluid -->
  </nav>
</header>
