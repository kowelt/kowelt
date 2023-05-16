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
        if (Auth::user()->status == "register_for_the_exam") {
            return redirect(route('ugg.dashboard', [app()->getLocale(), 'kodreams-form','navigation' => 'kodreams']));
        }
        return view('stripe.index', [app()->getLocale(), 'kodreams-form','navigation' => 'kodreams']);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $email = Auth::user()->email;
        $amount = env('TOTAL_AMOUNT');


        $charge = Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "Payement des Frais de dossier de l'utilisateur ".$email,
                "receipt_email" => $email,

        ]);

        // Handle the response from Stripe
        if ($charge->status == 'succeeded') {
            Log::info($charge);
            User::whereId(auth()->user()->id)->update([
                'status'=> "register_for_the_exam",
            ]);

            Session::flash('success', 'Payment successful!');

            return redirect(route('ugg.dashboard', [app()->getLocale(), 'kodreams-form','navigation' => 'kodreams']))->with('success','Payment successful!');
        }
         else {
             return redirect(route('ugg.dashboard', [app()->getLocale(), 'kodreams-form','navigation' => 'kodreams']))->with('error','Payment failed!');
        }
    }

}
