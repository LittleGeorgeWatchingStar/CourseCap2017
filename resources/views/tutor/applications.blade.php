@extends('layouts.app')
@section('content')
@include('includes.authTutorHeader')

<section class="tutor-application">
  <div class="container">
    <div class="box radius30 p-50">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="text-center">Tutor Application</h2>
          <form>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                <div class="profile-pic">
                  <img src="{{asset('/')}}/images/avatar.png">
                </div>
                <div class="user-name">
                <label>Username</label>

                <div class="btn-file">
                  <input type="file" name=""> Choose file
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Gender <span class="req">*</span></label>
                  <div>

                    <div class="custom-radio">
                      <input type="radio" id="male" name="gen">
                      <label for="male"> Male  </label>
                    </div>

                    <div class="custom-radio">
                      <input type="radio" id="Female" name="gen">
                      <label for="Female"> Female  </label>
                    </div>                    
                    
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Real First Name <span class="req">*</span></label>
                  <input type="text" name="" class="form-control input-lg">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Real Last Name <span class="req">*</span></label>
                  <input type="text" name="" class="form-control input-lg">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Birthday <span class="req">*</span></label>
                  <input type="text" name="" class="form-control input-lg">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Phone Number <span class="req">*</span></label>
                  <input type="text" name="" class="form-control input-lg">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>School <span class="req">*</span></label>
                  <input type="text" name="" class="form-control input-lg">
                </div>
              </div>              
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group subject-turor">
                  <label>Select all subjects you can tutor  <span class="req">*</span></label>
                  <br><br>
                <div class="custom-check">
                  <input type="checkbox" id="Writing" name="">
                    <label for="Writing">  Writing  </label>
                </div>

                <div class="custom-check">
                  <input type="checkbox" id="Math" name="">
                    <label for="Math">  Math  </label>
                </div>

                <div class="custom-check">
                  <input type="checkbox" id="Chemistry" name="">
                    <label for="Chemistry">  Chemistry  </label>
                </div>

                <div class="custom-check">
                  <input type="checkbox" id="Microeconomics" name="">
                    <label for="Microeconomics">  Microeconomics  </label>
                </div>

                <div class="custom-check">
                  <input type="checkbox" id="Physics" name="">
                    <label for="Physics">  Physics  </label>
                </div>

                <div class="custom-check">
                  <input type="checkbox" id="Finance" name="">
                    <label for="Finance">  Finance  </label>
                </div>

                <div class="custom-check">
                  <input type="checkbox" id="Accounting" name="">
                    <label for="Accounting">  Accounting  </label>
                </div>

                </div>
              </div>              
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>About yourself <span class="req">*</span></label>
                  <textarea class="form-control" rows="6" placeholder="Write about your education, qualifications or experience. You can choose to include  accomplishments or achievements that you’re proud of. Your personality is important as well."></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 creditionals">                
                <h5> Submit your creditionals </h5>

                <table class="table">
                  <tr>
                    <td><img src="{{asset('/')}}/images/card.png"></td>
                    <td class="creditionals-text">Photo ID <span class="req">*</span> <i class="mdi mdi-check-circle-outline"></i></td>
                    <td class="text-right"> 
                      <div class="file btn btn-link">
                         <i class="mdi mdi-file-upload-outline"></i>
                         <input type="file" name="file"/>
                      </div> 
                    </td>
                  
                    <td><img src="{{asset('/')}}/images/diploma.png"></td>
                    <td class="creditionals-text">Degrees </td>
                    <td class="text-right"> 
                      <div class="file btn btn-link">
                         <i class="mdi mdi-file-upload-outline"></i>
                         <input type="file" name="file"/>
                      </div> 
                    </td>
                  </tr>
                  <tr>
                    <td><img src="{{asset('/')}}/images/teacher.png"></td>
                    <td class="creditionals-text">Teaching Credentials </td>
                    <td class="text-right"> 
                      <div class="file btn btn-link">
                         <i class="mdi mdi-file-upload-outline"></i>
                         <input type="file" name="file"/>
                      </div> 
                    </td>
                  
                    <td><img src="{{asset('/')}}/images/file.png"></td>
                    <td class="creditionals-text">Other Proofs <i class="mdi mdi-check-circle-outline"></i></td>
                    <td class="text-right"> 
                      <div class="file btn btn-link">
                         <i class="mdi mdi-file-upload-outline"></i>
                         <input type="file" name="file"/>
                      </div> 
                    </td>
                  </tr>
                </table>
                <div class="text-center">

                <a href="{{url('tutor/application/success')}}" class="btn btn-info btn-lg btn-rounded">SUBMIT</a>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection