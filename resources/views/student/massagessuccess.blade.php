@extends('layouts.app')
@section('content')
@include('includes.authStudentHeader')
<section class="padding_content">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="box radius30 p-30 topup_content">
          <div class="massage">
            <div class="massage-icon">
              <i class="mdi mdi-check-circle color-success"></i> 
            </div>
            <div class="massage-text">
              <h2 class="color-success">Success ! </h2>
              <p>A tutor is going to work on your question.</p>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
</section>

@endsection