@extends('layouts.app')
@section('content')
@include('includes.authStudentHeader')

<section class="padding_content">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8">
        <div class="box radius30 p-30 sharelink">
          <h1>Get free money by inviting your friends</h1>
          <p>Both you and your friends will get <span class="highlite">$5</span> if they joined</p>
          <hr>
        <form id="sharelink_with_email" action="{{url('student/sharelink_with_email')}}" method="post"  >          
          <div class="form-group">
            <h4>Option 1:</h4>
            <label>Enter your friends’ emails and send email to them</label>
            <div class="row">
              <div class="col-sm-8">
                <input type="text" class="form-control input-lg" name="email_id" placeholder="Enter your friends’s emails">
              </div>
              <div class="col-sm-4">
                {{csrf_field()}}
                <button type="submit" class="btn btn-danger radius30 btn-lg"> Invite</button>
              </div>
            </div>
          </div>
        </form>
          <div class="form-group">
            <h4>Option 2:</h4>
            <label>Copy your personal link </label>
            <div class="row">
              <div class="col-sm-8">
                <input type="text" id="my_link" class="form-control input-lg" name="" value="{{$share['link']}}">
              </div>
              <div class="col-sm-4">
                <button type="button" onclick="copy_link()" class="btn btn-danger radius30 btn-lg"> Copy</button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <h4>Option 3:</h4>
            <label>Share it to the whole world </label>
             <div class="row">
              <div class="col-sm-4">
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=244145969632831&autoLogAppEvents=1';
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-share-button" data-href="{{$share['link']}}" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Ffacebook.com%2Fcoursecap%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
              </div>
            </div>              
          </div>
          <hr>
          <h4>People who you have invited </h4>
          <ul class="list-inline">
            @if($share['invited'])
                @foreach($share['invited'] as $invited_user)
                <li>{{$invited_user['username']}}</li>
                @endforeach
            @else
              <li>No Friends Invited Yet</li>
            @endif
          </ul>
          </div>
        </div>
        

 @include('student.sidebar')

      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')
<script type="text/javascript">
  /* Get the text field */
function copy_link() {
  var copyText = document.getElementById("my_link");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");
  toastr.success("Copied");
}

$("#sharelink_with_email").validate({
                errorPlacement: function(error, element) {error.insertAfter(element);
                 },
                  ignore: [], 
                  rules: {
                          email_id:{
                                   required: true,
                                   email: true,
                                   laxEmail: true,
                          }
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
</script>
@endsection