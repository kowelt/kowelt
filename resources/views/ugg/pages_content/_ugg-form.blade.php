<br>
<br>
<div class="col-span-5 md:col-span-4 bg-white p-5 shadow max-w-5xl mx-auto font-notosans">
    @if ($errors->any())
        <div class="bg-red-200 py-3 text-center text-black">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd" />
                        </svg>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if($section_2 == 'verify')
        @php
            $button = Auth::user()->cv_received_by_admin ? __('ugg.Update') : __('account.Submit_Request');
        @endphp
        <div class="text-xl pb-8 py-4 italic">{!! __('account.Thank_you_very_much', ['button' => $button]) !!}</div>
    @elseif(Route::currentRouteName() != 'admin.ugg.form.view')
        <div class="text-xl pb-8 py-4 font-light">{{ __('ugg.ugg_form_text') }}</div>
    @endif
    <form @if(isset($ugg_form))
              action="{{ route('ugg.update.form', [app()->getLocale(), $ugg_form->id]) }}"
          @else
              action="{{ route('ugg.store.form', app()->getLocale()) }}"
          @endif
          method="POST"
    >
        @csrf
        <input type="hidden" id="app_url" value="{{ config('app.url') . '/' . app()->getLocale() }}">
        <input type="hidden" id="app_locale" value="{{ app()->getLocale() }}">
        <input type="hidden" id="section_2" value="{{ $section_2 }}">

        <input type="hidden" id="browse" value="{{ __('account.browse') }}">
        <input type="hidden" id="labelIdle" value="{{ __('account.labelIdle') }}">
        <input type="hidden" id="labelIdleFiles" value="{{ __('account.labelIdleFiles') }}">
        <input type="hidden" id="labelFileProcessing" value="{{ __('account.labelFileProcessing') }}">
        <input type="hidden" id="labelFileProcessingComplete" value="{{ __('account.labelFileProcessingComplete') }}">
        <input type="hidden" id="labelFileProcessingAborted" value="{{ __('account.labelFileProcessingAborted') }}">
        <input type="hidden" id="labelFileProcessingError" value="{{ __('account.labelFileProcessingError') }}">
        <input type="hidden" id="labelTapToCancel" value="{{ __('account.labelTapToCancel') }}">
        <input type="hidden" id="labelTapToRetry" value="{{ __('account.labelTapToRetry') }}">
        <input type="hidden" id="labelTapToUndo" value="{{ __('account.labelTapToUndo') }}">

        <div class="accordion" id="accordionExample5">
            <div class="accordion-item bg-white border border-gray-200">
                <h2 class="accordion-header mb-0" id="headingOne5">
                    <button class="
        accordion-button
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify' || $errors->any()) text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="true"
                            aria-controls="collapseOne5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>
                        {{ __('account.personal_information') }}
                    </button>
                </h2>
                <div id="collapseOne5" class="accordion-collapse collapse show" aria-labelledby="headingOne5">
                    <div class="accordion-body py-4 px-5">
                        @include('ugg.pages_content.form_content._01-personal-information')
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-white border border-gray-200">
                <h2 class="accordion-header mb-0" id="headingTwo5">
                    <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify' || $errors->any()) text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo5" aria-expanded="{{ ($section_2 == 'verify' || $errors->any()) ? 'true' : 'false' }}"
                            aria-controls="collapseTwo5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                        </svg>
                        {{ __('account.formation_et_qualification') }}
                    </button>
                </h2>
                <div id="collapseTwo5" class="accordion-collapse collapse @if($section_2 == 'verify' || $errors->any()) show @endif" aria-labelledby="headingTwo5">
                    <div class="accordion-body py-4 px-5">
                        @include('ugg.pages_content.form_content._02-formation-et-qualification')
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-white border border-gray-200">
                <h2 class="accordion-header mb-0" id="headingThree5">
                    <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify' || $errors->any()) text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree5" aria-expanded="{{ ($section_2 == 'verify' || $errors->any()) ? 'true' : 'false' }}"
                            aria-controls="collapseThree5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                        </svg>
                        {{ __('account.Experiences_Professionnelles') }}
                    </button>
                </h2>
                <div id="collapseThree5" class="accordion-collapse collapse @if($section_2 == 'verify' || $errors->any()) show @endif" aria-labelledby="headingThree5">
                    <div class="accordion-body py-4 px-5">
                        @include('ugg.pages_content.form_content._03-experiences-professionnelles')
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-white border border-gray-200">
                <h2 class="accordion-header mb-0" id="headingThree6">
                    <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify') text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree6" aria-expanded="{{ $section_2 == 'verify' ? 'true' : 'false' }}"
                            aria-controls="collapseThree6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                        </svg>
                        {{ __('account.Compétences') }}
                    </button>
                </h2>
                <div id="collapseThree6" class="accordion-collapse collapse @if($section_2 == 'verify') show @endif" aria-labelledby="headingThree6">
                    <div class="accordion-body py-4 px-5">
                        @include('ugg.pages_content.form_content._04-competences')
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-white border border-gray-200">
                <h2 class="accordion-header mb-0" id="headingThree7">
                    <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify') text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree7" aria-expanded="{{ $section_2 == 'verify' ? 'true' : 'false' }}"
                            aria-controls="collapseThree7">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                        </svg>
                        {{ __('account.Langues') }}
                    </button>
                </h2>
                <div id="collapseThree7" class="accordion-collapse collapse @if($section_2 == 'verify') show @endif" aria-labelledby="headingThree7">
                    <div class="accordion-body py-4 px-5">
                        @include('ugg.pages_content.form_content._05-langues')
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-white border border-gray-200">
                <h2 class="accordion-header mb-0" id="headingThree8">
                    <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify') text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree8" aria-expanded="{{ $section_2 == 'verify' ? 'true' : 'false' }}"
                            aria-controls="collapseThree8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.893 13.393l-1.135-1.135a2.252 2.252 0 01-.421-.585l-1.08-2.16a.414.414 0 00-.663-.107.827.827 0 01-.812.21l-1.273-.363a.89.89 0 00-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 01-1.81 1.025 1.055 1.055 0 01-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 01-1.383-2.46l.007-.042a2.25 2.25 0 01.29-.787l.09-.15a2.25 2.25 0 012.37-1.048l1.178.236a1.125 1.125 0 001.302-.795l.208-.73a1.125 1.125 0 00-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 01-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 01-1.458-1.137l1.411-2.353a2.25 2.25 0 00.286-.76m11.928 9.869A9 9 0 008.965 3.525m11.928 9.868A9 9 0 118.965 3.525" />
                        </svg>
                        {{ __('account.Centres_interet') }}
                    </button>
                </h2>
                <div id="collapseThree8" class="accordion-collapse collapse @if($section_2 == 'verify') show @endif" aria-labelledby="headingThree8">
                    <div class="accordion-body py-4 px-5">
                        @include('ugg.pages_content.form_content._06-centres-interet')
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-white border border-gray-200">
                <h2 class="accordion-header mb-0" id="headingThree9">
                    <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify' || $errors->any()) text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree9" aria-expanded="{{ $section_2 == 'verify' ? 'true' : 'false' }}"
                            aria-controls="collapseThree9">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                        </svg>
                        {{ __('ugg.Documents') }}
                    </button>
                </h2>
                <div id="collapseThree9" class="accordion-collapse collapse @if($section_2 == 'verify' || $errors->any()) show @endif" aria-labelledby="headingThree9">
                    <div class="accordion-body py-4 px-5">
                        @include('ugg.pages_content.form_content._07-documents')
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" id="Intitulé_De_Poste" value="{{ __('ugg.Intitulé_De_Poste') }}">
        <input type="hidden" id="Ville" value="{{ __('ugg.Ville') }}">
        <input type="hidden" id="Employeur" value="{{ __('ugg.Employeur') }}">
        <input type="hidden" id="Date_De_Debut" value="{{ __('ugg.Date_De_Debut') }}">
        <input type="hidden" id="Date_De_Fin" value="{{ __('ugg.Date_De_Fin') }}">
        <input type="hidden" id="Description" value="{{ __('ugg.Description') }}">
        <input type="hidden" id="Veuillez_sauvegarder_le_formulaire_en_cours" value="{{ __('ugg.Veuillez_sauvegarder_le_formulaire_en_cours') }}">
        <input type="hidden" id="Veuillez_remplir_tous_les_champs" value="{{ __('ugg.Veuillez_remplir_tous_les_champs') }}">
        <input type="hidden" id="dates_less_than_today" value="{{ __('ugg.dates_less_than_today') }}">
        <input type="hidden" id="start_date_less_than_end_date" value="{{ __('ugg.start_date_less_than_end_date') }}">
        <input type="hidden" id="Effacer" value="{{ __('ugg.Effacer') }}">
        <input type="hidden" id="Sauvegarder" value="{{ __('ugg.Sauvegarder') }}">
        <input type="hidden" id="Compétence" value="{{ __('ugg.Compétence') }}">
        <input type="hidden" id="Niveau" value="{{ __('ugg.Niveau') }}">
        <input type="hidden" id="Veuillez_sélectionner" value="{{ __('ugg.Veuillez_sélectionner') }}">
        <input type="hidden" id="Langue" value="{{ __('ugg.Langue') }}">
        <input type="hidden" id="Hobby" value="{{ __('ugg.Hobby') }}">
        <input type="hidden" id="Please_select_Session_first" value="{{ __('ugg.Please_select_Session_first') }}">

        <br>

        @if($section_2 !== 'verify')
            <div class="px-4 py-3 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center rounded-md gradient-ugg py-3 px-6 text-sm font-medium text-white hover:shadow-blue-500/60 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition hover:scale-[1.02] duration-300 ease-in-out"
                >{{ __('account.Next') }}</button>
            </div>
        @endif
    </form>
        @if($section_2 == 'verify')
            <form action="{{ route('ugg.send.final.form', app()->getLocale()) }}" method="POST">
                @csrf
                <div class="px-6 py-2">
                    <div class="form-check">
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer @error('confirm_correctness') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror" type="checkbox"
                               name="confirm_correctness" value="1" id="flexCheckDefault">
                        <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                            {{ __('account.I_confirm') }} <a></a>
                        </label>
                    </div>
                </div>
                @if(Auth::user()->cv_received_by_admin == null)
                    <div class="px-6 py-2">
                        <div class="form-check">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer @error('confirm_correctness_2') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror" type="checkbox"
                                   name="confirm_correctness_2" value="1" id="confirm_correctness_2">
                            <label class="form-check-label inline-block text-gray-800" for="confirm_correctness_2">
                                {{ __('account.I_confirm_2') }} <a href="{{ asset('footer_docs/Kodreams/KODREAMS_AGB_' . app()->getLocale() . '.pdf') }}" target="_blank" class="font-bold hover:underline text-blue-500">{{ __('account.I_confirm_2_value') }}</a>.
                            </label>
                        </div>
                    </div>
                    <div class="px-6 py-2 mb-3">
                        <div class="form-check">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer @error('confirm_correctness_3') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror" type="checkbox"
                                   name="confirm_correctness_3" value="1" id="confirm_correctness_3">
                            <label class="form-check-label inline-block text-gray-800" for="confirm_correctness_3">
                                {{ __('account.I_confirm_3') }} <a href="{{ asset('footer_docs/Kodreams/KODREAMS_Privacy_' . app()->getLocale() . '.pdf') }}" target="_blank" class="font-bold hover:underline text-blue-500">{{ __('account.I_confirm_3_value') }}</a>{{ app()->getLocale() == 'de' ? ' zu.' : '.' }}
                            </label>
                        </div>
                    </div>
                @endif

                <div class="px-4 py-3 text-left sm:px-6 flex items-center gap-x-4">
                    <a href="{{ route('ugg.dashboard', [app()->getLocale(), 'kodreams-form']) }}" class="inline-flex justify-center rounded-md bg-white text-gray-600 border border-gray-400 py-3 px-6 text-sm font-medium text-white hover:shadow-blue-500/60 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition hover:scale-[1.02] duration-300 ease-in-out"
                    >{{ __('account.Back') }}</a>

                    <button type="submit" class="inline-flex justify-center rounded-md gradient-ugg py-3 px-6 text-sm font-medium text-white hover:shadow-blue-500/60 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition hover:scale-[1.02] duration-300 ease-in-out"
                    >
                        @if(Auth::user()->cv_received_by_admin)
                            {{ __('ugg.Update') }}
                        @else
                            {{ __('account.Submit_Request') }}
                        @endif
                    </button>
                </div>
            </form>
        @endif
</div>
