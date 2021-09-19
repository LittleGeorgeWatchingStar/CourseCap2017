@if(!empty($result))
	<?php $mycolor = (session('role') == 1) ? '55C1E7' : 'FA6F57'; 
		$yourcolor = session('role') == 1 ? 'FA6F57' : '55C1E7';  
	?>
	
	<ul class="chat">
		@foreach($result as $row)
		@if($row['uID'] == session('uid'))
        <li class="right clearfix">
          <span class="chat-img pull-right">
		 
            <img src="{{ $row['userAvatarURL'] or  asset('/').'/images/student-profile-avatar.png' }}" alt="User Avatar" class="img-circle" />
		 
          </span>
          <div class="chat-body ">
            <!--<div class="header">
              <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
              <strong class="pull-right primary-font">Bhaumik Patel</strong>
            </div>-->
            <p>{{$row['textContent']}}</p>
          </div>
        </li>
         @else  
			 <li class="left clearfix">
          <span class="chat-img pull-left">
            <img src="{{ $row['userAvatarURL'] or  asset('/').'/images/student-profile-avatar.png' }}" alt="User Avatar" class="img-circle" />
          </span>
          <div class="chat-body ">
            <!--<div class="header">
              <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
              <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
            </div>-->
            <p>{{$row['textContent']}}</p>
          </div>
        </li>
        
        @endif 
       @endforeach 
            
       
      </ul> 
 @endif    