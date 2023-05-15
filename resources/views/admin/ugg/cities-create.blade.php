@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Create City</p>
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
            <form class="p-6" action="{{ route('admin.ugg.cities.store', app()->getLocale()) }}" method="POST">
                @csrf

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6">
                        <label for="ugg_session_id" class="block text-sm font-medium text-gray-700">{{ __('UGG Session') }}<span class="text-red-500">*</span></label>
                        <select id="ugg_session_id" name="ugg_session_id" class="mt-1" required>
                            <option value="" selected disabled>Please select...</option>
                            @isset($ugg_sessions[0])
                                @foreach($ugg_sessions as $ugg_session)
                                    <option value="{{ $ugg_session->id }}" @if(old('ugg_session_id') == $ugg_session->id) selected @endif>
                                        {{ $ugg_session->{'name_' . app()->getLocale()} }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    <div class="col-span-6">
                        <label for="name_en" class="block text-sm font-medium text-gray-700">{{ __('Name EN') }}<span class="text-red-500">*</span></label>
                        <input type="text" id="name_en" name="name_en" value="{{ old('name_en') }}" required class="mt-1">
                    </div>

                    <div class="col-span-6">
                        <label for="name_de" class="block text-sm font-medium text-gray-700">{{ __('Name DE') }}<span class="text-red-500">*</span></label>
                        <input type="text" id="name_de" name="name_de" value="{{ old('name_de') }}" required class="mt-1">
                    </div>

                    <div class="col-span-6">
                        <label for="name_fr" class="block text-sm font-medium text-gray-700">{{ __('Name FR') }}<span class="text-red-500">*</span></label>
                        <input type="text" id="name_fr" name="name_fr" value="{{ old('name_fr') }}" required class="mt-1">
                    </div>

                    <div class="col-span-6">
                        <label for="active" class="block text-sm font-medium text-gray-700">{{ __('Active') }}<span class="text-red-500">*</span></label>
                        <select id="active" name="active" class="mt-1" required>
                            <option value="1" @if(old('active') == 1) selected @endif>Yes</option>
                            <option value="0" @if(old('active') == 0) selected @endif>No</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-5 mt-5">
                    <button class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Create</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.ugg.cities', app()->getLocale()) }}">Cancel</a>
                </div>
            </form>
        </div>

    </div>
@endsection
