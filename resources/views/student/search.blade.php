@extends('layouts.app')
@section('content')
@include('includes.authStudentHeader')

<section class="tutor-question student_myquestion">
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
        <input type="hidden" value={{$se_key}} id="se_key" name="se_key">
        <input type="hidden" value={{$se_subject}} id="se_subject" name="se_subject">
        <div class="box p-30 radius30">
          <h1>Need a Hand With homework?</h1>
          <p>Leave Problems behind, Enjoy Your day!</p>
          <a href="{{url('student/postquestion')}}" class="btn btn-danger btn-lg btn-rounded">Ask Your Homework</a>
        </div>
        @if($questions)
        <div id="question_div">
          @foreach ($questions as $question)
           
                <div  class="homeinner box">
                  <div class="common-box">
                  <a href="{{url('student/questiondetail/'.($question['id']))}}">
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
                            <!--  <div class="post_attachment">
                                <img class="img-responsive" src="{{$question['image']}}">
                              </div> -->




                              <?php 
                                if ((strpos($question['image'], 'png') !== false) || (strpos($question['image'], 'jpeg') !== false))
                                { ?>
                                 <div class="post_attachment">
                                       <img class="img-responsive" src="{{$question['image']}}">
                                  </div>
                                <?php }
                                else
                                { ?>
                                  <div class="post-btnattachdment">
                                      <a target="_blank" href="{{$question['image']}}" style="color:white"><i class="mdi mdi-file"></i> Document</a>
                                  </div>
                                <?php }
                              ?>
                              
                              <style>
                                .post-btnattachdment{
                                      font-size: 18px;
                                      padding: 10px 10px;
                                      background: #ed5857;
                                      border: solid 1px #d46c6c;
                                      width: 192px;
                                      display: block;
                                      text-align: center;
                                      margin-right: 5px;
                                      margin-bottom: 10px;
                                      float: left;
                                      border-radius: 35px;
                                      color: white !important;
                                }
                              </style>




                             
                            </div>
                          @endif
                        <div class="post_status">
                          <span class="solve">
                            <i class="mdi mdi-check"></i> {{$status[$question['status']]}}
                          </span>
                          <span class="viewed">
                            <i class=" mdi mdi-clock-outline"></i>  {{$question['view']}} Views
                          </span>
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
          @else
          <div class="alert alert-danger">There is No Question</div>
          @endif
       
      </div>
      @include('student.sidebar')
         
      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')
<script type="text/javascript">
  $(document).on('click','.load_more', function(event) {
    $("#full_loader").show();
    $.ajax({
      url: '{{url("student/ajax_load_dashboard")}}',
      type: 'POST',
      data: {
              temp:$(this).attr('data'),
              subject:$('#se_subject').val(),
              key:$('#se_key').val()
            },
    })
    .done(function(response) {
      $('.load_more').remove();
      $('#question_div').append(response);
       $("#full_loader").hide();
    })
    .fail(function() {
      toastr.error("Server not Respond");
      $("#full_loader").hide();
    })
  });

  
  
</script>
@endsection