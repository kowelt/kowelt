@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Create Admin User</p>
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
            <form class="p-6" action="{{ route('admin.users.store', app()->getLocale()) }}" method="POST">
                @csrf

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender<span class="text-red-500">*</span></label>
                        <select id="gender" name="gender" required class="mt-1 @error('gender') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="" selected disabled>Please select</option>
                            <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>{{ __('account.homme') }}</option>
                            <option value="2" {{ old('gender') == '2' ? 'selected' : '' }}>{{ __('account.femme') }}</option>
                            <option value="3" {{ old('gender') == '3' ? 'selected' : '' }}>{{ __('account.divers') }}</option>
                        </select>
                    </div>

                    <div class="col-span-6">
                        <label for="firstname" class="block text-sm font-medium text-gray-700">Firstname<span class="text-red-500">*</span></label>
                        <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" placeholder="{{ __('account.firstname') }}" autocomplete="firstname" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm rounded-md @error('firstname') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                    </div>

                    <div class="col-span-6">
                        <label for="lastname" class="block text-sm font-medium text-gray-700">Lastname<span class="text-red-500">*</span></label>
                        <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" placeholder="{{ __('account.lastname') }}" autocomplete="lastname" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm rounded-md @error('lastname') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                    </div>

                    <div class="col-span-6">
                        <label for="date_of_birth" class="block text-sm font-medium">Date of birth<span class="text-red-500">*</span></label>
                        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required class="mt-1 @error('date_of_birth') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                    </div>

                    <div class="col-span-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">E-Mail<span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('account.e_mail') }}" autocomplete="email" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm rounded-md @error('email') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                    </div>

                    <div class="col-span-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password<span class="text-red-500">*</span></label>
                        <input type="text" name="password" id="password" placeholder="{{ __('account.Password') }}" autocomplete="password" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm rounded-md @error('password') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                    </div>
                    <div class="col-span-6">
                        <label for="can_create_admin_account" class="block text-sm font-medium text-gray-700">Can create admin accounts?<span class="text-red-500">*</span></label>
                        <select id="can_create_admin_account" name="can_create_admin_account" required class="mt-1 @error('can_create_admin_account') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="" selected disabled>Please select</option>
                            <option value="1" {{ old('can_create_admin_account') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('can_create_admin_account') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="col-span-6">
                        <label for="active_admin" class="block text-sm font-medium text-gray-700">Active<span class="text-red-500">*</span></label>
                        <select id="active_admin" name="active_admin" required class="mt-1 @error('active_admin') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="" selected disabled>Please select</option>
                            <option value="1" {{ old('active_admin') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('active_admin') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-5 mt-5">
                    <button class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Create</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.users', app()->getLocale()) }}">Cancel</a>
                </div>
            </form>
        </div>
        <br>
        <br>
        <br>
    </div>
@endsection
