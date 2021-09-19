@extends('layouts.app')

@section('content')
@include('includes.authStudentHeader')
<section class="padding_content">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8">
        <div class="homeinner box question_detail_box">
          <div class="common-box">
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
                @if(is_array($question['images']) && count($question['images'])>1)
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
                				<?php 
                					//	Modified by vadik
                					if($question['files'])
                					{
                						$extraimages = array();
                						$extrafiles = array();
                						foreach ($question["files"] as $file) {
                							if ((strpos($file, 'jpg') !== false)||(strpos($file, 'png') !== false))
                								array_push($extraimages, $file);
                							else
                								array_push($extrafiles, $file);
                						}
                						if(count($extraimages) > 1)
                						{
	                						?>
	                							<div class="attechment_list">
	                								<?php
	                									foreach ($extraimages as $img) {
	                									?>
	                										<div class="post_attachment">
	                											<a target="_blank" href="<?php echo $img; ?>"><img class="img-responsive" src="<?php echo $img; ?>"></a>
	                										</div>
	                									<?php
	                									}
	                								?>?
	                							</div>
	                						<?php
	                					} //lujin
	                					if(count($extraimages) == 1)
                						{
                							?>
                							<div class="full-attectment">
												<a target="_blank" href="<?php echo $extraimages[0]; ?>"><img class="img-responsive center-block" src="<?php echo $extraimages[0]; ?>"></a>
											</div>
											<?php
                						}
                						if(count($extrafiles) > 0)
                						{
                							?>
                							<div class="post-btnattachment">
	                							<?php
	                							foreach ($extrafiles as $ff) 
	                							{
	                								?>
	                									<a target="_blank" href="<?php echo $ff; ?>"><i class="mdi mdi-file"></i> Document</a>
													<?php
	                							}
	                							?>
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
									
								</div>
							</div>
						</div>
					</div>
				</div>
				@if($answered_user)
				<div class="homeinner box question_detail_box answer_box">
					<div class="common-box">
						<h2 class="answer_title">Answers</h2>
						<div class="social_post">
							<div class="user_pic">
								<div class="profile_pic">
									<img src="{{ $answered_user['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
								</div>
							</div>
              <div class="post_content">
								<h2 class="ans_posted_user_title">@if(isset($answered_user['profile']['first_name']) && isset($answered_user['profile']['last_name'])) {{$answered_user['profile']['first_name']}} {{$answered_user['profile']['last_name']}} @else {{'user'}} @endif</h2>
                <p class="answer_posted_date">posted {{date('m-d-Y',$question['answer']['answered_at'])}}</p>              
								@if($unlock)
                <p>{{$question['answer']['content']}}</p>
                @if(count($question['answer']['images'])>1)
								<div class="attechment_list">
									@if($question['answer']['images'])
									@foreach ($question['answer']['images'] as $image)
									
									<div class="post_attachment">
										<a target="_blank" href="{{$image}}"><img class="img-responsive" src="{{$image}}"></a>
									</div>
									
									@endforeach
									@endif
								</div>
                @else
                @if($question['answer']['images'])
								@foreach ($question['answer']['images'] as $image)
								<div class="full-attectment">
									<a target="_blank" href="{{$image}}"><img class="img-responsive center-block" src="{{$image}}"></a>
								</div>
								@endforeach
                @endif
                @endif

                				<?php 
                					if($question['answer']['files'])
                					{
                						$extraimages = array();
                						$extrafiles = array();
                						foreach ($question['answer']["files"] as $file) {
                							if ((strpos($file, 'jpg') !== false)||(strpos($file, 'png') !== false))
                								array_push($extraimages, $file);
                							else
                								array_push($extrafiles, $file);
                						}
                						if(count($extraimages) > 1)
                						{
	                						?>
	                							<div class="attechment_list">
	                								<?php
	                									foreach ($extraimages as $img) {
	                									?>
	                										<div class="post_attachment">
	                											<a target="_blank" href="<?php echo $img; ?>"><img class="img-responsive" src="<?php echo $img; ?>"></a>
	                										</div>
	                									<?php
	                									}
	                								?>?
	                							</div>
	                						<?php
	                					}
	                					if(count($extraimages) == 1)
                						{
                							?>
                							<div class="full-attectment">
												<a target="_blank" href="<?php echo $extraimages[0]; ?>"><img class="img-responsive center-block" src="<?php echo $extraimages[0]; ?>"></a>
											</div>
											<?php
                						}
                						if(count($extrafiles) > 0)
                						{
                							?>
                							<div class="post-btnattachment">
	                							<?php
	                							foreach ($extrafiles as $ff) 
	                							{
	                								?>
	                									<a target="_blank" href="<?php echo $ff; ?>"><i class="mdi mdi-file"></i> Document</a>
													<?php
	                							}
	                							?>
	                						</div>
	                						<?php
                						}
                					}
                				?>

								<div class="finish-time">
									@if($question['status']=='3' && $unlock)
                  @if(!isset($question['disputeId']))
									<a href="{{url('student/createdispute/'.($question['id']))}}" class="btn btn-danger btn-rounded btn-lg">Create Dispute</a>
									@else
									<a href="{{url('student/disputedisplay/'.($question['disputeId']))}}" class="btn btn-danger btn-rounded btn-lg">View Dispute</a>
                  @endif
									<button type="button" class="btn btn-danger btn-rounded btn-lg" data-toggle="modal" data-target="#review"> Release</button>
									<div class="modal fade reviewmodal" id="review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">      
												<div class="modal-body">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													
													<div class="review-topbar">
														<h4>Leave a review for</h4> <img class="turorimg" src="{{ $answered_user['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}"> <h2>{{$answered_user['profile']['first_name']}} {{$answered_user['profile']['last_name']}}</h2>
													</div>
													
													<div class="review-box">                        
														<div class='rating-stars text-center'>
															<ul id='stars'>
																<li class='star' selected title='Poor' data-value='1'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Fair' data-value='2'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Good' data-value='3'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='Excellent' data-value='4'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
																<li class='star' title='WOW!!!' data-value='5'>
																	<i class='fa fa-star fa-fw'></i>
																</li>
															</ul>
														</div>
													</div>
													<form id="release_answer" action="{{url('student/release')}}" method="post" enctype="multipart/form-data">
														<div class="review-buttons">
															<div class="inputGroup chk-btn">
																<input type="checkbox" id="Fast_Response" name="experience[]" value="Fast Response">
																<label for="Fast_Response">Fast Response</label>
															</div>
															<div class="inputGroup chk-btn">
																<input type="checkbox" name="experience[]" id="Professional" value="Professional">
																<label for="Professional">Professional</label>
															</div> 
															<div class="inputGroup chk-btn">
																<input type="checkbox" name="experience[]" id="Quality_Answer" value="Quality Answer">
																<label for="Quality_Answer">Quality Answer</label>
															</div>
															<div class="inputGroup chk-btn">
																<input type="checkbox" name="experience[]" id="Fast_Completion" value="Fast Completion"><label for="Fast_Completion">Fast Completion</label>
															</div>    
														</div>
														<input type="hidden" id="score" name="score">
														<input type="hidden" name="qid" value="{{$question['id']}}">
														{{csrf_field()}}
														<div class="form-group">
															<textarea class="form-control" required name="review" rows="15" placeholder="Your review is important to us, please leave your review here...<?="\n"?>Tracey is a life-saver! I had been procrastinating with studying for my final exams but finally decided to get some help just 3 days before my first final exam. Tracey helped me so much with my math and sciences courses and I managed to score B+ for math and an A- for science. I will definitely be coming back to Tracey again in the future if I run into trouble with math or science."></textarea>
														</div>
														<div class="form-group text-center">
															<button type="Submit" class="btn btn-danger btn-rounded"> Submit</button>
														</div>
													</form>
												</div>     
											</div>
										</div>
									</div>
									@endif
									
									@else
									<div class="lock_ans_box">
										<div class="lock_box"><button class="btn btn-danger btn-rounded btn-lg"><img src="{{asset('/')}}/images/unlock_icon.png" class="img-responsive">Unlock this answer</button></div>
										
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif  
					
					
					
					@if($answerer && $answerer['email']!="a" && $unlock && !$otherparsson)
					<div class="homeinner box">
						<div class="common-box">
							<div id="chat"></div>
							<h4>Awesome tutor <span class="tutor-pic"><img src="{{ $answerer['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}"></span> <small>{{$answerer['profile']['first_name']}} {{$answerer['profile']['last_name']}} is committed on this question </small></h4>
							<div class="chat-footer">
								<div class="row">                        
									<div class="col-md-11 col-sm-10 col-xs-9">
										<input type="text" id="message" class="form-control"/>
									</div>
									<div class="col-sm-2 col-md-1 col-xs-3 chat-btnbox">
										<button id="send_message" type="button" class="btn btn-danger btn-circle">
											<i class="mdi mdi-send"></i> 
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif    
				</div>
				
				
				
				@include('student.sidebar')    
				
			</div>
		</div>
	</div>
</section>
<div id="full_loader" style="display:none" class="full-loader">
	<div class="lds-css ng-scope">
		<div style="width:100%;height:100%" class="lds-wedges">
			<div><div><div></div> </div><div><div></div></div><div><div></div></div><div><div></div> </div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).on('click', '#send_message', function(event) {
    $("#full_loader").show();
		var msg = $("#message").val();
		if(msg == '' || msg.length==0){
			return false;
		}
		$("#message").val('');
		
		
		$.ajax({
      url: '{{url("send_comment")}}',
      type: 'POST',
      data: {
				message:msg,
			  question: "{{($question_id)}}",
				student_name:"{{($answerer['username'])}}",
				student_email:"{{($answerer['email'])}}",
				flag:"3",
				userAvatarURL: "{{$userdetails['avatar']}}",
			  uid2: "{{$uid2}}"
			  
			},
		})
    .done(function(response) {
			$("#full_loader").hide();
			console.log(response);
      toastr.success("sent successful");
		})
    .fail(function() {
      toastr.error("Server not Respond");
      $("#full_loader").hide();
		})
	});
	$('#message').keypress(function (e) {	
		var key = e.which;		
		if(key == 13) {
			$('#send_message').trigger('click');
		}
	});
  
</script>

<script type="text/javascript">
	$(document).ready(function(){
		
		/* 1. Visualizing things on Hover - See next part for action on click */
		$('#stars li').on('mouseover', function(){
			var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
			
			// Now highlight all the stars that's not after the current hovered star
			$(this).parent().children('li.star').each(function(e){
				if (e < onStar) {
					$(this).addClass('hover');
				}
				else {
					$(this).removeClass('hover');
				}
			});
			
			}).on('mouseout', function(){
			$(this).parent().children('li.star').each(function(e){
				$(this).removeClass('hover');
			});
		});
    
		/* 2. Action to perform on click */
		$('#stars li').on('click', function(){
			var onStar = parseInt($(this).data('value'), 10); // The star currently selected
			var stars = $(this).parent().children('li.star');
			
			for (i = 0; i < stars.length; i++) {
				$(stars[i]).removeClass('selected');
			}
			
			for (i = 0; i < onStar; i++) {
				$(stars[i]).addClass('selected');
			}
			
			// JUST RESPONSE (Not needed)
			var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
			$("#score").val(ratingValue);   
			
		}); 
	});
	
  var loadchat = function () {
		//console.log("{{($question_id)}}");
		$.post( "{{url('/getchat')}}", { question: "{{($question_id)}}" })
	  .done(function( data ) {
			//console.log(data);
			$('#chat').html(data);
		});
	}  
  setInterval(loadchat, 3000);
</script>
@endsection