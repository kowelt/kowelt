<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind Elements CSS -->
    <link rel="stylesheet" href="{{ asset('css/tw_elements/tw-elements.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tw_elements/font-awesome.css') }}" />

    <title>Generated PDF DE</title>
</head>
<body>

<div>
    <img class="h-8" alt="kowelt_logo" src="{{ asset('images/Logo_Transparent_HD_kopie.png') }}">
    <p class="uppercase text-gray-600" style="font-size: 0.47rem">Bringing the world together!</p>
</div>

<br>

<div style="position: relative">
    <div class="border" style="border-color: black; width: 250px; text-align: end; position: absolute; right: 0; top: 0; padding: 15px">
        <p style="font-size: 0.7rem">Name(n), Vorname(n): <b>{{ $user->lastname }}, {{ $user->firstname }}</b></p>
        <p style="font-size: 0.7rem">E-Mail: <b>{{ $user->email }}</b></p>
        <p style="font-size: 0.7rem">Geburtsdatum: <b>{{ date('d.m.Y', strtotime($user->date_of_birth)) }}</b></p>
        <p style="font-size: 0.7rem">Geschlecht: <b>@if($user->gender == '1') {{ __('account.homme') }} @elseif($user->gender == '2') {{ __('account.femme') }} @else {{ __('account.divers') }} @endif</b></p>
        <p style="font-size: 0.7rem">Nationalität: <b>{{ config('countries_list_de.' . $ugg_form->nationality) }}</b></p>
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
    <p style="position: absolute; right: 0">Datum: {{ $date }}</p>
    <br>
</div>

<h1 class="mt-2 text-lg font-bold">Teilnahme am KODREAMS-Wettbewerb - Session {{ $session->name_de }}</h1>

<p class="mt-3" style="font-size: 0.9rem">Sehr geehrte Damen und Herren,</p>

<p class="mt-3" style="font-size: 0.9rem">Mit diesem Dokument bewerbe ich mich für den KODREAMS-Wettbewerb</p>

<br>

<div class="border-b" style="position: relative; border-color: black">
    <p class="font-bold" style="font-size:0.8rem; position: absolute; left: 1%">Bewerbernummer</p>
    <p class="font-bold" style="font-size:0.8rem; position: absolute; left: 35%">Stadt der Teilnahme</p>
    <p class="font-bold" style="font-size:0.8rem; position: absolute; left: 77%">Sprache der Teilnahme</p>
    <br>
</div>
<div style="position: relative;">
    <p style="font-size:0.8rem; position: absolute; left: 1%">{{ '38448' . str_pad($ugg_form->id, 3, '0', STR_PAD_LEFT) }}</p>
    <p style="font-size:0.8rem; position: absolute; left: 35%">{{ $ugg_city->{'name_de'} }}</p>
    <p style="font-size:0.8rem; position: absolute; left: 77%">{{ str_replace("French - français", "Français", config("languages_list.$ugg_form->exam_language")) }}</p>
    <br>
</div>

<p class="mt-2" style="font-size: 0.9rem">Die erforderlichen Unterlagen lege ich bei(In meinem Bewerberbereich):</p>

<p class="mt-2 ml-6" style="font-size:0.9rem">
    <span class="font-bold">-</span>&nbsp;&nbsp; Nachweis der Zahlung der Teilnahmegebühr in Höhe von <b>154,00 Euro</b> auf das folgende Konto bei
    der Bank <b>Sparkasse Celle-Gifhorn-Wolfsburg</b>, IBAN: <b>DE37 2695 1311 0162 4943 06</b>, BIC: <b>NOLADE21GFW</b> unter Angabe des Verwendungszwecks: <b>{{ '38448' . str_pad($ugg_form->id, 3, '0', STR_PAD_LEFT) }}</b>, <b>{{ $user->lastname }}</b>, <b>{{ $user->firstname }}</b>, <b>{{ date('d.m.Y', strtotime($user->date_of_birth)) }}</b>. <br>Bitte beachten Sie, dass die Überweisungsgebühren vollständig vom Absender getragen werden
</p>

<p class="mt-2 ml-6" style="font-size:0.9rem">
    <span class="font-bold">-</span>&nbsp;&nbsp; Dieses Dokument datiert und unterschrieben
</p>

<p class="mt-2" style="font-size:0.9rem">
    (Bitte überweisen Sie den fälligen Betrag so schnell wie möglich auf die angegebene Bankverbindung, spätestens
    jedoch bis zum <b>{{ $end_date }}</b>, um Ihre Anmeldung zur KODREAMS-Prüfung (Session Kamerun 2023) zu gewährleisten.
    <br>Nach Ablauf der genannten Frist wird Ihre Bewerbung einfach abgelehnt und Sie können den KODREAMS-
    Auswahlprozess nicht fortsetzen.)
</p>

<p class="mt-2" style="font-size:0.9rem">
    Ich versichere, dass die von mir im Rahmen dieses Bewerbungsverfahrens gemachten Angaben und die online
    übermittelten Informationen vollständig und richtig sind. Mir ist bewusst, dass fahrlässig oder vorsätzlich falsche
    Angaben ordnungswidrig sind und zum Ausschluss vom Verfahren oder, falls dies erst nach der Auswahl festgestellt
    wird, zum Widerruf der Auswahl führen.
</p>

<p class="mt-2" style="font-size:0.9rem">
    Ich stimme der Verwendung meiner persönlichen Daten im Rahmen des Bewerbungsverfahrens zu. Außerdem
    bestätige ich ehrenwörtlich, dass die Angaben zu Studienzeiten und Bildungsabschlüssen korrekt sind.
</p>

<p class="mt-2" style="font-size:0.9rem">Mit freundlichen Grüßen</p>
<p style="font-size:0.6rem">(Bei Minderjährigen ist die Unterschrift des / der Erziehungsberechtigten notwendig)</p>

<br>

<div style="position: relative; font-size: 0.8rem">
    <p style="text-decoration: overline; position: absolute; left: 0">Datum und Unterschrift des Bewerbers/ der Bewerberin</p>
    <p style="text-decoration: overline; position: absolute; right: 0">Datum und Unterschrift der/ des Erziehungsberechtigten</p>
</div>

</body>
</html>
