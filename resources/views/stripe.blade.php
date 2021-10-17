@extends('front.layout.master')
 
@section('contents') 
  <style type="text/css">
         .panel-title {
         display: inline;
         font-weight: bold;
         }
         .display-table {
         display: table;
         }
         .display-tr {
         display: table-row;
         }
         .display-td {
         display: table-cell;
         vertical-align: middle;
         width: 61%;
         }
         .hide{
            display:none;
         }
      </style>
            <!-- start banner Area -->
            <section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Payment				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  Payment</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
      <div class="container py-4">
         <div class="row">
            <div class="col-md-6 d-block mx-auto">
               <div class="card credit-card-box">
                  <div class="card-heading text-center" >
                        <h1 class="card-title pt-2">Payment</h1>
                        <h3 class="card-title" >Payment Details</h3>
                        <div class="" >                            
                           <img class="img-responsive" style="max-height:25px;" src="{{asset('assets/images/download.png')}}">
                        </div>
                  </div>
                  <div class="card-body">
                     @if (Session::has('success'))
                     <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                     </div>
                     @endif
                     <form
                        role="form"
                        action="{{ route('stripe.post') }}"
                        method="post"
                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        @csrf
                        <div class='form-row row'>
                           <div class='col-12 form-group required'>
                              <label class=''>Name on Card <span class="text-danger">*</span></label> <input
                                 class='form-control' size='4' name="card_name" type='text' required>
                           </div>
                           <div class='col-12 form-group pb-1 required'>
                              <label class='control-label'>Card Number <span class="text-danger">*</span></label>
                               <input autocomplete='off' name="card_number" required
                                class='form-control card-number' size='20'
                                 type='text'>
                           </div>
                        </div>
                        
                        <div class='form-row row'>
                           <div class='col-12 col-md-4 form-group cvc required'>
                              <label class='control-label'>CVC <span class="text-danger">*</span></label> <input autocomplete='off'
                                 class='form-control card-cvc' name="cvc" required
                                  placeholder='ex. 311' size='4'
                                 type='text'>
                           </div>
                           <div class='col-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Month <span class="text-danger">*</span></label> <input
                                 class='form-control card-expiry-month' required
                                  name="expire_month" placeholder='MM' size='2'
                                 type='text'>
                           </div>
                           <div class='col-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Year <span class="text-danger">*</span></label> <input
                                 class='form-control card-expiry-year' name="expire_date"
                                  placeholder='YYYY' size='4' required
                                 type='text'>
                           </div>
                        </div>
                        <div class='form-row row'>
                           <div class='col-6 form-group required'>
                              <label class=''>Amount <span class="text-danger">*</span></label> <input
                                 class='form-control' autocomplete='off' name="amount" id="amount" type='number' required>
                                 @error('amount')<p class="text-danger m-0">Please Enter a valid amount</p>@enderror
                           </div>
                           <div class='col-6 form-group required'>
                              <label class=''>Currency<span class="text-danger">*</span></label> 
                              <select name="currency" id="currency" class="form-control" required>
                                 <option value="">Select Currency</option>
                                 <option value="eur">EURO</option>
                                 <option value="usd">USD</option>
                              </select>
                              @error('currency')<p class="text-danger m-0">Please select a currency</p>@enderror
                           </div>
                        </div>
                        <div class='form-row row'>
                           <div class='col-12 form-group pb-1 required'>
                              <label class='control-label'>Your Email Address <span class="text-danger">*</span></label>
                               <input autocomplete='off' name="email" required
                                class='form-control'
                                 type='email'>
                                 @error('email')<p class="text-danger m-0">Please check the agreement chckbox</p>@enderror
                           </div>
                           <div class='col-12 form-group pb-1 required'>
                              <label class='control-label'>Short Description <span class="text-danger">*</span></label>
                               <input autocomplete='off' name="description" required
                                class='form-control'
                                 type='text'>
                           </div>
                           <div class='col-12 pb-0 required'>
                              <a href="{{asset('esro_policy.pdf')}}" target="_blank()" class="btn btn-link pl-0">Read Policy</a>
                           </div>
                           <div class='col-12 form-group pb-1 required'>
                               <input type='checkbox' name="agreement" required
                                class='form-checkbox'>
                              <label class='checkbox-label'> I have read and agree to the Standard Terms and Conditions</label>
                              @error('agreement')<p class="text-danger m-0">Please check the agreement chckbox</p>@enderror
                           </div>
                        </div>

                        <div class='form-row row'>
                           <div class='col-md-12 error form-group hide'>
                              <div class='alert-danger alert'>Please correct the errors and try
                                 again.
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <button class="btn btn-primary btn- btn-block" id="btn-pay-now" type="submit">Proceed to Payment</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
	

  

@endsection

@section('manual_scripts')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
   <script type="text/javascript">
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
      $('#btn-pay-now').attr('disabled','disabled');
      $('#btn-pay-now').text('Wait Please...');
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });
        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    });
    function stripeResponseHandler(status, response) {
        if (response.error) {
         $('#btn-pay-now').removeAttr('disabled');
         $('#btn-pay-now').text('Pay Now');

            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
   </script>	

@endsection