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
                            <p class="border-b pb-5 text-center text-[#8e44ad] font-semibold">Description du projet</p>
                            <br>
                            <br>
                            <p class="font-light text-justify">
                                Le projet KODREAMS aide les Hommes du monde entier à développer leur carrière académique ou
                                professionnelle en République fédérale d'Allemagne, un pays leader et expert en développement
                                économique et technologique. Soutenu par l’entreprise allemande KOWELT UG et ses partenaires,
                                KODREAMS offre une occasion unique de découvrir les opportunités de carrière et d'éducation en
                                République fédérale d'Allemagne en finançant la procédure d’immigration des personnes sélectionnées
                                dans le cadre de ce projet.
                                <br>
                                KOWELT encourage la collaboration entre l'Allemagne et d'autres nations et favorise le renforcement
                                des liens entre les communautés.
                                <br>
                                <br>
                                Rejoignez-nous pour explorer les opportunités futures et valoriser la culture allemande dans le monde.
                            </p>
                            <br>
                            <br>
                            <p class="border-b pb-5 text-center text-[#8e44ad] font-semibold">Les étapes du concours KODREAMS</p>
                            <br>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Etape 1 <span class="uppercase text-[#2980b9]">- L'INSCRIPTION</span></h2>
                                <p class="mt-4 font-light">
                                    Toute personne résidant légalement au Cameroun peut s'inscrire en ligne pour participer au projet
                                    KODREAMS. Le niveau scolaire minimum requis est le baccalauréat de l'enseignement secondaire ou
                                    le "GCE Advanced Level". Cette première étape est gratuite pour tous les participants.
                                </p>
                                <p class="mt-4 font-light">
                                    <a href="{{ route('ugg.dashboard', app()->getLocale()) }}" class="underline text-[#3498db]"
{{--                                       @if(date('d.m.Y') < config('app.kodream_start_date')) data-bs-toggle="modal" data-bs-target="#exampleModalCenter" @endif--}}
                                    >Inscrivez-vous</a> du <span class="font-bold text-[#3498db]">mercredi 15 mars 2023 jusqu’au jeudi 15 juin 2023</span> uniquement en ligne et
                                    téléversez les pièces justificatives demandées.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Etape 2 <span class="uppercase text-[#2980b9]">- SÉLECTION DE LA PREMIÈRE PHASE</span></h2>
                                <p class="mt-4 font-light">
                                    Les dossiers de candidature seront étudiés de manière progressive et les candidats seront informés
                                    individuellement par e-mail s'ils ont été sélectionnés pour la suite du projet ou non.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Etape 3 <span class="uppercase text-[#2980b9]">- CONDITIONS ET FRAIS DE PARTICIPATION À L’EXAMEN ÉCRIT</span></h2>
                                <p class="mt-4 font-light">
                                    Seuls les candidats sélectionnés à l’étape 2 seront invités à passer un examen.
                                </p>
                                <p class="mt-4 font-light">
                                    Le candidat/la candidate devra approuver sa participation à l’examen en signant le document de
                                    participation qui sera disponible sur son espace candidat.
                                </p>
                                <p class="mt-4 font-light">
                                    Le candidat/la candidate devra s’acquitter des frais de participation à l’examen d’un montant de 154
                                    euros. (<span class="font-bold text-[#3498db]">Paiement exclusivement à la banque</span>)
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Etape 4 <span class="uppercase text-[#2980b9]">- EXAMEN ÉCRIT</span></h2>
                                <p class="mt-4 font-light">
                                    L’examen écrit aura lieu le <span class="font-bold text-[#3498db]">samedi 15 juillet 2023</span> et sera basé sur les connaissances des candidats sur
                                    la République fédérale d'Allemagne. Le candidat/la candidate devra participer à l’examen en présentiel
                                    dans la ville choisie.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Etape 5 <span class="uppercase text-[#2980b9]">- PUBLICATION DES RÉSULTATS</span></h2>
                                <p class="mt-4 font-light">
                                    Les participants recevront une note en fonction de leurs performances à l'examen écrit.
                                </p>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="mt-4">
                                <h2 class="text-2xl">Etape 6 <span class="uppercase text-[#2980b9]">- FINANCEMENT DU PROJET D’IMMIGRATION</span></h2>
                                <p class="mt-4 font-light">
                                    <span class="font-bold">Les meilleurs candidats</span> parmi les lauréats verront leur procédure de voyage entièrement financée par
                                    KOWELT et ses entreprises partenaires, jusqu'à l'achat du billet d'avion.
                                </p>
                            </div>
                            <br class="md:hidden">
                            <br class="md:hidden">
                            <br class="md:hidden">
                        </div>
                        <div class="md:basis-2/6">
                            <div class="border border-gray-100 py-3 shadow-xl w-fit mx-auto text-md">
                                <p class="uppercase border-b border-gray-300 pb-2 px-3 font-bold text-blue-500">Vous avez une question ?</p>
                                <div class="px-3">
                                    <p class="mt-4 mb-2">
                                        <a href="mailto:contact.kodreams@kowelt.de"
                                           class="underline font-light"
                                        >
                                            Contactez-nous
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
                        Inscription à partir du 15.03.2023
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
                    <p>Merci de votre intérêt pour KODREAMS. Veuillez noter que les inscriptions ne seront ouvertes qu'à partir du 15.03.2023. Revenez bientôt pour vous inscrire.</p>
                </div>
            </div>
        </div>
    </div>

@endsection
