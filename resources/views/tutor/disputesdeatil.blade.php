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
					<div class="common-box box radius30 p-30">
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
									
									<span class="time">
										<i class="mdi mdi-timer"></i> {{date('M , d, Y',$question['created'])}}
									</span>
									<span class="earned pull-right">
										<a href="{{url('/tutor/questiondetail/'.base64_encode($dispute['question_id']))}}" target="_blank" id="upt_triger"  class="btn btn-blueborder btn-rounded">Question Detail</a>
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
										<a class="blue" target="_blank" href="{{$file}}"><i class="mdi mdi-file"></i> Document</a>
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
                    <a class="blue" target="_blank" href="{{$file}}"><i class="mdi mdi-file"></i> Document</a>
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
          @else
          @if(empty($dispute['system']))
					<div class="box radius30 p-30">
						<form id="reply_dispute" action="{{url('tutor/reply_submit')}}" method="post" enctype="multipart/form-data" >          
							<h3>Submit Response </h3>
							<div class="form-group">              
								<textarea id="content" name="content" class="form-control" rows="8" placeholder="Write your appeal here..."></textarea>
							</div>
							
							<div class="form_bottom_icon">
								<a id="f_x" href="javascript:void(0)"><img src="{{asset('/')}}/images/bitmap.png"></a><a id="pi_icon" data-toggle="collapse" data-target="#my_action_class" href="javascript:void(0)"><img src="{{asset('/')}}/images/pi_icon.png"></a>
								<div id="trigger_file" class="file_icon"></div>
							</div>
							<input type="hidden" value="{{$dispute_id}}" name="temp">
							{{csrf_field()}}
							<button type="Submit" class="btn btn-info btn-lg btn-rounded pull-right">Submit</button>
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
					<div class="common-box box radius30 p-30 notice">
						<h4>Notice*:</h4>
						<p>You need to reply the dispute within 24 hours; otherwise, system will automatically determine ….</p>
					</div>
					@endif
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
	
	$("#reply_dispute").validate({
		errorPlacement: function(error, element) {error.insertAfter(element);
		},
		ignore: [], 
		rules: {
			content:"required",
		},
		error: function(data){
			toster.error("please fill required field");
		},
		submitHandler: function(form) {
			if ($("#reply_dispute").valid()) {
				form.submit();
			}
			else{
				toastr.error("Error occure while submitting dispute");
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
						$('#attach_hidden').append('<input type="hidden" data="inp_'+this+'" value="'+this+'" name="files[]">');  
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
@endsection
