<div id="language_items_parent">
    @if(isset($ugg_form->languages[0]))
        @foreach($ugg_form->languages->sortBy(['position', 'asc']) as $item)
            <div>
                <div id="language_item_view_1" class="flex justify-between items-center bg-gray-200 p-4 mb-4 cursor-move language-item-view handle">
                    <div class="handle">
                        <p class="handle">{{ config('languages_list.' . $item->language_name) }}</p>
                        <small class="handle">{{ \App\Services\LevelService::getLanguageLevel($item->language_level) }}</small>
                    </div>
                    @if($section_2 !== 'verify')
                        <div class="w-fit flex gap-x-4 items-center">
                            <div class="cursor-pointer hover:text-blue-600" onclick="editLanguageItem(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </div>
                            <div class="cursor-pointer hover:text-red-600" onclick="deleteLanguageItem(this)">
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
                <div id="language_item_form_1" class="language-item-form-hide"></div>
                <input type="hidden" name="language_items_ids[]" class="language-items-id" value="{{ $item->id }}">
            </div>
        @endforeach
    @endif
</div>

@if($section_2 !== 'verify')
    <div class="mt-6">
        <a onclick="addLanguageItem()"
           class="flex bg-gray-100 w-full items-center justify-center gap-x-1 py-3 text-gray-600 rounded hover:cursor-pointer font-light"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="hover:underline">
                {{ __("ugg.Ajouter une nouvelle langue") }}
            </span>
        </a>
    </div>
@endif
