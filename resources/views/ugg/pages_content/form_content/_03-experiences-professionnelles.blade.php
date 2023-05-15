<div class="grid grid-cols-6 gap-6">
    <div class="col-span-6">
        <label for="professional_experience" class="block text-sm font-medium text-gray-700">{{ __("ugg.Avez-vous une expérience professionnelle ?") }}<span class="text-red-500">*</span></label>
        <select onchange="setProfessionalExperience(this)" id="professional_experience"
                name="professional_experience" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('professional_experience') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            @if(isset($ugg_form->professional_experience) && old('professional_experience') == null)
                <option value="0" @if($ugg_form->professional_experience == '0') selected @endif>{{ __("ugg.Non") }}</option>
                <option value="1" @if($ugg_form->professional_experience == '1') selected @endif>{{ __("ugg.Oui") }}</option>
            @else
                <option value="0" @if(old('professional_experience') == '0') selected @endif>{{ __("ugg.Non") }}</option>
                <option value="1" @if(old('professional_experience') == '1') selected @endif>{{ __("ugg.Oui") }}</option>
            @endif
        </select>
    </div>
</div>

<div id="work_items_parent" class="mt-6 {{ (($ugg_form->professional_experience ?? null) == '1' || $errors->has('work_items_ids') || old('professional_experience') == '1') ? '' : 'hidden' }}">
    @if(isset($ugg_form->works[0]))
        @foreach($ugg_form->works->sortBy(['position', 'asc']) as $item)
            <div>
                <div id="work_item_view_1" class="flex justify-between items-center bg-gray-200 p-4 mb-4 cursor-move work-item-view handle">
                    <div class="handle">
                        <p class="handle">{{ $item->work_title }}</p>
                        <small class="handle">{{ $item->work_start_date_string}} - {{ $item->work_end_date_string }}</small>
                        @if(Route::currentRouteName() == 'admin.ugg.form.view')
                            <small class=""> ({{ $item->work_employer }} - {{ $item->work_city }})</small><br>
                            <small class="">{{ $item->work_description }}</small>
                        @endif
                    </div>
                    @if($section_2 !== 'verify')
                        <div class="w-fit flex gap-x-4 items-center">
                            <div class="cursor-pointer hover:text-blue-600" onclick="editWorkUgg(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </div>
                            <div class="cursor-pointer hover:text-red-600" onclick="deleteUggWork(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </div>
                            <div class="cursor-move handle">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 handle">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="work-item-form-hide"></div>
                <input type="hidden" name="work_items_ids[]" class="work-items-id" value="{{ $item->id }}">
            </div>
        @endforeach
    @endif
</div>

@if($section_2 !== 'verify')
    <div id="work_items_button" class="mt-6 {{ (($ugg_form->professional_experience ?? null) == '1' || $errors->has('work_items_ids') || old('professional_experience') == '1') ? '' : 'hidden' }}">
        <a onclick="addNewItem()"
           class="flex bg-gray-100 w-full items-center justify-center gap-x-1 py-3 text-gray-600 rounded hover:cursor-pointer font-light @error('work_items_ids') border border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="hover:underline">
            {{ __("ugg.Ajouter une nouvelle expérience professionnelle") }}
        </span>
        </a>
    </div>
@endif

<div class="grid grid-cols-6 gap-6 mt-6">
    <div class="col-span-6">
        <label for="job_seeker" class="block text-sm font-medium text-gray-700">{{ __("ugg.Etes-vous un chercheur d'emplois?") }}<span class="text-red-500">*</span></label>
        <select onchange="setJobSeeker(this)" id="job_seeker"
                name="job_seeker" @if($section_2 == 'verify') disabled @endif
                class="mt-1 @error('job_seeker') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
            @if(isset($ugg_form->job_seeker) && old('job_seeker') == null)
                <option value="0" @if($ugg_form->job_seeker == '0') selected @endif>{{ __("ugg.Non") }}</option>
                <option value="1" @if($ugg_form->job_seeker == '1') selected @endif>{{ __("ugg.Oui") }}</option>
            @else
                <option value="0" @if(old('job_seeker') == '0') selected @endif>{{ __("ugg.Non") }}</option>
                <option value="1" @if(old('job_seeker') == '1') selected @endif>{{ __("ugg.Oui") }}</option>
            @endif
        </select>
    </div>

    <div class="col-span-6 {{ (($ugg_form->job_seeker ?? null) == '1' || $errors->has('job_seeker_field') || old('job_seeker') == '1') ? '' : 'hidden' }}" id="job_seeker_field_div">
        <label for="job_seeker_field" class="block text-sm font-medium text-gray-700">{{ __("ugg.Quelle est votre domaine?") }}<span class="text-red-500">*</span></label>
        <input type="text" id="job_seeker_field" name="job_seeker_field" @if($section_2 == 'verify') disabled @endif
               class="mt-1 @error('job_seeker_field') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
               value="{{ $ugg_form->job_seeker_field ?? old('job_seeker_field') }}"
        >
{{--        <select id="job_seeker_field"--}}
{{--                name="job_seeker_field" @if($section_2 == 'verify') disabled @endif--}}
{{--                class="mt-1 @error('job_seeker_field') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">--}}
{{--            <option value="" selected disabled>{{ __('account.Veuillez_sélectionner') }}...</option>--}}
{{--            @if(isset($ugg_form->job_seeker_field))--}}
{{--                <option value="1" @if($ugg_form->job_seeker_field == '1') selected @endif>Informatique</option>--}}
{{--                <option value="2" @if($ugg_form->job_seeker_field == '2') selected @endif>Soins infirmier</option>--}}
{{--            @else--}}
{{--                <option value="1" @if(old('job_seeker_field') == '1') selected @endif>Informatique</option>--}}
{{--                <option value="2" @if(old('job_seeker_field') == '2') selected @endif>Soins infirmier</option>--}}
{{--            @endif--}}
{{--        </select>--}}
    </div>

    <div class="col-span-6">
        <label for="other_experience" class="block text-sm font-medium text-gray-700">{{ __("ugg.Autres") }}</label>
        <textarea id="other_experience" name="other_experience"
                  class="mt-1 @error('other_experience') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
                  rows="3" @if($section_2 == 'verify') disabled @endif
                  placeholder="S'il vous plaît décrivez"
        >{{ $ugg_form->other_experience ?? old('other_experience') }}</textarea>
    </div>
</div>
