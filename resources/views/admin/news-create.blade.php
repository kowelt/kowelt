@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Create News</p>
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
            <form class="p-6" action="{{ route('admin.news.store', app()->getLocale()) }}" method="POST">
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
                        <input type="file" id="avatar" name="avatar[]" required class="mt-1 p-3">
                    </div>

                    <div class="col-span-6">
                        <label for="title_de" class="block text-sm font-medium text-gray-700">{{ __('Title DE') }}<span class="text-red-500">*</span></label>
                        <input type="text" id="title_de" name="title_de" value="{{ old('title_de') }}" required class="mt-1">
                    </div>
                    <div class="col-span-6">
                        <label for="title_en" class="block text-sm font-medium text-gray-700">{{ __('Title EN') }}</label>
                        <input type="text" id="title_en" name="title_en" value="{{ old('title_en') }}" class="mt-1">
                    </div>
                    <div class="col-span-6">
                        <label for="title_fr" class="block text-sm font-medium text-gray-700">{{ __('Title FR') }}</label>
                        <input type="text" id="title_fr" name="title_fr" value="{{ old('title_fr') }}" class="mt-1">
                    </div>

                    <div class="col-span-6">
                        <label for="description_de" class="block text-sm font-medium text-gray-700">{{ __('Description DE') }}<span class="text-red-500">*</span></label>
                        <textarea id="description_de" name="description_de" rows="5" class="mt-1" required>{{ old('description_de') }}</textarea>
                    </div>
                    <div class="col-span-6">
                        <label for="description_en" class="block text-sm font-medium text-gray-700">{{ __('Description EN') }}</label>
                        <textarea id="description_en" name="description_en" rows="5" class="mt-1">{{ old('description_en') }}</textarea>
                    </div>
                    <div class="col-span-6">
                        <label for="description_fr" class="block text-sm font-medium text-gray-700">{{ __('Description FR') }}</label>
                        <textarea id="description_fr" name="description_fr" rows="5" class="mt-1">{{ old('description_fr') }}</textarea>
                    </div>

                    <input type="hidden" value="{{ 1 }}" id="max_number_of_files">
                    <input type="hidden" value="1" id="files_require">

                    <div class="col-span-6">
                        <label for="files_de" class="block text-sm font-medium text-gray-700">PDF DE</label>
                        <input type="file" id="files_de" name="files[de]" accept="application/pdf" class="files mt-1 p-3">
                    </div>

                    <div class="col-span-6">
                        <label for="files_en" class="block text-sm font-medium text-gray-700">PDF EN</label>
                        <input type="file" id="files_en" name="files[en]" accept="application/pdf" class="files mt-1 p-3">
                    </div>

                    <div class="col-span-6">
                        <label for="files_fr" class="block text-sm font-medium text-gray-700">PDF FR</label>
                        <input type="file" id="files_fr" name="files[fr]" accept="application/pdf" class="files mt-1 p-3">
                    </div>

                    <div class="col-span-6">
                        <label for="active" class="block text-sm font-medium text-gray-700">{{ __('Active') }}</label>
                        <select id="active" name="active" class="mt-1" required>
                            <option value="0" @if(old('active') == 0) selected @endif>No</option>
                            <option value="1" @if(old('active') == 1) selected @endif>Yes</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-5 mt-5">
                    <button class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Create</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.news', app()->getLocale()) }}">Cancel</a>
                </div>
            </form>
        </div>

    </div>
@endsection
