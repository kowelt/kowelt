<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind Elements CSS -->
    <link rel="stylesheet" href="{{ asset('css/tw_elements/tw-elements.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tw_elements/font-awesome.css') }}" />

    <title>Generated PDF FR</title>
</head>
<body>

<div>
    <img class="h-8" alt="kowelt_logo" src="{{ asset('images/Logo_Transparent_HD_kopie.png') }}">
    <p class="uppercase text-gray-600" style="font-size: 0.47rem">Bringing the world together!</p>
</div>

<br>

<div style="position: relative">
    <div class="border" style="border-color: black; width: 250px; text-align: end; position: absolute; right: 0; top: 0; padding: 15px">
        <p style="font-size: 0.7rem">Nom(s), Prénom(s): <b>{{ $user->lastname }}, {{ $user->firstname }}</b></p>
        <p style="font-size: 0.7rem">Email: <b>{{ $user->email }}</b></p>
        <p style="font-size: 0.7rem">Date de naissance: <b>{{ date('d.m.Y', strtotime($user->date_of_birth)) }}</b></p>
        <p style="font-size: 0.7rem">Sexe: <b>@if($user->gender == '1') {{ __('account.homme') }} @elseif($user->gender == '2') {{ __('account.femme') }} @else {{ __('account.divers') }} @endif</b></p>
        <p style="font-size: 0.7rem">Nationalité: <b>{{ config('countries_list_fr.' . $ugg_form->nationality) }}</b></p>
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

<h1 class="mt-2 text-lg font-bold">Participation au concours KODREAMS - Session {{ $session->name_fr }}</h1>

<p class="mt-3" style="font-size: 0.9rem">Madame, Monsieur,</p>

<p class="mt-3" style="font-size: 0.9rem">Par le présent document, je pose ma candidature pour le concours KODREAMS</p>

<br>

<div class="border-b" style="position: relative; border-color: black">
    <p class="font-bold" style="font-size:0.8rem; position: absolute; left: 1%">N° du postulant(e)</p>
    <p class="font-bold" style="font-size:0.8rem; position: absolute; left: 35%">Ville de participation</p>
    <p class="font-bold" style="font-size:0.8rem; position: absolute; left: 77%">Langue de participation</p>
    <br>
</div>
<div style="position: relative;">
    <p style="font-size:0.8rem; position: absolute; left: 1%">{{ '38448' . str_pad($ugg_form->id, 3, '0', STR_PAD_LEFT) }}</p>
    <p style="font-size:0.8rem; position: absolute; left: 35%">{{ $ugg_city->{'name_fr'} }}</p>
    <p style="font-size:0.8rem; position: absolute; left: 77%">{{ str_replace("French - français", "Français", config("languages_list.$ugg_form->exam_language")) }}</p>
    <br>
</div>

<p class="mt-2" style="font-size: 0.9rem">Je joins les documents nécessaires(Dans mon espace candidat):</p>

<p class="mt-2 ml-6" style="font-size:0.9rem">
    <span class="font-bold">-</span>&nbsp;&nbsp; Preuve du paiement des frais de participation d'un montant de <b>154,00 euros</b> sur le compte suivant auprès de la Banque <b>Sparkasse Celle-Gifhorn-Wolfsburg</b>, IBAN: <b>DE37 2695 1311 0162 4943 06</b>, BIC: <b>NOLADE21GFW</b> sous le motif de paiement: <b>{{ '38448' . str_pad($ugg_form->id, 3, '0', STR_PAD_LEFT) }}</b>, <b>{{ $user->lastname }}</b>, <b>{{ $user->firstname }}</b>, <b>{{ date('d.m.Y', strtotime($user->date_of_birth)) }}</b>. <br>Veuillez noter que les frais de virement sont entièrement à la charge de l'émetteur
</p>

<p class="mt-2 ml-6" style="font-size:0.9rem">
    <span class="font-bold">-</span>&nbsp;&nbsp; Le présent document daté et signé
</p>

<p class="mt-2" style="font-size:0.9rem">
    (Veuillez virer le montant dû le plus rapidement possible sur le compte bancaire indiqué, et au plus tard le <b>{{ $end_date }}</b>, afin
    de garantir votre inscription à l'examen KODREAMS (Session Cameroun 2023).
    <br>Passé ce délai, votre candidature sera tout simplement rejetée et vous ne pourrez pas poursuivre le processus de
    sélection KODREAMS.)
</p>

<p class="mt-2" style="font-size:0.9rem">
    Je certifie que les informations que j'ai fournies dans le cadre de la présente procédure de candidature et les
    informations envoyées en ligne sont complètes et exactes. Je suis conscient(e) que toute fausse déclaration faite par
    négligence ou intentionnellement constitue une infraction et entraîne l'exclusion de la procédure ou, en cas de
    constatation après la sélection, la révocation de celle-ci.
</p>

<p class="mt-2" style="font-size:0.9rem">
    J'autorise l'utilisation de mes données personnelles dans le cadre de la procédure de candidature. En outre, je certifie
    sur l'honneur que les informations relatives aux périodes d'études et aux diplômes sont exactes.
</p>

<p class="mt-4" style="font-size:0.9rem">Salutations cordiales</p>
<p style="font-size:0.6rem">(Pour les mineurs, la signature du/des responsable(s) légal/légaux est nécessaire)</p>

<br>
<br>
<br>

<div style="position: relative; font-size: 0.8rem">
    <p style="text-decoration: overline; position: absolute; left: 0">Date et signature du candidat / de la candidate</p>
    <p style="text-decoration: overline; position: absolute; right: 0">Date et signature du/de la responsable légal(e)</p>
</div>

</body>
</html>
