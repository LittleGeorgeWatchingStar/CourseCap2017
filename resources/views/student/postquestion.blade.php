@extends('layouts.app')
@section('content')
@include('includes.authStudentHeader')

<section class="post-question">
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
			<div class="col-md-8">
				<div class="box radius30">
					<form id="post_question" action="{{url('student/postquestion_submit')}}" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Subject <span class="req">*</span></label>
									<select id="subject" name="subject" class="form-control ">
										<option selected value="">Select Subject</option>
										@foreach ($subjects as $subject)
										<option value="{{ $subject['id'] }}">{{ $subject['name'] }}</option>
										@endforeach
									</select>
									@if($errors->has('subject') )
									<label id="emailForgetPassword-error" class="error" for="subject">{{ $errors->first('subject') }}</label>
									@endif
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div id="subject_level" class="form-group">
									
								</div>
								@if($errors->has('academic_name') )
								<label id="emailForgetPassword-error" class="error" for="academic_name">{{ $errors->first('academic_name') }}</label>
								@endif
							</div>
							<div class="col-md-6">
								<div id="subject_types" class="form-group">
									
								</div>
								@if($errors->has('type') )
								<label id="emailForgetPassword-error" class="error" for="type">{{ $errors->first('type') }}</label>
								@endif
							</div>
						</div>
						
						<div id="other_option_div" class="row" style="display:none">
							<div class="col-md-6">
								<div class="form-group">
									<label id="other_option_label" for="Select"></label>
									<input id="otheropt" type="number" class="form-control" placeholder="" name="other_option" value=1>
									@if($errors->has('other_option') )
										<label id="emailForgetPassword-error" class="error" for="other_option">{{ $errors->first('other_option') }}</label>
									@endif
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="Select">Course Number <span class="req">*</span></label>
									<input type="text" style="text-transform:uppercase" class="form-control" placeholder="Enter Course Number" name="course_number">
									@if($errors->has('course_number') )
									<label id="emailForgetPassword-error" class="error" for="course_number">{{ $errors->first('course_number') }}</label>
									@endif
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="textarea">Question Content <span class="req">*</span></label>
									<textarea id="content" class="form-control" name="content" rows="8" 
									placeholder="*Notice:<?="\n"?>If there are more than one question, we will only answer the first one by default. If the questions are very trivial and easy, the questions will be answered at the tutor’s complete discretion. Please note that to ensure that all questions will be answered, you need to select the correct number of sub-questions accordingly."></textarea>
									@if($errors->has('content') )
									<label id="emailForgetPassword-error" class="error" for="content">{{ $errors->first('content') }}</label>
									@endif
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form_bottom_icon">
								<a id="f_x" href="javascript:void(0)"><img src="{{asset('/')}}/images/bitmap.png"></a><a id="pi_icon" data-toggle="collapse" data-target="#my_action_class" href="javascript:void(0)"><img src="{{asset('/')}}/images/pi_icon.png"></a>
									<div id="trigger_file" class="file_icon"></div>
								</div>
								@if($errors->has('attachement') )
								<label id="emailForgetPassword-error" class="error" for="attachement">{{ $errors->first('attachement') }}</label>
								@endif
								
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 ask-btn">
								{{csrf_field()}}
								<input type="submit" class="btn btn-danger btn-rounded btn-lg pull-right" value="ASK HOMEWORK">
							</div>
						</div> <br>
						
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
			</div>
		</div>
		<br>
	</div>
	
	<div id="modal_payment" data-backdrop="static" data-keyboard="false" class="modal payment_modal">
		<div class="modal-dialog" role="document">
			<!-- Modal content -->
			<div class="modal-content">
                <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>       
				</div>
				<div class="modal-body">    
					<div id="cost_cac">
						<form action="/charge" method="post" id="payment-form">
							<div class="form-row">
								<label for="card-element">
									Credit or debit card
								</label>
								<div id="card-element">
									<!-- A Stripe Element will be inserted here. -->
								</div>
								
								<!-- Used to display form errors. -->
								<div id="card-errors" role="alert"></div>
								
								<p class="note">Note： Currency is listed in CAD.<br>
									Transactions have an additional fee of 2.9% + 30¢ for credit card <br>
									To Up first, save on the credit card charge
								</p>
							</div>
							<button class="btn btn-danger btn-rounded">Process</button>
							<img src="{{asset('/')}}/images/cards.png">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>  
	
	<div class="modal fade  costmodal" id="cost_modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>       
				</div>
				<div class="modal-body">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
					
					<h4>Cost</h4>
					<div class="form-group">
						<label>Items</label>
						<div class="form-control-static">
							<span id="my_item"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label>Total Amount </label>
						<div id="total_amount" class="form-control-static">
							
						</div>
					</div>
					
					<hr>
					<table class="table">
						<tr> 
							<td>Balance</td>
							<td class="text-right">@convert($userdetails['balance'])</td>
							<td>
								<div class="radio-red"><input id="bal1" value="balance" type="radio" name="payment_way"><label for="bal1" class="radio-label"></label></div>
							</td>
						</tr>
						<tr>      
							<td> Credit Card </td>
							<td></td>
							<td><div class="radio-red"><input id="bal2" value="stripe" type="radio" checked name="payment_way"><label for="bal2" class="radio-label"></label></div></td>
						</tr>
					</table>                
					<button id="process_payment" class="btn btn-lg btn-danger btn-rounded">PROCESS</button>
					<img class="client-logo" src="{{asset('/')}}/images/cards.png">
				</div>    
			</div>
		</div>
	</div>
</section>

@endsection
@section('scripts')
<script>
	var subject ='{!! json_encode($subjects,true) !!}';
	var parsed = JSON.parse(subject);
	$(document).on('change', '#subject', function(event) {
		var subjectval = $(this).val();
		if($(this).val()==1008){
			$("#other_option_label").html('Number of Words <span class="req">*</span>');
			$("#other_option_div").show();  
		}
		else{
			$("#other_option_label").html('Number of Question <span class="req">*</span>');
			$("#other_option_div").show();  
		}
		var item = {};
		$.each(parsed, function (key, val) {
			if(subjectval == val.id){
				item = val;
			}
		});
		//var item = parsed.filter(item1 => item1.id === $(this).val());
		var Academic_level='<label for="Select">Academic level <span class="req">*</span></label><select name="academic_name" class="form-control ">';
		$.each(item.levels, function (key, val) {
			
			Academic_level=Academic_level+'<option value="'+this.id+'">'+this.name+'</option>'
		});
		Academic_level=Academic_level+'</select>';
		if(Academic_level!=""){
			$("#subject_level").html(Academic_level);
		}
		var Types='<label for="Select">Type<span class="req">*</span></label><select  class="form-control" name="type">';
		$.each(item.types, function (key, val) {
			
			Types=Types+'<option value="'+this.id+'">'+this.name+'</option>'
		});
		Types=Types+'</select>';
		if(Types!=""){
			$("#subject_types").html(Types);
		}
	});
	
	$("#post_question").validate({
		errorPlacement: function(error, element) {error.insertAfter(element);
		},
		ignore: [], 
		rules: {
			subject: "required",
			academic_name: "required",
			type: "required",
			other_option:"required",
			course_number:"required",
			content:"required"
		},
		error: function(data){
			toster.error("please fill required field");
		},
		submitHandler: function(form) {
			if ($("#post_question").valid()) {
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
					if(response.error==""){
						if(response.status=='0'){
					/*		if(response.order_id!=""){
								user_id = response.user_id;
								order_id = response.order_id;
								question_id=response.q_id;
								total=0;
								if(response.cost.message.total!=0){
									total=(response.cost.message.total)/100;
								}
								var get_subject=$( "#subject option:selected" ).text();
								var get_level=$( "#subject_level select option:selected" ).text();
								var get_type=$( "#subject_types select option:selected" ).text();
								var otheropt=$("#otheropt").val();
								$('#my_item').html(get_subject+' - '+get_level+' - '+get_type+' X'+otheropt);
								$('#total_amount').html('$ '+total);
								$('#cost_modal').modal('show');
								$("#full_loader").hide();
								
							}*/
							//else{
								question_id=response.q_id;
								toastr.success("Published Successful");
								window.location.href="{{url('/student/questiondetail/')}}/"+question_id;
							//}
							
						}
					}
					else{
						toastr.error(response.error);
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
	
	
</script>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
	var stripe = Stripe('pk_test_v1M0jaGv3l3DdLQOPPmNZnwl');
	
	// Create an instance of Elements.
	var elements = stripe.elements();
	
	// Custom styling can be passed to options when creating an Element.
	// (Note that this demo uses a wider set of styles than the guide below.)
	var style = {
		base: {
			color: '#32325d',
			lineHeight: '18px',
			fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
			fontSmoothing: 'antialiased',
			fontSize: '16px',
			'::placeholder': {
				color: '#aab7c4'
			}
		},
		invalid: {
			color: '#fa755a',
			iconColor: '#fa755a'
		}
	};
	
	// Create an instance of the card Element.
	var card = elements.create('card', {style: style});
	var order_id;
	var user_id;
	var question_id;
	// Add an instance of the card Element into the `card-element` <div>.
	card.mount('#card-element');
	
	// Handle real-time validation errors from the card Element.
	card.addEventListener('change', function(event) {
		var displayError = document.getElementById('card-errors');
		if (event.error) {
			displayError.textContent = event.error.message;
			} else {
			displayError.textContent = '';
		}
	});

	// Handle form submission.
	var form = document.getElementById('payment-form');
	form.addEventListener('submit', function(event) {
		event.preventDefault();
		$("#full_loader").show();
		stripe.createToken(card).then(function(result) {
			
			if (result.error) {
				$("#full_loader").hide();
				// Inform the user if there was an error.
				var errorElement = document.getElementById('card-errors');
				errorElement.textContent = result.error.message;
				} else {
				// Send the token to your server.
				//stripeTokenHandler(result.token);
				data=new FormData();
				data.append('source',result.token.id);
				data.append('order_id',order_id);
				data.append('user_id',user_id);
				if(result.token){
					fetch("{{config('app.apiUrl').'/stripe/charge_web'}}",{
						method:'POST',
						body: data,
						}).then(function(response) {
						return response.json();
					})
					.then(function(myJson) {
						if(myJson.status=="succeeded"){
							startTimer(10);
							//window.location.href="{{url('/student/my?req=4')}}";
							
							}else{
							$("#full_loader").hide();
							toastr.error("Server Error: "+myJson.message);
						}
					});
					
					}else{
					$("#full_loader").hide();
					document.getElementById('card-errors');
					errorElement.textContent = result.error.message;
				}
			}
		});
		
		
	});
	
	$(document).on('click', '#process_payment', function(event) {
		if (document.getElementById('bal1').checked) {
			$("#full_loader").show();
			$.ajax({
				url: '{{url("student/pay_with_blance")}}',
				type: 'POST',
				dataType: "json",
				data: {
					temp:order_id
				},
			})
			.done(function(response) {
				if(response.status==0){
					startTimer(10);
					
					//window.location.href="{{url('/student/my?req=4')}}";
					}else{
					toastr.error(response.message);
					$("#full_loader").hide();
				}
			})
			.fail(function() {
				toastr.error("Server not Respond");
				$("#full_loader").hide();
			})
			
		}
		if (document.getElementById('bal2').checked) {
			$('#cost_modal').modal('hide');
			$('#modal_payment').modal('show');
		}
		
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
	
	function startTimer(duration) {
        var timer = duration, minutes, seconds;
        var end =setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);
			
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
			
            //$('#wait_time').html(minutes + ":" + seconds);
			
            if (--timer < 0) {
				toastr.success("Payment Done Successful");
                window.location.href="{{url('/student/my?req=4')}}";
                //window.location.href="{{url('student/dashboard')}}";
                clearInterval(end);
			}
		}, 1000);
	}
	
</script>
@if(app('request')->input('subject'))
<script>
	$('#subject').val("{{app('request')->input('subject')}}").trigger("change"); 
</script>
@endif
@endsection
