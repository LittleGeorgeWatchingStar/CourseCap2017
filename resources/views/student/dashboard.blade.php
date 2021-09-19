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
                          @if($question['disputeId'])
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
          @else
          <div class="alert alert-danger">There is No Question</div>
          @endif
       
      </div>
      @include('student.sidebar')
         
      </div>
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade " id="profilemodel" tabindex="-1" role="dialog" aria-labelledby="stepmodelLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body profilemodel-popup">
      	 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
       
       		

           
   
			<h3 class="text-center">Student Information</h3>
			<form id="stu_info"  method="post" enctype="multipart/form-data">
			
				
				<div class="form-group">
				<label>Upload picture</label>
					<div class="user_pic">                
						<div class="profile_pic">
						@if(!empty($userdetails['avatar']))
							<img src="{{$userdetails['avatar']}}" class="img-circle img-responsive avatar_photo">
						@else
						  <img src="{{asset('/')}}/images/student-profile-avatar.png" class="img-circle img-responsive avatar_photo">					                
						@endif
						<input type="hidden" name="avatar" id="avatar" value="@if(!empty($userdetails['avatar'])){{$userdetails['avatar']}}@endif">
						</div> 
						 <span id="avatar_in"></span>
					  </div>
					  
				
					<div class="post_content profile_box">
						<h2>{{$userdetails['username']}}</h2>					               
						<a href="#" class="file-upload btn btn-redborder btn-rounded "> 
							Choose file
							 <input id="photo_img" type="file" name="avatar_img"> 
							
						</a>
					</div>
					</div>
				
			
		   

			<div class="form-group">
				<label>Your School *</label>
				 <select class="form-control input-lg" name="school" placeholder="Current school name">
                    <option value="">Current school name</option>
                    @foreach ($schools as $school)
                    <option @if(isset($userdetails['profile']['schoolId']) && $userdetails['profile']['schoolId']==$school['id']) selected @endif value="{{ $school['id'] }}">{{ $school['value'] }}</option>
                    @endforeach
                  </select>            	 
			</div>
			
		   
			<button id="finish" type="button" class="btn btn-danger btn-rounded next-step btn-block">Finish</button>
		   </form>
	  

       				
      		
			</div>
   		</div>
 	</div>
</div>


@endsection

@section('scripts')
<script type="text/javascript">
  $(document).on('click', '.load_more', function(event) {
    $("#full_loader").show();
    $.ajax({
      url: '{{url("student/ajax_load_dashboard")}}',
      type: 'POST',
      data: {
              temp:$(this).attr('data'),
              req:0
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
  if("{{$userdetails['incomplete']}}" == true){
	  $('#profilemodel').modal('show');
	}
$('#photo_img').on('change', function(event) {	
  var target = event.target || event.srcElement;      
    if (target.value.length == 0) {
      return false;
    } 
	var fileExtension = ['jpeg', 'jpg', 'png','gif'];
	if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {		
		toastr.error('invalid file type');
		return false;
	}
	ajax_req('photo_img','avatar','avatar_photo')
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
				if(show!=false){
					$('#'+show).removeClass('hide');
				}
			}else{
				toastr.error(response.error);
			}
			   $("#full_loader").hide();
		  }
	});
}
$("#stu_info").validate({
	ignore: [],
      errorPlacement: function(error, element) {
        if(element.attr("name") == "avatar"){
			error.appendTo('#avatar_in');
			return;
       
		}else {
          error.insertAfter(element);
        }
      },
      rules: {
         avatar:{
            required: true,
         },
		 school:{
            required: true,
         },
	},
      
  }); 
$('#finish').on('click', function() {
   if($("#stu_info").valid()){
		$("#full_loader").show();
			$.ajax({
			   url : "{{url('student/complete')}}",
			   type : 'POST',
			   data : $('#stu_info').serialize(),
			  
			   dataType: "json",
			   success : function(response) {
				if(response.status=='0'){
					location.reload();
							  
				}else{
					toastr.error(response.error);
					
				}
				  $("#full_loader").hide(); 
			  }
		});
		
   }
});
</script>

@endsection