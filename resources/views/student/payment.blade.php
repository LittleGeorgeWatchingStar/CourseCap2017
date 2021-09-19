   @section('content')
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

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
          //stripeTokenHandler(result.token);
          data=new FormData();
          data.append('source',result.token.id);
          data.append('order_id','{{$order_id}}');
          data.append('user_id','{{$user_id}}');
          if(result.token){
            console.log("hii");
            fetch("{{config('app.apiUrl').'/stripe/charge_web'}}",{
                                method:'POST',
                                body: data,
                               }).then(function(response) {
                                    return response.json();
                                  })
                                  .then(function(myJson) {
                                    if(myJson.status=="succeeded"){
                                      toastr.success("Payment Done Successful");

                                    }else{
                                      toastr.error("Server Error: "+myJson.message);
                                    }
                                  });

                  }else{
                    document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
                  }
          }
  });
  
 
});
 </script>
@stop
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
</style>
@stop
<form action="/charge" method="post" id="payment-form">
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button>Submit Payment</button>
</form>