@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">View/Edit KODREAMS Candidate ({{ $ugg->firstname }} {{ $ugg->lastname }})</p>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16 container mx-auto">
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
            <form class="p-6 container mx-auto" action="{{ route('admin.ugg.update', [app()->getLocale(), $ugg]) }}" method="POST">
                @csrf

                <div class="grid grid-cols-6 gap-6 bg-white p-10 shadow rounded-lg">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="firstname" class="block text-sm font-medium text-gray-700">{{ __('account.firstname') }}<span class="text-red-500">*</span></label>
                        <input type="text" id="firstname" name="firstname" value="{{ $ugg->firstname }}" class="mt-1">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="lastname" class="block text-sm font-medium text-gray-700">{{ __('account.lastname') }}<span class="text-red-500">*</span></label>
                        <input type="text" id="lastname" name="lastname" value="{{ $ugg->lastname }}" class="mt-1">
                    </div>

                    <div class="col-span-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('account.e_mail') }}<span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ $ugg->email }}" class="mt-1">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">{{ __('account.Date_De_Naissance') }}<span class="text-red-500">*</span></label>
                        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $ugg->date_of_birth ?? old('date_of_birth') }}"  class="mt-1">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="gender" class="block text-sm font-medium text-gray-700">{{ __('account.Genre') }}<span class="text-red-500">*</span></label>
                        <select id="gender" name="gender" class="mt-1">
                            <option value="1" {{ $ugg->gender == '1' ? 'selected' : '' }} >{{ __('account.homme') }}</option>
                            <option value="2" {{ $ugg->gender == '2' ? 'selected' : '' }} >{{ __('account.femme') }}</option>
                            <option value="3" {{ $ugg->gender == '3' ? 'selected' : '' }} >{{ __('account.divers') }}</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-5 mt-5">
                    <button onclick="return confirm('edit ?')" class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Edit</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.ugg', app()->getLocale()) }}">Cancel</a>
                </div>
            </form>

            <br>
            <br>

        </div>

    </div>
@endsection
