@extends('layouts.app')
@section('content')
    <div class="bg-white pt-[80px]"></div>
    <div class="bg-white text-gray-800 mx-auto font-notosans">
        <div class="mx-auto p-4">
            <div class="mx-auto mb-12">
                <div class="bg-[url('/resources/images/kodreams/kowelt-header-Montage.png')] bg-cover bg-bottom h-96 relative flex justify-center">
                    <div class="flex flex-col gap-3 text-center pt-6">
                    </div>
                    <div class="flex gap-5 absolute xl:left-60 lg:left-40 md:left-20 -bottom-6 inline-flex h-40 break-words">
                        <div class="bg-[#26549A70] text-center rounded-sm shadow py-5 px-24 xl:px-36 flex items-center gap-x-2 text-green-600 break-words">
                            <p class="mt-2 font-bold break-words text-3xl text-white">KODREAMS</p>
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <br>

                <div class="text-xl max-w-7xl mx-auto">
                    <div class="md:flex gap-3">
                        <div class="md:basis-4/6">
                            <p class="border-b pb-5 text-center text-[#8e44ad] font-semibold">Projektbeschreibung</p>
                            <br>
                            <br>
                            <p class="font-light text-justify">
                                Das KODREAMS-Projekt unterstützt Menschen aus aller Welt dabei, ihre akademische oder berufliche
                                Laufbahn in der Bundesrepublik Deutschland, einem führenden Land und Experten in der
                                wirtschaftlichen und technologischen Entwicklung, zu entwickeln. Unterstützt von der deutschen Firma
                                KOWELT UG und ihren Partnern bietet KODREAMS eine einzigartige Gelegenheit, die Karriere- und
                                Bildungsmöglichkeiten in der Bundesrepublik Deutschland zu entdecken, indem es das
                                Einwanderungsverfahren für die im Rahmen dieses Projekts ausgewählten Personen finanziert.
                                <br>
                                KOWELT fördert die Zusammenarbeit zwischen Deutschland und anderen Nationen und unterstützt
                                die Stärkung der Verbindungen zwischen den Gemeinschaften.
                                <br>
                                <br>
                                Schließen Sie sich uns an, um zukünftige Möglichkeiten zu erkunden und die deutsche Kultur in der
                                Welt aufzuwerten.
                            </p>
                            <br>
                            <br>
                            <p class="border-b pb-5 text-center text-[#8e44ad] font-semibold">Die Schritte des KODREAMS-Wettbewerbs</p>
                            <br>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Schritt 1 <span class="uppercase text-[#2980b9]">- ANMELDUNG</span></h2>
                                <p class="mt-4 font-light">
                                    Jede Person mit rechtmäßigem Wohnsitz in Kamerun kann sich online für die Teilnahme am
                                    KODREAMS-Projekt anmelden. Das erforderliche schulische Mindestniveau ist das "Baccalauréat de
                                    l'enseignement secondaire" oder das "GCE Advanced Level".
                                </p>
                                <p class="mt-4 font-light">
                                    <a href="{{ route('ugg.dashboard', app()->getLocale()) }}" class="underline text-[#3498db]"
{{--                                       @if(date('d.m.Y') < config('app.kodream_start_date')) data-bs-toggle="modal" data-bs-target="#exampleModalCenter" @endif--}}
                                    >Melden Sie sich</a> von <span class="font-bold text-[#3498db]">Mittwoch, dem 15. März 2023, bis Donnerstag, dem 15. Juni 2023</span>, ausschließlich online an und laden Sie die geforderten Nachweise hoch.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Schritt 2 <span class="uppercase text-[#2980b9]">- AUSWAHL DER ERSTEN SCHRITT</span></h2>
                                <p class="mt-4 font-light">
                                    Die Bewerbungen werden schrittweise geprüft und die Bewerber werden individuell per E-Mail
                                    darüber informiert, ob sie für die Fortsetzung des Projekts ausgewählt wurden oder nicht.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Schritt 3 <span class="uppercase text-[#2980b9]">- BEDINGUNGEN UND KOSTEN FÜR DIE TEILNAHME AN DER SCHRIFTLICHEN PRÜFUNG</span></h2>
                                <p class="mt-4 font-light">
                                    Nur die in Schritt 2 ausgewählten Bewerber werden zu einer Prüfung eingeladen.
                                </p>
                                <p class="mt-4 font-light">
                                    Der Kandidat/die Kandidatin muss seine/ihre Teilnahme an der Prüfung durch Unterzeichnung des
                                    Teilnahmedokuments genehmigen, das in seinem/ihrem Bewerberbereich verfügbar ist.
                                </p>
                                <p class="mt-4 font-light">
                                    Der Kandidat/die Kandidatin muss eine Prüfungsgebühr in Höhe von 154 Euro entrichten (<span class="font-bold text-[#3498db]">Zahlung ausschließlich an die Bank</span>)
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Schritt 4 <span class="uppercase text-[#2980b9]">- SCHRIFTLICHE PRÜFUNG</span></h2>
                                <p class="mt-4 font-light">
                                    Die schriftliche Prüfung findet am <span class="font-bold text-[#3498db]">Samstag, den 15. Juli 2023</span> statt und basiert auf den Kenntnissen der
                                    Bewerber/innen über die Bundesrepublik Deutschland. Der Bewerber/die Bewerberin muss an der
                                    Prüfung in Form einer Präsenzprüfung in der gewählten Stadt teilnehmen.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Schritt 5 <span class="uppercase text-[#2980b9]">- VERÖFFENTLICHUNG DER ERGEBNISSE</span></h2>
                                <p class="mt-4 font-light">
                                    Die Teilnehmer erhalten eine Note, die sich nach ihrer Leistung in der schriftlichen Prüfung richtet.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Schritt 6 <span class="uppercase text-[#2980b9]">- FINANZIERUNG DES EINWANDERUNGSPROJEKTS</span></h2>
                                <p class="mt-4 font-light">
                                    <span class="font-bold">Den besten Kandidaten</span> unter den Prüfungsteilnehmern wird ihr Reiseverfahren bis zum Kauf des
                                    Flugtickets vollständig von KOWELT und seinen Partnerunternehmen finanziert.
                                </p>
                            </div>
                            <br class="md:hidden">
                            <br class="md:hidden">
                            <br class="md:hidden">
                        </div>
                        <div class="md:basis-2/6">
                            <div class="border border-gray-100 py-3 shadow-xl w-fit mx-auto text-md">
                                <p class="uppercase border-b border-gray-300 pb-2 px-3 font-bold text-blue-500">Haben Sie eine Frage?</p>
                                <div class="px-3">
                                    <p class="mt-4 mb-2">
                                        <a href="mailto:contact.kodreams@kowelt.de"
                                           class="underline font-light"
                                        >
                                            Kontaktieren Sie uns
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="px-4 md:px-2">
                                <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/kodreams/pexels-kampus-production-5940837.jpg') }}" alt="454sdf">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <br>
            <br>
        </div>
    </div>


    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto font-notosans" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                        Anmeldung ab dem 15.03.2023
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close" style="color: black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body relative p-4 text-black">
                    <p>Vielen Dank für Ihr Interesse an KODREAMS. Bitte beachten Sie, dass die Anmeldung erst ab dem 15.03.2023 möglich ist. Besuchen Sie uns bald wieder, um sich anzumelden.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
