<?php

return [
    'stripe_secret' => env('STRIPE_SECRET'),
    'stripe_key'    =>     env('STRIPE_KEY'),
    'subscription_amount' => env('SUBSCRIPTION_AMOUNT',154),
    'stripe_fees' => env('STRIPE_FEES',3.15),
    'total_amount' => env('TOTAL_AMOUNT',157.15),
];
