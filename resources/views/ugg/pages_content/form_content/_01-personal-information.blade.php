<div class="grid grid-cols-6 gap-6">
    <input type="hidden" value="{{ 1 }}" id="max_number_of_images">
    <input type="hidden" value="0" id="image_require">
    <div class="col-span-6" id="avatar_div">
        <label for="avatar" class="block text-sm font-medium text-gray-700">{{ __('account.Photo_Upload') }}</label>
        <input type="file" id="avatar" name="avatar[]" class="mt-1 p-3 @if(isset($ugg_form->picture) || $section_2 == 'verify' || Route::currentRouteName() == 'admin.ugg.form.view') hidden @endif">
        <div class="mx-auto w-fit text-center @if(!isset($ugg_form->picture->path)) hidden @endif" id="image_view_div">
            <img class="mb-1 max-h-64" id="image_view" src="{{ isset($ugg_form->picture->path) ? asset($ugg_form->picture->path) : '' }}" alt="photo">
            @if(isset($ugg_form->picture->id) && $section_2 !== 'verify')
                <a href="{{ route('ugg.delete.picture', [app()->getLocale(), $ugg_form->picture->id]) }}" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-5 h-5 mx-auto hover:scale-110 mt-1 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </a>
            @endif
            @if(Route::currentRouteName() == 'admin.ugg.form.view' && isset($ugg_form->picture))
                <a href="{{ asset($ugg_form->picture->path) }}" download>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-6 h-6 mx-auto hover:scale-110 mt-2 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                </a>
            @endif
        </div>
    </div>

    <div class="col-span-6">
        <label for="session" class="block text-sm font-medium text-gray-700">{{ __('ugg.session') }}<span class="text-red-500">*</span></label>
        <select onchange="setUggCities(this)" id="session" name="session" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('session') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>
            @if(isset($ugg_form->session) && old('session') == null)
                @isset($ugg_sessions[0])
                    @foreach($ugg_sessions as $ugg_session)
                        <option value="{{ $ugg_session->id }}" @if($ugg_form->session == $ugg_session->id) selected @endif>
                            {{ $ugg_session->{'name_' . app()->getLocale()} }}
                        </option>
                    @endforeach
                @endisset
            @else
                @foreach($ugg_sessions as $ugg_session)
                    <option value="{{ $ugg_session->id }}" @if(old('session') == $ugg_session->id) selected @endif>
                        {{ $ugg_session->{'name_' . app()->getLocale()} }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="col-span-6">
        <label for="ugg_city" class="block text-sm font-medium text-gray-700">{{ __('ugg.ugg_city') }}<span class="text-red-500">*</span></label>
        <select id="ugg_city" name="ugg_city" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('ugg_city') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>
            @if(isset($ugg_form->ugg_city) && old('ugg_city') == null)
                @isset($ugg_cities[0])
                    @foreach($ugg_cities as $ugg_city)
                        <option value="{{ $ugg_city->id }}" @if($ugg_form->ugg_city == $ugg_city->id) selected @endif>
                            {{ $ugg_city->{'name_' . app()->getLocale()} }}
                        </option>
                    @endforeach
                @endisset
            @else
                @isset($ugg_cities[0])
                    @foreach($ugg_cities as $ugg_city)
                        <option value="{{ $ugg_city->id }}" @if(old('ugg_city') == $ugg_city->id) selected @endif>
                            {{ $ugg_city->{'name_' . app()->getLocale()} }}
                        </option>
                    @endforeach
                @endisset
            @endif
        </select>
    </div>

    <div class="col-span-6">
        <label for="exam_language" class="block text-sm font-medium text-gray-700">{{ __('ugg.exam_language') }}<span class="text-red-500">*</span></label>
        <select id="exam_language" name="exam_language" @if($section_2 == 'verify') disabled @endif
        class="mt-1 @error('exam_language') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>
            @if(isset($ugg_form->exam_language) && old('exam_language') == null)
                <option value="fr" @if($ugg_form->exam_language == 'fr') selected @endif>{{ str_replace("French - français", "Français", config('languages_list.fr')) }}</option>
                <option value="en" @if($ugg_form->exam_language == 'en') selected @endif>{{ config('languages_list.en') }}</option>
            @else
                <option value="fr" @if(old('exam_language') == 'fr') selected @endif>{{ str_replace("French - français", "Français", config('languages_list.fr')) }}</option>
                <option value="en" @if(old('exam_language') == 'en') selected @endif>{{ config('languages_list.en') }}</option>
            @endif
        </select>
    </div>

    @if(Route::currentRouteName() == 'admin.ugg.form.view')
        <div class="col-span-6 sm:col-span-3">
            <label for="firstname" class="block text-sm font-medium text-gray-700">{{ __('account.firstname') }}<span class="text-red-500">*</span></label>
            <input type="text" id="firstname" disabled value="{{ $user->firstname }}" class="mt-1">
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="lastname" class="block text-sm font-medium text-gray-700">{{ __('account.lastname') }}<span class="text-red-500">*</span></label>
            <input type="text" id="lastname" disabled value="{{ $user->lastname }}" class="mt-1">
        </div>

        <div class="col-span-6">
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('account.e_mail') }}<span class="text-red-500">*</span></label>
            <input type="email" id="email" disabled value="{{ $user->email }}" class="mt-1">
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">{{ __('account.Date_De_Naissance') }}<span class="text-red-500">*</span></label>
            <input type="date" id="date_of_birth" value="{{ $user->date_of_birth ?? old('date_of_birth') }}" disabled class="mt-1">
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="gender" class="block text-sm font-medium text-gray-700">{{ __('account.Genre') }}<span class="text-red-500">*</span></label>
            <select id="gender" disabled class="mt-1">
                <option value="1" {{ $user->gender == '1' ? 'selected' : '' }} disabled>{{ __('account.homme') }}</option>
                <option value="2" {{ $user->gender == '2' ? 'selected' : '' }} disabled>{{ __('account.femme') }}</option>
                <option value="3" {{ $user->gender == '3' ? 'selected' : '' }} disabled>{{ __('account.divers') }}</option>
            </select>
        </div>
    @else
        <div class="col-span-6 sm:col-span-3">
            <label for="firstname" class="block text-sm font-medium text-gray-700">{{ __('account.firstname') }}<span class="text-red-500">*</span></label>
            <input type="text" id="firstname" disabled value="{{ Auth::user()->firstname }}" class="mt-1 bg-gray-50">
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="lastname" class="block text-sm font-medium text-gray-700">{{ __('account.lastname') }}<span class="text-red-500">*</span></label>
            <input type="text" id="lastname" disabled value="{{ Auth::user()->lastname }}" class="mt-1 bg-gray-50">
        </div>

        <div class="col-span-6">
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('account.e_mail') }}<span class="text-red-500">*</span></label>
            <input type="email" id="email" disabled value="{{ Auth::user()->email }}" class="mt-1 bg-gray-50">
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">{{ __('account.Date_De_Naissance') }}<span class="text-red-500">*</span></label>
            <input type="date" id="date_of_birth" value="{{ Auth::user()->date_of_birth ?? old('date_of_birth') }}" disabled class="mt-1 bg-gray-50">
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="gender" class="block text-sm font-medium text-gray-700">{{ __('account.Genre') }}<span class="text-red-500">*</span></label>
            <select id="gender" disabled class="mt-1 bg-gray-50">
                <option value="1" {{ Auth::user()->gender == '1' ? 'selected' : '' }} disabled>{{ __('account.homme') }}</option>
                <option value="2" {{ Auth::user()->gender == '2' ? 'selected' : '' }} disabled>{{ __('account.femme') }}</option>
                <option value="3" {{ Auth::user()->gender == '3' ? 'selected' : '' }} disabled>{{ __('account.divers') }}</option>
            </select>
        </div>
    @endif

    <div class="col-span-6">
        <label for="place_of_birth" class="block text-sm font-medium text-gray-700">{{ __('account.Lieu_De_Naissance') }}<span class="text-red-500">*</span></label>
        <input type="text" id="place_of_birth" name="place_of_birth" @if($section_2 == 'verify') disabled @endif value="{{ $ugg_form->place_of_birth ?? old('place_of_birth') }}" class="mt-1 @error('place_of_birth') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
    </div>

    <div class="col-span-6">
        <label for="nationality" class="block text-sm font-medium text-gray-700">{{ __('account.Nationalité') }}<span class="text-red-500">*</span></label>
        <select id="nationality" name="nationality" @if($section_2 == 'verify') disabled @endif class="mt-1 @error('nationality') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            <option value="" selected>{{ __('account.Veuillez_sélectionner') }}...</option>
            @foreach(config('countries_list_' . app()->getLocale()) as $code => $country)
                <option value="{{ $code }}" @if(isset($ugg_form->nationality) && $ugg_form->nationality == $code) selected @elseif(old('nationality') == $code) selected @endif>{{ $country }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-span-6">
        <label for="identity_number" class="block text-sm font-medium text-gray-700">{{ __('ugg.pass_number') }}<span class="text-red-500">*</span></label>
        <input type="text" id="identity_number" name="identity_number" @if($section_2 == 'verify') disabled @endif value="{{ $ugg_form->identity_number ?? old('identity_number') }}" class="mt-1 @error('identity_number') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
    </div>

    <div class="col-span-6">
        <label for="leaving_city" class="block text-sm font-medium text-gray-700">{{ __('ugg.leaving_city') }}<span class="text-red-500">*</span></label>
        <input type="text" id="leaving_city" name="leaving_city" @if($section_2 == 'verify') disabled @endif value="{{ $ugg_form->leaving_city ?? old('leaving_city') }}" class="mt-1 @error('leaving_city') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
    </div>

    <div class="col-span-6">
        <label for="tel" class="block text-sm font-medium text-gray-700">{{ __('account.tel') }}<span class="text-red-500">*</span></label>
        <input type="tel" id="tel" name="tel" @if($section_2 == 'verify') disabled @endif value="{{ $ugg_form->tel ?? old('tel') }}" class="mt-1 @error('tel') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
    </div>

</div>
