@extends('layouts.app')
@section('content')
@include('includes.authStudentHeader')
 <section class="padding_content">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="box radius30 p-30 topup_content">
          <form>
            <div class="row">
              <div class="col-md-12">
               <div class="form-group">
                 <label>Name on Card</label>
                 <input type="text" class="form-control input-lg" name="">
               </div>   
              </div>
            </div>  
            
            <div class="row">
              <div class="col-md-12">
               <div class="form-group">
                 <label>Card Number</label>
                 <input type="text" class="form-control input-lg" name="">
               </div>   
              </div>
            </div> 

            <div class="row">
              <div class="col-md-6">
               <div class="form-group">
                 <label>Expire Date</label>
                 <input type="text" class="form-control input-lg" name="">
               </div>   
              </div>
              <div class="col-md-6">
               <div class="form-group">
                 <label>CVC</label>
                 <input type="text" class="form-control input-lg" name="">
               </div>   
              </div>
            </div>   
            <p class="note">Note： Currency is listed in CAD.<br>
               Transactions have an additional fee of 2.9% + 30¢ for credit card <br>
               To Up first, save on the credit card charge
            </p>

            <button type="button" class="btn btn-danger btn-rounded btn-lg">
              Process
            </button>
            <img src="{{asset('/')}}/images/cards.png">
          </form>        
        </div>
      </div>
    </div>
  </div>
</section>

@endsection