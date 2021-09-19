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
<section class="tutore-home">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8">
        <form>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
            <select id="filter_level" name="level" class="form-control filter_of_dash">
              <option value="" >All</option>
              <option value="2001" >High school</option>
              <option value="2002" >Collage</option>
            </select>
          </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group" style="margin-height:">
            <select id="filter_subjecct" name="subject" class="form-control filter_of_dash">
                    <option selected value="">All</option>
                   @foreach ($subjects as $subject)
                      @if(in_array($subject['id'],$subject_have))
                          <option  value="{{ $subject['id'] }}">{{ $subject['name'] }}</option>
                          @endif
                        @endforeach
                  </select>
              </div>    
          </div>        
        </div>
      </form>
      <div  class="homeinner box">
      @if($questions)
         
            
               @foreach ($questions as $question)
               
                  <div  class="common-box">
                    <a href="{{url('tutor/questiondetail/'.($question['id']))}}" >
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
                              <div class="post_attachment">
                                <img class="img-responsive" src="{{$question['image']}}">
                              </div>
                             
                            </div>
                          @endif
                        <div class="post_status">
                          <span class="quequed">
                            <i class="mdi mdi-check"></i> {{$status[$question['status']]}}
                          </span>
                          <span class="time">
                            <i class="mdi mdi-timer"></i> {{date('M , d, Y',$question['created'])}}
                          </span>
                          <span class="earned pull-right">
                             YOUR EARN: <span>$ {{number_format((float)$question['earn']/100, 2, '.', '')}}</span>
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
          @else
          <div class="alert alert-danger">There is No Question</div>
          @endif
           
         </div>
 </div>
@include('tutor.sidebar')
    </div>
  </div>
</section>
</main>





<!-- Modal -->
<div class="modal fade step-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      	 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
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

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3 class="text-center">Tutor Application</h3>
                       
                        <div class="form-group">
                        	<div class="row">
                        	<div class="col-sm-6">
                        		<div class="user_pic">                
					                <div class="profile_pic">
					                  <img src="{{asset('/')}}/images/student-profile-avatar.png" class="img-circle img-responsive">					                
					                </div> 
					              </div>
                        	</div>
                        	<div class="col-sm-6">
                        		<div class="post_content profile_box">
					                <h2>username</h2>					               
					                <a href="#" class="file-upload btn btn-blueborder btn-rounded "> 
					                	Choose file
					                	 <input type="file" name="avatar_img"> 
					                </a>
					            </div>
                        	</div>
                        </div>
                        </div>

                        <div class="form-group gender-list">
                        	<label>Gender *</label>

                        	<div class="radio-blue">
			                    <input  type="radio" id="male" value="" name="gender">
			                    <label class="radio-label" for="male">Male</label>
			                </div> 

			                <div class="radio-blue">
			                    <input  type="radio" id="female" value="" name="gender">
			                    <label class="radio-label" for="female">Female</label>
			                </div> 

                        	 
                        </div>

                        <div class="form-group">
                        	<label>Real First Name *</label>
                        	<input type="text" class="form-control" name="">                         	 
                        </div>

                        <div class="form-group">
                        	<label>Real Last Name *</label>
                        	<input type="text" class="form-control" name="">                         	 
                        </div>

                        <div class="form-group">
                        	<label>Birthday *</label>
                        	<input type="text" class="form-control" placeholder="dd-mm-yyyy" name="">                         	 
                        </div>

                        <div class="form-group">
                        	<label>Phone Number *</label>
                        	<input type="text" class="form-control" name="">                         	 
                        </div>
                       
                        <button type="button" class="btn btn-info btn-rounded next-step btn-block">Next</button>
                       
                    </div>

		                    <div class="tab-pane" role="tabpanel" id="step2">
		                       <h3>Tutor Application</h3>
		                     		<div class="form-group">
		                       			<label>School <span class="req">*</span></label>
		                       			<input type="text" class="form-control" name="" placeholder="Enter your current or former school">
                           		    </div>

									<div class="form-group">
									<label>Select all subjects you can tutor <span class="req">*</span></label> <br>

									<div class="custom-check">
			                           <input  type="checkbox" value="" name="subjects">
			                           <label for="Writing">Writing</label>
			                         </div> 

			                         <div class="custom-check">
			                           <input  type="checkbox" value="" name="subjects">
			                           <label for="Math">Math</label>
			                         </div> 

			                         <div class="custom-check">
			                           <input  type="checkbox" value="" name="subjects">
			                           <label for="Chemistry">Chemistry</label>
			                         </div>

			                          <div class="custom-check">
			                           <input  type="checkbox" value="" name="subjects">
			                           <label for="Microeconomics">Microeconomics</label>
			                         </div> 

			                         <div class="custom-check">
			                           <input  type="checkbox" value="" name="subjects">
			                           <label for="Physics">Physics</label>
			                         </div> 

			                         <div class="custom-check">
			                           <input  type="checkbox" value="" name="subjects">
			                           <label for="Finance">Finance</label>
			                         </div> 

			                          <div class="custom-check">
			                           <input  type="checkbox" value="" name="subjects">
			                           <label for="Macroeconomics">Macroeconomics</label>
			                         </div>

			                         <div class="custom-check">
			                           <input  type="checkbox" value="" name="subjects">
			                           <label for="Accounting">Accounting</label>
			                         </div>
								</div>     

								<div class="form-group">
									<label>About yourself <span class="req">*</span></label>
									<textarea class="form-control" rows="5" placeholder="Write about your education, qualifications or experience. You can choose to include  accomplishments or achievements that you’re proud of. Your personality is important as well."></textarea>

									</div>                    

			                        <div class="list-inline text-center">
			                            <button type="button" class="btn btn-blueborder btn-rounded prev-step">Back</button>
			                           <button type="button" class="btn btn-info btn-rounded next-step">Next</button>
			                        </div>
			                    </div>
                   				<div class="tab-pane" role="tabpanel" id="step3">
                       				<h3>Tutor Application</h3>
                        
                        			<label>Submit your creditionals</label>
                        			<table class="table">
		                         		<tr>
		                         			<td>
		            					  	  <img src="{{asset('/')}}/images/card.png">
		            						</td>
			                         		<td>  Photo ID </td>
			                         		<td><a type="button" class="btn-file"> 
			                         			<input type="file" name="id_photo"> <i class="mdi mdi-cloud-upload"></i>
			                         			</a>
			                         		</td>	
		                         		</tr>
			                         	<tr>
							              <td>
							                <img src="{{asset('/')}}/images/diploma.png">
							              </td>
							              <td>
							                Degrees <span class="req">*</span>
							              </td>
							                            <td>
							                <a type="button" class="btn-file"> 
							                	<input type="file" name="degree"><i class="mdi mdi-cloud-upload"></i>
							                </a>
							              </td>
							            </tr>
							            <tr>
							              <td>
							                <img src="{{asset('/')}}/images/card.png">
							              </td>
							              <td>
							                Teaching Credentials 
							              </td>
							                             
							              <td>
							                <a type="button" class="btn-file"> <input type="file" name="teaching_credentials"> <i class="mdi mdi-cloud-upload"></i></a>
							              </td>
					           			</tr>

							            <tr>
							              <td>
							                <img src="{{asset('/')}}/images/diploma.png">
							              </td>
							              <td>
							                Other Proofs 
							              </td>  
							                           
							              <td>
							                <a type="button" class="btn-file"> <input type="file" name="relevant_credentials"> <i class="mdi mdi-cloud-upload"></i></a>
							              </td>
							            </tr>     
                        			</table>

	                      			<div class="list-inline text-center">
	                          	 		<button type="button" class="btn btn-blueborder btn-rounded prev-step">Back</button>
	                           			<button type="submit" class="btn btn-info btn-rounded">Submit</button>
	                      		 	</div>
                   				</div>                   
                   				<div class="clearfix"></div>
             			   	</div>
           				</form>
       				</div>
    			</section>
      		</div>
   		</div>
 	</div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">
	$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>


<script type="text/javascript">
  $(document).on('click','.load_more', function(event) {
    $("#full_loader").show();
    $.ajax({
      url: '{{url("tutor/ajax_load_dashboard")}}',
      type: 'POST',
      data: {
              temp:$(this).attr('data'),
              subject:$('#filter_subjecct').val(),
              level:$('#filter_level').val()
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

  $(document).on('change','.filter_of_dash', function(event) {
    $("#full_loader").show();
    $.ajax({
      url: '{{url("tutor/ajax_load_dashboard")}}',
      type: 'POST',
      data: {
              temp:"",
              subject:$('#filter_subjecct').val(),
              level:$('#filter_level').val()
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
  
</script>
@endsection