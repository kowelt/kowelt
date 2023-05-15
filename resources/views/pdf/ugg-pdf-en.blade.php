<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind Elements CSS -->
    <link rel="stylesheet" href="{{ asset('css/tw_elements/tw-elements.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tw_elements/font-awesome.css') }}" />

    <title>Generated PDF EN</title>
</head>
<body>

<div>
    <img class="h-8" alt="kowelt_logo" src="{{ asset('images/Logo_Transparent_HD_kopie.png') }}">
    <p class="uppercase text-gray-600" style="font-size: 0.47rem">Bringing the world together!</p>
</div>

<br>

<div style="position: relative">
    <div class="border" style="border-color: black; width: 250px; text-align: end; position: absolute; right: 0; top: 0; padding: 15px">
        <p style="font-size: 0.7rem">Name, Surname: <b>{{ $user->lastname }}, {{ $user->firstname }}</b></p>
        <p style="font-size: 0.7rem">E-Mail: <b>{{ $user->email }}</b></p>
        <p style="font-size: 0.7rem">Date of birth: <b>{{ date('d.m.Y', strtotime($user->date_of_birth)) }}</b></p>
        <p style="font-size: 0.7rem">Gender: <b>@if($user->gender == '1') {{ __('account.homme') }} @elseif($user->gender == '2') {{ __('account.femme') }} @else {{ __('account.divers') }} @endif</b></p>
        <p style="font-size: 0.7rem">Nationality: <b>{{ config('countries_list_en.' . $ugg_form->nationality) }}</b></p>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>

<div>
    <p style="text-decoration: underline; font-size: 0.6rem">{{ $user->lastname }}, {{ $user->firstname }} - {{ $ugg_form->leaving_city }}</p>
    <p style="font-size: 0.9rem">KOWELT UG (Haftungsbeschränkt)</p>
    <p style="font-size: 0.9rem">Lange Straße 38</p>
    <p style="font-size: 0.9rem">38448 Wolfsburg</p>
    <p style="font-size: 0.9rem">Germany</p>
</div>

<div class="mt-2" style="position: relative">
    <p style="position: absolute; right: 0">Date: {{ $date }}</p>
    <br>
</div>

<h1 class="mt-2 text-lg font-bold">Participation in the KODREAMS Competition - Session {{ $session->name_en }}</h1>

<p class="mt-3" style="font-size: 0.9rem">Dear sir or madam,</p>

<p class="mt-3" style="font-size: 0.9rem">With this document I apply for the KODREAMS competition</p>

<br>

<div class="border-b" style="position: relative; border-color: black">
    <p class="font-bold" style="font-size:0.8rem; position: absolute; left: 1%">Applicant Nr.</p>
    <p class="font-bold" style="font-size:0.8rem; position: absolute; left: 35%">City of participation</p>
    <p class="font-bold" style="font-size:0.8rem; position: absolute; left: 77%">Language of participation</p>
    <br>
</div>
<div style="position: relative;">
    <p style="font-size:0.8rem; position: absolute; left: 1%">{{ '38448' . str_pad($ugg_form->id, 3, '0', STR_PAD_LEFT) }}</p>
    <p style="font-size:0.8rem; position: absolute; left: 35%">{{ $ugg_city->{'name_en'} }}</p>
    <p style="font-size:0.8rem; position: absolute; left: 77%">{{ str_replace("French - français", "Français", config("languages_list.$ugg_form->exam_language")) }}</p>
    <br>
</div>

<p class="mt-2" style="font-size: 0.9rem">I enclose the required documents(In my candidate's area):</p>

<p class="mt-2 ml-6" style="font-size:0.9rem">
    <span class="font-bold">-</span>&nbsp;&nbsp; Proof of payment of the participation fees of <b>154,00 euros</b> to the following
    account at Bank <b>Sparkasse Celle-Gifhorn-Wolfsburg</b>, IBAN: <b>DE37 2695 1311 0162 4943 06</b>, BIC: <b>NOLADE21GFW</b> stating the purpose of payment: <b>{{ '38448' . str_pad($ugg_form->id, 3, '0', STR_PAD_LEFT) }}</b>, <b>{{ $user->lastname }}</b>, <b>{{ $user->firstname }}</b>, <b>{{ date('d.m.Y', strtotime($user->date_of_birth)) }}</b>. <br>Please note that the costs of the transfer are entirely at the issuer's expenses
</p>

<p class="mt-2 ml-6" style="font-size:0.9rem">
    <span class="font-bold">-</span>&nbsp;&nbsp; This document dated and signed
</p>

<p class="mt-2" style="font-size:0.9rem">
    (Please transfer the amount due to the bank account indicated as soon as possible, but no later than <b>{{ $end_date }}</b>, in order
    to guarantee your registration for the KODREAMS examination (Session Cameroon 2023).
    <br>After the deadline mentioned above, your application will simply be rejected and you will not be able to continue the
    KODREAMS selection process.)
</p>

<p class="mt-2" style="font-size:0.9rem">
    I certify that the information I have provided in this application process and the information submitted online is complete
    and correct. I am aware that negligent or intentional misrepresentation is a violation of the rules and will result in
    disqualification from the procedure or, if discovered after selection, revocation of selection.
</p>

<p class="mt-2" style="font-size:0.9rem">
    I agree to the use of my personal data in the application process. Furthermore, I confirm on my honour that the
    information on periods of study and educational qualifications is correct.
</p>

<p class="mt-4" style="font-size:0.9rem">Yours sincerely</p>
<p style="font-size:0.6rem">(For minors, the signature of the legal guardian(s) is required)</p>

<br>
<br>
<br>

<div style="position: relative; font-size: 0.8rem">
    <p style="text-decoration: overline; position: absolute; left: 0">Date and applicant’s signature</p>
    <p style="text-decoration: overline; position: absolute; right: 0">Date and signature of parent/guardian</p>
</div>

</body>
</html>
