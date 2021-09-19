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
      <div class="col-md-8 col-md-offset-2">
        <div class="homeinner box">
          <div class="common-box create-dispute">
            <h2>Create a dispute</h2>
            <form id="dispute_question" action="{{url('student/dispute_submit')}}" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label> Please describe in detail of your dispute <span class="req"> * </span></label>
								<textarea name="content" class="form-control" rows="5" placeholder="Describe your dispute and expectation"></textarea>
							</div>
							
							<div class="form-group">
								<label>Please include evidence you were communicated, as well as any other evidence that supports your case. <span class="req">*</span></label>
								<div class="file">
									<span id="trigger_file" class="btn btn-border-fileupload btn-block">Upload files</span>
								</div>
								
							</div>
							<div id="attach_hidden">
                
							</div>  
							<div class="form-group">
								<input type="hidden" name="temp" value="{{$question}}">
								{{csrf_field()}}
								<button type="submit" class="btn btn-rounded btn-danger"> Submit</button>
							</div>
							<div id="added_image" class="">
								
							</div>
							<div id="added_file">
								
							</div>
						</form>
						<form id="add_attach" action="{{url('/create_attachement')}}" method="post" enctype="multipart/form-data">
							<input style="display:none" id="attachement_source" type="file" name="attachement[]" class="input_file" multiple >
						</form>
					</div>
				</div>
			</div>      
		</div>
	</div>
</section>
@endsection
@section('scripts')
<script>
	$("#dispute_question").validate({
		errorPlacement: function(error, element) {error.insertAfter(element);
		},
		ignore: [], 
		rules: {
			content:"required",
			"files[]":"required",
		},
		error: function(data){
			toster.error("please fill required field");
		},
		submitHandler: function(form) {
			if ($("#dispute_question").valid()) {
				form.submit();
			}
			else{
				toastr.error("Error occure while submitting dispute");
			}
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