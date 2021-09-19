@extends('layouts.app')

@section('content')
 <section class="padding_content">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="box radius30 p-30 topup_content">
        <div class="massage">
          <div class="massage-icon">
             <i class="mdi mdi-close-circle color-error"></i> 
          </div>
          <div class="massage-text">
            <h2 class="color-error">ERROR</h2>
            @if(isset($errorMessage))
              <p>{{$errorMessage}}</p>
            @else
              <p>Somthing wrong. try refresh web page.</p>
            @endif
          </div>
         </div>      
        </div>
      </div>
    </div>
  </div>
</section>

@endsection