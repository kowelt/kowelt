<div class="grid grid-cols-6 gap-6">

    <div class="col-span-6">
        <label for="last_degree" class="block text-sm font-medium text-gray-700">{{ __('ugg.Dernier_Diplome_Obtenu') }}
            <span class="text-red-500">*</span></label>
        <select onchange="setLastDegree(this)" id="last_degree"
                name="last_degree" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('last_degree') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>
            @if(isset($ugg_form->last_degree) && old('last_degree') == null)
                <option value="other"
                        @if($ugg_form->last_degree == 'other') selected @endif>{{ __("ugg.Autre") }}</option>
                @foreach(config('diplomes_list') as $key => $value)
                    <option value="{{ $key }}" @if($ugg_form->last_degree == $key) selected @endif>{{ $value }}</option>
                @endforeach
            @else
                <option value="other" @if(old('last_degree') == 'other') selected @endif>{{ __("ugg.Autre") }}</option>
                @foreach(config('diplomes_list') as $key => $value)
                    <option value="{{ $key }}" @if(old('last_degree') == $key) selected @endif>{{ $value }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div
        class="col-span-6 {{ (($ugg_form->last_degree ?? null) == 'other' || $errors->has('last_degree_other') || old('last_degree') == 'other') ? '' : 'hidden' }}"
        id="last_degree_other_div">
        <label for="last_degree_other" class="block text-sm font-medium text-gray-700">{{ __("ugg.Veuillez préciser") }}
            <span class="text-red-500">*</span></label>
        <input type="text" id="last_degree_other" placeholder="{{ __("ugg.Veuillez préciser") }}"
               name="last_degree_other" @if($section_2 == 'verify') disabled @endif
               class="mt-1 @error('last_degree_other') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
               value="{{ $ugg_form->last_degree_other ?? old('last_degree_other') }}"
        >
    </div>

    <div class="col-span-6">
        <label for="last_degree_school"
               class="block text-sm font-medium text-gray-700">{{ __('ugg.Dans_quel_établissement') }}<span
                class="text-red-500">*</span></label>
        <input type="text" id="last_degree_school"
               name="last_degree_school" @if($section_2 == 'verify') disabled @endif
               value="{{ $ugg_form->last_degree_school ?? old('last_degree_school') }}"
               class="mt-1 @error('last_degree_school') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
    </div>

    <div
        class="col-span-6 {{ (in_array($ugg_form->last_degree ?? null, ['BAC', 'GCE']) || $errors->has('last_degree_serie') || in_array(old('last_degree'), ['BAC', 'GCE'])) ? '' : 'hidden' }}"
        id="last_degree_serie_div">
        <label for="last_degree_serie" class="block text-sm font-medium text-gray-700">{{ __('ugg.Série') }}<span
                class="text-red-500">*</span></label>
        <select id="last_degree_serie"
                name="last_degree_serie" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('last_degree_serie') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>
            @if(isset($ugg_form->last_degree_serie) && old('last_degree_serie') == null)
                <option value="1" @if($ugg_form->last_degree_serie == '1') selected @endif>A</option>
                <option value="2" @if($ugg_form->last_degree_serie == '2') selected @endif>B</option>
                <option value="3" @if($ugg_form->last_degree_serie == '3') selected @endif>C</option>
            @else
                <option value="1" @if(old('last_degree_serie') == '1') selected @endif>A</option>
                <option value="2" @if(old('last_degree_serie') == '2') selected @endif>B</option>
                <option value="3" @if(old('last_degree_serie') == '3') selected @endif>C</option>
            @endif
        </select>
    </div>

    <div
        class="col-span-6 {{ (!in_array($ugg_form->last_degree ?? null, ['BAC', 'GCE', '']) || $errors->has('last_degree_study') || !in_array(old('last_degree'), ['BAC', 'GCE', ''])) ? '' : 'hidden' }}"
        id="last_degree_study_div">
        <label for="last_degree_study" class="block text-sm font-medium text-gray-700">{{ __("ugg.Domaine d'étude") }}
            <span class="text-red-500">*</span></label>
        <select onchange="setOtherField(this, 'last_degree_study_other_div')" id="last_degree_study"
                name="last_degree_study" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('last_degree_study') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>
            @if(isset($ugg_form->last_degree_study) && old('last_degree_study') == null)
                <option value="other"
                        @if($ugg_form->last_degree_study == 'other') selected @endif>{{ __("ugg.Autre") }}</option>
                @foreach(config('filieres_list_' . app()->getLocale()) as $key => $value)
                    <option value="{{ $key }}"
                            @if($ugg_form->last_degree_study == $key) selected @endif>{{ $value }}</option>
                @endforeach
            @else
                <option value="other"
                        @if(old('last_degree_study') == 'other') selected @endif>{{ __("ugg.Autre") }}</option>
                @foreach(config('filieres_list_' . app()->getLocale()) as $key => $value)
                    <option value="{{ $key }}"
                            @if(old('last_degree_study') == $key) selected @endif>{{ $value }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div
        class="col-span-6 {{ (($ugg_form->last_degree_study ?? null) == 'other' || $errors->has('last_degree_study_other') || old('last_degree_study') == 'other') ? '' : 'hidden' }}"
        id="last_degree_study_other_div">
        <label for="last_degree_study_other"
               class="block text-sm font-medium text-gray-700">{{ __("ugg.Autre_domaine_etude") }}<span
                class="text-red-500">*</span></label>
        <input type="text" id="last_degree_study_other" placeholder="Veuillez préciser"
               name="last_degree_study_other" @if($section_2 == 'verify') disabled @endif
               class="mt-1 @error('last_degree_study_other') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
               value="{{ $ugg_form->last_degree_study_other ?? old('last_degree_study_other') }}"
        >
    </div>

    <div class="col-span-6">
        <label for="currently_student"
               class="block text-sm font-medium text-gray-700">{{ __("ugg.Actuellement étudiant?") }}<span
                class="text-red-500">*</span></label>
        <select onchange="setCurrentlyStudent(this)" id="currently_student"
                name="currently_student" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('currently_student') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            @if(isset($ugg_form->currently_student))
                <option value="0" @if($ugg_form->currently_student == '0') selected @endif>{{ __("ugg.Non") }}</option>
                <option value="1" @if($ugg_form->currently_student == '1') selected @endif>{{ __("ugg.Oui") }}</option>
            @else
                <option value="0" @if(old('currently_student') == '0') selected @endif>{{ __("ugg.Non") }}</option>
                <option value="1" @if(old('currently_student') == '1') selected @endif>{{ __("ugg.Oui") }}</option>
            @endif
        </select>
    </div>

    <div
        class="col-span-6 {{ ($ugg_form->currently_student ?? null == '1' || $errors->has('student_school') || old('currently_student') == '1') ? '' : 'hidden' }}"
        id="student_school_div">
        <label for="student_school"
               class="block text-sm font-medium text-gray-700">{{ __("ugg.Dans quelle Université?") }}<span
                class="text-red-500">*</span></label>
        <input type="text" id="student_school"
               name="student_school" @if($section_2 == 'verify') disabled @endif
               value="{{ $ugg_form->student_school ?? old('student_school') }}"
               class="mt-1 @error('student_school') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
    </div>

    <div
        class="col-span-6 {{ ($ugg_form->currently_student ?? null == '1' || $errors->has('student_cycle') || old('currently_student') == '1') ? '' : 'hidden' }}"
        id="student_cycle_div">
        <label for="student_cycle" class="block text-sm font-medium text-gray-700">{{ __("ugg.Quel Cycle?") }}<span
                class="text-red-500">*</span></label>
        <select onchange="setOtherField(this, 'student_cycle_other_div')" id="student_cycle"
                name="student_cycle" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('student_cycle') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>
            @if(isset($ugg_form->student_cycle) && old('student_cycle') == null)
                @foreach(config('diplomes_list') as $key => $value)
                    @if(!in_array($key, ['BAC', 'GCE']))
                        <option value="{{ $key }}"
                                @if($ugg_form->student_cycle == $key) selected @endif>{{ $value }}</option>
                    @endif
                @endforeach
                <option value="other" @if($ugg_form->student_cycle == 'other') selected @endif>{{ __("ugg.Autre") }}</option>
            @else
                @foreach(config('diplomes_list') as $key => $value)
                    @if(!in_array($key, ['BAC', 'GCE']))
                        <option value="{{ $key }}"
                                @if(old('student_cycle') == $key) selected @endif>{{ $value }}</option>
                    @endif
                @endforeach
                <option value="other" @if(old('student_cycle') == 'other') selected @endif>{{ __("ugg.Autre") }}</option>
            @endif

        </select>
    </div>

    <div
        class="col-span-6 {{ (($ugg_form->student_cycle ?? null) == 'other' || $errors->has('student_cycle_other') || old('student_cycle') == 'other') ? '' : 'hidden' }}"
        id="student_cycle_other_div">
        <label for="student_cycle_other"
               class="block text-sm font-medium text-gray-700">{{ __("ugg.Veuillez préciser") }}<span
                class="text-red-500">*</span></label>
        <input type="text" id="student_cycle_other" placeholder="{{ __("ugg.Veuillez préciser") }}"
               name="student_cycle_other" @if($section_2 == 'verify') disabled @endif
               class="mt-1 @error('student_cycle_other') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
               value="{{ $ugg_form->student_cycle_other ?? old('student_cycle_other') }}"
        >
    </div>

    <div
        class="col-span-6 {{ ($ugg_form->currently_student ?? null == '1' || $errors->has('student_field') || old('currently_student') == '1') ? '' : 'hidden' }}"
        id="student_field_div">
        <label for="student_field"
               class="block text-sm font-medium text-gray-700">{{ __("ugg.Quelle est votre filliere?") }}<span
                class="text-red-500">*</span></label>
        <select onchange="setOtherField(this, 'student_field_other_div')" id="student_field"
                name="student_field" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('student_field') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>
            @if(isset($ugg_form->student_field) && old('student_field') == null)
                <option value="other" @if($ugg_form->student_field == 'other') selected @endif>{{ __("ugg.Autre") }}</option>
                @foreach(config('filieres_list_' . app()->getLocale()) as $key => $value)
                    <option value="{{ $key }}" @if($ugg_form->student_field == $key) selected @endif>{{ $value }}</option>
                @endforeach
            @else
                <option value="other" @if(old('student_field') == 'other') selected @endif>{{ __("ugg.Autre") }}</option>
                @foreach(config('filieres_list_' . app()->getLocale()) as $key => $value)
                    <option value="{{ $key }}" @if(old('student_field') == $key) selected @endif>{{ $value }}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div
        class="col-span-6 {{ (($ugg_form->student_field ?? null) == 'other' || $errors->has('student_field_other') || old('student_field') == 'other') ? '' : 'hidden' }}"
        id="student_field_other_div">
        <label for="student_field_other" class="block text-sm font-medium text-gray-700">{{ __("ugg.Autre filliere") }}
            <span class="text-red-500">*</span></label>
        <input type="text" id="student_field_other" placeholder="Veuillez préciser"
               name="student_field_other" @if($section_2 == 'verify') disabled @endif
               class="mt-1 @error('student_field_other') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
               value="{{ $ugg_form->student_field_other ?? old('student_field_other') }}"
        >
    </div>

    <div class="col-span-6">
        <label for="currently_apprentice"
               class="block text-sm font-medium text-gray-700">{{ __("ugg.Actuellement apprentis?") }}<span
                class="text-red-500">*</span></label>
        <select onchange="setCurrentlyApprentice(this)" id="currently_apprentice"
                name="currently_apprentice" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('currently_apprentice') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            @if(isset($ugg_form->currently_apprentice) && old('currently_apprentice') == null)
                <option value="0"
                        @if($ugg_form->currently_apprentice == '0') selected @endif>{{ __("ugg.Non") }}</option>
                <option value="1"
                        @if($ugg_form->currently_apprentice == '1') selected @endif>{{ __("ugg.Oui") }}</option>
            @else
                <option value="0" @if(old('currently_apprentice') == '0') selected @endif>{{ __("ugg.Non") }}</option>
                <option value="1" @if(old('currently_apprentice') == '1') selected @endif>{{ __("ugg.Oui") }}</option>
            @endif
        </select>
    </div>

    <div
        class="col-span-6 {{ ($ugg_form->currently_apprentice ?? null == '1' || $errors->has('apprentice_field') || old('currently_apprentice') == '1') ? '' : 'hidden' }}"
        id="apprentice_field_div">
        <label for="apprentice_field"
               class="block text-sm font-medium text-gray-700">{{ __("ugg.Quelle est votre domaine d’apprentissage ?") }}
            <span class="text-red-500">*</span></label>
        <input type="text" id="apprentice_field"
               name="apprentice_field" @if($section_2 == 'verify') disabled @endif
               class="mt-1 @error('apprentice_field') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
               value="{{ $ugg_form->apprentice_field ?? old('apprentice_field') }}"
        >
{{--        <select onchange="setOtherField(this, 'apprentice_field_other_div')" id="apprentice_field"
                name="apprentice_field" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('apprentice_field') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>
            @if(isset($ugg_form->apprentice_field) && old('apprentice_field') == null)
                <option value="other"
                        @if($ugg_form->apprentice_field == 'other') selected @endif>{{ __("ugg.Autre") }}</option>
                @foreach(config('filieres_list_' . app()->getLocale()) as $key => $value)
                    <option value="{{ $key }}"
                            @if($ugg_form->apprentice_field == $key) selected @endif>{{ $value }}</option>
                @endforeach
            @else
                <option value="other"
                        @if(old('apprentice_field') == 'other') selected @endif>{{ __("ugg.Autre") }}</option>
                @foreach(config('filieres_list_' . app()->getLocale()) as $key => $value)
                    <option value="{{ $key }}"
                            @if(old('apprentice_field') == $key) selected @endif>{{ $value }}</option>
                @endforeach
            @endif
        </select>--}}
    </div>

{{--    <div
        class="col-span-6 {{ (($ugg_form->apprentice_field ?? null) == 'other' || $errors->has('apprentice_field_other') || old('apprentice_field') == 'other') ? '' : 'hidden' }}"
        id="apprentice_field_other_div">
        <label for="apprentice_field_other"
               class="block text-sm font-medium text-gray-700">{{ __("ugg.Autre domaine d'apprentissage") }}<span
                class="text-red-500">*</span></label>
        <input type="text" id="apprentice_field_other" placeholder="Veuillez préciser"
               name="apprentice_field_other" @if($section_2 == 'verify') disabled @endif
               class="mt-1 @error('apprentice_field_other') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
               value="{{ $ugg_form->apprentice_field_other ?? old('apprentice_field_other') }}"
        >
    </div>--}}

    <div class="col-span-6">
        <label for="other_education" class="block text-sm font-medium text-gray-700">{{ __("ugg.Autres") }}</label>
        <textarea id="other_education"
                  name="other_education" @if($section_2 == 'verify') disabled @endif
                  class="mt-1 @error('other_education') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
                  rows="3"
                  placeholder="S'il vous plaît décrivez"
        >{{ $ugg_form->other_education ?? old('other_education') }}</textarea>
    </div>

</div>
