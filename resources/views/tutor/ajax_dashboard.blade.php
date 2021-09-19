              @if($questions)
               @foreach ($questions as $question)
               
                  <div  class="common-box">
                    <a href="{{url('tutor/questiondetail/'.($question['id']))}}" >
                    <div class="social_post">
                      <div class="user_pic">
                        <div class="profile_pic">
                          <img src="{{ $question['creator']['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
                        </div>
                      </div>
                      <div class="post_content">
                        <h2> <span>{{$question['subject']}}</span><span>|</span><span>{{$question['course']}}</span><span>|</span><span>{{$question['school']}}</span> </h2>
                        <p>{{strlen($question['content']) > 210 ? substr($question['content'], 0, 210) .' ...' : $question['content']}}</p>
                        @if($question['image'])
                            <div class="attechment_list">
                              <div class="post_attachment">
                                <img class="img-responsive" src="{{$question['image']}}">
                              </div>
                             
                            </div>
                          @endif
                        <div class="post_status">
                          @if($question['status']>1)
                            <span class="solve">
                              <i class="mdi mdi-check"></i> {{$status[$question['status']]}}
                            </span>
                          @else
                            <span class="quequed">
                              <i class="mdi mdi-check"></i> {{$status[$question['status']]}}
                            </span>
                          @endif
                          <span class="time">
                            <i class="mdi mdi-timer"></i>{{date('M , d, Y',$question['created'])}}
                          </span>
                          <span class="earned pull-right">
                             YOUR EARN: <span>$ {{number_format((float)$question['earn']/100, 2, '.', '')}}</span>
                          </span>
                         <!--  <span class="paid">
                            Paid . Dispute
                          </span> -->
                        </div>
                      </div>
                    </div>
                    </a>
                  </div>

               
             @endforeach
                @if($last_id)
                     <div class="common-box load_more_div text-center">
            <button data="{{$last_id}}" class="loadmore load_more">Load More</button>
          </div>
           @endif
          @else
          <div class="alert alert-danger">There is No Question</div>
          @endif