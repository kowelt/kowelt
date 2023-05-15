{{--@if ($errors->any())--}}
{{--    <div class="bg-red-200 py-3 text-center text-black">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li class="flex justify-center items-center">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">--}}
{{--                        <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd" />--}}
{{--                    </svg>--}}
{{--                    {{ $error }}--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}
{{--<form @if(isset($curriculum_vitae)) action="{{ route('applicant.update.cv', [app()->getLocale(), $curriculum_vitae->id]) }}" @else action="{{ route('applicant.store.cv', app()->getLocale()) }}" @endif method="POST">--}}
{{--    @csrf--}}
{{--    <input type="hidden" id="app_url" value="{{ config('app.url') . '/' . app()->getLocale() }}">--}}
{{--    <input type="hidden" id="app_locale" value="{{ app()->getLocale() }}">--}}

{{--    <div class="accordion" id="accordionExample5">--}}
{{--        <div class="accordion-item bg-white border border-gray-200">--}}
{{--            <h2 class="accordion-header mb-0" id="headingOne5">--}}
{{--                <button class="--}}
{{--        accordion-button--}}
{{--        relative--}}
{{--        flex--}}
{{--        items-center--}}
{{--        w-full--}}
{{--        py-6--}}
{{--        px-5--}}
{{--        text-base text-gray-800 text-left text-xl--}}
{{--        bg-white--}}
{{--        border-0--}}
{{--        rounded-none--}}
{{--        transition--}}
{{--        focus:outline-none--}}
{{--      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="true"--}}
{{--                        aria-controls="collapseOne5">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />--}}
{{--                    </svg>--}}
{{--                    {{ __('account.personal_information') }}--}}
{{--                </button>--}}
{{--            </h2>--}}
{{--            <div id="collapseOne5" class="accordion-collapse collapse show" aria-labelledby="headingOne5">--}}
{{--                <div class="accordion-body py-4 px-5">--}}
{{--                    <div class="grid grid-cols-6 gap-6">--}}
{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="firstname" class="block text-sm font-medium text-gray-700">{{ __('account.firstname') }}<span class="text-red-500">*</span></label>--}}
{{--                            <input type="text" id="firstname" disabled value="{{ Auth::user()->firstname }}" class="mt-1 bg-gray-50">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="lastname" class="block text-sm font-medium text-gray-700">{{ __('account.lastname') }}<span class="text-red-500">*</span></label>--}}
{{--                            <input type="text" id="lastname" disabled value="{{ Auth::user()->lastname }}" class="mt-1 bg-gray-50">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6">--}}
{{--                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('account.e_mail') }}<span class="text-red-500">*</span></label>--}}
{{--                            <input type="email" id="email" disabled value="{{ Auth::user()->email }}" class="mt-1 bg-gray-50">--}}
{{--                        </div>--}}
{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">{{ __('account.Date_De_Naissance') }}<span class="text-red-500">*</span></label>--}}
{{--                            <input type="date" id="date_of_birth" value="{{ Auth::user()->date_of_birth ?? old('date_of_birth') }}" disabled class="mt-1 bg-gray-50">--}}
{{--                        </div>--}}
{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="gender" class="block text-sm font-medium text-gray-700">{{ __('account.Genre') }}<span class="text-red-500">*</span></label>--}}
{{--                            <select id="gender" class="mt-1 bg-gray-50">--}}
{{--                                    <option value="1" {{ Auth::user()->gender == '1' ? 'selected' : '' }} disabled>{{ __('account.homme') }}</option>--}}
{{--                                    <option value="2" {{ Auth::user()->gender == '2' ? 'selected' : '' }} disabled>{{ __('account.femme') }}</option>--}}
{{--                                    <option value="3" {{ Auth::user()->gender == '3' ? 'selected' : '' }} disabled>{{ __('account.divers') }}</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-span-6">--}}
{{--                            <label for="tel" class="block text-sm font-medium text-gray-700">{{ __('account.tel') }}<span class="text-red-500">*</span></label>--}}
{{--                            <input type="tel" id="tel" name="tel" value="{{ $curriculum_vitae->tel ?? old('tel') }}" required class="mt-1">--}}
{{--                        </div>--}}
{{--                        <div class="col-span-6">--}}
{{--                            <label for="street" class="block text-sm font-medium text-gray-700">{{ __('account.adresse') }}<span class="text-red-500">*</span></label>--}}
{{--                            <input type="text" id="street" name="street_and_number" value="{{ $curriculum_vitae->street_and_number ?? old('street_and_number') }}" required class="mt-1">--}}
{{--                        </div>--}}
{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="postal_code" class="block text-sm font-medium text-gray-700">{{ __('account.Boite_Postale') }}<span class="text-red-500">*</span></label>--}}
{{--                            <input type="number" id="postal_code" name="postal_code" value="{{ $curriculum_vitae->postal_code ?? old('postal_code') }}" required class="mt-1">--}}
{{--                        </div>--}}
{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="city" class="block text-sm font-medium text-gray-700">{{ __('account.Ville') }}<span class="text-red-500">*</span></label>--}}
{{--                            <input type="tel" id="city" name="city" value="{{ $curriculum_vitae->city ?? old('city') }}" required class="mt-1">--}}
{{--                        </div>--}}


{{--                        <div class="col-span-6">--}}
{{--                            <label for="country" class="block text-sm font-medium text-gray-700">{{ __('Country') }}<span class="text-red-500">*</span></label>--}}
{{--                            <select id="country" name="country" required class="mt-1">--}}
{{--                                <option value="" selected>{{ __('account.Veuillez_sélectionner') }}...</option>--}}
{{--                                @foreach(config('countries_list_' . app()->getLocale()) as $code => $country)--}}
{{--                                    <option value="{{ $code }}" @if(isset($curriculum_vitae->country) && $curriculum_vitae->country == $code) selected @elseif(old('country') == $code) selected @endif>{{ $country }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        --}}
{{--                        <div class="col-span-6">--}}
{{--                            <label for="place_of_birth" class="block text-sm font-medium text-gray-700">{{ __('account.Lieu_De_Naissance') }}<span class="text-red-500">*</span></label>--}}
{{--                            <input type="text" id="place_of_birth" name="place_of_birth" value="{{ $curriculum_vitae->place_of_birth ?? old('place_of_birth') }}" required class="mt-1">--}}
{{--                        </div>--}}
{{--                        <div class="col-span-6">--}}
{{--                            <label for="nationality" class="block text-sm font-medium text-gray-700">{{ __('account.Nationalité') }}<span class="text-red-500">*</span></label>--}}
{{--                            <select id="nationality" name="nationality" required class="mt-1">--}}
{{--                                <option value="" selected>{{ __('account.Veuillez_sélectionner') }}...</option>--}}
{{--                                @foreach(config('countries_list_' . app()->getLocale()) as $code => $country)--}}
{{--                                    <option value="{{ $code }}" @if(isset($curriculum_vitae->nationality) && $curriculum_vitae->nationality == $code) selected @elseif(old('nationality') == $code) selected @endif>{{ $country }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                       --}}
{{--                        <div class="col-span-6">--}}
{{--                            <label for="martial_status" class="block text-sm font-medium text-gray-700">{{ __('account.Situation_Familiale') }}</label>--}}
{{--                            <select id="martial_status" name="martial_status" class="mt-1">--}}
{{--                                @if(isset($curriculum_vitae->martial_status))--}}
{{--                                    <option value="" selected>{{ __('account.Veuillez_sélectionner') }}...</option>--}}
{{--                                    <option value="1" {{ $curriculum_vitae->martial_status == '1' ? 'selected' : '' }}>{{ __('account.Célibataire') }}</option>--}}
{{--                                    <option value="2" {{ $curriculum_vitae->martial_status == '2' ? 'selected' : '' }}>{{ __('account.Marié') }}</option>--}}
{{--                                    <option value="3" {{ $curriculum_vitae->martial_status == '3' ? 'selected' : '' }}>{{ __('account.Autre') }}</option>--}}
{{--                                @else--}}
{{--                                    <option value="" selected>{{ __('account.Veuillez_sélectionner') }}...</option>--}}
{{--                                    <option value="1" {{ old('martial_status') == '1' ? 'selected' : '' }}>{{ __('account.Célibataire') }}</option>--}}
{{--                                    <option value="2" {{ old('martial_status') == '2' ? 'selected' : '' }}>{{ __('account.Marié') }}</option>--}}
{{--                                    <option value="3" {{ old('martial_status') == '3' ? 'selected' : '' }}>{{ __('account.Autre') }}</option>--}}
{{--                                @endif--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-span-6">--}}
{{--                            <label for="driving_licence" class="block text-sm font-medium text-gray-700">{{ __('account.Permis_De_Conduire') }}</label>--}}
{{--                            <select onchange="setToggleDriverLicenceInputCategory(this.value)" id="driving_licence" name="driving_licence" class="mt-1">--}}
{{--                                @if(isset($curriculum_vitae->driving_licence))--}}
{{--                                    <option value="1" {{ $curriculum_vitae->driving_licence == '1' ? 'selected' : '' }}>{{ __('account.oui') }}</option>--}}
{{--                                    <option value="0" {{ $curriculum_vitae->driving_licence == '0' ? 'selected' : '' }}>{{ __('account.non') }}</option>--}}
{{--                                @else--}}
{{--                                    <option value="0" selected>{{ __('account.non') }}</option>--}}
{{--                                    <option value="1" {{ old('driving_licence') == '1' ? 'selected' : '' }}>{{ __('account.oui') }}</option>--}}
{{--                                @endif--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div id="driving_licence_category_div" class="col-span-6 @if(!isset($curriculum_vitae->driving_licence)) hidden @endif @if(isset($curriculum_vitae->driving_licence) && $curriculum_vitae->driving_licence != '1') hidden @endif">--}}
{{--                            <label for="driving_licence_category" class="block text-sm font-medium text-gray-700">{{ __('account.cat_Permis_De_Conduire') }}</label>--}}
{{--                            <input type="text" id="driving_licence_category" @if(isset($curriculum_vitae->driving_licence) && $curriculum_vitae->driving_licence == '1') name="driving_licence_category" required @endif placeholder="{{ __('account.vide_si_absent') }}" value="{{ $curriculum_vitae->driving_licence_category ?? old('driving_licence_category') }}" class="mt-1">--}}
{{--                        </div>--}}
{{--                        <div class="col-span-6">--}}
{{--                            <label for="linkedin" class="block text-sm font-medium text-gray-700">{{ __('account.Linkedin') }}</label>--}}
{{--                            <input type="text" id="linkedin" name="linkedin" value="{{ $curriculum_vitae->linkedin ?? old('linkedin') }}" class="mt-1">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="accordion-item bg-white border border-gray-200">--}}
{{--            <h2 class="accordion-header mb-0" id="headingTwo5">--}}
{{--                <button class="--}}
{{--        accordion-button--}}
{{--        collapsed--}}
{{--        relative--}}
{{--        flex--}}
{{--        items-center--}}
{{--        w-full--}}
{{--        py-6--}}
{{--        px-5--}}
{{--        text-base text-gray-800 text-left text-xl--}}
{{--        bg-white--}}
{{--        border-0--}}
{{--        rounded-none--}}
{{--        transition--}}
{{--        focus:outline-none--}}
{{--      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo5" aria-expanded="false"--}}
{{--                        aria-controls="collapseTwo5">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />--}}
{{--                    </svg>--}}
{{--                    {{ __('account.formation_et_qualification') }}--}}
{{--                </button>--}}
{{--            </h2>--}}
{{--            <div id="collapseTwo5" class="accordion-collapse collapse" aria-labelledby="headingTwo5">--}}
{{--                <div class="accordion-body py-4 px-5">--}}
{{--                    <div id="education_items_body">--}}
{{--                        @isset($curriculum_vitae->educations)--}}
{{--                            @foreach($curriculum_vitae->educations as $education)--}}
{{--                                <div id="{{ 'education_item_' . $education->id }}" class="flex justify-between items-center bg-gray-200 p-4 mb-4">--}}
{{--                                    <div>--}}
{{--                                        <p>{{ $education->education_degree }}</p>--}}
{{--                                        <small>{{ $education->education_start_date_string }} - {{ $education->education_end_date_string }}</small>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="w-fit flex gap-x-4 items-center">--}}
{{--                                            <div class="cursor-pointer hover:text-blue-600" onclick="editEducation({{ $education->id }})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
{{--                                            <div class="cursor-pointer hover:text-red-600" onclick="deleteEducation({{ $education->id }})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <input type="hidden" name="education_items_ids[]" value="{{ $education->id }}">--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @endisset--}}
{{--                    </div>--}}
{{--                    <div class="grid grid-cols-6 gap-6">--}}
{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="education_degree" class="block text-sm font-medium text-gray-700">{{ __('account.Diplome') }}</label>--}}
{{--                            <input type="text" id="education_degree" class="mt-1">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="education_city" class="block text-sm font-medium text-gray-700">{{ __('account.Ville') }}</label>--}}
{{--                            <input type="text" id="education_city" class="mt-1">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6">--}}
{{--                            <label for="education_institut" class="block text-sm font-medium text-gray-700">{{ __('account.Institut') }}</label>--}}
{{--                            <input type="text" id="education_institut" class="mt-1">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="education_start_date" class="block text-sm font-medium text-gray-700">{{ __('account.Date_De_Debut') }}</label>--}}
{{--                            <input type="month" id="education_start_date" class="mt-1">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="education_end_date" class="block text-sm font-medium text-gray-700">{{ __('account.Date_De_Fin') }}</label>--}}
{{--                            <input type="month" id="education_end_date" class="mt-1">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6">--}}
{{--                            <label for="education_description" class="block text-sm font-medium text-gray-700">{{ __('account.Description') }}</label>--}}
{{--                            <textarea rows="3" id="education_description" class="mt-1"></textarea>--}}
{{--                        </div>--}}
{{--                        <input type="hidden" id="active_education_item_id" value="">--}}
{{--                    </div>--}}
{{--                    <div class="mt-4">--}}
{{--                        <p id="add_education_button" class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full">{{ __('account.ajouter_education') }}</p>--}}
{{--                        <p id="edit_education_button" class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hidden w-full">{{ __('account.modifier') }}</p>--}}
{{--                        <small class="text-red-500 ml-4 hidden" id="education_error">{{ __('account.remplir_tous_les_champs') }}</small>--}}
{{--                        <small class="text-red-500 ml-4 hidden" id="dates_less_than_today_error">{{ __('The two dates must be less than or equal to today') }}</small>--}}
{{--                        <small class="text-red-500 ml-4 hidden" id="start_date_less_than_end_date_error">{{ __('The start date must be less than the end date') }}</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="accordion-item bg-white border border-gray-200">--}}
{{--            <h2 class="accordion-header mb-0" id="headingThree5">--}}
{{--                <button class="--}}
{{--        accordion-button--}}
{{--        collapsed--}}
{{--        relative--}}
{{--        flex--}}
{{--        items-center--}}
{{--        w-full--}}
{{--        py-6--}}
{{--        px-5--}}
{{--        text-base text-gray-800 text-left text-xl--}}
{{--        bg-white--}}
{{--        border-0--}}
{{--        rounded-none--}}
{{--        transition--}}
{{--        focus:outline-none--}}
{{--      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree5" aria-expanded="false"--}}
{{--                        aria-controls="collapseThree5">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />--}}
{{--                    </svg>--}}
{{--                    {{ __('account.Experiences_Professionnelles') }}--}}
{{--                </button>--}}
{{--            </h2>--}}
{{--            <div id="collapseThree5" class="accordion-collapse collapse" aria-labelledby="headingThree5">--}}
{{--                <div class="accordion-body py-4 px-5">--}}
{{--                    <div id="work_items_body">--}}
{{--                        @isset($curriculum_vitae->works)--}}
{{--                            @foreach($curriculum_vitae->works as $work)--}}
{{--                                <div id="{{ 'work_item_' . $work->id }}" class="flex justify-between items-center bg-gray-200 p-4 mb-4">--}}
{{--                                    <div>--}}
{{--                                        <p>{{ $work->work_title }}</p>--}}
{{--                                        <small>{{ $work->work_start_date_string }} - {{ $work->work_end_date_string }}</small>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="w-fit flex gap-x-4 items-center">--}}
{{--                                            <div class="cursor-pointer hover:text-blue-600" onclick="editWork({{ $work->id }})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
{{--                                            <div class="cursor-pointer hover:text-red-600" onclick="deleteWork({{ $work->id }})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <input type="hidden" name="work_items_ids[]" value="{{ $work->id }}">--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @endisset--}}
{{--                    </div>--}}
{{--                    <div class="grid grid-cols-6 gap-6">--}}
{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="work_title" class="block text-sm font-medium text-gray-700">{{ __('account.Intitulé_De_Poste') }}</label>--}}
{{--                            <input type="text" id="work_title" class="mt-1">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="work_city" class="block text-sm font-medium text-gray-700">{{ __('account.Ville') }}</label>--}}
{{--                            <input type="text" id="work_city" class="mt-1">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6">--}}
{{--                            <label for="work_employer" class="block text-sm font-medium text-gray-700">{{ __('account.Employeur') }}</label>--}}
{{--                            <input type="text" id="work_employer" class="mt-1">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="work_start_date" class="block text-sm font-medium text-gray-700">{{ __('account.Date_De_Debut') }}</label>--}}
{{--                            <input type="month" id="work_start_date" class="mt-1">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="work_end_date" class="block text-sm font-medium text-gray-700">{{ __('account.Date_De_Fin') }}</label>--}}
{{--                            <input type="month" id="work_end_date" class="mt-1">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6">--}}
{{--                            <label for="work_description" class="block text-sm font-medium text-gray-700">{{ __('account.Description') }}</label>--}}
{{--                            <textarea rows="3" id="work_description" class="mt-1"></textarea>--}}
{{--                        </div>--}}
{{--                        <input type="hidden" id="active_work_item_id" value="">--}}
{{--                    </div>--}}
{{--                    <div class="mt-4">--}}
{{--                        <p id="add_work_button" class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full">{{ __('account.ajouter_work') }}</p>--}}
{{--                        <p id="edit_work_button" class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hidden w-full">{{ __('account.modifier') }}</p>--}}
{{--                        <small class="text-red-500 ml-4 hidden" id="work_error">{{ __('account.remplir_tous_les_champs') }}</small>--}}
{{--                        <small class="text-red-500 ml-4 hidden" id="work_dates_less_than_today_error">{{ __('The two dates must be less than or equal to today') }}</small>--}}
{{--                        <small class="text-red-500 ml-4 hidden" id="work_start_date_less_than_end_date_error">{{ __('The start date must be less than the end date') }}</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="accordion-item bg-white border border-gray-200">--}}
{{--            <h2 class="accordion-header mb-0" id="headingThree6">--}}
{{--                <button class="--}}
{{--        accordion-button--}}
{{--        collapsed--}}
{{--        relative--}}
{{--        flex--}}
{{--        items-center--}}
{{--        w-full--}}
{{--        py-6--}}
{{--        px-5--}}
{{--        text-base text-gray-800 text-left text-xl--}}
{{--        bg-white--}}
{{--        border-0--}}
{{--        rounded-none--}}
{{--        transition--}}
{{--        focus:outline-none--}}
{{--      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree6" aria-expanded="false"--}}
{{--                        aria-controls="collapseThree6">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />--}}
{{--                    </svg>--}}
{{--                    {{ __('account.Compétences') }}--}}
{{--                </button>--}}
{{--            </h2>--}}
{{--            <div id="collapseThree6" class="accordion-collapse collapse" aria-labelledby="headingThree6">--}}
{{--                <div class="accordion-body py-4 px-5">--}}
{{--                    <div id="skill_items_body">--}}
{{--                        @isset($curriculum_vitae->skills)--}}
{{--                            @foreach($curriculum_vitae->skills as $skill)--}}
{{--                                <div id="{{ 'skill_item_' . $skill->id }}" class="flex justify-between items-center bg-gray-200 p-4 mb-4">--}}
{{--                                    <div>--}}
{{--                                        <p>{{ $skill->skill_name }}</p>--}}
{{--                                        <small>{{ \App\Services\LevelService::getSkillLevel($skill->skill_level) }}</small>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="w-fit flex gap-x-4 items-center">--}}
{{--                                            <div class="cursor-pointer hover:text-blue-600" onclick="editSkill({{ $skill->id }})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
{{--                                            <div class="cursor-pointer hover:text-red-600" onclick="deleteSkill({{ $skill->id }})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <input type="hidden" name="skill_items_ids[]" value="{{ $skill->id }}">--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @endisset--}}
{{--                    </div>--}}
{{--                    <div class="grid grid-cols-6 gap-6">--}}
{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="skill_name" class="block text-sm font-medium text-gray-700">{{ __('account.Compétence') }}</label>--}}
{{--                            <input type="text" id="skill_name" class="mt-1">--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="skill_level" class="block text-sm font-medium text-gray-700">{{ __('account.Niveau') }}</label>--}}
{{--                            <select id="skill_level" class="mt-1">--}}
{{--                                <option disabled selected value="0">{{ __('account.Veuillez_sélectionner') }}...</option>--}}
{{--                                <option value="4">{{ __('account.Expert') }}</option>--}}
{{--                                <option value="3">{{ __('account.Experimenté') }}</option>--}}
{{--                                <option value="2">{{ __('account.Compétent') }}</option>--}}
{{--                                <option value="1">{{ __('account.Débutant') }}</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <input type="hidden" id="active_skill_item_id" value="">--}}
{{--                    </div>--}}
{{--                    <div class="mt-4">--}}
{{--                        <p id="add_skill_button" class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full">{{ __('account.ajouter_skills') }}</p>--}}
{{--                        <p id="edit_skill_button" class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hidden w-full">{{ __('account.modifier') }}</p>--}}
{{--                        <small class="text-red-500 ml-4 hidden" id="skill_error">{{ __('account.remplir_tous_les_champs') }}</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="accordion-item bg-white border border-gray-200">--}}
{{--            <h2 class="accordion-header mb-0" id="headingThree7">--}}
{{--                <button class="--}}
{{--        accordion-button--}}
{{--        collapsed--}}
{{--        relative--}}
{{--        flex--}}
{{--        items-center--}}
{{--        w-full--}}
{{--        py-6--}}
{{--        px-5--}}
{{--        text-base text-gray-800 text-left text-xl--}}
{{--        bg-white--}}
{{--        border-0--}}
{{--        rounded-none--}}
{{--        transition--}}
{{--        focus:outline-none--}}
{{--      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree7" aria-expanded="false"--}}
{{--                        aria-controls="collapseThree7">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />--}}
{{--                    </svg>--}}
{{--                    {{ __('account.Langues') }}--}}
{{--                </button>--}}
{{--            </h2>--}}
{{--            <div id="collapseThree7" class="accordion-collapse collapse" aria-labelledby="headingThree7">--}}
{{--                <div class="accordion-body py-4 px-5">--}}
{{--                    <div id="language_items_body">--}}
{{--                        @isset($curriculum_vitae->languages)--}}
{{--                            @foreach($curriculum_vitae->languages as $language)--}}
{{--                                <div id="{{ 'language_item_' . $language->id }}" class="flex justify-between items-center bg-gray-200 p-4 mb-4">--}}
{{--                                    <div>--}}
{{--                                        <p>{{ $language->language_name }}</p>--}}
{{--                                        <small>{{ \App\Services\LevelService::getLanguageLevel($language->language_level) }}</small>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="w-fit flex gap-x-4 items-center">--}}
{{--                                            <div class="cursor-pointer hover:text-blue-600" onclick="editLanguage({{ $language->id }})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
{{--                                            <div class="cursor-pointer hover:text-red-600" onclick="deleteLanguage({{ $language->id }})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <input type="hidden" name="language_items_ids[]" value="{{ $language->id }}">--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @endisset--}}
{{--                    </div>--}}
{{--                    <div class="grid grid-cols-6 gap-6">--}}
{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="language_name" class="block text-sm font-medium text-gray-700">{{ __('account.Langue') }}</label>--}}
{{--                            <select id="language_name" class="mt-1">--}}
{{--                                <option value="" selected>{{ __('account.Veuillez_sélectionner') }}...</option>--}}
{{--                                @foreach(config('languages_list') as $code => $language)--}}
{{--                                    <option value="{{ $code }}">{{ $language }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="col-span-6 sm:col-span-3">--}}
{{--                            <label for="language_level" class="block text-sm font-medium text-gray-700">{{ __('account.Niveau') }}</label>--}}
{{--                            <select id="language_level" class="mt-1">--}}
{{--                                <option disabled selected value="0">{{ __('account.Veuillez_sélectionner') }}...</option>--}}
{{--                                <option value="5">{{ __('account.Langue_maternelle') }}</option>--}}
{{--                                <option value="4">{{ __('account.Excellent') }}</option>--}}
{{--                                <option value="3">{{ __('account.Très_bon') }}</option>--}}
{{--                                <option value="2">{{ __('account.Bon') }}</option>--}}
{{--                                <option value="1">{{ __('account.Connaissances_de_base') }}</option>--}}
{{--                                <option value="6">A1</option>--}}
{{--                                <option value="7">A2</option>--}}
{{--                                <option value="8">B1</option>--}}
{{--                                <option value="9">B2</option>--}}
{{--                                <option value="10">C1</option>--}}
{{--                                <option value="11">C2</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <input type="hidden" id="active_language_item_id" value="">--}}
{{--                    </div>--}}
{{--                    <div class="mt-4">--}}
{{--                        <p id="add_language_button" class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full">{{ __('account.ajouter_langue') }}</p>--}}
{{--                        <p id="edit_language_button" class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hidden w-full">{{ __('account.modifier') }}</p>--}}
{{--                        <small class="text-red-500 ml-4 hidden" id="language_error">{{ __('account.remplir_tous_les_champs') }}</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="accordion-item bg-white border border-gray-200">--}}
{{--            <h2 class="accordion-header mb-0" id="headingThree8">--}}
{{--                <button class="--}}
{{--        accordion-button--}}
{{--        collapsed--}}
{{--        relative--}}
{{--        flex--}}
{{--        items-center--}}
{{--        w-full--}}
{{--        py-6--}}
{{--        px-5--}}
{{--        text-base text-gray-800 text-left text-xl--}}
{{--        bg-white--}}
{{--        border-0--}}
{{--        rounded-none--}}
{{--        transition--}}
{{--        focus:outline-none--}}
{{--      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree8" aria-expanded="false"--}}
{{--                        aria-controls="collapseThree8">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.893 13.393l-1.135-1.135a2.252 2.252 0 01-.421-.585l-1.08-2.16a.414.414 0 00-.663-.107.827.827 0 01-.812.21l-1.273-.363a.89.89 0 00-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 01-1.81 1.025 1.055 1.055 0 01-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 01-1.383-2.46l.007-.042a2.25 2.25 0 01.29-.787l.09-.15a2.25 2.25 0 012.37-1.048l1.178.236a1.125 1.125 0 001.302-.795l.208-.73a1.125 1.125 0 00-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 01-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 01-1.458-1.137l1.411-2.353a2.25 2.25 0 00.286-.76m11.928 9.869A9 9 0 008.965 3.525m11.928 9.868A9 9 0 118.965 3.525" />--}}
{{--                    </svg>--}}
{{--                    {{ __('account.Centres_interet') }}--}}
{{--                </button>--}}
{{--            </h2>--}}
{{--            <div id="collapseThree8" class="accordion-collapse collapse" aria-labelledby="headingThree8">--}}
{{--                <div class="accordion-body py-4 px-5">--}}
{{--                    <div id="hobby_items_body">--}}
{{--                        @isset($curriculum_vitae->hobbies)--}}
{{--                            @foreach($curriculum_vitae->hobbies as $hobby)--}}
{{--                                <div id="{{ 'hobby_item_' . $hobby->id }}" class="flex justify-between items-center bg-gray-200 p-4 mb-4">--}}
{{--                                    <div>--}}
{{--                                        <p>{{ $hobby->hobby_name }}</p>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="w-fit flex gap-x-4 items-center">--}}
{{--                                            <div class="cursor-pointer hover:text-blue-600" onclick="editHobby({{ $hobby->id }})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
{{--                                            <div class="cursor-pointer hover:text-red-600" onclick="deleteHobby({{ $hobby->id }})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />--}}
{{--                                                </svg>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <input type="hidden" name="hobby_items_ids[]" value="{{ $hobby->id }}">--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @endisset--}}
{{--                    </div>--}}
{{--                    <div class="grid grid-cols-6 gap-6">--}}
{{--                        <div class="col-span-6">--}}
{{--                            <label for="hobby_name" class="block text-sm font-medium text-gray-700">{{ __('account.Centre_interet') }}</label>--}}
{{--                            <input type="text" id="hobby_name" class="mt-1">--}}
{{--                        </div>--}}
{{--                        <input type="hidden" id="active_hobby_item_id" value="">--}}
{{--                    </div>--}}
{{--                    <div class="mt-4">--}}
{{--                        <p id="add_hobby_button" class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 w-full">{{ __('account.ajouter_hobby') }}</p>--}}
{{--                        <p id="edit_hobby_button" class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hidden w-full">{{ __('account.modifier') }}</p>--}}
{{--                        <small class="text-red-500 ml-4 hidden" id="hobby_error">{{ __('account.remplir_tous_les_champs') }}</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="accordion-item bg-white border border-gray-200">--}}
{{--            <h2 class="accordion-header mb-0" id="headingThree9">--}}
{{--                <button class="--}}
{{--        accordion-button--}}
{{--        collapsed--}}
{{--        relative--}}
{{--        flex--}}
{{--        items-center--}}
{{--        w-full--}}
{{--        py-6--}}
{{--        px-5--}}
{{--        text-base text-gray-800 text-left text-xl--}}
{{--        bg-white--}}
{{--        border-0--}}
{{--        rounded-none--}}
{{--        transition--}}
{{--        focus:outline-none--}}
{{--      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree9" aria-expanded="false"--}}
{{--                        aria-controls="collapseThree9">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />--}}
{{--                    </svg>--}}
{{--                    {{ __('account.Autres_Infos') }}--}}
{{--                </button>--}}
{{--            </h2>--}}
{{--            <div id="collapseThree9" class="accordion-collapse collapse" aria-labelledby="headingThree9">--}}
{{--                <div class="accordion-body py-4 px-5">--}}
{{--                    <div class="grid grid-cols-6 gap-6">--}}
{{--                        <div class="col-span-6">--}}
{{--                            <label for="other_description" class="block text-sm font-medium text-gray-700">{{ __('account.Description') }}</label>--}}
{{--                            <textarea rows="5" id="other_description" name="other_description" class="mt-1">{{ $curriculum_vitae->other_description ?? old('other_description') }}</textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <br>--}}

{{--    <div class="px-4 py-3 text-right sm:px-6">--}}
{{--        <button type="submit" class="inline-flex justify-center rounded-md--}}
{{--        border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium--}}
{{--        text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2--}}
{{--        focus:ring-blue-500 focus:ring-offset-2"--}}
{{--        >{{ __('account.sauvegarder') }}</button>--}}
{{--    </div>--}}
{{--</form>--}}
