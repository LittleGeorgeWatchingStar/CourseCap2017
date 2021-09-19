@if($questions)
        <div id="question_div">
          @foreach ($questions as $question)
                <div  class="homeinner box">
                  <div class="common-box">
                    <a href="{{url('student/questiondetail/'.($question['id']))}}">
                    <div class="social_post">
                      <div class="user_pic">
                        <div class="profile_pic">
                          <img src="{{ $userdetails['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
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
                          <span class="solve">
                            <i class="mdi mdi-check"></i> {{$status[$question['status']]}}
                          </span>
                          <span class="viewed">
                            <i class=" mdi mdi-clock-outline"></i>  {{$question['view']}} Views
                          </span>
                          @if(isset($question['disputeId']) && $question['status']!=4 && $question['disputeId']!="")
                          <a target="_blank" href="{{url('student/disputedisplay/'.base64_encode($question['disputeId']))}}" class="btn btn-danger btn-rounded btn-lg">View Dispute</a>
                          @endif
                         <!--  <span class="paid">
                            Paid . Dispute
                          </span> -->
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                </div>
             @endforeach
         </div>
           @if($last_id)
          <div class="common-box text-center">
            <button data="{{$last_id}}" class="loadmore load_more">Load More</button>
          </div>
           
           @endif
          @endif