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
                <div class="profile_pic">
                  <img src="{{ $question['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
                </div>
              </div>
              <div class="post_content">
                <h2> <span>{{$question['subject']}}</span><span>|</span><span>{{$question['course']}}</span><span>|</span><span>{{$question['school']}}</span> </h2>
                <p>{{$question['content']}}</p>
                <!--rwerwrwerwer-->
                @if(count($question['images'])>1)
                 <div class="attechment_list">
                @if($question['images'])
                  @foreach ($question['images'] as $image)
                   
                      <div class="post_attachment">
                        <a target="_blank" href="{{$image}}"><img class="img-responsive" src="{{$image}}"></a>
                      </div>
                  
                        @endforeach
                @endif
                </div>
                @else
                @if($question['images'])
                  @foreach ($question['images'] as $image)
                    <div class="full-attectment">
                        <a target="_blank" href="{{$image}}"><img class="img-responsive center-block" src="{{$image}}"></a>
                    </div>
                  @endforeach
                @endif
                @endif
                
                    @if($question['files'])
                     <div class="post-btnattachment">
                      @foreach ($question['files'] as $file)
                        <a target="_blank" href="{{$file}}"><i class="mdi mdi-file"></i> Document</a>
                      @endforeach
                      </div>
                    @endif
                  <div class="post_status">
                    <span class="solve">
                      <i class="mdi mdi-check"></i> {{$status[$question['status']]}}
                    </span>
                    <span class="payat">
                      <i class="mdi mdi-wallet"></i> ${{$question['earn']/100}}
                    </span>
                    <span class="earned pull-right">
                     <a href="{{url('/student/questiondetail/'.($dispute['question_id']))}}" target="_blank" id="upt_triger"  class="btn btn-redborder btn-rounded">Question Detail</a>
                   </span>
                  </div>
                </div>
              </div>
            </div>         
        <div class="common-box box radius30 p-30">
          <div class="social_post">
             <div class="post_content">
               <h2>Dispute Details:</h2>
               <p>{{$dispute['dispute']['content']}}</p>
              <div class="attechment_list">
               
                  @if(!empty($dispute['dispute']['files']))
                   <div class="post-btnattachment">
                      @foreach($dispute['dispute']['files'] as $file)
                          <a target="_blank" href="{{$file}}"><i class="mdi mdi-file"></i> Document</a>
                      @endforeach
                </div>
                @endif
              </div>
              <div class="post_status">
                <span class="report-name">
                  <i class="report-img">
                    <img src="{{ $student['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}">
                  </i>
                  {{$student['username']}}
                </span>
                <span class="time pull-right">
                  Report time: {{date('h:i:s',$dispute['dispute']['time'])}}  {{date('M,d,Y',$dispute['dispute']['time'])}}
                </span>
              </div>
             </div>
            </div>
          </div>
           @if(!empty($dispute['reply']))
          <div class="common-box box radius30 p-30">
            <div class="social_post">              
              <div class="post_content">
               <h2>Tutor’s Appeal:</h2>

              <p>{{$dispute['reply']['content']}}</p>
              <div class="attechment_list">
                @if(!empty($dispute['reply']['files']))
                <div class="post-btnattachment">
                  @foreach($dispute['reply']['files'] as $file)
                    <a target="_blank" href="{{$file}}"><i class="mdi mdi-file"></i> Document</a>
                  @endforeach
                </div>
                @endif
              </div>
              <div class="post_status">
                <span class="report-name">
                  <i class="report-img">
                    <img src="{{ $tutor['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}">
                  </i>
                  {{$tutor['username']}}
                </span>

                <span class="time pull-right">
                  Report time: {{date('h:i:s',$dispute['reply']['time'])}}  {{date('M,d,Y',$dispute['reply']['time'])}}
                </span>
              </div>
             </div>
            </div>
          </div>
        @endif

        @if(!empty($dispute['system']))
           <div class="common-box box radius30 p-30">
            <div class="social_post">              
              <div class="post_content">
               <h2>SYSTEM</h2>
              <p>{{$dispute['system']['content']}}</p>
              @if(isset($dispute['system']['refund']))
              <h2>Refunded: ${{$dispute['system']['refund']/100}}</h2>
              @endif
              <div class="post_status">

                <span class="time pull-right">
                  Report time: {{date('h:i:s',$dispute['system']['time'])}}  {{date('M,d,Y',$dispute['system']['time'])}}
                </span>
              </div>
             </div>
            </div>
          </div>
        @else
        
          @endif

            
      </div>

      @include('student.sidebar')
     </div>     
    </div>
  </div>
</section>

@endsection