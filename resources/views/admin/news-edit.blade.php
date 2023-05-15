@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Edit News({{ $new->title_de }})</p>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16 max-w-6xl mx-auto bg-white shadow">
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
            <form class="p-6" action="{{ route('admin.news.update', [app()->getLocale(), $new]) }}" method="POST">
                <input type="hidden" id="app_url" value="{{ config('app.url') . '/' . app()->getLocale() }}">
                @csrf

                <input type="hidden" id="browse" value="{{ __('account.browse') }}">
                <input type="hidden" id="labelIdle" value="{{ __('account.labelIdle') }}">
                <input type="hidden" id="labelFileProcessing" value="{{ __('account.labelFileProcessing') }}">
                <input type="hidden" id="labelFileProcessingComplete" value="{{ __('account.labelFileProcessingComplete') }}">
                <input type="hidden" id="labelFileProcessingAborted" value="{{ __('account.labelFileProcessingAborted') }}">
                <input type="hidden" id="labelFileProcessingError" value="{{ __('account.labelFileProcessingError') }}">
                <input type="hidden" id="labelTapToCancel" value="{{ __('account.labelTapToCancel') }}">
                <input type="hidden" id="labelTapToRetry" value="{{ __('account.labelTapToRetry') }}">
                <input type="hidden" id="labelTapToUndo" value="{{ __('account.labelTapToUndo') }}">

                <div class="grid grid-cols-6 gap-6">
                    <input type="hidden" value="{{ 1 }}" id="max_number_of_images">
                    <input type="hidden" value="1" id="image_require">
                    <div class="col-span-6">
                        <label for="avatar" class="block text-sm font-medium text-gray-700">{{ __('Image') }}<span class="text-red-500">*</span></label>
                        @if(!isset($new->picture))
                            <input type="file" id="avatar" name="avatar[]" required class="mt-1 p-3">
                        @endif
                        @isset($new->picture)
                            <div class="mx-auto w-fit text-center mt-1" id="image_view_div">
                                <img class="mb-1 max-h-64" id="image_view" src="{{ asset($new->picture->path) }}" alt="photo">
                                <a href="{{ route('admin.news.delete.picture', [app()->getLocale(), $new->picture]) }}"
                                   onclick="return confirm('delete ?')"
                                   class="text-red-500 cursor-pointer hover:underline">
                                    <small>Change Picture</small>
                                </a>
                                <input type="hidden" class="hidden" name="avatar[]" value="{{ $new->picture->path }}">
                            </div>
                        @endisset
                    </div>

                    <div class="col-span-6">
                        <label for="title_de" class="block text-sm font-medium text-gray-700">{{ __('Title DE') }}<span class="text-red-500">*</span></label>
                        <input type="text" id="title_de" name="title_de" value="{{ $new->title_de ?? old('title_de') }}" required class="mt-1">
                    </div>
                    <div class="col-span-6">
                        <label for="title_en" class="block text-sm font-medium text-gray-700">{{ __('Title EN') }}</label>
                        <input type="text" id="title_en" name="title_en" value="{{ $new->title_en ?? old('title_en') }}" class="mt-1">
                    </div>
                    <div class="col-span-6">
                        <label for="title_fr" class="block text-sm font-medium text-gray-700">{{ __('Title FR') }}</label>
                        <input type="text" id="title_fr" name="title_fr" value="{{ $new->title_fr ?? old('title_fr') }}" class="mt-1">
                    </div>

                    <div class="col-span-6">
                        <label for="description_de" class="block text-sm font-medium text-gray-700">{{ __('Description DE') }}<span class="text-red-500">*</span></label>
                        <textarea id="description_de" name="description_de" rows="5" class="mt-1" required>{{ $new->description_de ?? old('description_de') }}</textarea>
                    </div>
                    <div class="col-span-6">
                        <label for="description_en" class="block text-sm font-medium text-gray-700">{{ __('Description EN') }}</label>
                        <textarea id="description_en" name="description_en" rows="5" class="mt-1">{{ $new->description_en ?? old('description_en') }}</textarea>
                    </div>
                    <div class="col-span-6">
                        <label for="description_fr" class="block text-sm font-medium text-gray-700">{{ __('Description FR') }}</label>
                        <textarea id="description_fr" name="description_fr" rows="5" class="mt-1">{{ $new->description_fr ?? old('description_fr') }}</textarea>
                    </div>

                    <input type="hidden" value="{{ 1 }}" id="max_number_of_files">
                    <input type="hidden" value="0" id="files_require">

                    <div class="col-span-6">
                        <label for="files" class="block text-sm font-medium text-gray-700">PDF DE</label>
                        @php($document_de = $new->documents->where('language', 'de')->first())
                        @if($document_de)
                            <div class="flex justify-between items-center py-8 px-5 rounded-lg mb-3 bg-gray-100 shadow mt-1">
                                <div class="font-semibold">
                                    {{ $document_de->filename }}
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <a href="{{ asset($document_de->path) }}" download
                                           class="text-blue-500"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:scale-110">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="ml-3">
                                        <a href="{{ route('admin.news.delete.document', [app()->getLocale(), $document_de]) }}"
                                           onclick="return confirm('delete ?')"
                                           class="text-red-500 hover:underline"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:scale-110">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <input type="hidden" class="hidden" name="files[de]" value="{{ $document_de->path }}">
                            </div>
                        @else
                            <input type="file" id="files" name="files[de]" accept="application/pdf" class=" files mt-1 p-3">
                        @endif
                    </div>

                    <div class="col-span-6">
                        <label for="files" class="block text-sm font-medium text-gray-700">PDF EN</label>
                        @php($document_en = $new->documents->where('language', 'en')->first())
                        @if($document_en)
                            <div class="flex justify-between items-center py-8 px-5 rounded-lg mb-3 bg-gray-100 shadow mt-1">
                                <div class="font-semibold">
                                    {{ $document_en->filename }}
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <a href="{{ asset($document_en->path) }}" download
                                           class="text-blue-500"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:scale-110">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="ml-3">
                                        <a href="{{ route('admin.news.delete.document', [app()->getLocale(), $document_en]) }}"
                                           onclick="return confirm('delete ?')"
                                           class="text-red-500 hover:underline"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:scale-110">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <input type="hidden" class="hidden" name="files[en]" value="{{ $document_en->path }}">
                            </div>
                        @else
                            <input type="file" id="files" name="files[en]" accept="application/pdf" class=" files mt-1 p-3">
                        @endif
                    </div>

                    <div class="col-span-6">
                        <label for="files" class="block text-sm font-medium text-gray-700">PDF FR</label>
                        @php($document_fr = $new->documents->where('language', 'fr')->first())
                        @if($document_fr)
                            <div class="flex justify-between items-center py-8 px-5 rounded-lg mb-3 bg-gray-100 shadow mt-1">
                                <div class="font-semibold">
                                    {{ $document_fr->filename }}
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <a href="{{ asset($document_fr->path) }}" download
                                           class="text-blue-500"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:scale-110">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="ml-3">
                                        <a href="{{ route('admin.news.delete.document', [app()->getLocale(), $document_fr]) }}"
                                           onclick="return confirm('delete ?')"
                                           class="text-red-500 hover:underline"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:scale-110">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <input type="hidden" class="hidden" name="files[fr]" value="{{ $document_fr->path }}">
                            </div>
                        @else
                            <input type="file" id="files" name="files[fr]" accept="application/pdf" class=" files mt-1 p-3">
                        @endif
                    </div>

                    <div class="col-span-6">
                        <label for="active" class="block text-sm font-medium text-gray-700">{{ __('Active') }}</label>
                        <select id="active" name="active" class="mt-1" required>
                            <option value="0" @if(!$new->active || old('active') == 0) selected @endif>No</option>
                            <option value="1" @if($new->active || old('active') == 1) selected @endif>Yes</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-5 mt-5">
                    <button onclick="return confirm('edit ?')" class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Edit</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.news', app()->getLocale()) }}">Cancel</a>
                </div>
            </form>
        </div>

    </div>
@endsection
