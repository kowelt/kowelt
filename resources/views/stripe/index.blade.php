@extends('layouts.app')
@section('content')
    <div class="bg-white pt-[80px]"></div>
    <div class="bg-white text-gray-800 mx-auto font-notosans">
        <div class="container mx-auto p-4">

            <h1 class="text-center py-4 text-2xl font-bold">Payement bancaire pour KOWELT</h1>

            <div class="mx-auto my-12 w-1/2">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-body">

                        @if (Session::has('success'))
                            <div class="alert bg-green-100 text-green-500 flex items-center my-2 gap-2">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form role="form" action="{{ route('stripe.post', app()->getLocale()) }}" method="post"
                            class="require-validation grid gap-3" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form"
                            >
                            @csrf

                            <div class=''>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>{{ __('payment-message.payment-card-name') }}</label>
                                    <input class='form-control' size='4' type='text' required>
                                </div>
                            </div>
                            <div class=''>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>{{ __('payment-message.payment-card-number') }}</label>
                                    <input autocomplete='off' class='form-control card-number' size='20' type='text' required>
                                </div>
                            </div>

                            <div class='grid grid-cols-3 gap-3'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>{{ __('payment-message.payment-card-cvv') }}</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' required>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>{{ __('payment-message.payment-card-expiry-month') }}</label>
                                    <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' required>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>{{ __('payment-message.payment-card-expiry-year') }}</label>
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' required>
                                </div>
                            </div>

                            <div class=''>
                                <div class='col-xs-12 form-group required'>
                                    <p><span>{{ __('payment-message.examination_fees') }}</span>{{config("stripe.subscription_amount")}} €</p>
                                </div>

                                <div class='col-xs-12 form-group required'>
                                    <p><span>{{ __('payment-message.payment_fees') }}</span>{{config("stripe.stripe_fees")}} €</p>
                                </div>
                            </div>


                            <div class='form-row row'>
                                <div class='col-md-12 error form-group invisible'>
                                    <div class='alert-danger alert text-red-500'>Please correct the errors and try
                                        again.</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <button class="text-xl scale-90 md:scale-100 mx-auto hover:underline gradient-ugg text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out uppercase" type="submit">{{ __('payment-message.payment-form-validation') }}
                                        {{config('stripe.total_amount')}} €</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('invisible');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('invisible');
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

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('invisible')
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

        });
    </script>
@endsection
