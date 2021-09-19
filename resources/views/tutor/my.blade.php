@extends('layouts.app')
@section('content')
@include('includes.authTutorHeader')
<main class="theme-blue"> 
      <div id="full_loader" style="display:none" class="full-loader">
    <div class="lds-css ng-scope">
      <div style="width:100%;height:100%" class="lds-wedges">
        <div><div><div></div> </div><div><div></div></div><div><div></div></div><div><div></div> </div>
        </div>
      </div>
    </div>
</div>
<section class="tutore-home">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8">

      <div  class="homeinner box">
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
                          <span class="solve">
                            <i class="mdi mdi-check"></i> {{$status[$question['status']]}}
                          </span>
                          <span class="time">
                            <i class="mdi mdi-timer"></i> {{date('M , d, Y',$question['created'])}}
                          </span>
                          <span class="earned pull-right">
                             YOUR EARN: <span>$ {{$question['earn']/100}}</span>
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
			  <div  class="common-box">
          <div class="alert alert-danger">There is No Question</div>
		  </div>
          @endif
           
         </div>
 </div>
@include('tutor.sidebar')
    </div>
  </div>
</section>
</main>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).on('click','.load_more', function(event) {
    $("#full_loader").show();
    $.ajax({
      url: '{{url("tutor/ajax_load_my")}}',
      type: 'POST',
      data: {
              temp:$(this).attr('data'),
              req:{{$req}}
            },
    })
    .done(function(response) {
      $('.load_more_div').remove();
      $('.homeinner').append(response);
       $("#full_loader").hide();
    })
    .fail(function() {
      toastr.error("Server not Respond");
      $("#full_loader").hide();
    })
  });
  
</script>
@endsection