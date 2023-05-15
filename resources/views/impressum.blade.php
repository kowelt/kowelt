@extends('layouts.app')
@section('content')
    <div class="bg-white pt-[80px]"></div>
    <section class="gradient-primary border-b pt-2 pb-4 text-gray-800 px-4">
        <div class="max-w-6xl mx-auto">
            <br>
            <p class="mt-6 text-center text-4xl md:text-6xl font-bold text-white">
                {{ __('Impressum') }}
            </p>
            <br>
            <br>
        </div>
    </section>
    <div class="bg-white text-gray-800 py-4">
        <div class="p-6 max-w-4xl mx-auto">

            <div class="text-2xl font-bold">
                Adresse
            </div>
            <div class="text-xl">
                KOWELT UG (Haftungsbeschränkt)<br>
                Lange Straße 38<br>
                38448 Wolfsburg<br>
                Deutschland<br>
                contact.germany@kowelt.de
            </div>
            <br>
            <br>

            <div class="text-2xl font-bold">
                Geschäftsführer
            </div>
            <div class="text-xl">
                Cédric William Tsebaze
            </div>
            <br>
            <br>

            <div class="text-2xl font-bold">
                Sitz der Gesellschaft
            </div>
            <div class="text-xl">
                Wolfsburg
            </div>
            <br>
            <br>

            <div class="text-2xl font-bold">
                Registergericht
            </div>
            <div class="text-xl">
                Amtsgericht Braunschweig (HR)B 210454
            </div>
            <br>
            <br>

            {{--<div class="text-2xl font-bold">
                Steueridentifikation
            </div>
            <div class="text-xl">
                St.Nr.: --- --- ---<br>
                USt-IdNr.: --- --- ---<br>
            </div>
            <br>
            <br>--}}

            <div class="text-2xl font-bold">
                Verantwortlich gemäß § 55 RStV:
            </div>
            <div class="text-xl">
                Cédric William Tsebaze<br>
                Lange Straße 38<br>
                38448 Wolfsburg<br>
                Deutschland<br>
            </div>
            <br>
            <br>

            <div class="text-xl">
                Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit, die Sie hier
                finden: <a class="hover:underline" target="_blank" href="https://ec.europa.eu/consumers/odr/">https://ec.europa.eu/consumers/odr/</a>
            </div>
            <br>

            <div class="text-xl">
                Wir sind bereit, an einem außergerichtlichen Schlichtungsverfahren vor einer
                Verbraucherschlichtungsstelle teilzunehmen.
            </div>
            <br>

            <div class="text-xl">
                Zur Erstellung dieser Webseite wurden Bilder der Firma Pexels GmbH (<a class="hover:underline" target="_blank" href="https://www.pexels.com/fr-fr/">https://www.pexels.com/fr-fr/</a>) verwendet.
            </div>
            <br>

        </div>
    </div>
@endsection
