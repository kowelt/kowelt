<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        return view('stripe.index');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        // $user = User::find(auth()->user()->id);

        // $user::update([
        //   "status"=>"paid"
        // ]);

        User::whereId(auth()->user()->id)->update([
          'status'=> "register_for_the_exam",
        ]);

        Session::flash('success', 'Payment successful!');


        return redirect(route('ugg.dashboard', [app()->getLocale(), 'kodreams-form']))->with('success','Payment successful!');
    }
}