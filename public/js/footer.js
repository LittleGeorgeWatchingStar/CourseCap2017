   // Initialize Firebase
  var config = {
      apiKey: "AIzaSyAM5qED44tQq9G_-KdVFLo5IKmybHMuoz8",
      authDomain: "crosservice-2dc5b.firebaseapp.com",
      //databaseURL: "https://crosservice-2dc5b.firebaseio.com",
 
      projectId: "crosservice-2dc5b",
      storageBucket: "crosservice-2dc5b.appspot.com",
      messagingSenderId: "257813323594"
  };
  firebase.initializeApp(config);
 
 var provider = new firebase.auth.FacebookAuthProvider();

function facebookSignin() {
   firebase.auth().signInWithPopup(provider)
   
   .then(function(result) {
      var token = result.credential.accessToken;

      var user = result.user;
      console.log(token);
      console.log(result.additionalUserInfo.profile.id);
      console.log(user.uid);
      $("#full_loader").show();
      $.ajax({
        url: '{{url("/fb_login")}}',
        type: 'POST',
        dataType: "json",
        data: {
                fb_id:result.additionalUserInfo.profile.id,
                fb_token:token,
                uid:user.uid
              },
      })
    .done(function(response) {
        if(response.status=="0"){
          toastr.success(response.message);
          window.location.href="{{url('student/dashboard')}}";

        }else{
          toastr.error(response.message);
          $("#full_loader").hide();
        }
    })
    .fail(function() {
      toastr.error("Server not Respond");
      $("#full_loader").hide();
    })
   }).catch(function(error) {
      console.log(error.code);
      console.log(error.message);
      $("#full_loader").hide();
   });
}
function facebookSignup() {
   firebase.auth().signInWithPopup(provider)
   
   .then(function(result) {
      var token = result.credential.accessToken;

      var user = result.user;
      console.log(token);
      console.log(result.additionalUserInfo.profile.id);
      console.log(user.uid);
      console.log(result);
      if(user.email==null  && user.emailVerified==false){
          toastr.error("your facebook email is not varified");
          $("#full_loader").hide();
          return false;
      }
      var username = result.additionalUserInfo.profile.name.replace(" ", "");
      $("#full_loader").show();
      $.ajax({
        url: '{{url("/fb_register")}}',
        type: 'POST',
        dataType: "json",
        data: {
                fb_id:result.additionalUserInfo.profile.id,
                fb_token:token,
                uid:user.uid,
                username:username,
                email:'user.email',
                referral:"{{app('request')->input('refId')}}"
              },
      })
    .done(function(response) {
        if(response.status=="0"){
          toastr.success(response.message);
                $.ajax({
                        url: '{{url("/fb_login")}}',
                        type: 'POST',
                        dataType: "json",
                        data: {
                                fb_id:result.additionalUserInfo.profile.id,
                                fb_token:token,
                                uid:user.uid
                              },
                      })
                    .done(function(response) {
                        if(response.status=="0"){
                          toastr.success(response.message);
                          window.location.href="{{url('student/dashboard')}}";

                        }else{
                          toastr.error(response.message);
                          $("#full_loader").hide();
                        }
                    })
                    .fail(function() {
                      toastr.error("Server not Respond");
                      $("#full_loader").hide();
                    })
                   .catch(function(error) {
                      console.log(error.code);
                      console.log(error.message);
                      $("#full_loader").hide();
                   });


        }else{
          toastr.error(response.message);
          $("#full_loader").hide();
        }
    })
    .fail(function() {
      toastr.error("Server not Respond");
      $("#full_loader").hide();
    })
   }).catch(function(error) {
      console.log(error.code);
      console.log(error.message);
      $("#full_loader").hide();
   });
}
 
