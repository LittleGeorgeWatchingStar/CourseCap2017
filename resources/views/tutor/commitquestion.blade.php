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
				<div class="col-md-8 col-sm-8">
					<div class="homeinner box">
						<div class="common-box">
							<div class="social_post">
								<div class="user_pic">
									<div class="profile_pic">
										<img src="{{ $question['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
									</div>
								</div>
								<div class="post_content">
									<h2>
										<span>{{$question['subject']}}</span><span>|</span><span>{{$question['course']}}</span><span>|</span><span>{{$question['school']}}</span> 
									</h2>
									<p>{{$question['content']}}
									</p>
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
										<a class="blue" target="_blank" href="{{$file}}"><i class="mdi mdi-file"></i> Document</a>
										@endforeach
									</div>
									@endif
									
									<div class="post_status">
										@if($answered_user)
										<span class="solve">
											<i class="mdi mdi-check"></i> {{$status[$question['status']]}}
										</span>
										@endif
										<span class="time">
											<i class="mdi mdi-timer"></i> {{date('M , d, Y',$question['created'])}}
										</span>
										<span class="earned pull-right">
											YOUR EARN: <span>$ {{$question['earn']/100}}</span>
										</span>
									</div>
									<div class="finish-time">
										@if(!$answered_user)
										<div class="form-group"> 
											<label>you need to finish in: </label> {{$question['timeHour']}} hours
										</div> 
										@endif
										@if($question['status']=='1')  
										<button type="link" id="commit_question" data="{{$question['id']}}" class="btn btn-info btn-rounded">Commit Task</button>
										@endif
										@if($question['status']=='2') 
										<button type="link" id="del_commit_question" data="{{$question['id']}}" class="btn btn-info btn-rounded">Uncommit Task</button>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					@if($unlock_for_answ==1)
					<div class="box radius30 p-30">
						<form id="answer_question" action="{{url('tutor/answerquestion_submit')}}" method="post" enctype="multipart/form-data" >          
							<h3>Submit Answer </h3>
							<div class="form-group">              
								<textarea id="content" name="content" class="form-control" rows="8" placeholder="Explain Your explanation"></textarea>
							</div>
							
							<div class="form_bottom_icon">
								<a id="f_x" href="javascript:void(0)"><img src="{{asset('/')}}/images/bitmap.png"></a><a id="pi_icon" data-toggle="collapse" data-target="#my_action_class" href="javascript:void(0)"><img src="{{asset('/')}}/images/pi_icon.png"></a>
								<div id="trigger_file" class="file_icon"></div>
							</div>
							<input type="hidden" value="{{$question['id']}}" name="qi">
							<input type="hidden" value = "{{($question['nickname'])}}" name ="studentname">
							<input type="hidden" value = "{{($question['useremail'])}}" name ="studentemail">
							<input type="hidden" value = "{{($question['id'])}}" name="questionId">
							<input type="hidden" value = "1" name="flag">
							<!-- insert by lujin -->


							<button type="Submit" class="btn btn-info btn-lg btn-rounded pull-right">Post</button>
							<br>
							
							<div id="added_image" class="">
								
							</div>
							<div id="added_file">
								
							</div>
							
							<div id="attach_hidden">
								
							</div> 
						</form>
						<div class="collapse" id="my_action_class">
							<ul id="keyboard">
								<li class="letter mat_symbol" data-ref="" data="&forall;">&forall;</li>
								<li class="letter mat_symbol" data-ref="" data="&part;">&part;</li>
								<li class="letter mat_symbol" data-ref="" data="&empty;">&empty;</li>
								<li class="letter mat_symbol" data-ref="" data="&nabla;">&nabla;</li>
								<li class="letter mat_symbol" data-ref="" data="&isin;">&isin;</li>
								<li class="letter mat_symbol" data-ref="" data="&notin;">&notin;</li>
								<li class="letter mat_symbol" data-ref="" data="&ni;">&ni;</li>
								<li class="letter mat_symbol" data-ref="" data="&prod;">&prod;</li>
								<li class="letter mat_symbol" data-ref="" data="&sum;">&sum;</li>
								<li class="letter mat_symbol" data-ref="" data="&Alpha;">&Alpha;</li>
								<li class="letter mat_symbol" data-ref="" data="&Beta;">&Beta;</li>
								<li class="letter mat_symbol" data-ref="" data="&Gamma;">&Gamma;</li>
								<li class="letter mat_symbol" data-ref="" data="&Delta;">&Delta;</li>
								<li class="letter mat_symbol" data-ref="" data="&Epsilon;">&Epsilon;</li>
								<li class="letter mat_symbol" data-ref="" data="&Zeta;">&Zeta;</li>
								<li class="letter mat_symbol" data-ref="" data="&minus;">&minus;</li>
								<li class="letter mat_symbol" data-ref="MINUS-OR-PLUS SIGN" data="∓">∓</li>
								<li class="letter mat_symbol" data-ref="" data="/">/</li>
								<li class="letter mat_symbol" data-ref="" data="*">*</li>
								<li class="letter mat_symbol" data-ref="" data="+">+</li>
								<li class="letter mat_symbol" data-ref="" data="&radic;">&radic;</li>
								<li class="letter mat_symbol" data-ref="CUBE ROOT" data="∛">∛</li>
								<li class="letter mat_symbol" data-ref="FOURTH ROOT" data="∜">∜</li>
								<li class="letter mat_symbol" data-ref="" data="&infin;">&infin;</li>
								<li class="letter mat_symbol" data-ref="Right angle" data="∟">∟</li>
								<li class="letter mat_symbol" data-ref="" data="&ang;">&ang;</li>
								<li class="letter mat_symbol" data-ref="" data="∥">∥</li>
								<li class="letter mat_symbol" data-ref="NOT PARALLEL TO" data="∦">∦</li>
								<li class="letter mat_symbol" data-ref="" data="∩">∩</li>
								<li class="letter mat_symbol" data-ref="" data="∪">∪</li>
								<li class="letter mat_symbol" data-ref="" data="∫">∫</li>
								<li class="letter mat_symbol" data-ref="" data="π">π</li>
								<li class="letter mat_symbol" data-ref="DOUBLE INTEGRAL" data="∬">∬</li>
								<li class="letter mat_symbol" data-ref="TRIPLE INTEGRAL" data="∭">∭</li>
								<li class="letter mat_symbol" data-ref="CONTOUR INTEGRAL" data="∮">∮</li>
								<li class="letter mat_symbol" data-ref="SURFACE INTEGRAL" data="∯">∯</li>
								<li class="letter mat_symbol" data-ref="VOLUME INTEGRAL" data="∰">∰</li>
								<li class="letter mat_symbol" data-ref="TILDE OPERATOR" data="∼">∼</li>
								<li class="letter mat_symbol" data-ref="MINUS TILDE" data="≂">≂</li>
								<li class="letter mat_symbol" data-ref="ASYMPTOTICALLY EQUAL TO" data="≃">≃</li>
								<li class="letter mat_symbol" data-ref="NOT ASYMPTOTICALLY EQUAL TO" data="≄">≄</li>
								<li class="letter mat_symbol" data-ref="APPROXIMATELY EQUAL TO" data="≅">≅</li>
								<li class="letter mat_symbol" data-ref="ALMOST EQUAL TO" data="≈">≈</li>
								<li class="letter mat_symbol" data-ref="ALL EQUAL TO" data="≌">≌</li>
								<li class="letter mat_symbol" data-ref="" data="≠">≠</li>
								<li class="letter mat_symbol" data-ref="" data="≤">≤</li>
								<li class="letter mat_symbol" data-ref="" data="≥">≥</li>
								<li class="letter mat_symbol" data-ref="QUESTIONED EQUAL TO" data="≟">≟</li>
								<li class="letter mat_symbol" data-ref="" data="Ψ">Ψ</li>
								<li class="letter mat_symbol" data-ref="" data="Ω">Ω</li>
								<li class="letter mat_symbol" data-ref="" data="δ">δ</li>
								<li class="letter mat_symbol" data-ref="" data="ε">ε</li>
								<li class="letter mat_symbol" data-ref="" data="ζ">ζ</li>
								<li class="letter mat_symbol" data-ref="" data="η">η</li>
								<li class="letter mat_symbol" data-ref="" data="θ">θ</li>
								<li class="letter mat_symbol" data-ref="" data="μ">μ</li>
								<li class="letter mat_symbol" data-ref="" data="σ">σ</li>
							</ul>
						</div>
						<form id="add_attach" action="{{url('/create_attachement')}}" method="post" enctype="multipart/form-data">
							<input style="display:none" id="attachement_source" type="file" name="attachement[]" class="input_file" multiple >
						</form>
						<div class="clearfix"></div>  
					</div>
					
					@endif
					
					
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
									<h2 class="ans_posted_user_title">{{$answered_user['profile']['first_name']}} {{$answered_user['profile']['last_name']}}</h2>
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
									@if($question['answer']['files'])
									<div class="post-btnattachment">
										@foreach ($question['answer']['files'] as $file)
										<a class="blue" target="_blank" href="{{$file}}"><i class="mdi mdi-file"></i> Document</a>
										@endforeach
									</div>
									@endif
									@else
									<div class="lock_box"><button class="btn btn-danger btn-rounded btn-lg"><img src="{{asset('/')}}/images/unlock_icon.png" class="img-responsive pull-left">Unlock this answer</button></div>
									@endif
									
								</div>
							</div>
						</div>
					</div> 
					@endif 
					@if($answered_user && $unlock && $question['status']=='3')
					<div class="box radius30 p-30">
				
						<form id="answer_question" action="{{url('tutor/answerquestion_submit')}}" method="post" enctype="multipart/form-data" >          
							<h3>Update Answer </h3>
							<div class="form-group">              
								<textarea id="content" name="content" class="form-control" rows="8" placeholder="Explain Your explanation">{{$question['answer']['content']}}</textarea>
							</div>
							
							<div class="form_bottom_icon">
								<a id="f_x" href="javascript:void(0)"><img src="{{asset('/')}}/images/bitmap.png"></a><a id="pi_icon" data-toggle="collapse" data-target="#my_action_class" href="javascript:void(0)"><img src="{{asset('/')}}/images/pi_icon.png"></a>
								<div id="trigger_file" class="file_icon"></div>
							</div>
							<input type="hidden" value="{{$question['id']}}" name="qi">
							<input type="hidden" value = "{{($question['nickname'])}}" name ="studentname">
							<input type="hidden" value = "{{($question['useremail'])}}" name ="studentemail">
							<input type="hidden" value = "{{($question['id'])}}" name="questionId">
							<input type="hidden" value = "1" name="flag">
							<button type="Submit" class="btn btn-info btn-lg btn-rounded pull-right">Update</button>
							<br>
							
							<div id="added_image" class="">
								@if($question['answer']['images'])
								@foreach ($question['answer']['images'] as $image)               
                <div data="div_{{$image}}" class="attachment-box"><button data="{{$image}}" class="btn-remove remove_this"><i class="mdi mdi-close"></i></button><a target="_blank" href="{{$image}}"><img class="img-responsive" src="{{$image}}"></a></div> 
								@endforeach
								@endif                                   
							</div>
							<div id="added_file">
								@if($question['answer']['files'])
								@foreach ($question['answer']['files'] as $file)
								<div data="div_{{$file}}" class="attachments-files"><button data="{{$file}}" class="btn-remove remove_this"><i class="mdi mdi-close"></i></button><a target="_blank" href="{{$file}}"><i class="mdi mdi-file"></i> Document</a></div>
								@endforeach
								@endif
							</div>
							
							<div id="attach_hidden">
								@if($question['answer']['images'])
								@foreach ($question['answer']['images'] as $image)
								<input type="hidden" data="inp_{{$image}}" value="{{$image}}" name="images[]">
								@endforeach
								@endif
								
								@if($question['answer']['files'])
								@foreach ($question['answer']['files'] as $file)
								<input data="inp_{{$file}}" type="hidden" value="{{$file}}" name="files[]">
								@endforeach
								@endif
								
							</div> 
						</form>
						<div class="collapse" id="my_action_class">
							<ul id="keyboard">
								<li class="letter mat_symbol" data-ref="" data="&forall;">&forall;</li>
								<li class="letter mat_symbol" data-ref="" data="&part;">&part;</li>
								<li class="letter mat_symbol" data-ref="" data="&empty;">&empty;</li>
								<li class="letter mat_symbol" data-ref="" data="&nabla;">&nabla;</li>
								<li class="letter mat_symbol" data-ref="" data="&isin;">&isin;</li>
								<li class="letter mat_symbol" data-ref="" data="&notin;">&notin;</li>
								<li class="letter mat_symbol" data-ref="" data="&ni;">&ni;</li>
								<li class="letter mat_symbol" data-ref="" data="&prod;">&prod;</li>
								<li class="letter mat_symbol" data-ref="" data="&sum;">&sum;</li>
								<li class="letter mat_symbol" data-ref="" data="&Alpha;">&Alpha;</li>
								<li class="letter mat_symbol" data-ref="" data="&Beta;">&Beta;</li>
								<li class="letter mat_symbol" data-ref="" data="&Gamma;">&Gamma;</li>
								<li class="letter mat_symbol" data-ref="" data="&Delta;">&Delta;</li>
								<li class="letter mat_symbol" data-ref="" data="&Epsilon;">&Epsilon;</li>
								<li class="letter mat_symbol" data-ref="" data="&Zeta;">&Zeta;</li>
								<li class="letter mat_symbol" data-ref="" data="&minus;">&minus;</li>
								<li class="letter mat_symbol" data-ref="MINUS-OR-PLUS SIGN" data="∓">∓</li>
								<li class="letter mat_symbol" data-ref="" data="/">/</li>
								<li class="letter mat_symbol" data-ref="" data="*">*</li>
								<li class="letter mat_symbol" data-ref="" data="+">+</li>
								<li class="letter mat_symbol" data-ref="" data="&radic;">&radic;</li>
								<li class="letter mat_symbol" data-ref="CUBE ROOT" data="∛">∛</li>
								<li class="letter mat_symbol" data-ref="FOURTH ROOT" data="∜">∜</li>
								<li class="letter mat_symbol" data-ref="" data="&infin;">&infin;</li>
								<li class="letter mat_symbol" data-ref="Right angle" data="∟">∟</li>
								<li class="letter mat_symbol" data-ref="" data="&ang;">&ang;</li>
								<li class="letter mat_symbol" data-ref="" data="∥">∥</li>
								<li class="letter mat_symbol" data-ref="NOT PARALLEL TO" data="∦">∦</li>
								<li class="letter mat_symbol" data-ref="" data="∩">∩</li>
								<li class="letter mat_symbol" data-ref="" data="∪">∪</li>
								<li class="letter mat_symbol" data-ref="" data="∫">∫</li>
								<li class="letter mat_symbol" data-ref="" data="π">π</li>
								<li class="letter mat_symbol" data-ref="DOUBLE INTEGRAL" data="∬">∬</li>
								<li class="letter mat_symbol" data-ref="TRIPLE INTEGRAL" data="∭">∭</li>
								<li class="letter mat_symbol" data-ref="CONTOUR INTEGRAL" data="∮">∮</li>
								<li class="letter mat_symbol" data-ref="SURFACE INTEGRAL" data="∯">∯</li>
								<li class="letter mat_symbol" data-ref="VOLUME INTEGRAL" data="∰">∰</li>
								<li class="letter mat_symbol" data-ref="TILDE OPERATOR" data="∼">∼</li>
								<li class="letter mat_symbol" data-ref="MINUS TILDE" data="≂">≂</li>
								<li class="letter mat_symbol" data-ref="ASYMPTOTICALLY EQUAL TO" data="≃">≃</li>
								<li class="letter mat_symbol" data-ref="NOT ASYMPTOTICALLY EQUAL TO" data="≄">≄</li>
								<li class="letter mat_symbol" data-ref="APPROXIMATELY EQUAL TO" data="≅">≅</li>
								<li class="letter mat_symbol" data-ref="ALMOST EQUAL TO" data="≈">≈</li>
								<li class="letter mat_symbol" data-ref="ALL EQUAL TO" data="≌">≌</li>
								<li class="letter mat_symbol" data-ref="" data="≠">≠</li>
								<li class="letter mat_symbol" data-ref="" data="≤">≤</li>
								<li class="letter mat_symbol" data-ref="" data="≥">≥</li>
								<li class="letter mat_symbol" data-ref="QUESTIONED EQUAL TO" data="≟">≟</li>
								<li class="letter mat_symbol" data-ref="" data="Ψ">Ψ</li>
								<li class="letter mat_symbol" data-ref="" data="Ω">Ω</li>
								<li class="letter mat_symbol" data-ref="" data="δ">δ</li>
								<li class="letter mat_symbol" data-ref="" data="ε">ε</li>
								<li class="letter mat_symbol" data-ref="" data="ζ">ζ</li>
								<li class="letter mat_symbol" data-ref="" data="η">η</li>
								<li class="letter mat_symbol" data-ref="" data="θ">θ</li>
								<li class="letter mat_symbol" data-ref="" data="μ">μ</li>
								<li class="letter mat_symbol" data-ref="" data="σ">σ</li>
							</ul>
						</div>
						<form id="add_attach" action="{{url('/create_attachement')}}" method="post" enctype="multipart/form-data">
							<input style="display:none" id="attachement_source" type="file" name="attachement[]" class="input_file" multiple >
						</form>
						<div class="clearfix"></div>  
					</div>
					
					@endif
					
					@if($answered_user || $unlock_for_answ==1)
					
					<div class="homeinner box">
						
						<div class="common-box">
							<div id="chat"></div>
							<h4>Awesome tutor <span class="tutor-pic"><img src="{{ $answered_user['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}"></span> <small> </small></h4>
							<div class="chat-footer">
								<div class="row">                        
									<div class="col-md-11 col-sm-10 col-xs-9">
										<input type="text" id="message" class="form-control"/>
									</div>
									<div class="col-sm-2 col-md-1 col-xs-3 chat-btnbox">
										<button id="send_message" type="button" class="btn btn-info btn-circle">
											<i class="mdi mdi-send"></i> 
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
				</div>
				
				@include('tutor.sidebar')
			</div>
		</div>
	</section>
</main>
<!-- Modal -->
<div class="modal fade " id="incomplete" tabindex="-1" role="dialog" aria-labelledby="stepmodelLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center">
      	 <button type="button" class="close" data-dismiss="modal" style="font-size: 50px; margin-top: -18px; margin-right: -5px;"><span aria-hidden="true">&times;</span></button>   
       	<div style="margin-top :50px; margin-bottom:20px">
<h5>Sorry, you haven't been approved. </h5>
    <p>we are still reviewing your application. After your account is approved,</br> you will have full authority to answer questions from the hub. </p>
    <p style="margin-bottom: 50px;">Thanks for your patience.</p>
    <a href="{{url('/tutor/tutorprofile')}}" class="btn btn-info btn-rounded">Upgrade my application</a>
</div>
            
   		
 	</div>
 	</div>
 	</div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">

  $(document).on('click', '#commit_question', function(event) {
  	@if(session('credentialStatus')=='0' && $userdetails['incomplete']!=1)
			$('#incomplete').modal('show')	;
			return false;	
          
    @endif
    $("#full_loader").show();
    $.ajax({
      url: '{{url("tutor/commit")}}',
      type: 'POST',
      dataType: "json",
      data: {
				temp:$(this).attr('data'),
				role:0,
			},
		})
    .done(function(response) {
      if(response.status==0){
        toastr.success("commited sucessfully");
        location.reload();
				}else{
        toastr.error(response.message);
        if(response.status==413 || response.status==414){
          toastr.info("Please Complete Your Profile");
          @if(session('credentialStatus')=='0' && $userdetails['incomplete']!=1)
					toastr.error("Profile Not approved");
          @else
					toastr.error("{{$userdetails['incompleteReason']['content']}}");
          @endif
			startTimer(5);
        	
          
          return false;
				}
				$("#full_loader").hide();
			}
		})
    .fail(function() {
      toastr.error("Server not Respond");
      $("#full_loader").hide();
		})
	});
  
  $(document).on('click', '#del_commit_question', function(event) {
    $("#full_loader").show();
    $.ajax({
      url: '{{url("tutor/commit")}}',
      type: 'POST',
      dataType: "json",
      data: {
				temp:$(this).attr('data'),
				role:1,
			},
		})
    .done(function(response) {
      if(response.status==0){
        toastr.success("uncommited sucessfully");
        location.reload();
				}else{
        toastr.error(response.message);
        $("#full_loader").hide();
			}
      
      
		})
    .fail(function() {
      toastr.error("Server not Respond");
      $("#full_loader").hide();
		})
	});
	
	$("#answer_question").validate({
		errorPlacement: function(error, element) {error.insertAfter(element);
		},
		ignore: [], 
		rules: {
			content:"required"
		},
		error: function(data){
			toster.error("please fill required field");
		},
		submitHandler: function(form) {
			if ($("#answer_question").valid()) {
				$("#full_loader").show();
				var post_url = $(form).attr("action"); //get form action url
				var request_method = $(form).attr("method"); //get form GET/POST method
				var form_data = new FormData(form); //Encode form elements for submission
				
				$.ajax({
					url : post_url,
					type: request_method,
					data : form_data,
					contentType: false,
					mimeType:"multipart/form-data",
					dataType: "json",
					cache: false,
					contentType: false,
					processData: false
					}).done(function(response){ //
					if(response.status=='0'){
						
						toastr.success("Answered successfully");
						location.reload(true);
					}
					else{
						toastr.error(response.message);
						$("#full_loader").hide(); 
					} 
				});
			}
		}
	});
	
	$(document).on('click', '.mat_symbol', function(event) {
		var append=$("#content").val();
		$("#content").val(append+' '+$(this).attr('data'));
	});
	
	$(document).on('click', '#f_x', function(event) {
		var append=$("#content").val();
		$("#content").val(append+' f (x)');
	});
	
	$("#trigger_file").click(function(){
    $("#attachement_source").trigger("click");
	});
	
	$(document).on('change', '#attachement_source', function(event) {
		var target = event.target || event.srcElement;
		  
		  if (target.value.length == 0) {
			return false;
		  } 
		var inp = document.getElementById('attachement_source');
		if(inp.files.length>5){
			toastr.error("In one Time allow only 5 attachement");
			return false;
		}
		$("#full_loader").show();
		
		var formdata = $('#add_attach')[0];
		var post_url = $(formdata).attr("action"); //get form action url
		var request_method = $(formdata).attr("method"); //get form GET/POST method
		var form_data = new FormData(formdata); //Encode form elements for submission
		
		$.ajax({
			url : post_url,
			type: request_method,
			data : form_data,
			contentType: false,
			mimeType:"multipart/form-data",
			dataType: "json",
			cache: false,
			contentType: false,
			processData: false
			}).done(function(response){ 
			if(response.status=='0'){
				if(response.img_count>0){  
					$.each(response.images,function(){
						$('#attach_hidden').append('<input type="hidden" data="inp_'+this+'" value="'+this+'" name="images[]">');  
						$('#added_image').append('<div data="div_'+this+'" class="attachment-box"><button data="'+this+'" class="btn-remove remove_this"><i class="mdi mdi-close"></i></button><a target="_blank" href="'+this+'"><img class="img-responsive" src="'+this+'"></a></div>') 
					});
				}
				if(response.fil_count>0){ 
					$.each(response.files,function(){
						$('#attach_hidden').append('<input data="inp_'+this+'" type="hidden" value="'+this+'" name="files[]">');
						$('#added_file').append('<div data="div_'+this+'" class="attachments-files"><button data="'+this+'" class="btn-remove remove_this"><i class="mdi mdi-close"></i></button><a target="_blank" href="'+this+'"><i class="mdi mdi-file"></i> Document</a></div>');
					});
				} 
				
			}
			else{
				toastr.error(response.error);
				$("#full_loader").hide();
			}
			$("#full_loader").hide();
		}).fail(function() {				
				$("#full_loader").hide();
			});
	});
	$(document).on('click', '.remove_this', function(event) {
		var value=$(this).attr('data');
		$('*[data="div_'+value+'"]').remove();
		$('*[data="inp_'+value+'"]').remove();
	});
	
</script>
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
				userAvatarURL: "{{$userdetails['avatar']}}",
				student_name:"{{($question['nickname'])}}",
				student_email:"{{($question['useremail'])}}",
				flag:"2",
			  uid2: "{{$question['uid']}}"
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
		});
		
	});
  $('#message').keypress(function (e) {	
		var key = e.which;		
		if(key == 13) {
			$('#send_message').trigger('click');
		}
	});
	var loadchat = function () {
		$.post( "{{url('/getchat')}}", { question: "{{($question_id)}}" })
	  .done(function( data ) {
			$('#chat').html(data);
		});
	}  
  setInterval(loadchat, 3000);
  function startTimer(duration) {
        var timer = duration, minutes, seconds;
        var end =setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);
			
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
			
            //$('#wait_time').html(minutes + ":" + seconds);
			
            if (--timer < 0) {
				window.location.href="{{url('/tutor/tutorprofile')}}"; 
                //window.location.href="{{url('student/dashboard')}}";
                clearInterval(end);
			}
		}, 1000);
	}
	
  //loadchat();
  
  
</script>

@endsection