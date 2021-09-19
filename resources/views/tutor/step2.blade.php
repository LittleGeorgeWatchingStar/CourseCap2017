@extends('layouts.app')
@section('content')
@include('includes.tutorHeader')
<main class="theme-blue"> 
      <div id="full_loader" style="display:none" class="full-loader">
    <div class="lds-css ng-scope">
      <div style="width:100%;height:100%" class="lds-wedges">
        <div><div><div></div> </div><div><div></div></div><div><div></div></div><div><div></div> </div>
        </div>
      </div>
    </div>
</div>
<section class="tutore-home" style="min-height: 350px;"></section>
</main>



<!-- Modal -->
<div class="modal fade step-modal" id="stepmodel" tabindex="-1" role="dialog" aria-labelledby="stepmodelLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      	 <button type="button" class="close" onclick="closemodel();" ><span aria-hidden="true">&times;</span></button>   
        <section>
       		 <div class="wizard">
           		 <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                               1
                            </span>                           
                        </a>
                         <span class="step-text"> Personal</span>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                             <span class="round-tab">
                               2
                            </span>                           
                        </a>
                         <span class="step-text">Education</span>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                           <span class="round-tab">
                               3
                            </span>                           
                        </a>
                         <span class="step-text">Credential</span>
                    </li>                   
                </ul>
            </div>

           
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3 class="text-center">Tutor Personal</h3>
                        <form id="tut_info"  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        	<div class="row">
                        	<div class="col-sm-6">
                        		<div class="user_pic">                
					                <div class="profile_pic">
									@if(!empty($message['avatar']))
										<img src="{{$message['avatar']}}" class="img-circle img-responsive avatar_photo">
									@else
					                  <img src="{{asset('/')}}/images/student-profile-avatar.png" class="img-circle img-responsive avatar_photo">					                
									@endif
									<input type="hidden" name="avatar" id="avatar" value="@if(!empty($message['avatar'])){{$message['avatar']}}@endif">
					                </div> 
					              </div>
								   <span id="avatar_in"></span>
                        	</div>
                        	<div class="col-sm-6">
                        		<div class="post_content profile_box">
					                <h2>{{$message['username']}}</h2>					               
					                <a href="#" class="file-upload btn btn-blueborder btn-rounded "> 
					                	Choose file
					                	 <input id="photo_img" type="file" name="avatar_img"> 
										
					                </a>
					            </div>
                        	</div>
                        </div>
                        </div>
                       

                        <div class="form-group gender-list">
                        	<label>Gender *</label>

                        	<div class="radio-blue">
			                    <input  type="radio" id="male" value="0" name="gender" @if(isset($message['profile']['gender']) && $message['profile']['gender']!=1) checked @endif>
			                    <label class="radio-label" for="male">Male</label>
			                </div> 

			                <div class="radio-blue">
			                    <input  type="radio" id="female" value="1" name="gender" @if(isset($message['profile']['gender']) && $message['profile']['gender']==1) checked @endif>
			                    <label class="radio-label" for="female">Female</label>
			                </div> 
							<span id="gender"></span>
                        	 
                        </div>

                        <div class="form-group">
						  <label>Real First Name</label>
						  <input type="text" value="@if(isset($message['profile']['first_name'])) {{$message['profile']['first_name']}} @endif" class="form-control" name="first_name">
						  
						</div>

                        <div class="form-group">
                        	<label>Real Last Name *</label>
                        	 <input type="text" value="@if(isset($message['profile']['last_name'])) {{$message['profile']['last_name']}} @endif" class="form-control" name="last_name">                         	 
                        </div>

                        <div class="form-group">
                        	<label>Birthday * </label>
                        	  <input type="text" data-inputmask='"alias":"date","yearrange":{"minyear":"1950","maxyear":"2017"}'  value="@if(isset($message['profile']['birth'])){{$message['profile']['birth']}}@endif" class="form-control" name="birthday" placeholder="dd-mm-yyyy" required="true">                         	 
                        </div>

                        <div class="form-group">
                        	<label>Phone Number *</label>
                        	 <input type="number" class="form-control" value="@if(isset($message['profile']['phone'])){{$message['profile']['phone']}}@endif" name="phone">                         	 
                        </div>
                       
                        <button id="next1" type="button" class="btn btn-info btn-rounded next-step btn-block">Next</button>
                       </form>
                    </div>

		                    <div class="tab-pane" role="tabpanel" id="step2">
		                       <h3>Tutor Application</h3>
							  <form id="tut_app"  method="post" enctype="multipart/form-data">
		                     		<div class="form-group">
		                       			<label>School <span class="req">*</span></label>
		                       			  <input type="text" value="{{isset($message['profile']['school']) ? $message['profile']['school'] : '' }}" class="form-control input-lg" name="school_name" placeholder="Current school name">
                           		    </div>

									<div class="form-group">
									<label>Select all subjects you can tutor <span class="req">*</span></label> <br>
									<?php 
										$selected_subject = [];
										
										if(isset($message['profile']['subjects'])){
											$selected_subject = explode(',',$message['profile']['subjects']);
											
										}	
									?>
									@if(count($subjects)>0)
									 @foreach ($subjects as $subject)
										 <div class="custom-check">
										   <input @if(in_array($subject['id'],$selected_subject)) {{'checked'}} @endif type="checkbox" value="{{ $subject['id'] }}" name="subjects[]">
										   <label for="Writing">{{ $subject['name'] }}</label>
										 </div>                          
									@endforeach
									<span class="subject_error"></span>
									@endif

			                        
								</div>     

								<div class="form-group">
									<label>About yourself <span class="req">*</span></label>
									<textarea name="description" class="form-control" rows="5" placeholder="Write about your education, qualifications or experience. You can choose to include  accomplishments or achievements that you’re proud of. Your personality is important as well.">@if(isset($message['profile']['description'])) {{$message['profile']['description']}} @endif</textarea>

									</div>                    

			                        <div class="list-inline text-center">
			                            <button type="button" class="btn btn-blueborder btn-rounded prev-step" onclick="back()">Back</button>
			                           <button id="next2" type="button" class="btn btn-info btn-rounded next-step">Next</button>
			                        </div>
								</form>
			                    </div>
                   				<div class="tab-pane" role="tabpanel" id="step3">
                       				<h3>Tutor Application</h3>
                        
                        			<label>Submit your creditionals</label>
                        			 <form id="tut_cre" method="post" enctype="multipart/form-data">
										<div class="col-sm-12">
										  <table class="table">
											<tr>
											  <td>
												<img  src="{{asset('/')}}/images/card.png">
												
											  </td>

											  <td>
												Photo ID <span class="req">*</span>
												<div>
												<input name="photo_input" id="photo_input" type="hidden"/>
												</div>
											  </td>
											  
											  <td>
											 
											 <?php $class = !empty($message['credentialItems']['id_photo']) ? '' : 'hide' ;  ?>
												  <i id="photo_icon" class="mdi mdi-check-circle-outline {{$class}}" ></i>
											  </td>
											  
											   <td>
												<a href="#" type="button" class="btn-file"> <input type="file" name="id_photo" id="id_photo"> <i class="mdi mdi-cloud-upload"></i></a>
											  </td>
											</tr>

											<tr>
											  <td>
												<img src="{{asset('/')}}/images/diploma.png">
												
											  </td>
											  <td>
												Degrees <span class="req">*</span>
												<div>
												<input id="deg_input" name="deg_input" type="hidden"/>
												</div>
											  </td>
											  <td>
											 
											   <?php $class = !empty($message['credentialItems']['degree']) ? '' : 'hide' ;  ?>
												  <i id="deg_icon" class="mdi mdi-check-circle-outline {{$class}}" ></i>
											  </td>
											  <td>
												<a href="#"type="button"  class="btn-file"> <input type="file" name="degree" id="degree"><i class="mdi mdi-cloud-upload"></i></a>
											  </td>
											</tr>
										 
											<tr>
											  <td>
												<img src="{{asset('/')}}/images/card.png">
												
											  </td>
											  <td>
												Teaching Credentials 
												<div>
												<input type="hidden" name="tc_input" id="tc_input">
												</div>
											  </td>
												<td>
											    
											   <?php $class = !empty($message['credentialItems']['teaching_credentials']) ? '' : 'hide' ;  ?>
												  <i id="tc_icon" class="mdi mdi-check-circle-outline {{$class}}" ></i>
												</td>
											  <td>
												<a  href="#" type="button" class="btn-file"> <input type="file" name="teaching_credentials" id="teaching_credentials"> <i class="mdi mdi-cloud-upload"></i></a>
											  </td>
											</tr>

											<tr>
											  <td>
												<img src="{{asset('/')}}/images/diploma.png">
												
											  </td>
											  <td>
												Other Proofs 
												<div>
												<input type="hidden" name="rc_input" id="rc_input">
												</div>
											  </td>  
												<td>
											  <?php $class = !empty($message['credentialItems']['relevant_credentials']) ? '' : 'hide' ;  ?>
												  <i id="rc_icon" class="mdi mdi-check-circle-outline {{$class}}" ></i>
											              
												</td>
											  <td>
												<a href="#" type="button" class="btn-file"> <input type="file" name="relevant_credentials" id="relevant_credentials"> <i class="mdi mdi-cloud-upload"></i></a>
											  </td>
											</tr>
										  </table>
										</div>
												 
									  
									 </form>
  
	                      			<div class="list-inline text-center">
	                          	 		<button type="button" class="btn btn-blueborder btn-rounded prev-step" onclick="back()">Back</button>
	                           			<button id="submit" type="submit" class="btn btn-info btn-rounded">Submit</button>
	                      		 	</div>
									
                   				</div>                   
                   				<div class="clearfix"></div>
             			   	</div>
       				</div>
    			</section>
      		</div>
   		</div>
 	</div>
</div>


@endsection

@section('scripts')
<script src="{{asset('js/jquery.inputmask.bundle.js')}}" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    $(":input").inputmask();
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    
    
});
function back(){
	var $active = $('.wizard .nav-tabs li.active');
    prevTab($active);
}
function next(){
	var $active = $('.wizard .nav-tabs li.active');
	$active.next().removeClass('disabled');
	nextTab($active);
}
function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>


<script type="text/javascript">
  $('#stepmodel').modal({
    backdrop: 'static',
    keyboard: false
}); 
  
</script>
<script type="text/javascript">
$("#tut_info").validate({
	ignore: [],
      errorPlacement: function(error, element) {
        if(element.attr("name") == "avatar"){
			error.appendTo('#avatar_in');
			return;
        }else if(element.attr("name") == "gender"){
			error.appendTo('#gender');
			return;
		}else {
          error.insertAfter(element);
        }
      },
      rules: {
         first_name:{
            required: true,
         },
		 last_name:{
            required: true,
         },
        
		 phone:{
            required: true,
            number: true,
			minlength:10,
			maxlength:10
         },
         gender:{
            required: true,
         },
         avatar:{
            required: true,
         },
        
       },
      
  }); 

  $("#tut_app").validate({
	ignore: [],
      errorPlacement: function(error, element) {
        if(element.attr("name") == "subjects"){
			error.appendTo('#subject_error');
			return;
       
		}else {
          error.insertAfter(element);
        }
      },
      rules: {
         school_name:{
            required: true,
         },
		 subjects:{
            required: true,
         },
		 description:{
            required: true,
         },
         
       },
      
  }); 
 
 $("#tut_cre").validate({
	ignore: [],
      errorPlacement: function(error, element) {
        if(element.attr("name") == "subjects"){
			error.appendTo('#subject_error');
			return;
       
		}else {
          error.insertAfter(element);
        }
      },
      rules: {
         photo_input:{
            required: true,
         },
		 deg_input:{
            required: true,
         },
	},
      
  }); 
  
  $('#submit').on('click', function() {
   if($("#tut_cre").valid()){
		$("#full_loader").show();
			$.ajax({
			   url : "{{url('tutor/update_step_profs')}}",
			   type : 'POST',
			   data : $('#tut_cre').serialize(),
			  
			   dataType: "json",
			   success : function(response) {
				if(response.status=='0'){
					location.reload();
							  
				}else{
					toastr.error(response.message);
					
				}
				  $("#full_loader").hide(); 
			  }
		});
		
   }
});
$('#next2').on('click', function() {
   if($("#tut_app").valid()){
		$("#full_loader").show();
			$.ajax({
			   url : "{{url('tutor/step_profile')}}",
			   type : 'POST',
			   data : $('#tut_app').serialize(),
			  
			   dataType: "json",
			   success : function(response) {
				if(response.status=='0'){
					next();
							  
				}else{
					toastr.error(response.error);
					
				}
				  $("#full_loader").hide(); 
			  }
		});
		
   }
});

$('#next1').on('click', function() {
   if($("#tut_info").valid()){
		$("#full_loader").show();
			$.ajax({
			   url : "{{url('tutor/step_profile')}}",
			   type : 'POST',
			   data : $('#tut_info').serialize(),
			  
			   dataType: "json",
			   success : function(response) {
				if(response.status=='0'){
					next();
							  
				}else{
					toastr.error(response.error);
					
				}
				  $("#full_loader").hide(); 
			  }
		});
		
   }
});

$('#photo_img').on('change', function() {	
	var fileExtension = ['jpeg', 'jpg', 'png','gif'];
	if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {		
		toastr.error('invalid file type');
		return false;
	}
	ajax_req('photo_img','avatar','avatar_photo',false);
	
});
$('#relevant_credentials').on('change', function() {	
	var fileExtension = ['jpeg', 'jpg', 'png','gif'];
	if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {		
		toastr.error('invalid file type');
		return false;
	}
	ajax_req('relevant_credentials','rc_input','','rc_icon')
});
$('#teaching_credentials').on('change', function() {	
	var fileExtension = ['jpeg', 'jpg', 'png','gif'];
	if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {		
		toastr.error('invalid file type');
		return false;
	}
	ajax_req('teaching_credentials','tc_input','','tc_icon')
});
$('#degree').on('change', function() {	
	var fileExtension = ['jpeg', 'jpg', 'png','gif'];
	if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {		
		toastr.error('invalid file type');
		return false;
	}
	ajax_req('degree','deg_input','','deg_icon');
	$("#tut_cre").valid();
});
$('#id_photo').on('change', function(event) {
	var target = event.target || event.srcElement;
		  
	  if (target.value.length == 0) {
		return false;
	  } 	
	var fileExtension = ['jpeg', 'jpg', 'png','gif'];
	if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {		
		toastr.error('invalid file type');
		return false;
	}
	ajax_req('id_photo','photo_input','','photo_icon');
});
function ajax_req(file,input,img_src,show){
	$("#full_loader").show();
   var formData = new FormData();
	formData.append('attachement[]', $('#'+file).prop('files')[0]);
	$.ajax({
		   url : "{{url('/create_attachement')}}",
		   type : 'POST',
		   data : formData,
		   processData: false,  // tell jQuery not to process the data
		   contentType: false,  // tell jQuery not to set contentType
		   dataType: "json",
		   success : function(response) {
			if(response.status=='0'){
				if(response.img_count>0){  
					$.each(response.images,function(index,img){
					if(img_src!=''){
						$('.'+img_src).attr('src',img);
					}
						$('#'+input).val(img);
					});
				}
				if(file =='photo_img'){
					$('#tut_info').valid();
				}if(file =='id_photo' || file =='degree' ){
					$('#tut_cre').valid();
				}
				if(show!=false){
					$('#'+show).removeClass('hide');
				}
			}else{
				toastr.error(response.error);
			}
			   $("#full_loader").hide();
		  },
			error:function(response) {
				toastr.error('server not respond');
				$("#full_loader").hide();
			}
	});
}
function closemodel(){
	$('#stepmodel').modal('hide');
	location.href="{{url('logout')}}";
}
</script>
@endsection