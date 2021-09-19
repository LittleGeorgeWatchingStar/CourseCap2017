@extends('layouts.app')
@section('content')
@include('includes.authStudentHeader')
<section class="content padding_content">
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
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="homeinner box student_profile_section">
          <form action="{{url('student/update_avatar')}}" method="post" enctype="multipart/form-data">  
            <div class="social_post student_profile">
              <div class="user_pic">                
                <div class="profile_pic">
                  <img src="{{ $userdetails['avatar'] or  asset('/').'/images/student-profile-avatar.png' }}" class="img-circle img-responsive">
                  <input id="img_click" type="file" name="avatar_img"> 
                </div> 
              </div>
              <div class="post_content profile_box">
                <h2>{{$userdetails['username']}}</h2>
                <p>{{$userdetails['email']}}</p>
                {{csrf_field()}}
                <button style="display:none" id="final_form_sub" type="submit" class="btn btn-blueborder btn-rounded">Upload</button>
                <a href="javascript:void(0)" id="upt_triger"  class="btn btn-redborder btn-rounded">Upload Photo</a>
                @if($errors->has('avatar_img') )
                  <label id="emailForgetPassword-error" class="error" for="avatar_img">{{ $errors->first('avatar_img') }}</label>
                @endif
              </div>
            </div>
          </form>
          <hr>
        <div class="panel-group" id="accordion">
          <div class="profile-section">
            <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">                      
                            <a class="panel-title">Change your password</a>
                            <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Edit</a>
                        
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                      <div class="panel-body">
                        <form action="{{url('student/change_password')}}" method="post" enctype="multipart/form-data">  
                          <div class="form-group">
                            <input type="password" class="form-control input-lg" name="password" placeholder="Old Password">
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
                            <input type="submit" class="btn btn-redborder btn-rounded" value="Update">
                          </div>
                        </form>
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
                        <a class="panel-title">Change your school</a>
                        <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Edit</a>                      
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                        <form action="{{url('student/profile_update')}}" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <select class="form-control input-lg" name="school" placeholder="Current school name">
                              <option value="">Current school name</option>
                              @foreach ($schools as $school)
                              <option @if($userdetails['profile']['schoolId']==$school['id']) selected @endif value="{{ $school['id'] }}">{{ $school['value'] }}</option>
                              @endforeach
                            </select>
                            @if($errors->has('school') )
                             <label id="emailForgetPassword-error" class="error" for="school"> {{ $errors->first('school') }}</label>
                            @endif
                          </div>
                          <div class="form-group">
                            {{csrf_field()}}
                            <input type="submit" class="btn btn-redborder btn-rounded" value="Update">
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
      </div>      
      @include('student.sidebar')
    </div>
  </div>  
</section>
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
