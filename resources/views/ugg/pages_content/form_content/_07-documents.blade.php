<div id="documents_div">
    <div class="grid grid-cols-6 gap-6">
        <input type="hidden" value="0" id="upload_one_file_require_0">
        <div class="col-span-6">
            <label for="cv_documents" class="block text-sm font-medium text-gray-700">{{ __("ugg.CV") }}<span class="text-red-500">*</span></label>
            @if(isset($cv_document))
                <div class="flex justify-between items-center py-8 px-5 rounded-lg mb-3 bg-gray-100 shadow w-full">
                    <div class="break-words overflow-hidden">
                        {{ $cv_document->filename }}
                    </div>
                    <div class="flex items-center">
                        <div>
                            <a href="{{ asset($cv_document->path) }}" download
                               class="text-blue-500"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                            </a>
                        </div>
                        @if($section_2 !== 'verify')
                            <div class="ml-3">
                                <a href="{{ route('applicant.document.delete', [app()->getLocale(), $cv_document->id]) }}"
                                   class="text-red-500 hover:underline"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="cv_documents[]" value="{{ $cv_document->path }}">
            @endif
            <input type="file" id="cv_documents" name="cv_documents[]"
                   class="mt-1 p-3 upload-one-file @if(isset($cv_document) || Route::currentRouteName() == 'admin.ugg.form.view') hidden @endif @error('cv_documents') border-[1.5px] border-red-600 focus:border-red-500 focus:ring-red-500 rounded-lg @enderror"
                   accept="image/png, image/jpeg, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document">
        </div>
    </div>

    <div class="grid grid-cols-6 gap-6">
        <input type="hidden" value="0" id="upload_one_file_require_1">
        <div class="col-span-6">
            <label for="motivation_letter_documents" class="block text-sm font-medium text-gray-700">{{ __("ugg.Lettre de motivation") }}<span class="text-red-500">*</span></label>
            @if(isset($motivation_letter_document))
                <div class="flex justify-between items-center py-8 px-5 rounded-lg mb-3 bg-gray-100 shadow w-full">
                    <div class="break-words overflow-hidden">
                        {{ $motivation_letter_document->filename }}
                    </div>
                    <div class="flex items-center">
                        <div>
                            <a href="{{ asset($motivation_letter_document->path) }}" download
                               class="text-blue-500"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                            </a>
                        </div>
                        @if($section_2 !== 'verify')
                            <div class="ml-3">
                                <a href="{{ route('applicant.document.delete', [app()->getLocale(), $motivation_letter_document->id]) }}"
                                   class="text-red-500 hover:underline"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="motivation_letter_documents[]" value="{{ $motivation_letter_document->path }}">
            @endif
            <input type="file" id="motivation_letter_documents" name="motivation_letter_documents[]"
                   class="mt-1 p-3 upload-one-file @if(isset($motivation_letter_document) || Route::currentRouteName() == 'admin.ugg.form.view') hidden @endif @error('motivation_letter_documents') border-[1.5px] border-red-600 focus:border-red-500 focus:ring-red-500 rounded-lg @enderror"
                   accept="image/png, image/jpeg, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document">
        </div>
    </div>

    <div class="grid grid-cols-6 gap-6">
        @php($max_input_diplomes = isset($diploms_documents[0]) ? (10 - sizeof($diploms_documents)) : 10)
        <input type="hidden" value="{{ $max_input_diplomes }}" id="max_number_of_files_0">
        <input type="hidden" value="0" id="upload_multi_files_require_0">
        <div class="col-span-6">
            <label for="diploms_documents" class="block text-sm font-medium text-gray-700">{{ __("ugg.Diplômes") }}(max: {{ $max_input_diplomes }})<span class="text-red-500">*</span></label>
            @if(isset($diploms_documents[0]))
                @foreach($diploms_documents as $document)
                    <input type="hidden" name="diploms_documents[]" value="{{ $document->path }}">
                @endforeach
            @endif
            <input type="file" id="diploms_documents" name="diploms_documents[]"
                   class="mt-1 p-3 upload-multi-files @if($max_input_diplomes == 0 || $section_2 == 'verify') hidden @endif @error('diploms_documents') border-[1.5px] border-red-600 focus:border-red-500 focus:ring-red-500 rounded-lg @enderror"
                   accept="image/png, image/jpeg, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" multiple>
            @if(isset($diploms_documents[0]))
                @foreach($diploms_documents as $document)
                    <div class="flex justify-between items-center py-8 px-5 rounded-lg mb-3 bg-gray-100 shadow w-full">
                        <div class="break-words overflow-hidden">
                            {{ $document->filename }}
                        </div>
                        <div class="flex items-center">
                            <div>
                                <a href="{{ asset($document->path) }}" download
                                   class="text-blue-500"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </a>
                            </div>
                            @if($section_2 !== 'verify')
                                <div class="ml-3">
                                    <a href="{{ route('applicant.document.delete', [app()->getLocale(), $document->id]) }}"
                                       class="text-red-500 hover:underline"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="grid grid-cols-6 gap-6">
        @php($max_input_other_documents = isset($other_documents[0]) ? (5 - sizeof($other_documents)) : 5)
        <input type="hidden" value="{{ $max_input_other_documents }}" id="max_number_of_files_1">
        <input type="hidden" value="0" id="upload_multi_files_require_1">
        <div class="col-span-6">
            <label for="other_documents" class="block text-sm font-medium text-gray-700">{{ __("ugg.Autres Documents") }}(max: {{ $max_input_other_documents }})</label>
            @if(isset($other_documents[0]))
                @foreach($other_documents as $document)
                    <input type="hidden" name="other_documents[]" value="{{ $document->path }}">
                @endforeach
            @endif
            <input type="file" id="other_documents" name="other_documents[]"
                   class="mt-1 p-3 upload-multi-files @if($section_2 == 'verify') hidden @endif"
                   accept="image/png, image/jpeg, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" multiple>
            @if(isset($other_documents[0]))
                @foreach($other_documents as $document)
                    <div class="flex justify-between items-center py-8 px-5 rounded-lg mb-3 bg-gray-100 shadow w-full">
                        <div class="break-words overflow-hidden">
                            {{ $document->filename }}
                        </div>
                        <div class="flex items-center">
                            <div>
                                <a href="{{ asset($document->path) }}" download
                                   class="text-blue-500"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </a>
                            </div>
                            @if($section_2 !== 'verify')
                                <div class="ml-3">
                                    <a href="{{ route('applicant.document.delete', [app()->getLocale(), $document->id]) }}"
                                       class="text-red-500 hover:underline"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
