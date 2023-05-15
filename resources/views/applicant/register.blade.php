@extends('layouts.app')
@section('content')
    <div class="bg-white pt-[80px]"></div>
    <section class="gradient-primary border-b pt-2 pb-4 text-gray-800 px-4">
        <div class="max-w-6xl mx-auto">
            <br>
            <br>
            <p class="mt-6 text-center text-xl md:text-4xl font-bold text-white">
                {{ __('account.principal_message_register') }}
            </p>
            <br>
            <br>
        </div>
    </section>
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
    <div class="bg-white text-gray-800 py-4">

        <div class="md:grid md:grid-cols-2 items-center gap-4 px-5 py-14 max-w-7xl mx-auto">
            <div class="w-full">
                <img class="max-h-80 object-center" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" alt="asd">
            </div>
            <div class="w-full md:pl-4 pt-10 md:pt-0 pl-10 md:pl-0">
                <div class="text-xl">
                    {{ __('account.Create_a_new_account') }}
                </div>
                <br>
                <form action="{{ route('applicant.register.store', app()->getLocale()) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-5">
                            <select id="gender" name="gender" required class="mt-1 @error('gender') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                <option value="" selected disabled>{{ __('account.Genre') }}</option>
                                <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>{{ __('account.homme') }}</option>
                                <option value="2" {{ old('gender') == '2' ? 'selected' : '' }}>{{ __('account.femme') }}</option>
                                <option value="3" {{ old('gender') == '3' ? 'selected' : '' }}>{{ __('account.divers') }}</option>
                            </select>
                        </div>

                        <div class="col-span-5">
                            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" placeholder="{{ __('account.firstname') }}" autocomplete="firstname" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm rounded-md @error('firstname') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                        </div>

                        <div class="col-span-5">
                            <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" placeholder="{{ __('account.lastname') }}" autocomplete="lastname" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm rounded-md @error('lastname') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                        </div>

                        <div class="col-span-5">
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-500">{{ __('account.Date_De_Naissance') }}</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required class="mt-1 @error('date_of_birth') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                        </div>

                        <div class="col-span-5">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('account.e_mail') }}" autocomplete="email" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm rounded-md @error('email') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                        </div>

                        <div class="col-span-5 flex items-center">
                            <input type="password" name="password" id="password" placeholder="{{ __('account.Password') }}" autocomplete="password" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm rounded-md @error('password') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            <svg id="password_show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mt-1 -ml-8 cursor-pointer hidden">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg id="password_hide" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mt-1 -ml-8 cursor-pointer hidden">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </div>

                        <div class="col-span-5 flex items-center">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{ __('account.repeat_Password') }}" autocomplete="password_confirmation" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm rounded-md @error('password') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            <svg id="password_show_2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mt-1 -ml-8 cursor-pointer hidden">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg id="password_hide_2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mt-1 -ml-8 cursor-pointer hidden">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </div>
                    </div>
                    <div class="py-3 text-start pt-6">
                        <button type="submit" class="inline-flex justify-center rounded-md gradient-primary py-3 px-6 text-sm font-medium text-white hover:shadow-blue-500/60 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition hover:scale-[1.02] duration-300 ease-in-out"
                        >{{ __('account.Enregistrez_vous') }}</button>
                    </div>
                    <small>
                        {{ __('account.Already_have_an_account') }} <a class="text-blue-500 hover:underline" href="{{ route('applicant.login', app()->getLocale()) }}">{{ __('account.Connectez_vous') }}</a>
                    </small>
                </form>
            </div>
        </div>

    </div>
@endsection
