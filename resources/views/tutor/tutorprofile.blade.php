@extends('layouts.app')
@section('content')
@include('includes.authTutorHeader')

<main class="theme-blue">
<section class="tutor-profile">
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
         <div class="box radius30 p-30">
          <form action="{{url('tutor/update_avatar')}}" method="post" enctype="multipart/form-data">  
            <div class="social_post student_profile">
              <div class="user_pic">                
                <div class="profile_pic">
                  <img  src="{{ $userdetails['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
                  <input id="img_click" type="file" name="avatar_img"> 
                </div> 
              </div>
              <div class="post_content profile_box">
                <h2>{{$userdetails['username']}}</h2>
                <p>{{$userdetails['email']}}</p>
                {{csrf_field()}}
                <button style="display:none" id="final_form_sub" type="submit" class="btn btn-blueborder btn-rounded">Upload</button>
                <a href="javascript:void(0)" id="upt_triger"  class="btn btn-blueborder btn-rounded">Upload Photo</a>
                @if($errors->has('avatar_img') )
                  <label id="emailForgetPassword-error" class="error" for="avatar_img">{{ $errors->first('avatar_img') }}</label>
                @endif
              </div>
            </div>
          </form>

        <div class="panel-group" id="accordion">
          <div class="profile-section">
            <div class="row">
              <div class="col-md-12">
              <div class="panel panel-default">
                    <div class="panel-heading">
                        
                            <a class="panel-title">Password</a>
							
                            <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Edit</a>
                        
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse {{$errors->has('new_password') || $errors->has('re_new_password') ? 'in' : ''}}">
                      <div class="panel-body">
                          <div class="row">
                            <div class="col-md-6">
							<h4>Change your password</h4>
                              <form action="{{url('tutor/change_password')}}" method="post" enctype="multipart/form-data">  
                                <div class="form-group">
                                  <input type="password" class="form-control input-lg" name="password" placeholder="old Password">
                                </div>
                                <div class="form-group">
                                  <input type="password" class="form-control input-lg" name="new_password" placeholder="New password">
                                  @if($errors->has('new_password') )
                                  <label id="emailForgetPassword-error" class="error" for="new_password">{{ $errors->first('new_password') }}</label>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <input type="password" class="form-control input-lg" name="re_new_password" placeholder="Confirm new password">
                                  @if($errors->has('re_new_password') )
                                  <label id="emailForgetPassword-error" class="error" for="re_new_password">{{ $errors->first('re_new_password') }}</label>
                                  @endif
                                </div>
                                <div class="form-group">
                                  {{csrf_field()}}
                                  <input type="submit" class="btn btn-info btn-rounded" value="Save">
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
          </div>
        </div>

       <div class="profile-section">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                    <div class="panel-heading">
					 <a class="panel-title">School</a>
							
                            <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Edit</a>
                        
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse {{$errors->has('school_name') ? 'in' : ''}}">
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-6">
						  <h4>Change your school</h4>
                            <form action="{{url('tutor/profile_update')}}" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="{{isset($userdetails['profile']['school']) ? $userdetails['profile']['school'] : '' }}" class="form-control input-lg" name="school_name" placeholder="Current school name">
                                  
                                @if($errors->has('school_name') )
                                 <label id="emailForgetPassword-error" class="error" for="school"> {{ $errors->first('school_name') }}</label>
                                @endif
                              </div>
                              <div class="form-group">
                                {{csrf_field()}}
                                <input type="submit" class="btn btn-info btn-rounded" value="Save">
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
             </div>
           </div>
         </div>
      <div class="profile-section">
         <div class="panel panel-default">
                    <div class="panel-heading">
                        
						<a class="panel-title">Information</a>
							
                            <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Edit</a>
                        
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse {{$errors->has('first_name') || $errors->has('last_name') || $errors->has('birthday') || $errors->has('phone') ? 'in' : ''}}">
                      <div class="panel-body">
                        <form action="{{url('tutor/tutor_profile_update')}}" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Real First Name</label>
                              <input type="text" value="@if(isset($userdetails['profile']['first_name'])) {{$userdetails['profile']['first_name']}} @endif" class="form-control" name="first_name">
                              @if($errors->has('first_name') )
                                   <label id="emailForgetPassword-error" class="error" for="school"> {{ $errors->first('first_name') }}</label>
                                  @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Real Last Name </label>
                              <input type="text" class="form-control" value="@if(isset($userdetails['profile']['last_name'])) {{$userdetails['profile']['last_name']}} @endif" name="last_name">
                                @if($errors->has('last_name') )
                                   <label id="emailForgetPassword-error" class="error" for="school"> {{ $errors->first('last_name') }}</label>
                                  @endif
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Birthday </label>
                              <input type="date" max="{{date('Y-m-d',time())}}" value="@if(isset($userdetails['profile']['birth'])){{$userdetails['profile']['birth']}}@endif" class="form-control" name="birthday">
                                            @if($errors->has('birthday') )
                                   <label id="emailForgetPassword-error" class="error" for="school"> {{ $errors->first('birthday') }}</label>
                                  @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Phone Number</label>
                              <input type="number" class="form-control" value="@if(isset($userdetails['profile']['phone'])){{$userdetails['profile']['phone']}}@endif" name="phone">
                                            @if($errors->has('phone'))
                                   <label id="emailForgetPassword-error" class="error" for="school"> {{ $errors->first('phone') }}</label>
                                  @endif
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group all-subject">
                            <label> All subjects you can tutor</label> <br>
                                          @if($errors->has('subjects') )
                                   <label id="emailForgetPassword-error" class="error" for="school"> {{ $errors->first('subjects') }}</label>
                                  @endif
                                  <br>
                                       @foreach ($subjects as $subject)
                                         <div class="custom-check">
                                           <input @if(in_array($subject['id'],$selected_subject)) {{'checked'}} @endif type="checkbox" value="{{ $subject['id'] }}" name="subjects[]">
                                           <label for="Writing">{{ $subject['name'] }}</label>
                                         </div>                          
                                        @endforeach
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                           <div class="form-group">
                            <label>About yourself</label>
                             <textarea name="description" class="form-control" rows="10" placeholder="Current content…..">@if(isset($userdetails['profile']['description'])) {{$userdetails['profile']['description']}} @endif</textarea>
                           </div>
                           <div class="form-group">
                            {{csrf_field()}}
                            <input type="submit" class="btn btn-info btn-rounded" value="Save">
                           </div>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
      </div>
  <div class="panel panel-default">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel-heading">
              
			  <a class="panel-title">Your creditionals</a>
							
                            <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Edit</a>
			  
          </div>          
        </div>
      </div>

      <div class="row credintiol">
	  
      
  <div id="collapseFour" class="panel-collapse collapse">
    <div class="panel-body">
      <form action="{{url('tutor/update_profs')}}" method="post" enctype="multipart/form-data">
        <div class="col-sm-12">
			
		<h4>Upload creditionals</h4>
		 @if($errors->has('id_photo') )
          <label id="emailForgetPassword-error" class="error" for="id_photo">{{ $errors->first('id_photo') }}</label>
        @endif
         @if($errors->has('degree') )
         <br>
          <label id="emailForgetPassword-error" class="error" for="degree">{{ $errors->first('degree') }}</label>
        @endif
         @if($errors->has('teaching_credentials') )
         <br>
          <label id="emailForgetPassword-error" class="error" for="teaching_credentials">{{ $errors->first('teaching_credentials') }}</label>
        @endif
         @if($errors->has('relevant_credentials') )
         <br>
          <label id="emailForgetPassword-error" class="error" for="relevant_credentials">{{ $errors->first('relevant_credentials') }}</label>
        @endif
		</div>
        <div class="col-sm-6">
          <div class="table-responsive">
          <table class="table upload-table">
            <tr>
              <td>
                <img src="{{asset('/')}}/images/card.png">
              </td>

              <td>
                Photo ID <span class="req">*</span>
              </td>
              @if(!empty($userdetails['credentialItems']['id_photo']))
              <td>
                <i class="mdi mdi-check-circle-outline">
              </td>
              @endif
               <td>
                <a type="button" class="btn-file"> <input type="file" name="id_photo"> <i class="mdi mdi-cloud-upload"></i></a>
              </td>
            </tr>

            <tr>
              <td>
                <img src="{{asset('/')}}/images/diploma.png">
              </td>
              <td>
                Degrees <span class="req">*</span>
              </td>
              @if(!empty($userdetails['credentialItems']['degree']))
              <td>
                <i class="mdi mdi-check-circle-outline"></i>
              </td>
              @endif
              <td>
                <a type="button" class="btn-file"> <input type="file" name="degree"><i class="mdi mdi-cloud-upload"></i></a>
              </td>
            </tr>
          </table>
        </div>
		  
        </div>
        <div class="col-sm-6">
          <div class="table-responsive">
           <table class="table upload-table">
            <tr>
              <td>
                <img src="{{asset('/')}}/images/card.png">
              </td>
              <td>
                Teaching Credentials 
              </td>
               @if(!empty($userdetails['credentialItems']['teaching_credentials']))
                <td>
                  <i class="mdi mdi-check-circle-outline">
                </td>
              @endif              
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
              @if(!empty($userdetails['credentialItems']['relevant_credentials']))
                <td>
                  <i class="mdi mdi-check-circle-outline"></i>
                </td>
              @endif             
              <td>
                <a type="button" class="btn-file"> <input type="file" name="relevant_credentials"> <i class="mdi mdi-cloud-upload"></i></a>
              </td>
            </tr>
          </table>
        </div>
                 {{csrf_field()}}
                
        </div>
        <div class="col-xs-12">
         <input type="hidden" name="pk_token" value="@if(!empty($userdetails['credentialItems']['id_photo'])){{'opoof1f'}}@endif">
               <input type="submit" class="btn btn-info btn-rounded" value="Save">
             </div>
      </form>
    </div>
  </div>
</div>
      </div>

  </div>

    </div>
  </div>

@include('tutor.sidebar')
    </div>
  </div>
</section>
</main>

@endsection
@section('scripts')

<script type="text/javascript">
  $(document).ready(function () {
      $("#upt_triger").click(function(){
          $("#img_click").trigger("click");
      });
  });
$(document).on('change', '#img_click', function(event) {
  $("#full_loader").show();
  $("#final_form_sub").trigger("click");
});
</script>
@endsection