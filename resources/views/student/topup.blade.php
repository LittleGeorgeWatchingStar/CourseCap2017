@extends('layouts.app')
@section('content')
@include('includes.authStudentHeader')
<section class="padding_content">

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
      <div class="col-xs-12">
      <div class="box radius30 p-50 topup_content">
        <h2>Reload my balance</h2>
        <div class="topup_amount_box">
          <h3>Select the amount </h3>
          
          <button class="topup_amount topup_btn" data="5" >$5</button>
          <button class="topup_amount topup_btn" data="10" >$10</button>
          <button class="topup_amount topup_btn" data="25" >$25</button>
          <button class="topup_amount topup_btn" data="50" >$50</button>
          <div class="topup_amount most-popular-amount">
            <div class="hightlight_popular">Most Popular</div>
             <button class="topup_amount topup_btn" data="100" >$100</button>
          </div>
          <button class="topup_amount topup_btn" data="250" >$250</button>
        </div>
        <div class="clearfix"></div>
        <br>
        <h3>OR</h3>
        
        <div class="topup_bottom">
          <h3>Top up a specific amount </h3>
          <form id="add_topup" action="{{url('student/add_topup')}}" method="post">
                <div class="row">
                  <div class="col-md-4">
                    <input type="number" id="amount_of_topup" name="amount" class="form-control input-lg m-b-5">
                    {{csrf_field()}}
                  </div>
                </div>
             
              <p>Note： Currency is listed in CAD.<br>
              Transactions have an additional fee of 2.9% + 30¢ for credit card</p>
              <h3>Coupons</h3>

               
              <div class="row">
                <div class="col-md-4">
                  <input type="submit" class="btn btn-danger btn-lg btn-rounded btn-block" value="Review Order">
                </div>
              </div>
          </form>
        </div>        
      </div>
    </div>
  </div>
</div>
</section>
<div id="modal_payment" data-backdrop="static" data-keyboard="false" class="modal payment_modal">
  <div class="modal-dialog" role="document">

      <!-- Modal content -->
      <div class="modal-content my-modal-form">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>       
      </div> 
        <div class="modal-body">    
          <div id="cost_cac">
            <form action="/charge" method="post" id="payment-form">
              <div class="form-row">
                <label class="p-1" for="card-element">
                 Summary
                </label>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Price</label>
                      <span id="total_price" class="form-control-static">

                      </span>
                  </div>
                </div>
                
                <div class="col-sm-6">
                   <div class="form-group">
                      <label>Fee</label>
                      <span id="total_fee" class="form-control-static">

                      </span>
                   </div> 
                </div>  

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Total Amount </label>
                      <span id="total_amount" class="form-control-static">

                    </span>
                  </div>
                </div>
              </div>  


                <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                </div>

                      <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
                   <p class="note">Note： Currency is listed in CAD.<br>
                  Transactions have an additional fee of 2.9% + 30¢ for credit card <br>
                  To Up first, save on the credit card charge
                </p>
              </div>
              <button class="btn btn-danger btn-rounded process-btn">Process</button>
              <img class="client-logo" src="{{asset('/')}}/images/cards.png">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts')
                  <script src="https://js.stripe.com/v3/"></script>
                  <script type="text/javascript">
                  var stripe = Stripe('pk_test_v1M0jaGv3l3DdLQOPPmNZnwl');

              // Create an instance of Elements.
              var elements = stripe.elements();

              // Custom styling can be passed to options when creating an Element.
              // (Note that this demo uses a wider set of styles than the guide below.)
                  var style = {
                    base: {
                      color: '#32325d',
                      lineHeight: '18px',
                      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                      fontSmoothing: 'antialiased',
                      fontSize: '16px',
                      '::placeholder': {
                        color: '#aab7c4'
                      }
                    },
                    invalid: {
                      color: '#fa755a',
                      iconColor: '#fa755a'
                    }
                  };

              // Create an instance of the card Element.
              var card = elements.create('card', {style: style});
              var order_id;
              var user_id;
              // Add an instance of the card Element into the `card-element` <div>.
              card.mount('#card-element');

              // Handle real-time validation errors from the card Element.
              card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                  displayError.textContent = event.error.message;
                } else {
                  displayError.textContent = '';
                }
              });

              // Handle form submission.
              var form = document.getElementById('payment-form');
              form.addEventListener('submit', function(event) {
                event.preventDefault();
                $("#full_loader").show();
                stripe.createToken(card).then(function(result) {
                  $("#full_loader").show();
                  if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    $("#full_loader").hide();
                    errorElement.textContent = result.error.message;
                  } else {
                    // Send the token to your server.
                        //stripeTokenHandler(result.token);
                        data=new FormData();
                        data.append('source',result.token.id);
                        data.append('order_id',order_id);
                        data.append('user_id',user_id);
                        if(result.token){
                          fetch("{{config('app.apiUrl').'/stripe/charge_web'}}",{
                                              method:'POST',
                                              body: data,
                                             }).then(function(response) {
                                                  return response.json();
                                                })
                                                .then(function(myJson) {

                                                  if(myJson.status=="succeeded"){

                                                    toastr.options.timeOut = 0;
                                                    //toastr.info('Redirect in: <span id="wait_time">00:15</span>');
                                                     startTimer(15); 

                                                  }else{
                                                    toastr.error("Server Error: "+myJson.message);
                                                    $("#full_loader").hide();
                                                  }
                                                });

                                }else{
                                  document.getElementById('card-errors');
                                  errorElement.textContent = result.error.message;
                                  $("#full_loader").hide();
                                }
                        }
                });
                
               
              });


              $("#add_topup").submit(function(event){
                    event.preventDefault();
                    
                    $("#full_loader").show();
                    var post_url = $(this).attr("action"); //get form action url
                    var request_method = $(this).attr("method"); //get form GET/POST method
                    var form_data = $(this).serialize(); //Encode form elements for submission
                    if($('#amount_of_topup').val()<1 || $('#amount_of_topup').val()==""){
                    toastr.error("Minimum amount is required"); 
                    $("#full_loader").hide();
                    return false; 
                    }
                    
                    $.ajax({
                      url : post_url,
                      type: request_method,
                      data : form_data,
                      dataType: "json",
                    }).done(function(response){ //
                      if(response.status==0){
                                user_id = response.user_id;
                                order_id = response.message.oid;
                                var price=response.message.price/100;
                                var total=response.message.total_amount/100;
                                var fee=response.message.fee/100;
                                $('#total_price').html('$ '+price);
                                $('#total_fee').html('$ '+fee);
                                $('#total_amount').html('$ '+total);
                                $('#modal_payment').modal('show');
                                $("#full_loader").hide();
                      }else{
                          toastr.error("Server Error");
                          $("#full_loader").hide();
                      }
                    });
            });

function startTimer(duration) {
        var timer = duration, minutes, seconds;
        var end =setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            //$('#wait_time').html(minutes + ":" + seconds);

            if (--timer < 0) {
               toastr.success("Payment Done Successful");
                window.location.href="{{url('student/dashboard?ver='.rand(10,1000))}}";
                //window.location.href="{{url('student/dashboard')}}";
                clearInterval(end);
            }
        }, 1000);
    }

$(document).on('click', '.topup_btn', function(event) {
  $(".topup_btn").attr('class','topup_amount topup_btn');
  $(this).attr('class','topup_amount topup_btn active');
$("#amount_of_topup").val($(this).attr('data'));
});
               </script>
@endsection
 @section('styles')
              <style type="text/css">
              .StripeElement {
                background-color: white;
                height: 40px;
                padding: 10px 12px;
                border-radius: 4px;
                border: 1px solid transparent;
                box-shadow: 0 1px 3px 0 #e6ebf1;
                -webkit-transition: box-shadow 150ms ease;
                transition: box-shadow 150ms ease;
              }

              .StripeElement--focus {
                box-shadow: 0 1px 3px 0 #cfd7df;
              }

              .StripeElement--invalid {
                border-color: #fa755a;
              }

              .StripeElement--webkit-autofill {
                background-color: #fefde5 !important;
              }
              #card-errors{ color: #f00;
                margin:10px 0;
               }
              </style>
@stop

