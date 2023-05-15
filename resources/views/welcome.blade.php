@extends('layouts.app')
@section('content')
    <div class="h-screen bg-[url('/resources/images/image_acceuil.jpg')] bg-cover bg-center bg-fixed grid grid-cols-1 place-content-center">
        <div class="h-screen w-full bg-black bg-opacity-50 bg-cover bg-center bg-fixed grid grid-cols-1 place-content-center pt-8 pb-4">
            <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                <!--Left Col-->
                <div class="flex flex-col w-full justify-center items-start text-center">
                    <p class="uppercase tracking-loose w-full text-md md:text-3xl">Bringing the world together!</p>
                    <h1 class="my-4 text-2xl md:text-6xl font-bold leading-tight">
                        {{ __('accueil.texte_principal') }}
                    </h1>
                    <p class="leading-normal text-xl md:text-3xl mb-8 mx-auto">
                        {{ __('accueil.texte_secondaire') }}
                    </p>
                    {{--<a href="#service" target="_blank" class="text-xl scale-90 md:scale-100 mx-auto hover:underline gradient-ugg text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out uppercase">
                        {{ __('accueil.texte_bouton') }}
                    </a>--}}
                    <a href="{{ route('ugg.kodreams', 'fr') }}" target="_blank" class="text-xl scale-90 md:scale-100 mx-auto hover:underline gradient-ugg text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out uppercase">
                        Kodreams
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 bg-gray-100"></div>
    <section class="bg-gray-100 border-b pt-2 pb-8 text-gray-800">
        <div class="max-w-6xl mx-auto m-8">
            <p class="mt-6 text-center text-[32px] mx-4 font-bold text-gray-900">
                {{ __('accueil.texte_accroche') }}
            </p>
            <br>
            <br>
            <br>
            <div class="w-full flex justify-center">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 mx-4 max-w-6xl">
                    <div class="border p-6 hover:scale-105 shadow">
                        <div class="mb-4">
                            <img class="h-40 mx-auto" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/3d/Realtor and Prospects Handshaking - 481x481.png') }}" alt="sdfd">
                        </div>
                        <div>
                            <div class="text-2xl mb-4 font-semibold text-center text-[#64C193]">
                                {{ __('accueil.titre_etape_1') }}
                            </div>
                            <div class="text-lg text-center">
                                {{ __('accueil.description_etape_1') }}
                            </div>
                        </div>
                    </div>

                    <div class="border p-6 hover:scale-105 shadow">
                        <div class="mb-4">
                            <img class="h-40 mx-auto" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/3d/Project Management - 640x533.png') }}" alt="sdfd">
                        </div>
                        <div>
                            <div class="text-2xl mb-4 font-semibold text-center text-[#64C193]">
                                {{ __('accueil.titre_etape_2') }}
                            </div>
                            <div class="text-lg text-center">
                                {{ __('accueil.description_etape_2') }}
                            </div>
                        </div>
                    </div>

                    <div class="border p-6 hover:scale-105 shadow">
                        <div class="mb-4">
                            <img class="h-40 mx-auto" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/3d/Work From Home - 640x427.png') }}" alt="sdfd">
                        </div>
                        <div>
                            <div class="text-2xl mb-4 font-semibold text-center text-[#64C193]">
                                {{ __('accueil.titre_etape_3') }}
                            </div>
                            <div class="text-lg text-center">
                                {{ __('accueil.description_etape_3') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="products"></div>
    </section>

    <div id="about_us" class="p-4 gradient-primary"></div>
    <section class="gradient-primary border-b pb-8 text-gray-800">
        <div class="container mx-auto m-8">
            <br>
            <p class="mt-6 text-center text-6xl mx-4 font-bold text-white">
                {{ __('about.texte_principal') }}
            </p>
            <br>
            <p class="mt-6 text-center text-5xl mx-4 font-bold text-white">
                {{ __('about.texte_secondaire') }}
            </p>
            <br>
            <p class="mt-6 text-center text-3xl mx-4 font-bold text-white">
                {{ __('about.texte_secondaire_2') }} <br>
                <br>
                {{ __('about.texte_secondaire_3') }}
            </p>
            <br>
            <br>
        </div>
    </section>
    <section class="bg-[#F5F6F8] bg-cover border-b pt-2 pb-8 text-black">
        <div class="max-w-6xl mx-auto m-8">
            <div class="flex flex-wrap items-center">
                <div class="w-full md:w-4/6 p-6">
                    <br class="hidden md:block">
                    <br class="hidden md:block">
                    <p class="mb-8 text-lg md:text-xl">
                        <span class="font-bold">KOWELT</span> {{ __('about.paragraphe_1') }}
                    </p>
                    <p class="mb-8 text-lg md:text-xl">
                        {{ __('about.paragraphe_2') }}
                    </p>
                    <p class="text-lg md:text-xl">
                        {{ __('about.paragraphe_3') }}
                    </p>
                </div>
                <div class="w-full md:w-2/6 px-6 md:mt-10">
                    <img class="w-full" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/avion_monde.jpg') }}" alt="sdfs">
                </div>
            </div>
        </div>
    </section>

    <div id="service" class="p-4 bg-white border-t"></div>
    <section class="bg-white border-b pt-6 pb-8 text-black">
        <div class="container mx-auto m-8">
            <div class="max-w-6xl mx-auto">
                <p class="mt-6 text-center text-5xl mx-4 font-bold">
                    {{ __('services.texte_principal') }}
                    <br>
                    <br>
                    {{ __('services.texte_secondaire') }}
                    <br>
                    <br>
                </p>
            </div>
            <div class="max-w-7xl mx-auto mt-12 grid grid-cols-1 lg:grid-cols-2 justify-between gap-x-12 gap-y-12">

                <div class="flex flex-col justify-center m-4 order-1">
                    <p class="text-4xl mb-6 font-bold">
                        {{ __('services.titre_1') }}
                    </p>
                    <p class="text-[21px] leading-8 lg:mr-12">
                        {{ __('services.paragraphe_1') }}
                    </p>
                </div>
                <div class="order-2">
                    <img class="max-h-[22rem] mx-auto rounded-3xl" alt="ddss" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Plan_1.jpg') }}">
                </div>

                <div class="order-4 lg:order-3">
                    <img class="max-h-[22rem] mx-auto rounded-3xl" alt="ddss" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Plan_2.jpg') }}">
                </div>
                <div class="flex flex-col justify-center m-4 order-3 lg:order-4">
                    <p class="text-4xl mb-6 font-bold">
                        {{ __('services.titre_2') }}
                    </p>
                    <p class="text-[21px] leading-8 lg:mr-12">
                        {{ __('services.paragraphe_2') }}
                    </p>
                </div>

                <div class="flex flex-col justify-center m-4 order-5">
                    <p class="text-4xl mb-6 font-bold">
                        {{ __('services.titre_3') }}
                    </p>
                    <p class="text-[21px] leading-8 lg:mr-12">
                        {{ __('services.paragraphe_3') }}
                    </p>
                </div>
                <div class="order-6">
                    <img class="max-h-[22rem] mx-auto rounded-3xl" alt="ddss" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Plan_3.jpg') }}">
                </div>

                <div class="order-8 lg:order-7">
                    <img class="max-h-[22rem] mx-auto rounded-3xl" alt="ddss" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Plan_4.jpg') }}">
                </div>
                <div class="flex flex-col justify-center m-4 order-7 lg:order-8">
                    <p class="text-4xl mb-6 font-bold break-words">
                        {{ __('services.titre_4') }}
                    </p>
                    <p class="text-[21px] leading-8 lg:mr-12">
                        {{ __('services.paragraphe_4') }}
                    </p>
                </div>

                <div class="flex flex-col justify-center m-4 order-9">
                    <p class="text-4xl mb-6 font-bold break-words">
                        {{ __('services.titre_5') }}
                    </p>
                    <p class="text-[21px] leading-8 lg:mr-12">
                        {{ __('services.paragraphe_5') }}
                    </p>
                </div>
                <div class="order-10">
                    <img class="max-h-[22rem] mx-auto rounded-3xl" alt="ddss" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Plan_5.jpg') }}">
                </div>

            </div>
        </div>

        <br>
        <br>
    </section>

    <div id="branche" class="p-4 gradient-primary"></div>
    <section class="gradient-primary border-b pt-6 pb-8">
        <div class="container mx-auto m-8">
            <div class="max-w-6xl mx-auto">
                <p class="mt-6 text-center text-4xl mx-4 font-bold">
                    {{ __('branches.texte_principal') }}
                </p>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-center w-full">
            <div class="container grid grid-cols-1 xl:grid-cols-2 gap-4 mx-2 text-gray-800">
                <div class="flex flex-col sm:flex-row justify-between items-center bg-white rounded-lg shadow hover:shadow-xl hover:scale-y-105 overflow-hidden">
                    <div class="basis-1/3 bg-[url('/resources/images/branches/Transport_Logistique.jpg')] bg-cover md:h-full">
                        <img class="" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/branches/Transport_Logistique.jpg') }}" alt="sad">
                    </div>
                    <div class="basis-2/3 p-4">
                        <div class="mb-2 text-2xl text-green-500 font-semibold">
                            {{ __('branches.branche_3') }}
                        </div>
                        <div class="font-bold text-lg">
                            {{ __('branches.titre_3') }}
                        </div>
                        <div>
                            {{ __('branches.paragraphe_3') }}
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-center bg-white rounded-lg shadow hover:shadow-xl hover:scale-y-105 overflow-hidden">
                    <div class="basis-1/3 bg-[url('/resources/images/branches/Santé_soins.jpg')] bg-cover md:h-full">
                        <img class="" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/branches/Sante_et_soins.jpg') }}" alt="sad">
                    </div>
                    <div class="basis-2/3 p-4">
                        <div class="mb-2 text-2xl text-green-500 font-semibold">
                            {{ __('branches.branche_2') }}
                        </div>
                        <div class="font-bold text-lg">
                            {{ __('branches.titre_2') }}
                        </div>
                        <div>
                            {{ __('branches.paragraphe_2') }}
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-center bg-white rounded-lg shadow hover:shadow-xl hover:scale-y-105 overflow-hidden">
                    <div class="basis-1/3 bg-[url('/resources/images/branches/IT.jpg')] bg-cover md:h-full">
                        <img class="" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/branches/IT.jpg') }}" alt="sad">
                    </div>
                    <div class="basis-2/3 p-4">
                        <div class="mb-2 text-2xl text-green-500 font-semibold">
                            {{ __('branches.branche_1') }}
                        </div>
                        <div class="font-bold text-lg">
                            {{ __('branches.titre_1') }}
                        </div>
                        <div>
                            {{ __('branches.paragraphe_1') }}
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-center bg-white rounded-lg shadow hover:shadow-xl hover:scale-y-105 overflow-hidden">
                    <div class="basis-1/3 bg-[url('/resources/images/branches/Technique_Industrie.jpg')] bg-cover md:h-full">
                        <img class="" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/branches/Technique_Industrie.jpg') }}" alt="sad">
                    </div>
                    <div class="basis-2/3 p-4">
                        <div class="mb-2 text-2xl text-green-500 font-semibold">
                            {{ __('branches.branche_4') }}
                        </div>
                        <div class="font-bold text-lg">
                            {{ __('branches.titre_4') }}
                        </div>
                        <div>
                            {{ __('branches.paragraphe_4') }}
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-center bg-white rounded-lg shadow hover:shadow-xl hover:scale-y-105 overflow-hidden">
                    <div class="basis-1/3 bg-[url('/resources/images/branches/Gastro_Hotellerie.jpg')] bg-cover md:h-full">
                        <img class="" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/branches/Gastro_Hotellerie.jpg') }}" alt="sad">
                    </div>
                    <div class="basis-2/3 p-4">
                        <div class="mb-2 text-2xl text-green-500 font-semibold">
                            {{ __('branches.branche_5') }}
                        </div>
                        <div class="font-bold text-lg">
                            {{ __('branches.titre_5') }}
                        </div>
                        <div>
                            {{ __('branches.paragraphe_5') }}
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-center bg-white rounded-lg shadow hover:shadow-xl hover:scale-y-105 overflow-hidden">
                    <div class="basis-1/3 bg-[url('/resources/images/Sciences.jpg')] bg-cover md:h-full">
                        <img class="" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/branches/Sciences.jpg') }}" alt="sad">
                    </div>
                    <div class="basis-2/3 p-4">
                        <div class="mb-2 text-2xl text-green-500 font-semibold">
                            {{ __('branches.branche_6') }}
                        </div>
                        <div class="font-bold text-lg">
                            {{ __('branches.titre_6') }}
                        </div>
                        <div>
                            {{ __('branches.paragraphe_6') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </section>

    <div id="contact" class="p-4 bg-white"></div>
    <section class="bg-white border-b pt-6 pb-8 text-gray-800">
        <div class="max-w-6xl mx-auto m-8">
            <h2 class="w-full my-2 text-4xl md:text-5xl font-bold leading-tight text-center">
                {{ __('contact.texte_principal') }}
            </h2>
        </div>

        <br>
        <br>

        <div class="lg:flex lg:justify-center w-full gap-4 px-4">
            <div class="lg:basis-1/2">
                <iframe style="border:0; width: 100%; height: 400px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2432.1487600964024!2d10.836110415939013!3d52.44021994989079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47af9167413bb669%3A0x2c946bff6a047b27!2sLange%20Str.%2038%2C%2038448%20Wolfsburg!5e0!3m2!1sfr!2sde!4v1673209331373!5m2!1sfr!2sde" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="lg:basis-1/2 mt-6">
                <div class="md:flex md:justify-around w-full">
                    <div class="flex items-center gap-x-1 w-fit">
                        <div>
                            <svg class="h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </div>
                        <div class="text-lg">
                            Lange Straße 38, 38448 Wolfsburg Deutschland
                        </div>
                    </div>

                    <div class="flex items-center gap-x-1 w-fit mt-4 md:mt-0">
                        <div>
                            <svg class="h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div class="text-lg">
                            <a href="mailto:contact.germany@kowelt.de">contact.germany@kowelt.de</a>
                        </div>
                    </div>

                    <div class="flex items-center gap-x-1 w-fit mt-4 md:mt-0">
                        <div>
                            <svg class="h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                            </svg>
                        </div>
                        <div class="text-lg">
                            +49 157 74994924
                        </div>
                    </div>
                </div>
                <div class="mt-7">
                    <form action="{{ route('send-contact-message', app()->getLocale()) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-6 gap-5">
                            <div class="col-span-6 sm:col-span-3">
                                <input type="text" name="name" id="name" placeholder="{{ __('contact.votre_nom') }}" autocomplete="name" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('name') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <input type="text" name="email" id="email" placeholder="{{ __('contact.votre_email') }}" autocomplete="email" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('email') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            </div>

                            <div class="col-span-6">
                                <input type="text" name="subject" id="subject" placeholder="{{ __('contact.sujet') }}" autocomplete="subject" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('subject') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            </div>

                            <div class="col-span-6">
                                <div class="">
                                    <textarea id="message" name="message" rows="5" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('message') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="{{ __('contact.message') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="py-3 text-start pt-4">
                            <button type="submit" class="inline-flex justify-center rounded-sm gradient-primary py-3 px-6 text-sm font-medium text-white hover:shadow-blue-500/60 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition hover:scale-[1.02] duration-300 ease-in-out"
                            >{{ __('contact.envoyer') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
    </section>

@endsection
