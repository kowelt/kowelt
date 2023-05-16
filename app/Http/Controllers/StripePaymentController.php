<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        if (Auth::user()->status != "selected_second_phase") {
            return redirect()->back();
        }
        return view('stripe.index', ['navigation' => 'kodreams']);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(config("stripe.stripe_secret"));

        $email = Auth::user()->email;
        $amount = config("stripe.total_amount");


        $charge = Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "Payement des Frais de dossier de l'utilisateur ".$email,
                "receipt_email" => $email,

        ]);

        // Handle the response from Stripe
        if ($charge->status == 'succeeded') {
            User::whereId(auth()->user()->id)->update([
                'status'=> "registered_for_the_exam",
                'payment_method' => User::PAYMENT_METHOD_STRIPE
            ]);

            return redirect(route('ugg.dashboard', [$request->language, 'home']))->with('success', 'Payment successful!');

        }
         else {
             return redirect(route('ugg.dashboard', [app()->getLocale(), 'kodreams-form','navigation' => 'kodreams']))->with('error','Payment failed!');
        }
    }

}
