@extends('layouts.app')
@section('content')
@include('includes.header')
<section class="banner">
        <div id="full_loader" style="display:none" class="full-loader">
    <div class="lds-css ng-scope">
      <div style="width:100%;height:100%" class="lds-wedges">
        <div><div><div></div> </div><div><div></div></div><div><div></div></div><div><div></div> </div>
        </div>
      </div>
    </div>
</div>
  <div class="overlay"></div> 
  <div class="container">
    <div class="banner-heading">
      <h1>Get tutor helps on your homework</h1>
      <h3 style="font-size:20px; font-weight:normal;">Focus on high school and university topic </h3>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-3">        
        <div class="panel panel-danger">         
          <div class="panel-body">
            <form action="{{url('student/postquestion')}}" >
              <div class="form-group">
                <select name="subject" class="form-control">
                  <option>Select Subject</option>
                  @foreach ($subjects as $subject)
                          <option value="{{ $subject['id'] }}">{{ $subject['name'] }}</option>
                        @endforeach
                </select>                
              </div>
              <div class="btn-action">
				@if(session('uid'))
					<button type="submit"  class="btn btn-danger btn-rounded"> ASK NOW</button>
				@else
               <button type="button" data-toggle="modal" data-target="#loginmodal" class="btn btn-danger btn-rounded"> ASK NOW</button>
				@endif
            </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="banner-bottom" id="myHeader">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-10 col-sm-offset-1">
          <div class="form-group">
            <button class="btn-search"> <i class="fa fa-search"></i></button>
            <input type="text" id="search_home" name="" class="form-control" placeholder="Search homework answer">
           <button id="clear_search_home" class="btn-close"> <i class="fa fa-times"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="homeinner box">
            @foreach ($questions as $question)
               
                  <div  class="common-box">
		  <?php $logurl = session('uid') ? '/student' : ''; ?>
                    <a href="{{  url($logurl.'/questiondetail/'.($question['id']))}}" >  <!-- url_lujin -->
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
                          <?php
                         
                            if(isset($question['files']))
                            {
                             
                              $file = $question['files'];
                              if ((strpos($file, 'jpg') !== false)||(strpos($file, 'png') !== false))
                              {
                              ?>
                                <div class="attechment_list">
                                  <div class="post_attachment">
                                    <img class="img-responsive" src="<?php echo $file; ?>">
                                  </div>
                                 
                                </div>
                              <?php
                              }
                            }
                          ?>
                        <div class="post_status">
                          <span class="solve">
                            <i class="mdi mdi-check"></i> {{$status[$question['status']]}}
                          </span>
                           <span class="viewed">
                            <i class="mdi mdi-eye-outline"></i> {{$question['view']}} Views
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
        </div>
      </div>
      <div class="col-md-4">
        <div class="box sidebar text-center">
          <h4>Need a hand with homework</h4>
		  @if(session('uid'))
          <a href="{{url('/student/postquestion')}}" class="btn btn-danger btn-rounded btn-block">
            ASK YOUR HOMEWORK
          </a>
		  @else
			<a href="#" data-toggle="modal" data-target="#loginmodal" class="btn btn-danger btn-rounded btn-block">
            ASK YOUR HOMEWORK
          </a>
		  @endif
        </div>
        <div class="box sidebar">
          <h4 class="sidebar-heading">SUBJECTS</h4>
          <ul class="sidebar-links">
            <li><a class="side_bar_filter" data="" href="javascript:void(0)">All Subjects</a></li>
             @foreach ($subjects as $subject)
             <li><a class="side_bar_filter" data="{{$subject['id']}}" href="javascript:void(0)">{{ $subject['name'] }}</a></li>
             @endforeach  
             <input type="hidden" value="" name="pkk" id="filter_subject">       
          </ul>
        </div>

        <div class="box sidebar">
          <h4 class="sidebar-heading">STATS</h4>
          <table class="table state-table">
            <tr>
              <td>Total Memebers</td>
              <td class="text-right">{{$sidebar['members']}}</td>
            </tr>
            <tr>
              <td>Total Questions</td>
              <td class="text-right">{{$sidebar['questions']}}</td>
            </tr>
            <tr>
              <td>Visitors Today</td>
              <td class="text-right">{{$sidebar['visited']}}</td>
            </tr>
          </table>
        </div>
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
      url: '{{url("/ajax_load_dashboard")}}',
      type: 'POST',
      data: {
              temp:$(this).attr('data'),
              subject:$('#filter_subject').val(),
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
$(document).on('click','#clear_search_home', function(event) {
$('#search_home').val('');
});
  $(document).on('click','.side_bar_filter', function(event) {
    $("#full_loader").show();
    $('#filter_subject').val($(this).attr('data'));
    $('#search_home').val('');
    $.ajax({
      url: '{{url("/ajax_load_dashboard")}}',
      type: 'POST',
      data: {
              temp:"",
              subject:$(this).attr('data'),
            },
    })
    .done(function(response) {
      $('.load_more').remove();
      $('.homeinner').html(response);
       $("#full_loader").hide();
    })
    .fail(function() {
      toastr.error("Server not Respond");
      $("#full_loader").hide();
    })
  });
  
  $('#search_home').keypress(function(event) {
    if (event.keyCode == 13 || event.which == 13) {
        event.preventDefault();
        $('#filter_subject').val('');
    $("#full_loader").show();
    $.ajax({
      url: '{{url("/ajax_load_dashboard_key")}}',
      type: 'POST',
      data: {
              key:$(this).val(),
              temp:"",
            },
    })
    .done(function(response) {
      $('.load_more').remove();
      $('.homeinner').html(response);
       $("#full_loader").hide();
    })
    .fail(function() {
      toastr.error("Server not Respond");
      $("#full_loader").hide();
    }) 
    }
  });

  $(document).on('click','.load_more_key', function(event) {
    $("#full_loader").show();
    $.ajax({
      url: '{{url("/ajax_load_dashboard_key")}}',
      type: 'POST',
      data: {
              temp:$(this).attr('data'),
              key:$('#search_home').val(),
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