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
<section class="tutore-commitquestion">
  <div class="container">
    <div class="row">
      <div class=" load_ajax col-md-8 col-sm-8">
    @if($questions)
      @foreach($questions as $question)      
          <div class="common-box box radius30 p-30">
          <a href="{{url('tutor/disputedisplay/'.base64_encode($question['id']))}}" >
            <div class="social_post">
              <div class="user_pic">
                 <div class="profile_pic">
                    <img src="{{ $question['creator']['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
                 </div>
              </div>
              <div class="post_content">
                 <h2> <span>{{$question['subject']}}</span><span>|</span><span>{{$question['course']}}</span><span>|</span><span>{{$question['school']}}</span> </h2>
              <p>
                  {{strlen($question['content']) > 210 ? substr($question['content'], 0, 210) .' ...' : $question['content']}}
              </p>
              <div class="attechment_list">
                
              </div>
              <div class="post_status">
                <span class="time">
                <span class="dispute"> Dispute </span> On {{date('M , d, Y',$question['created'])}}
                </span>
                 <span class="time">
                  {{$disput_status[$question['status']]}}
                </span>
              </div>
             </div>
            </div>
          </a>
          </div>
        @endforeach  
               @if($page) 
                         <div class="common-box load_more_div text-center">
                <button data="{{$page}}" class="loadmore load_more">Load More</button>
              </div>
              @endif
   @else
   <div class="alert alert-danger">There is No Dispute</div> 
   @endif    
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
      url: '{{url("tutor/ajax_load_dispute")}}',
      type: 'POST',
      data: {
              temp:$(this).attr('data'),
            },
    })
    .done(function(response) {
      $('.load_more_div').remove();
      $('.load_ajax').append(response);
       $("#full_loader").hide();
    })
    .fail(function() {
      toastr.error("Server not Respond");
      $("#full_loader").hide();
    })
  });

  
  
</script>
@endsection